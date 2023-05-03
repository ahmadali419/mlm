<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class StorePackageRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules(Request $request)
    {
        $id = $request->id;
        return [
            'title'=> 'required|unique:packages,title,'.$id,
            'duration'=> 'required',
            'min_price'=> 'required',
            'max_price'=> 'required',
            'image'=> 'required_without:id',
            'description'=> 'required',
        ];
    }
}
