<?php

namespace TsuCMS\Http\Controllers\Frontend;

use TsuCMS\Http\Requests\Manager\Request;
use Illuminate\Support\Facades\App;
use Ramsey\Uuid\Uuid;
use TsuCMS\Repositories\MenuRepositories;
use TsuCMS\Repositories\PostsRepository;
use TsuCMS\Repositories\MenuToAnyRepository;
use TsuCMS\Repositories\MediaRepository;
use TsuCMS\Repositories\GaleriRepository;
use TsuCMS\Core\Collections\calendar;

class WebController extends FrontendController
{
    private $MenuRepositories, $PostsRepository, $MenuToAnyRepository, $MediaRepository,$GaleriRepository,$calendar;

    public function __construct(
        MenuRepositories $MenuRepositories,
        PostsRepository $PostsRepository,
        MenuToAnyRepository $MenuToAnyRepository,
        MediaRepository $MediaRepository,
        GaleriRepository $GaleriRepository,
        calendar $calendar
    )
    {
        $this->MenuRepositories = $MenuRepositories;
        $this->PostsRepository = $PostsRepository;
        $this->MenuToAnyRepository = $MenuToAnyRepository;
        $this->MediaRepository = $MediaRepository;
        $this->GaleriRepository = $GaleriRepository;
        $this->calendar = $calendar;
        view()->share('locale',App::getlocale());
        view()->share('topMenu', $this->MenuRepositories->topMenu());
        view()->share('topChildren', $this->MenuRepositories->topChildren());
        view()->share('menuall',$this->MenuRepositories->orderBy('sort')->get());
    }

    public function index($locale = 'ka',$catid = 0)
    {
        App::setLocale($locale);
        view()->share('calendar',$this->calendar->show($locale));
        view()->share('catid', $catid);
        view()->share('toppost', $this->PostsRepository->where('is_featured', '=', 1)->first());
        if($catid > 0) {
            $menu = $this->MenuRepositories->mToAny($this->MenuRepositories->find($catid)->uuid)->first();
            if (!empty($menu->row_uuid)) {
                view()->share('post', $this->PostsRepository->where('uuid', '=', $menu->row_uuid)->get());
            }
        }
        else{
            view()->share('post', $this->PostsRepository->where('is_comment_on', '=', 1)->get());
        }
        view()->share('PAGECOVER', $this->MediaRepository->mediaToAny()->where('type','=','PAGECOVER')->get());
        view()->share('GALERI', $this->MediaRepository->mediaToAny()->where('type','=','GALERIYDA')->get());
        view()->share('glaeri',$this->GaleriRepository->all());
        if ($catid > 2) {
            $menuItem = $this->MenuRepositories->find($catid);
                $menutoany = $this->MenuToAnyRepository->where('menu_uuid','=', $menuItem->uuid)->first();
                if($menutoany) {
                    $muuid = $menutoany->row_uuid;
                    $menu = $this->PostsRepository->whereHas('translations', function ($q) use ($muuid) {
                        $q->where('uuid', $muuid);
                    })->get();
                }
        }
        return view('thems.herd_pages.index',compact('menu'));
    }

    public function info($locale = 'ka',$slug,$id){
        App::setLocale($locale);
        view()->share('calendar',$this->calendar->show($locale));
        view()->share('catid', 2);
        view()->share('PAGECOVER', $this->MediaRepository->mediaToAny()->where('type','=','PAGECOVER')->get());
        $info = $this->PostsRepository->find($id);

        return view('thems.herd_pages.info', compact('info'));
    }

    public function pagegaleri($locale='ka',$slug,$gid){
        App::setLocale($locale);
        view()->share('calendar',$this->calendar->show($locale));
        $gUUid = $this->MenuRepositories->where('type','=','galeri')->first();
        view()->share('catid',$gUUid->id);
        $galuuid = $this->GaleriRepository->find($gid);
        $mediaimg = $this->MediaRepository->mediaToAny()->where('row_uuid','=',$galuuid->uuid)->get();

        return view('thems.components.galeri_img',compact('mediaimg'));
    }

    public function postdata($locale = 'ka',$postd){
        App::setLocale($locale);
        view()->share('calendar',$this->calendar->show($locale));
        view()->share('PAGECOVER', $this->MediaRepository->mediaToAny()->where('type','=','PAGECOVER')->get());

        $postdate = $this->PostsRepository->where('created_at','like', $postd.'%')->get();
        return view('thems.herd_pages.postdata',compact('postdate'));
    }

    public function search($locale = 'ka',Request $request){
        App::setLocale($locale);
        view()->share('calendar',$this->calendar->show($locale));
        if ($request->method() == 'POST') {
//            'description', 'like', '%'.$request->search . '%'
            view()->share('PAGECOVER', $this->MediaRepository->mediaToAny()->where('type', '=', 'PAGECOVER')->get());
            $postdate = $this->PostsRepository->whereHas('translations',function ($q) use ($request){
                $q->where('description', 'like', '%'.$request->search . '%');
                $q->orwhere('title', 'like', '%'.$request->search . '%');
            })->get();
        }
        return view('thems.herd_pages.search',compact('postdate'));
    }

//    public function inser($locale, Request $request)
//    {
//        App::setLocale($locale);
//        $type = 'POST';
////        $uuid = Uuid::uuid4();
//        view()->share('menu',$this->MenuRepositories->all());
//        if ($request->method() == 'POST') {
//            $addMenuElemnt = [
//                'uuid' => Uuid::uuid4(),
//                'is_active' => 1,
//                'type' => $type
//            ];
//            $slug = str_replace(' ', '_', $request->title);
//            $record = $this->PostsRepository->makeRecord($addMenuElemnt, true);
//            if(!empty($request->menu) && $request->menu > '0'){
//                $addMenutoElemnt = [
//                    'menu_uuid' => $request->menu,
//                    'row_uuid' => $record->uuid
//                ];
//                $this->MenuToAnyRepository->create($addMenutoElemnt);
//            }
//            $record->translateOrNew($locale)->title = $request->title;
//            $record->translateOrNew($locale)->description = $request->desc;
//            $record->translateOrNew($locale)->slug = $slug;
//            $record->save();
//
//            if(isset($request->image) && !empty($request->image)) {
//                request()->validate([
//                    'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
//                ]);
//                $imageName = time() . '.' . request()->image->getClientOriginalExtension();
//                request()->image->move(base_path('assets/media'), $imageName);
//                $addMenuElemnt = [
//                    'uuid' => Uuid::uuid4(),
//                    'media' => $imageName,
//                ];
//                $recordimg = $this->MediaRepository->makeRecord($addMenuElemnt,true);
//                $recordimg->media()->attach('PAGECOVER',[
//                    'row_uuid'=> $record->uuid,
//                    'media_uuid'=>$recordimg->uuid,
//                    'type'=>'PAGECOVER',
//                    'is_main'=>null
//                ]);
//            }
//        }
//        return view('thems.herd_pages.catadd');
//    }
//
//    public function menuinsert($locale = 'ka', Request $request)
//    {
//        App::setLocale($locale);
//        if ($request->method() == 'POST') {
//                $addMenuElemnt = [
//                    'uuid' => Uuid::uuid4(),
//                    'sort' => 1,
//                    'type' => $request->mtav
//                ];
//            $record = $this->MenuRepositories->makeRecord($addMenuElemnt, true);
//            $record->translateOrNew($locale)->name = $request->title;
//            $record->save();
//        }
//        return view('thems.herd_pages.add');
//    }
//
//    public function galery(Request $request,$locale = 'ka'){
//        App::setLocale($locale);
//        view()->share('locale','ka');
//        if ($request->method() == 'POST'){
//            $addMenuElemnt = [
//                'uuid' => Uuid::uuid4(),
//                'is_active' => 1,
//                'type' => 'GALERY'
//            ];
//            $galeri = $this->GaleriRepository->makeRecord($addMenuElemnt,true);
//            $galeri->translateOrNew($locale)->title = $request->galerititle;
//            $galerislug = str_replace(' ','_',$request->galerititle);
//            $galeri->translateOrNew($locale)->slug = $galerislug;
//            $galeri->save();
//
//            $imageName = time() . '.' . request()->yda->getClientOriginalExtension();
//            request()->yda->move(base_path('assets/media/galeri'), $imageName);
//            $addMenuElemnt = [
//                'uuid' => Uuid::uuid4(),
//                'media' => $imageName,
//            ];
//            $recordimg = $this->MediaRepository->makeRecord($addMenuElemnt,true);
//            $recordimg->media()->attach('GALERIYDA',[
//                'row_uuid'=> $galeri->uuid,
//                'media_uuid'=>$recordimg->uuid,
//                'type'=>'GALERIYDA',
//                'is_main'=>null
//            ]);
//
//            foreach ($request->file()['img'] as $i => $galimg){
//                $imageName = $galimg->getClientOriginalName();
//                $galimg->move(base_path('assets/media/galeri'), $imageName);
//                $addMenuElemnt = [
//                    'uuid' => Uuid::uuid4(),
//                    'media' => $imageName,
//                ];
//                $recordimg = $this->MediaRepository->makeRecord($addMenuElemnt,true);
//                $recordimg->media()->attach('GALERIIMG',[
//                    'row_uuid'=> $galeri->uuid,
//                    'media_uuid'=>$recordimg->uuid,
//                    'type'=>'GALERIIMG',
//                    'is_main'=>null
//                ]);
//            }
//        }
//        return view('thems.herd_pages.galeri');
//    }
}
