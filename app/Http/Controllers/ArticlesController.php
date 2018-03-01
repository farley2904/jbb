<?php

namespace Jbb\Http\Controllers;

use Illuminate\Http\Request;
use Jbb\Repositories\ArticlesRepository;

class ArticlesController extends SiteController
{
    //
     public function __construct(ArticlesRepository $a_rep) {

            parent::__construct(new \Jbb\Repositories\MenusRepository(new \Jbb\Menu), new \Jbb\Repositories\SliderRepository(new \Jbb\Slider));

            $this->a_rep = $a_rep;

            $this->template =  env('THEME').'.articles';
        
    }

    public function index() {
        $this->title = 'Новости';

    	$articles = $this->getArticles();

        // foreach ($articles as $article) {
        //     $article->category->title;             
        // }

    	$content = view(env('THEME').'.articles_content')->with('articles',$articles)->render();

        $this->vars = array_add($this->vars,'content',$content); 

        //$this->vars = array_add($this->vars,'title',$this->title); 

        return $this->renderOutput();
    }

    public function getArticles($alias = FALSE){
    	$articles = $this->a_rep->get('*',TRUE);

    	if($articles) {
    		$articles->load('category');//связаные модели $articles->load('user','category','comments');
    	}

    	return $articles;
    }

    public function show() {
        $this->title = 'Новости';

        $articles = $this->getArticles();

        $content = view(env('THEME').'.articles_content')->with('articles',$articles)->render();

        $this->vars = array_add($this->vars,'content',$content); 

        //$this->vars = array_add($this->vars,'title',$this->title); 

        return $this->renderOutput();
    }

}
