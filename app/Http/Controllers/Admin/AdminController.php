<?php

namespace Jbb\Http\Controllers\Admin;
use Jbb\Http\Controllers\Controller;
use Menu;
use Auth;

class AdminController extends \Jbb\Http\Controllers\Controller
{
    protected $p_rep;
    protected $a_rep;
    protected $user;
    protected $template;
    protected $content = false;
    protected $title;
    protected $vars;

    public function __construct()
    {
            $this->middleware(function ($request, $next) {

            $this->user = Auth::user();

            if(!$this->user) {
                abort(403);
            }

            return $next($request);
        });
    }

    public function renderOutput()
    {
        $this->vars = array_add($this->vars, 'title', $this->title);
        $menu = $this->getMenu();
        $navigation = view(env('THEME').'.admin.navigation')->with('menu', $menu)->render();
        $this->vars = array_add($this->vars, 'navigation', $navigation);

        if ($this->content) {
            $this->vars = array_add($this->vars, 'content', $this->content);
        }

        $footer = view(env('THEME').'.admin.footer')->render();
        $this->vars = array_add($this->vars, 'footer', $footer);

        return view($this->template)->with($this->vars);
    }

    public function getMenu()
    {
        return Menu::make('adminMenu', function ($menu) {
            $menu->add('Статьи', ['route' => 'admin.articles.index', 'class' => 'nav-item'])->link->attr(['class' => 'nav-link']);
            $menu->add('Услуги и цены', ['route' => 'admin.services.index', 'class' => 'nav-item'])->link->attr(['class' => 'nav-link']);
            $menu->add('Портфолио', ['route' => 'admin.portfolio.index', 'class' => 'nav-item'])->link->attr(['class' => 'nav-link']);
            // $menu->add('Пользователи', ['route'  => 'admin.users.index', 'class' => 'nav-item'])->link->attr(['class' => 'nav-link']);
            // $menu->add('Привилегии', ['route'  => 'admin.permissions.index', 'class' => 'nav-item'])->link->attr(['class' => 'nav-link']);
            // $menu->add('Меню', ['route'  => 'admin.menus.index', 'class' => 'nav-item'])->link->attr(['class' => 'nav-link']);
            $menu->add('Информация', ['route'  => 'admin.information.index', 'class' => 'nav-item'])->link->attr(['class' => 'nav-link']);
        });
    }
}
