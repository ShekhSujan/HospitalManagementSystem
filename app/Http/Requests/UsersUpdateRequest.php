<?php

namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;
 use Illuminate\Validation\Rule;

class UsersUpdateRequest extends FormRequest
{
  public function authorize()
  {
    return true;
  }
  public function rules()
  {
    return [
      'name'=>'required',
      'phone' => [
        'required',
        Rule::unique('users')->ignore($this->request->get('id'))
      ],
      'gender_id'=>'required',
      'age'=>'required',
    ];
  }
}
