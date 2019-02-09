<?php

namespace Jbb\Http\Controllers\Admin;

use Gate;
use Illuminate\Http\Request;
use Jbb\Information;

class InformationController extends AdminController
{
    public function __construct()
    {
        parent::__construct();

        $this->middleware(function ($request, $next) {
            if (Gate::denies('VIEW_ADMIN_INFORMATION')) {
                abort(403);
            }

            return $next($request);
        });

        // $this->a_rep = $a_rep;

        $this->template = env('THEME').'.admin.information';
    }

    public function index()
    {
        $this->title = 'Информация';

        $information = Information::all();

        dump($information);

        $this->content = view(env('THEME').'.admin.information_content')->with('title', $this->title)->render();

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
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    { 

        // dump($request->all());
        $data = $request->except('_token');

        if (empty($data)) {
            dump('Нет данных');
        }



        if ($request->has('logo_image')) {

            $logo_image = $request->input('logo_image');
        }

        if ($request->has('name')) {

            $name = $request->input('name');
        }

        if ($request->has('description')) {

            $description = $request->input('description');
            // dd($request->header());
            // dd($request->server());
        }

        $request->flash();

        $this->title = 'Информация';
        $this->content = view(env('THEME').'.admin.information_content')->with(['title'=>$this->title, 'path'=>''])->render();

        return $this->renderOutput();
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        echo $id;
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
