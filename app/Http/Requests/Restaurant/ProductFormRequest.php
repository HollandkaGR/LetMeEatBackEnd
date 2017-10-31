<?php

namespace App\Http\Requests\Restaurant;

use App\Http\Requests\FormRequest;
use Illuminate\Http\Request;

class ProductFormRequest extends FormRequest
{

  public function authorize()
  {
    return true;
  }

  public function rules(Request $request)
  {
    return [
      'name'            => 'required|min:2|max:255|unique:products,name,'. $request->prodId . ',id,category_id,' . $request->catId,
      'description'    => 'nullable',
      'price'             => 'required|numeric',
      'catId'             => 'required|exists:categories,id',
    ];
  }

  public function messages()
  {
    return [
      'name.required'   => 'A név megadása kötelező!',
      'name.min'        => 'A névnek minimum 2 karakter hosszúnak kell lennie!',
      'name.unique'     => 'Van már ilyen nevű termék a kategóriában',
      'price.required'  => 'Ingyen adjuk?',
      'price.numeric'   => 'Az árnak számnak kell lennie!',
      'catId.required'  => 'A kategória azonosítója hiányzik!',
      'catId.exists'    => 'Hibás kategória!',
    ];
  }
}
