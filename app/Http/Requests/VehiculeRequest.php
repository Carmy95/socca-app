<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VehiculeRequest extends FormRequest
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
            'proprio' => 'required',
            'type' => 'required',
            'imma' => 'required| min:6',
        ];
    }

    /**
     * Message a afficher en cas d'erreurs lors de la soumission du formulaire
     *
     * @return array
     */
    public function messages()
    {
        return [
            'imma.required' => 'L\'immatriculation du véhicule est Obligatoire',
            'imma.min' => 'L\'immatriculation du véhicule doit être composé d\'au moins :min caractères.',
            'type.required' => 'Le Type du véhicule est Obligatoire',
            'proprio.required' => 'Le Propriétaire du véhicule est Obligatoire'
        ];
    }
}
