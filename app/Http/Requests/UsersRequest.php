<?php

namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;
class UsersRequest extends FormRequest
{
  public function authorize()
  {
    return true;
  }
  public function rules()
  {
    return [
      'name'=>'required',
      'phone'=>'required|unique:users',
      'gender_id'=>'required',
      'age'=>'required',
    ];
  }
}
