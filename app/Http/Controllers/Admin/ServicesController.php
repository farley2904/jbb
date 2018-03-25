<?php

namespace Jbb\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Jbb\Http\Controllers\Controller;
use Gate;
use Jbb\Category;

class ServicesController extends AdminController
{	

	public function __construct()
    {
    	parent::__construct();

        $this->middleware(function ($request, $next) {

            if(Gate::denies('VIEW_ADMIN_SERVICES')) {
                abort(403);
            }

            return $next($request);  
        });

    	$this->template = env('THEME').'.admin.services';
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    	
        $this->title = 'Услуги и цены';
                $categories = Category::select(['title','alias','parent_id','id'])->get();

        $lists = array();

        foreach ($categories as $category) {
        	if($category->parent_id == 2) {        	
        	   $lists[] = $category->title .'- <a href = "https://jbb.com.ua/admin/services/'.$category->alias.'">+</a></br>';  
            }

            // if($category->articles->isNotEmpty()){  
	           //  foreach($category->articles as $articles){
	           //  	$lists[] = $articles->title;
	           //  }
            // }
    
        }

        // \Debugbar::info($categories);

        //dump($lists);

        $this->content = view(env('THEME').'.admin.services_content')->with('categories', $lists)->render();
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
        echo $id;
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
