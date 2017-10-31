<?php

namespace Jbb\Http\Controllers;

use Illuminate\Http\Request;

class ServicesController extends SiteController
{
    //

     public function __construct() {

            parent::__construct(new \Jbb\Repositories\MenusRepository(new \Jbb\Menu), new \Jbb\Repositories\SliderRepository(new \Jbb\Slider));

            $this->template =  env('THEME').'.services ';
        
    } 
    public function index()
    {
        //
        
        $this->title = 'Услуги и цены';
		$this->keywords = 'Услуги и цены';
		$this->meta_desc = 'Услуги и цены';
		
		$services = false;

        $content = view(env('THEME').'.services_content')->with('services',$services)->render(); 

        
        $this->vars = array_add($this->vars,'content',$content);
        
         
        return $this->renderOutput();
    }
}
