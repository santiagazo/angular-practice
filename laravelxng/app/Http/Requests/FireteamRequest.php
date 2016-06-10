<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class FireteamRequest extends Request
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
        if($this->type == 'fireteamName'){
            $rules = [
                'title' => 'required|min:2'
            ];

        }

        if($this->type == 'fireteamMembers'){
            $rules = [
                'realtors' => 'array',
                'lenders' => 'array',
                'title_companies' => 'array',
                'buyers' => 'array',
                'sellers' => 'array',
                'other' => 'array'
            ];
        }



        return $rules;
    }
}
