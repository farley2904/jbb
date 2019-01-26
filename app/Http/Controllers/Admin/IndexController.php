<?php

namespace Jbb\Http\Controllers\Admin;

use Gate;

class IndexController extends AdminController
{
    public function __construct()
    {
        parent::__construct();

        $this->middleware(function ($request, $next) {
            if (Gate::denies('VIEW_ADMIN')) {
                abort(403);
            }

            return $next($request);
        });

        $this->template = env('THEME').'.admin.index';
    }

    public function index()
    {
        // $this->title = 'Панель Администратора';
        // return $this->renderOutput();
        return redirect()->route('admin.articles.index');
    }
}
