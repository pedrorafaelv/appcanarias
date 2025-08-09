<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class AnuncioCreateAdminRequest extends FormRequest
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
        // dd($this->all());
        $user = $this->user;
        return [
            'user_id' => 'required',
            'nombre' => ['required', 'max:50' ],
            'slug' => 'nullable|unique:anuncios,slug,NULL,id,deleted_at,NULL',
            'presentacion' => 'nullable|max:3000',
            'tipo' => 'nullable|max:255',
            'orientacion' => 'required',
            'telefono' => ['required', 'min:9', 'max:9'],
            'whatsapp' => 'nullable|max:255',
            'categoria_id' => 'required',
            'clase_id' => 'nullable|exists:clases,id', 
            'provincia_id' => 'required',
            'municipio_id' => 'required',             
            'state_id' => 'nullable|exists:states,id',
            'zone_id' => 'nullable|exists:zones,id',
            'localidad' => 'nullable|max:255',   
            'plane_id' => 'required|numeric',
            'precio' => 'required',
            'fecha_nacimiento' => 'nullable|date',
            'edad' => 'required|numeric|gt:17',
            'nacionalidad' => 'nullable|max:50',
            'profesion' => 'nullable|max:50',
            'gps' => 'nullable|max:255',
            'ip_address' => 'nullable|ip',
            'port' => 'nullable|numeric',
            'estado' => 'nullable',
            'destacado' => 'nullable|numeric',
            'fecha_de_publicacion' => 'nullable|date',
            'fecha_caducidad' => 'nullable|date',
            'fecha_pausa' => 'nullable|date',
            'verificacion' => 'nullable|max:255',
            'paso'=> 'nullable|numeric',
            'portada_id' => 'nullable|numeric',
            'titulo' => 'required|max:75',
            'orientacion_otra' => 'nullable|max:255',
            'estado_pago' => 'nullable|max:50',
            'visitas'=> 'nullable|numeric',
            'video' => 'nullable|max:150',
            'tarifa' => 'nullable|max:150',
            'mostrar_telefono' => 'nullable|max:50',
            'estado_video'=> 'nullable|max:50',
            'telefono_publicacion' => 'nullable|numeric',
            'horario'=> 'nullable|max:3000',
            'treinta_minutos'=>['nullable', 'numeric', 'between:0,99999.99', 'regex:/^\d{1,5}(\.\d{1,2})?$/'],
            'cuarenta_y_cinco_minutos'=>['nullable', 'numeric', 'between:0,99999.99', 'regex:/^\d{1,5}(\.\d{1,2})?$/'], 
            'una_hora'=>['nullable', 'numeric', 'between:0,99999.99', 'regex:/^\d{1,5}(\.\d{1,2})?$/'],
            'medio_dia'=>['nullable', 'numeric', 'between:0,99999.99', 'regex:/^\d{1,5}(\.\d{1,2})?$/'],
            'todo_el_dia'=>['nullable', 'numeric', 'between:0,99999.99', 'regex:/^\d{1,5}(\.\d{1,2})?$/'],
            'fin_de_semana'=>['nullable', 'numeric', 'between:0,99999.99', 'regex:/^\d{1,5}(\.\d{1,2})?$/'],
            'hora_desplazamiento'=>['nullable', 'numeric', 'between:0,99999.99', 'regex:/^\d{1,5}(\.\d{1,2})?$/'],
            'presentacion_aux'=> 'nullable|max:2048',
            'mostrar_en_redes'=> 'nullable| max:50',
            'imagen_verificacion'=> 'nullable|max:250',
            'dobleportada_id'=> 'nullable|numeric',
        ];
    }
}
