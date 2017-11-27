<?php

namespace Jbb\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Jbb\Http\Controllers\Controller;
use Jbb\Repositories\ArticlesRepository;
use Gate;
use Jbb\Category;
use Jbb\Http\Requests\ArticleRequest;

class ArticlesController extends AdminController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct(ArticlesRepository $a_rep)
    {
        parent::__construct();

        $this->middleware(function ($request, $next) {

            if(Gate::denies('VIEW_ADMIN_ARTICLES')) {
                abort(403);
            }
            
            return $next($request);  
        });

        $this->a_rep = $a_rep;

        $this->template = env('THEME').'.admin.articles';
    }

    public function index()
    {
        $this->title = 'Менеджер статтей';

        $articles = $this->getArticles();

        $this->content = view(env('THEME').'.admin.articles_content')->with('articles',$articles)->render(); 

        return $this->renderOutput();

    }

    public function getArticles($alias = FALSE){
        $articles = $this->a_rep->get('*',TRUE);

        if($articles) {
            $articles->load('user','category','comments');//связаные модели
        }

        return $articles;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(Gate::denies('save', new \Jbb\Article)) {
        	abort(403);
        }

        $this->title = 'Добавить новый материал';

        				//в майбутньому створити репозиторій
        $categories = Category::select(['title','alias','parent_id','id'])->get();

        $lists = array();

        foreach ($categories as $category) {
        	if($category->parent_id == 0) {
        		$lists[$category->title] = array();
        	} else {
        		$lists[$categories->where('id',$category->parent_id)->first()->title][$category->id] = $category->title;
        	}
        }

        // dump($lists);

        $this->content = view(env('THEME').'.admin.articles_create_content')->with('categories', $lists)->render();

        return $this->renderOutput();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ArticleRequest $request)
    {
        //dump($request);

        $result = $this->a_rep->AddArticle($request);

        if (is_array($result) && !empty($result['error'])) {
        	return back()->with($result);
        }

        return redirect('admin')->with($result);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
