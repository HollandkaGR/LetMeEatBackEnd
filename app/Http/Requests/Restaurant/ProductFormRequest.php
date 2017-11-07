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
      'name'              => 'required|min:2|max:255|unique:products,name,'. $request->id . ',id,category_id,' . $request->catId,
      'description'       => 'nullable',
      'price'             => 'required|numeric',
      'catId'             => 'required|exists:categories,id',
      'inAction'          => 'required',
      'salePercent'       => 'required_if:inAction,true|numeric|min:0|max:99'
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
      'salePercent.required_if' => 'Ha akciós a termék, legyen mértéke is!',
      'salePercent.numeric' => 'Az akció mértéke csak százalékban megadható!',
      'salePercent.max' => 'Maximum 99%-os kedvezmény adható!',
    ];
  }
}
