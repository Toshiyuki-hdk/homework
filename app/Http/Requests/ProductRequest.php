<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            'product_name' => 'required | max:255',
            'company_id' => 'required',
            'price' => 'required | regex:/^[a-zA-Z0-9-_]+$/' ,
            'stock' => 'required | regex:/^[a-zA-Z0-9-_]+$/',
        ];
    }

    /**
 * 項目名
 *
 * @return array
 */
public function attributes()
{
    return [
        'product_name' => '商品名',
        'company_id' => 'メーカー名',
        'price' => '価格',
        'price' => '価格',
        'stock' => '在庫数',
        'stock' => '在庫数',
    ];
}

/**
 * エラーメッセージ
 *
 * @return array
 */
public function messages() {
    return [
        'product_name.required' => ':attributeは必須項目です。',
        'company_id.required' => ':attributeは必須項目です。',
        'price.required' => ':attributeは必須項目です。',
        'price.regex' => ':attributeは半角英数字のみです',
        'stock.required' => ':attributeは必須項目です。',
        'stock.regex' => ':attributeは半角英数字のみです',
    ];
}


}
