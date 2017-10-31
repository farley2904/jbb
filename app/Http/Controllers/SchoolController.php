<?php

namespace Jbb\Http\Controllers;

use Illuminate\Http\Request;
use Jbb\Repositories\ArticlesRepository;

class SchoolController extends SiteController
{
    //

     public function __construct(ArticlesRepository $a_rep) {

            parent::__construct(new \Jbb\Repositories\MenusRepository(new \Jbb\Menu), new \Jbb\Repositories\SliderRepository(new \Jbb\Slider));
            $this->a_rep = $a_rep;

            $this->template =  env('THEME').'.school ';
        
    } 
    public function index()
    {
        //
        
        $this->title = 'Обучение';
		$this->keywords = 'Обучение';
		$this->meta_desc = 'Обучение';
		
		$school = $this->getArticles();

        $content = view(env('THEME').'.school_content')->with('school',$school)->render(); 

        
        $this->vars = array_add($this->vars,'content',$content);
        
         
        return $this->renderOutput();
    }
       public function getArticles($alias = FALSE){
        $articles = $this->a_rep->get('*',TRUE);

        if($articles) {
            $articles->load('user','category','comments');//связаные модели
        }

        return $articles;
    }
}
