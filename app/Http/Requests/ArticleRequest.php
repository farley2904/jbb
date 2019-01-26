<?php

namespace Jbb\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArticleRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        //повне розташування фасада Auth
        return \Auth::user()->canDo('ADD_ARTICLES');
    }

    protected function getValidatorInstance()
    {
        $validator = parent::getValidatorInstance();

        //проверка валидации поля alias при условии если ф-ция вернет true
        $validator->sometimes('alias', 'unique:articles|max:255', function ($input) {

            //получаем доступ к текущему маршруту и проверяем есть ли параметр article //.. в старом варианте articles
            if ($this->route()->hasParameter('article')) {
                //получаем значение параметра articles
                $model = $this->route()->parameter('article');

                return ($model->alias !== $input->alias) && !empty($input->alias);
            }

            return !empty($input->alias);
        });

        return $validator;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            //
            'title'      => 'required|max:255',
            'text'       => 'required',
            'category_id'=> 'required|integer',
        ];
    }
}
