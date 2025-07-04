<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreMasterPemasokRequest extends FormRequest
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
            //
            'nama_pemasok' => 'required|string|max:255',
            'lokasi_pemasok' => 'required|string|max:255',
            'kontak' => 'required|string|max:255',
            'produk' => 'required|string|max:255',
            'dibuat_oleh' => 'required|string|max:255',
        ];
    }
}
