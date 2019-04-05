<?php


namespace TsuCMS\Http\Controllers\Manager;

use TsuCMS\Http\Requests\Manager\Request;
use Illuminate\Support\Facades\App;
use Ramsey\Uuid\Uuid;
use TsuCMS\Repositories\MenuRepositories;
use TsuCMS\Repositories\PostsRepository;
use TsuCMS\Repositories\MenuToAnyRepository;
use TsuCMS\Repositories\MediaRepository;
use TsuCMS\Repositories\GaleriRepository;
use TsuCMS\Repositories\LocalesRepository;
use TsuCMS\Repositories\MediaToAnyRepository;


class GaleriController extends BackendController
{
    private $MenuRepositories, $PostsRepository, $MenuToAnyRepository, $MediaRepository,$GaleriRepository,$LocalesRepository,$MediaToAnyRepository;
    public function __construct(
        MenuRepositories $MenuRepositories,
        PostsRepository $PostsRepository,
        MenuToAnyRepository $MenuToAnyRepository,
        MediaRepository $MediaRepository,
        GaleriRepository $GaleriRepository,
        LocalesRepository $LocalesRepository,
        MediaToAnyRepository $MediaToAnyRepository,
        Request $request
    )
    {
        $pagetitle = explode('/',$request->path());
        view()->share('pagetitle',$pagetitle[1]);
        view()->share('lang',$pagetitle[3]);
        view()->share('pagefunc',$pagetitle[4]);
        $this->MenuRepositories = $MenuRepositories;
        $this->PostsRepository = $PostsRepository;
        $this->MenuToAnyRepository = $MenuToAnyRepository;
        $this->MediaRepository = $MediaRepository;
        $this->GaleriRepository = $GaleriRepository;
        $this->LocalesRepository = $LocalesRepository;
        $this->MediaToAnyRepository = $MediaToAnyRepository;
    }

    public function add($locale = 'ka', Request $request){
        App::setLocale($locale);
        view()->share('local',$locale);
        if ($request->method() == 'POST'){
            $addMenuElemnt = [
                'uuid' => Uuid::uuid4(),
                'is_active' => 1,
                'type' => 'GALERY'
            ];
            $galeri = $this->GaleriRepository->makeRecord($addMenuElemnt,true);
            $galeri->translateOrNew($locale)->title = $request->galerititle;
            $galerislug = str_replace(' ','_',$request->galerititle);
            $galeri->translateOrNew($locale)->slug = $galerislug;
            $galeri->save();

            $imageName = request()->yda->getClientOriginalName();
            request()->yda->move(base_path('assets/media/galeri'), $imageName);
            $addMenuElemnt = [
                'uuid' => Uuid::uuid4(),
                'media' => $imageName,
            ];
            $recordimg = $this->MediaRepository->makeRecord($addMenuElemnt,true);
            $recordimg->media()->attach('GALERIYDA',[
                'row_uuid'=> $galeri->uuid,
                'media_uuid'=>$recordimg->uuid,
                'type'=>'GALERIYDA',
                'is_main'=>null
            ]);

            foreach ($request->file()['img'] as $i => $galimg){
                $imageName = $galimg->getClientOriginalName();
                $galimg->move(base_path('assets/media/galeri'), $imageName);
                $addMenuElemnt = [
                    'uuid' => Uuid::uuid4(),
                    'media' => $imageName,
                ];
                $recordimg = $this->MediaRepository->makeRecord($addMenuElemnt,true);
                $recordimg->media()->attach('GALERIIMG',[
                    'row_uuid'=> $galeri->uuid,
                    'media_uuid'=>$recordimg->uuid,
                    'type'=>'GALERIIMG',
                    'is_main'=>null
                ]);
            }
        }
        return view('backend.herd_pages.galeri.add');
    }

    public function edit($Local = 'ka',$mid = 0,Request $request){
        App::setLocale($Local);
        view()->share('glaeri',$this->GaleriRepository->all());
        if($mid > 0){
            view()->share('galedit',$this->GaleriRepository->find($mid));
        }
        if ($request->method() == 'POST'){
            $addMenuElemnt = [
                'uuid' => $request->galuuid,
                'is_active' => 1,
                'type' => 'GALERY'
            ];
            $galeri = $this->GaleriRepository->makeRecord($addMenuElemnt,true);
            $galeri->translateOrNew($Local)->title = $request->galerititle;
            $galerislug = str_replace(' ','_',$request->galerititle);
            $galeri->translateOrNew($Local)->slug = $galerislug;
            $galeri->save();
            if(isset(request()->yda)) {
                $imageName = request()->yda->getClientOriginalName();
                request()->yda->move(base_path('assets/media/galeri'), $imageName);
                $addMenuElemnt = [
                    'uuid' => Uuid::uuid4(),
                    'media' => $imageName,
                ];
                $galydaimg = $this->MediaToAnyRepository->where('row_uuid', '=', $request->galuuid)->where('type', '=', 'GALERIYDA')->first();
                $this->MediaToAnyRepository->delete($galydaimg->id);
                $recordimg = $this->MediaRepository->makeRecord($addMenuElemnt, true);
                $recordimg->media()->attach('GALERIYDA', [
                    'row_uuid' => $galeri->uuid,
                    'media_uuid' => $recordimg->uuid,
                    'type' => 'GALERIYDA',
                    'is_main' => null
                ]);
            }
            if (isset($request->file()['img'])) {
                foreach ($request->file()['img'] as $i => $galimg) {
                    $imageName = $galimg->getClientOriginalName();
                    $galimg->move(base_path('assets/media/galeri'), $imageName);
                    $addMenuElemnt = [
                        'uuid' => Uuid::uuid4(),
                        'media' => $imageName,
                    ];
                    $recordimg = $this->MediaRepository->makeRecord($addMenuElemnt, true);
                    $recordimg->media()->attach('GALERIIMG', [
                        'row_uuid' => $galeri->uuid,
                        'media_uuid' => $recordimg->uuid,
                        'type' => 'GALERIIMG',
                        'is_main' => null
                    ]);
                }
            }
        }
        view()->share('local',$Local);
        view()->share('mid',$mid);
        $media = $this->MediaRepository->mediaToAny()->where('type','=','GALERIYDA')->get();
        $mediadam = $this->MediaRepository->mediaToAny()->where('type','=','GALERIIMG')->get();
        return view('backend.herd_pages.galeri.edit',compact('media','mediadam'));
    }

    public function img(Request $request){

        if ($request->method() == 'POST'){
            $this->MediaToAnyRepository->delete($request->id);
        }
    }

    public function delete($Locale = 'ka',$mid = 0){
        App::setLocale($Locale);
        view()->share('local',$Locale);
        if($mid > 0) {
            $galuuid = $this->GaleriRepository->find($mid);
            $mediadel = $this->MediaToAnyRepository->where('row_uuid','=',$galuuid->uuid)->get();
            foreach ($mediadel as $mediadelitem) {
                $media = $this->MediaRepository->where('uuid','=',$mediadelitem->media_uuid)->first();
                $this->MediaRepository->delete($media->id);
                $this->MediaToAnyRepository->delete($mediadelitem->id);
            }
            $this->GaleriRepository->delete($mid);
        }
        view()->share('glaeri',$this->GaleriRepository->all());
        $media = $this->MediaRepository->mediaToAny()->where('type','=','GALERIYDA')->get();
        $mediadam = $this->MediaRepository->mediaToAny()->where('type','=','GALERIIMG')->get();
        return view('backend.herd_pages.galeri.delete',compact('media','mediadam'));
    }

}
