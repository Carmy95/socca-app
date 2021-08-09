<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FonctionRequest extends FormRequest
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
     * les regles de validations a appliquée sur table fonction
     *
     * @return array
     */
    public function rules()
    {
        return [
            'libelle' => 'required|min:5',
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
            'required' => 'L\'intitulé du poste de travail est Obligatoire',
            'min' => 'L\'intitulé du poste de travail doit être composé d\'au moins :min caractères.',
        ];
    }
}
