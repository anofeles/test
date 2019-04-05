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

class HomeController extends BackendController
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
    public function add($locale = 'ka', Request $request){
        App::setLocale($locale);
        view()->share('local',$locale);
        view()->share('topMenu', $this->MenuRepositories->topMenu());
        view()->share('locale',$this->LocalesRepository->all());
        if ($request->method() == 'POST') {
            App::setLocale($locale);
            $type = $request->type;
            if ($request->mtav > 0) {
                $addMenuElemnt = [
                    'uuid' => Uuid::uuid4(),
                    'sort' => 1,
                    'type' => $type
//                    'parent_id' => $request->mtav
                ];
            } else {
                $addMenuElemnt = [
                    'uuid' => Uuid::uuid4(),
                    'sort' => 1,
                    'type' => $type,
                    'target' => $request->targ
                ];
            }
            $record = $this->MenuRepositories->makeRecord($addMenuElemnt, true);
            $record->translateOrNew($request->local)->name = $request->title;
            $record->save();
            return view('backend.herd_pages.add');
        }
        return view('backend.herd_pages.add');
    }

    public function edit($locale = 'ka',$mid = 0, Request $request){
        App::setLocale($locale);
        view()->share('local',$locale);
        view()->share('mid',$mid);
        if($mid > 0){
            view()->share('locale',$this->LocalesRepository->all());
            view()->share('topMenu', $this->MenuRepositories->topMenu());
            view()->share('menu_edit',$this->MenuRepositories->find($mid));
            if ($request->method() == 'POST') {
                App::setLocale($locale);
                    $addMenuElemnt = [
                        'uuid' => $request->uuid,
                        'sort' => $request->sort,
                        'type' => $request->type,
                        'target' => $request->targ
                    ];
                $record = $this->MenuRepositories->makeRecord($addMenuElemnt, true);
                $record->translateOrNew($request->local)->name = $request->title;
                $record->save();
            }
        }
        $menu = $this->MenuRepositories->paginate(10);
        return view('backend.herd_pages.edit_menu',compact('menu'));
    }

    public function delete($locale = 'ka', $mid = 0, Request $request){
        App::setLocale($locale);
        view()->share('local',$locale);
        if($mid > 0){
            $this->MenuRepositories->delete($mid);
        }
        $menu = $this->MenuRepositories->paginate(10);
        return view('backend.herd_pages.dell_menu',compact('menu'));
    }

}
