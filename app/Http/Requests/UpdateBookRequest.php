<?php

namespace App\Http\Requests;

use App\Enums\BookCategory;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Enum;

class UpdateBookRequest extends FormRequest
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
    public function rules()
    {
        return [
            'id_buku' => 'required|string',
            'nama' => 'required|string',
            'kategori' => [new Enum(BookCategory::class)],
            'harga' => 'required|integer',
            'stok' => 'required|integer',
            'penerbit' => 'required|exists:publishers,nama'
        ];
    }
}
