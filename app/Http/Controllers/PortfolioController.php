<?php

namespace Jbb\Http\Controllers;

use Jbb\Filter;
use Jbb\Repositories\PortfoliosRepository;

class PortfolioController extends SiteController
{
    public function __construct(PortfoliosRepository $p_rep)
    {
        parent::__construct(new \Jbb\Repositories\MenusRepository(new \Jbb\Menu()), new \Jbb\Repositories\SliderRepository(new \Jbb\Slider()));

        $this->p_rep = $p_rep;

        // dump($p_rep);

        $this->template = env('THEME').'.portfolios ';
    }

    public function index($filter_alias = false)
    {
        $this->title = 'Портфолио';
        $this->keywords = 'Портфолио';
        $this->meta_desc = 'Портфолио';

        // if ($filter_alias) {
        // 	echo $filter_alias;
        // }

        // echo $all= $request->all();

        // echo $filter_alias;
        $portfolios = $this->getPortfolios($filter_alias);

        $filters = Filter::all();

        // echo $url = route('portfolios');

        // echo $name = $request;

        // dump($request);

        // foreach ($filters as $key => $filter) {
        // 	dump($filter->title);
        // }

        $content = view(env('THEME').'.portfolios_content')->with(['title'     => $this->title,
                                                                   'portfolios'=> $portfolios, 'filters'=>$filters, ])->render();

        // dd($content);
        // $this->vars = array_add($this->vars,'title',$title);

        $this->vars = array_add($this->vars, 'content', $content);

        // dd($content);
        // var_dump($this->vars);

        return $this->renderOutput();
    }

    public function getPortfolios($alias = false)
    {
        $where = false;

        if ($alias) {
            // WHERE `alias` = $alias
            $filter_alias = Filter::select('alias')->where('alias', $alias)->first()->alias;
            //WHERE `category_id` = $id
            // dump($filter_alias);

            $where = ['filter_alias', $filter_alias];
        }

        $portfolios = $this->p_rep->get(['img'], false, $where);

        if ($portfolios) {
            $portfolios->load('filter');
        }
        // dump($portfolios);

        // $alias = '1';

        // echo $id = Filter::select();
        //  $filter = $portfolios->filter->alias;

        //  echo $portfolios->relation;

        //  foreach ($portfolios as $portfolio) {
        //               // echo $portfolio->filter."<br/>";
        //       $filter = $portfolio->filter;
        //           }

        // $id = 1;

        // $filter = Filter::find($id);

        //   $filters = Filter::all();

        // $filters->load('portfolios');

        // foreach ($filters as $filter) {
        //    $portfolios = $filter->portfolios;

        //    foreach ($portfolios as $portfolio) {
        //        echo $portfolio->title."<br/>";
        //    }
        // }

        // dump($filter->portfolios);

        // $portfolios = $filter->portfolios;

        return $portfolios;
    }
}
