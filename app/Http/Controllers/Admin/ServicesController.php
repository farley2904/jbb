<?php

namespace Jbb\Http\Controllers\Admin;

use Gate;
use Jbb\Http\Requests\ServiceRequest;
use Jbb\Service;
use Jbb\ServiceCategory;

// use DB;

class ServicesController extends AdminController
{
    public function __construct()
    {
        parent::__construct();

        $this->middleware(function ($request, $next) {
            if (Gate::denies('VIEW_ADMIN_SERVICES')) {
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

        $services = Service::select(['id', 'price', 'service_category_id'])->orderBy('id', 'desc')->get();
        $categories = ServiceCategory::select(['id', 'name'])->get();
        $services->load('serviceCategory');
        $this->content = view(env('THEME').'.admin.services_content')->with(['services'=>$services, 'categories'=>$categories])->render();

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

        $categories = ServiceCategory::select(['id', 'name'])->get();

        $lists = [];

        foreach ($categories as $category) {
            $lists[$category->id] = $category->name;
        }

        $this->content = view(env('THEME').'.admin.services_create_content')->with('categories', $lists)->render();

        return $this->renderOutput();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(ServiceRequest $request)
    {
        $services = Service::all();

        $service = new Service();

        $service->id = $services->count() + 1;

        $service->name = $request->name;

        \App::setLocale('ua');
        $service->name = $request->name_ua;
        \App::setLocale('ru');

        $service->price = $request->price;

        $service->service_category_id = $request->service_category_id;

        if ($request->main = 'on') {
            $service->main = true;
        }

        $service->save();

        return redirect('admin/services')->with(['status'=>'Сервис успешно добавлен']);
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
        //echo $id;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Service $service)
    {
        $categories = ServiceCategory::select(['id', 'name'])->get();

        $lists = [];

        foreach ($categories as $category) {
            $lists[$category->id] = $category->name;
        }

        $this->title = 'Редактирование материала -'.$service->name;

        $this->content = view(env('THEME').'.admin.services_create_content')->with(['categories'=>$lists, 'service'=>$service])->render();

        return $this->renderOutput();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int                      $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(ServiceRequest $request, Service $service)
    {
        $service->name = $request->name;

        \App::setLocale('ua');
        $service->name = $request->name_ua;
        \App::setLocale('ru');

        $service->price = $request->price;

        $service->service_category_id = $request->service_category_id;

        if ($request->main != null) {
            $service->main = true;
        } else {
            $service->main = false;
        }

        $service->save();

        return redirect('admin/services')->with(['status'=>'Сервис успешно обновлен']);
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
        $service = Service::find($id);

        $service->delete();

        return redirect('admin/services')->with(['status' => 'Сервис успешно удален']);
    }
}
