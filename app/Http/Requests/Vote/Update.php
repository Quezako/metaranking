<?php

namespace App\Http\Requests\Vote;

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
			'tag_id' => 'required|exists:tag,id|numeric',
			'mood_id' => 'required|exists:mood,id|numeric',
			'user_id' => 'required|exists:users,id|numeric',
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
