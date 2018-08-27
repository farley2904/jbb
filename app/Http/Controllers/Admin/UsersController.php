<?php

namespace Jbb\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Jbb\Http\Controllers\Controller;
use Jbb\Repositories\UsersRepository;
use Jbb\Repositories\RolesRepository;
use Gate;

class UsersController extends AdminController
{
    protected $us_rep;
    protected $rol_rep;

    public function __construct(RolesRepository $rol_rep, UsersRepository $us_rep){

        parent::__construct();

        //проверка прав

         $this->middleware(function ($request, $next) {

            if(Gate::denies('EDIT_USERS')) {
                abort(403);
            }

            return $next($request);  
        });

        $this->us_rep = $us_rep;
        $this->rol_rep = $rol_rep;

        $this->template = env('THEME').'.admin.users';
    }

    public function index()
    {
        //
        $users = $this->us_rep->get();
        $this->content = view(env('THEME').'.admin.users_content')->with(['users'=>$users])->render();
        return $this->renderOutput();
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
