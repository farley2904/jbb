<?php

namespace Jbb\Http\Controllers;

use Illuminate\Http\Request;

use Mail;

use Jbb\Service;

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

        $services = Service::where('main', 1)->get();
        
        $content = view(env('THEME').'.content')->with('services',$services)->render();
        $this->vars = array_add($this->vars,'content',$content);

        $contact_form = view(env('THEME').'.contact_form')->render();
        $this->vars = array_add($this->vars,'contact_form',$contact_form);

        return $this->renderOutput();
    }

}
