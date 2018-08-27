<?php

namespace Jbb\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Jbb\Http\Controllers\Controller;
use Gate;
use Jbb\Service;
use Jbb\ServiceCategory;
// use DB;

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
                

        $services = Service::select(['id','name','price','service_category_id'])->orderBy('id','desc')->get();
        $categories = ServiceCategory::select(['id','name'])->get();
        $services->load('serviceCategory');

        // $categories = DB::table('service_categories')->select('id','name')->get();

         // $services->serviceCategory; 

        // foreach ( $categories as $key => $category) {
        // 	echo 'категория -'.$category->name.'<br>';
        //     $services = $category->services;
        //     foreach ($services as $key => $service) {
        //         echo $service->name.'<br>';
        //     }
        	
        // }

        
        // 	 // $s;
        
        // // $service = Service::find(1);
        // $cat = ServiceCategory::find(1);

        // dump($cat->services);


        $this->content = view(env('THEME').'.admin.services_content')->with(['services'=>$services,'categories'=>$categories])->render();
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
        //   if(Gate::denies('save', new Article)) {
        //     abort(403);
        // }
		
        $this->title = 'Добавить новый сервис';

        $categories = ServiceCategory::select(['id','name'])->get();

        $lists = array();

        foreach ($categories as $category) {
                $lists[$category->id] = $category->name;
        }


        // dump($lists);
        $this->content = view(env('THEME').'.admin.services_create_content')->with('categories',$lists)->render();
        return $this->renderOutput();

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
	  // dd($request);

	  // 	if (is_array($result) && !empty($result['error'])) {
   //         	return back()->with($result);
   //      }
    	$services = Service::all();


    	$service = new Service;


    	$service->id = $services->count()+1;
    	
        $service->name = $request->name;
        $service->price = $request->price;
        $service->service_category_id = $request->service_category;
        if ($request->main = 'on') {
            $service->main = true;
        }

        $service->save();

        return redirect('admin/services');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       //echo $id;
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
        $service = Service::find($id);

		$service->delete();

		return redirect('admin/services');


    }
}
