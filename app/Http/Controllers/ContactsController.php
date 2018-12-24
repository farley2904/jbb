<?php

namespace Jbb\Http\Controllers;

use Illuminate\Http\Request;

use Corp\Http\Requests;

use Mail;

use Lang;

class ContactsController extends SiteController
{
    public function __construct() {

            parent::__construct(new \Jbb\Repositories\MenusRepository(new \Jbb\Menu), new \Jbb\Repositories\SliderRepository(new \Jbb\Slider));

            $this->template =  env('THEME').'.contacts';
        
    }

    public function index(Request $request) {

        $this->title = 'Контакты';

        if ($request->isMethod('post')) {

             $this->validate($request, [
                'name' => 'max:255',
                'email' => 'required|email',
                'phone' => 'nullable|numeric',
                'text' => 'required',
                'g-recaptcha-response' => 'required|captcha'
            ]);

             
            
            $data = $request->all();

            // dd($data);
            
            Mail::send(env('THEME').'.email', ['data' => $data], function ($messages) use ($data) {

                $mail_admin = env('MAIL_ADMIN');

                $messages->to($mail_admin, 'Jbb')->subject('Вопрос из Jbb');
                // dd($messages);
            });
    
            return redirect()->back()->with('status', Lang::get('validation.status'));
          
            
        }

    	$this->title = 'Контакты';

        $header = view(env('THEME').'.header')->render();
        $this->vars = array_add($this->vars,'header',$header); 


        $hours = view(env('THEME').'.hours')->render();
        $this->vars = array_add($this->vars,'hours',$hours); 

        $contact_form = view(env('THEME').'.contact_form')->render();
        $this->vars = array_add($this->vars,'contact_form',$contact_form);

        return $this->renderOutput();
    }
}
