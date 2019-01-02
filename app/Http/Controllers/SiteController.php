<?php

namespace Jbb\Http\Controllers;

use Illuminate\Http\Request;

use Jbb\Repositories\MenusRepository;

use Jbb\Repositories\SliderRepository;

use Menu;  //фасад Menu
use App;  

use Jbb\Service;

// use Slider;

use Jbb\Langs;

class SiteController extends Controller
{
    //свойства для хранения обьектов с логикой
    protected $p_rep; 
    protected $s_rep;
    protected $a_rep;
    protected $m_rep;


    protected $keywords;
    protected $meta_desc = '';
    protected $title = '';

    protected $template;

    protected $vars = array();

    protected $bar = FALSE;

    public function __construct(MenusRepository $m_rep, SliderRepository $s_rep) {
        $this->m_rep = $m_rep;
        $this->s_rep = $s_rep;
    }

    protected function renderOutput(){

        $menu = $this->getMenu();

        $services = Service::where('main', 1)->get();

    	$navigation = view(env('THEME').'.navigation')->with(['menu'=>$menu,'services'=>$services])->render();

        $this->vars = array_add($this->vars,'navigation',$navigation);

        $logo_img = 'logo_pink.png';

        $logo = view(env('THEME').'.logo')->with('logo_img',$logo_img)->render();

        $this->vars = array_add($this->vars,'logo',$logo);


        $header = view(env('THEME').'.header')->with('logo',$logo)->render();
    	$this->vars = array_add($this->vars,'header',$header);

        $this->vars = array_add($this->vars,'keywords',$this->keywords);
        $this->vars = array_add($this->vars,'meta_desc',$this->meta_desc);
        $this->vars = array_add($this->vars,'title',$this->title);

        $sliderItem = $this->getSlider();

        $slider = view(env('THEME').'.slider')->with('slider',$sliderItem)->render();
        $this->vars = array_add($this->vars,'slider',$slider);


        $footer = view(env('THEME').'.footer')->render();
        $this->vars = array_add($this->vars,'footer',$footer);


    	return view($this->template)->with($this->vars);
    }

    public function getMenu(){

        $menu = $this->m_rep->get();
         // dump(App::getLocale());

        $mBuilder = Menu::make('MainNav',function($m) use ($menu) {

            foreach ($menu as $item) {

                $lang = \Jbb\Http\Middleware\LocaleMiddleware::getLocale();
                if ($lang) {
                    $path = $lang.'/'.$item->path;
                }else{
                    $path = $item->path;
                }

                if($item->parent == 0){
                    $m->add($item->title,$path)->id($item->id);
                }else{
                    if($m->find($item->parent)){
                        $m->find($item->parent)->add($item->title,$item->path)->id($item->id);
                    }
                }
            }

        });

        //dd($mBuilder);

        return $mBuilder;

    }

    public function getSlider() {

        $slider = $this->s_rep->get(['img']);

        return $slider;
    }

}
