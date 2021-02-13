<?php

namespace Jbb\Http\Controllers;

use Jbb\ServiceCategory;

class ServicesController extends SiteController
{
    //

    public function __construct()
    {
        parent::__construct(new \Jbb\Repositories\MenusRepository(new \Jbb\Menu()), new \Jbb\Repositories\SliderRepository(new \Jbb\Slider()));

        $this->template = env('THEME').'.services ';
    }

    public function index()
    {
        //

        $this->title = 'Услуги и цены';
        $this->keywords = 'Услуги и цены';
        $this->meta_desc = 'Услуги и цены';

        $title = $this->title;

        $services = false;

        $services_cat = ServiceCategory::select(['id', 'name'])->get();
        $services_cat->load('services');

        // foreach ($categories as $key => $category) {
        //     echo $category->name.'<br>';
        //     $services = $category->services;
        //     foreach ($services as $key => $service) {
        //         echo $service->name.'<br>';
        //     };
        // }

        $content = view(env('THEME').'.services_content')->with(['title' => $title, 'services_cat' => $services_cat])->render();

        $this->vars = array_add($this->vars, 'content', $content);

        return $this->renderOutput();
    }
}
