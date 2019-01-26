<?php

namespace Jbb\Http\Controllers;

use Jbb\Repositories\ArticlesRepository;

class SchoolController extends SiteController
{
    //

    public function __construct(ArticlesRepository $a_rep)
    {
        parent::__construct(new \Jbb\Repositories\MenusRepository(new \Jbb\Menu()), new \Jbb\Repositories\SliderRepository(new \Jbb\Slider()));

        $this->a_rep = $a_rep;

        $this->template = env('THEME').'.school';
    }

    public function index()
    {
        //

        $this->title = 'Обучение';
        $this->keywords = 'Обучение';
        $this->meta_desc = 'Обучение';

        $school = $this->getArticles();

        $content = view(env('THEME').'.school_content')->with('school', $school)->render();

        $this->vars = array_add($this->vars, 'content', $content);

        return $this->renderOutput();
    }

    public function getArticles($alias = false)
    {
        $where = ['category_id', '4'];

        $articles = $this->a_rep->get('*', true, $where);

        if ($articles) {
            $articles->load('user', 'category', 'comments'); //связаные модели
        }

        return $articles;
    }

    public function show($alias = false)
    {

        // $this->title = $alias;

        $article = $this->a_rep->one($alias);

        // dd($school);

        $content = view(env('THEME').'.article_content')->with('article', $article)->render();

        $this->vars = array_add($this->vars, 'content', $content);

        //$this->vars = array_add($this->vars,'title',$this->title);

        return $this->renderOutput();
    }
}
