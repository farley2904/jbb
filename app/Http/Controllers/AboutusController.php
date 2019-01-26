<?php

namespace Jbb\Http\Controllers;

class AboutusController extends SiteController
{
    public function __construct()
    {
        parent::__construct(new \Jbb\Repositories\MenusRepository(new \Jbb\Menu()), new \Jbb\Repositories\SliderRepository(new \Jbb\Slider()));

        $this->template = env('THEME').'.about_us';
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //  $header = view(env('THEME').'.header')->render();
        // $this->vars = array_add($this->vars,'header',$header);
        $this->title = 'O нас';

        $testimonials = view(env('THEME').'.testimonials')->render();

        $content = view(env('THEME').'.about_us_content')->with('testimonials', $testimonials)->render();

        $this->vars = array_add($this->vars, 'content', $content);

        return $this->renderOutput();
    }
}
