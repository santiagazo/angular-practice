<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use Illuminate\Support\Facades\Input;
use Auth;

class DocumentRequest extends Request
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
        if($this->title){
            return [
                'title'       => 'required|max:255',
                'description' => 'max:800'
            ];

        }

        if($this->collection){
            return [
                'collection' => 'required|exists:documents,collection,user_id,'.Auth::id()
            ];
        }


        // if($this->id){
        //     $rules = [
        //         'id' => 'required',
        //         'file' => 'required'
        //     ];

        //     $messages = [
        //         'file.required' => 'The file upload has failed. Try refreshing the page.',
        //     ];
        // }

        return [];

    }

    public function messages()
    {
        return [
            'collection.exists' => 'You do not have permission to delete this document. This issue has been logged against your user account.'
        ];
    }
}
