<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ChauffeurvehiculeRequest extends FormRequest
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
            'chauffeur' => 'required',
            'vehicule' => 'required',
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
            'chauffeur.required' => 'Le nom du Client est Obligatoire',
            'vehicule.required' => 'Le prénom du Client est Obligatoire',
        ];
    }
}
