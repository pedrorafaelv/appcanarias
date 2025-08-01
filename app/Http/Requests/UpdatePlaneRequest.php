<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePlaneRequest extends FormRequest
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
            'nombre' => 'required|unique:planes,nombre,'. $this->plane->id .',id,deleted_at,NULL',
            'slug' => 'required|unique:planes,slug,'. $this->plane->id .',id,deleted_at,NULL',
            'dias' => 'required',
            'categoria_id' => 'required',
        ];
    }
}
