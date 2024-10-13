<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreHp extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'txtnama'=>'required|unique:hp,nama',
            'txtbrand'=>'required',
            'txttahun'=>'required|numeric',
            'txtharga'=>'required|numeric',
        ];
    }
    public function messages():array
    {
        return[
            'txtnama.unique'=>':attribute Data Sudah Ada',
            'txtnama.required'=>':attribute Tidak Boleh Kosong',
            'txtbrand.required'=>':attribute Tidak Boleh Kosong',
            'txttahun.required'=>':attribute Tidak Boleh Kosong',
            'txtharga.required'=>':attribute Tidak Boleh Kosong'
        ];
    }

    public function attributes():array
    {
        return[
            'txtnama'=>'Nama',
            'txtbrand'=>'Brand',
            'txtharga'=>'Harga',
            'txttahun'=>'Tahun',
            
        ];
    }
}
