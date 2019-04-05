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

class TextController extends BackendController
{
    private $MenuRepositories, $PostsRepository, $MenuToAnyRepository, $MediaRepository,$GaleriRepository,$LocalesRepository;
    public function __construct(
        MenuRepositories $MenuRepositories,
        PostsRepository $PostsRepository,
        MenuToAnyRepository $MenuToAnyRepository,
        MediaRepository $MediaRepository,
        GaleriRepository $GaleriRepository,
        LocalesRepository $LocalesRepository,
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
    }
    function add($locale = 'ka', Request $request){
        App::setLocale($locale);
        view()->share('local',$locale);
        view()->share('menu',$this->MenuRepositories->all());
        $type = 'POST';
        if($request->mtv == 1){
            $mtv = 1;
        }else {$mtv = 0;}
        if ($request->method() == 'POST') {
            $addMenuElemnt = [
                'uuid' => Uuid::uuid4(),
                'is_active' => 1,
                'type' => $type,
                'is_comment_on' => $mtv,
                'created_at' => $request->created_at
            ];
            $slug = str_replace(' ', '_', $request->title);
            $record = $this->PostsRepository->makeRecord($addMenuElemnt, true);
            if(!empty($request->menu) && $request->menu > '0'){
                $addMenutoElemnt = [
                    'menu_uuid' => $request->menu,
                    'row_uuid' => $record->uuid
                ];
                $this->MenuToAnyRepository->create($addMenutoElemnt);
            }
            $record->translateOrNew($locale)->title = $request->title;
            $record->translateOrNew($locale)->description = $request->desc;
            $record->translateOrNew($locale)->slug = $slug;
            $record->save();

            if(isset($request->image) && !empty($request->image)) {
                request()->validate([
                    'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                ]);
                $imageName = time() . '.' . request()->image->getClientOriginalExtension();
                request()->image->move(base_path('assets/media'), $imageName);
                $addMenuElemnt = [
                    'uuid' => Uuid::uuid4(),
                    'media' => $imageName,
                ];
                $recordimg = $this->MediaRepository->makeRecord($addMenuElemnt,true);
                $recordimg->media()->attach('PAGECOVER',[
                    'row_uuid'=> $record->uuid,
                    'media_uuid'=>$recordimg->uuid,
                    'type'=>'PAGECOVER',
                    'is_main'=>null
                ]);
            }
        }
        return view('backend.herd_pages.post.add');
    }

    function edit($locale = 'ka',$mid = 0, Request $request){
        App::setLocale($locale);
        view()->share('local',$locale);
        view()->share('mid',$mid);
        $post = $this->PostsRepository->paginate(10);
        if ($mid > 0){
            view()->share('menu',$this->MenuRepositories->all());
            view()->share('editpost',$this->PostsRepository->find($mid));
            $textuuid = $this->PostsRepository->find($mid)->uuid;
            view()->share('postmenu',$this->MenuToAnyRepository->where('row_uuid','=',$textuuid)->first());
            view()->share('media',$this->MediaRepository->mediaToAny()->where('row_uuid','=',$textuuid)->first());
        }
        if ($request->method() == 'POST') {
            $type = 'POST';
            if($request->mtv == "on"){
                $mtv = 1;
            }else {$mtv = 0;}
            $addMenuElemnt = [
                'uuid' => $request->postuuid,
                'is_active' => 1,
                'type' => $type,
                'is_comment_on' => $mtv,
                'created_at' => $request->created_at
            ];
            $slug = str_replace(' ', '_', $request->title);
            $record = $this->PostsRepository->makeRecord($addMenuElemnt, true);
            if(!empty($request->menu) && $request->menu > '0'){
                $delmenu = $this->MenuToAnyRepository->where('row_uuid','=',$request->postuuid)->first();
                $this->MenuToAnyRepository->delete($delmenu->id);
                $addMenutoElemnt = [
                    'menu_uuid' => $request->menu,
                    'row_uuid' => $record->uuid
                ];
                $this->MenuToAnyRepository->create($addMenutoElemnt);
            }
            $record->translateOrNew($locale)->title = $request->title;
            $record->translateOrNew($locale)->description = $request->desc;
            $record->translateOrNew($locale)->slug = $slug;
            $record->save();

            if(isset($request->image) && !empty($request->image)) {
                request()->validate([
                    'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                ]);
                $imageName = time() . '.' . request()->image->getClientOriginalExtension();
                request()->image->move(base_path('assets/media'), $imageName);
                $addMenuElemnt = [
                    'uuid' => Uuid::uuid4(),
                    'media' => $imageName,
                ];
                $recordimg = $this->MediaRepository->makeRecord($addMenuElemnt,true);
                $recordimg->media()->attach('PAGECOVER',[
                    'row_uuid'=> $record->uuid,
                    'media_uuid'=>$recordimg->uuid,
                    'type'=>'PAGECOVER',
                    'is_main'=>null
                ]);
            }
        }
        return view('backend.herd_pages.post.edit',compact('post'));
    }

    function delete($locale = 'ka',$mid = 0, Request $request){
        App::setLocale($locale);
        view()->share('local',$locale);
        if($mid > 0){
            $this->PostsRepository->delete($mid);
        }
        $post = $this->PostsRepository->paginate(10);
        return view('backend.herd_pages.post.delete',compact('post'));
    }

}
