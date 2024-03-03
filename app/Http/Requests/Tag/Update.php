<?php

namespace App\Http\Requests\Tag;

use Illuminate\Foundation\Http\FormRequest;

class Update extends FormRequest
{

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
			'label' => 'required_without:tag1_id,tag2_id|prohibits:tag1_id,tag2_id|max:255',
			'tag1_id' => 'required_with:tag2_id',
			'tag2_id' => 'required_with:tag1_id',
        ];
    }

    /**
    * Get the error messages for the defined validation rules.
    *
    * @return array
    */
    public function messages()
    {
        return [

        ];
    }

}
