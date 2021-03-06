<?php

namespace Jbb\Http\Controllers\Admin;

use Gate;
use Illuminate\Http\Request;
use Jbb\Repositories\ArticlesRepository;
use Jbb\Repositories\MenusRepository;
use Jbb\Repositories\PortfoliosRepository;
use Menu;

class MenusController extends AdminController
{
    protected $m_rep;

    public function __construct(MenusRepository $m_rep, ArticlesRepository $a_rep, PortfoliosRepository $p_rep)
    {
        parent::__construct();

        $this->middleware(function ($request, $next) {
            if (Gate::denies('VIEW_ADMIN_MENU')) {
                abort(403);
            } else {
                //dump('VIEW_ADMIN_MENU');
            }

            return $next($request);
        });

        $this->m_rep = $m_rep;
        $this->a_rep = $a_rep;
        $this->p_rep = $p_rep;

        $this->template = env('THEME').'.admin.menus';
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $menu = $this->getMenus();

        //dump($menu);

        $this->content = view(env('THEME').'.admin.menus_content')->with('menus', $menu)->render();

        return $this->renderOutput();
    }

    public function getMenus()
    {
        $menu = $this->m_rep->get();

        if ($menu->isEmpty()) {
            return false;
        }

        return Menu::make('forMenuPart', function ($m) use ($menu) {
            foreach ($menu as $item) {


                if ($item->parent == 0) {
                    if($item->trashed()){
                    $m->add($item->title, $item->path)->id($item->id)->data('trashed','true');
                    }else{
                    $m->add($item->title, $item->path)->id($item->id);
                }
                } else {
                    if ($m->find($item->parent)) {
                        $m->find($item->parent)->add($item->title, $item->path)->id($item->id);
                    }
                }
            }
        });
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show(\Jbb\Menu $menu)
    {

        // $menu->save();
// 
        // return redirect('admin/')->with(['status'=>'Вкл']);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int                      $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $menu = \Jbb\Menu::onlyTrashed()->find($id);

        $menu->restore();
        $result = ['status'=>'Ссылка Востановлена'];
        return back()->with($result);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(\Jbb\Menu $menu)
    {
        if($menu->delete()) {
            $result = ['status'=>'Ссылка удалена'];
            return back()->with($result);
        }
    }
}
