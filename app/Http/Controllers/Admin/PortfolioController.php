<?php

namespace Jbb\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Jbb\Http\Controllers\Controller;
use Jbb\Repositories\PortfoliosRepository;
use Image;
use Config;

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

        $this->content = view(env('THEME').'.admin.portfolio_create_content')->render();


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
            
        // $input = $request->all();

        // $url = $request->url();
        //"https://jbb.com.ua/admin/portfolio"

        // $url = $request->fullUrl();

        // $method = $request->method();

        // $title = $request->input()





        // dd($method);
        
        if ($request->hasFile('file')) {

            $image = $request->file('file');

            // dd($image);

            if ($image->isValid()) {

                $str = str_random(8);

                $obj = new \stdClass(); //создаем пустой обьект

                $obj->path = $str.'.jpg';

                // dd($obj);

                $img = Image::make($image);

                $img->resize(150,100)->save(public_path().'/'.env('THEME').'/images/portfolio/'.'sm_'.$obj->path);
                $img->resize(400,400)->save(public_path().'/'.env('THEME').'/images/portfolio/'.'md_'.$obj->path);
                $img->resize(1000,900)->save(public_path().'/'.env('THEME').'/images/portfolio/'.'lg_'.$obj->path);
                $img->save(public_path().'/'.env('THEME').'/images/portfolio/'.$obj->path);

                return redirect()->route('admin.portfolio.index')->with(['status'=>'Изображение успешно добавлено']);

                // return redirect('admin/services')->with(['status'=>'Сервис успешно добавлен']);
            }
            else{

            }
        }

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
