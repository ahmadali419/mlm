<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class StoreBonusRequest extends FormRequest
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
            'name'=> 'required|unique:bonuses,name,'.$id,
            'amount'=> 'required',
            'service_fee'=> 'required',
            'withdraw_limit'=> 'required'
        ];
    }
}
