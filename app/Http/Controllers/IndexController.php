<?php

namespace Jbb\Http\Controllers;

use Illuminate\Http\Request;

use Mail;

class IndexController extends SiteController
{

        public function __construct() {

            parent::__construct(new \Jbb\Repositories\MenusRepository(new \Jbb\Menu), new \Jbb\Repositories\SliderRepository(new \Jbb\Slider));


            $this->template =  env('THEME').'.index';
        
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $this->title = 'Главная';
        $header = view(env('THEME').'.header')->render();
        $this->vars = array_add($this->vars,'header',$header);

        
        $content = view(env('THEME').'.content')->render();
        $this->vars = array_add($this->vars,'content',$content);

        $contact_form = view(env('THEME').'.contact_form')->render();
        $this->vars = array_add($this->vars,'contact_form',$contact_form);

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
