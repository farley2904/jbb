<?php

namespace Jbb\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Jbb\Http\Controllers\Controller;
use Jbb\Repositories\PortfoliosRepository;
use Image;
use Config;
use Jbb\Portfolio;
use Jbb\Filter;


class PortfolioController extends AdminController
{   

     public function __construct(PortfoliosRepository $p_rep)
    {
        parent::__construct();

        $this->p_rep = $p_rep;

        $this->template = env('THEME').'.admin.portfolio';
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   


        $portfolios = $this->p_rep->get();

        $this->content = view(env('THEME').'.admin.portfolio_content')->with(['portfolios'=>$portfolios])->render();

        return $this->renderOutput();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {	

		$this->title = 'Добавить новое изображение';

		$filter = Filter::all();


        $this->content = view(env('THEME').'.admin.portfolio_create_content')->with('filter', $filter)->render();


        return $this->renderOutput();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
    	$portfolios = Portfolio::all();

        $portfolio = new Portfolio();

        $this->validate($request, [
            // 'title'      => 'required|max:255',
            'image'       => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:1024',
        ]);


        $portfolio->filter_alias = $request->filter;
        $portfolio->text = '';
        $portfolio->customer = '';

        
        if ($request->hasFile('image')) {

            $image = $request->file('image');

            if ($image->isValid()) {

                $str = str_random(8);

                $obj = new \stdClass(); //создаем пустой обьект

				$obj->path = $str.'.jpg';
				$obj->lg = 'lg_'.$str.'.jpg';
				$obj->md = 'md_'.$str.'.jpg';
				$obj->sm = 'sm_'.$str.'.jpg';

                $img = Image::make($image);

                $img->save(public_path().'/'.env('THEME').'/images/portfolios/'.$obj->path);
                $img->fit(1000)->save(public_path().'/'.env('THEME').'/images/portfolios/'.'lg_'.$obj->path);
                $img->fit(400)->save(public_path().'/'.env('THEME').'/images/portfolios/'.'md_'.$obj->path);
                $img->fit(200)->save(public_path().'/'.env('THEME').'/images/portfolios/'.'sm_'.$obj->path);

                $portfolio->img = json_encode($obj);
                $portfolio->title = $str;
                $portfolio->alias = $str;
            }

        }

        $portfolio->save();

        return redirect()->route('admin.portfolio.index')->with(['status'=>'Изображение успешно добавлено']);


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


         public function destroy($id)
        {
            $todos = todo::find($id);

            if(\File::exists(public_path('storage/images/'.$todos->image))){
            \File::delete(public_path('storage/images/'.$todos->image));
            }

            $todos->delete();
            session()->flash('message','Deleted Successful');
            return redirect('todo');
        }
     */
    public function destroy($id)
    {
        $portfolio = Portfolio::find($id);

        


        $images = json_decode($portfolio->img, true);

         foreach($images as $k => $image)
            {
                if(\File::exists(public_path().'/'.env('THEME').'/images/portfolios/'.$image)){
                    \File::delete(public_path().'/'.env('THEME').'/images/portfolios/'.$image);
                }else{
                    dd('error');
                }
            }

        $portfolio->delete();

        return redirect('admin/portfolio')->with(['status' => 'Портфолио успешно удалено']);
    }
}
