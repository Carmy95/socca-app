<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClientRequest extends FormRequest
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
            'nom' => 'required',
            'prenom' => 'required',
            'sexe' => 'required',
            'tel' => 'required|int',
            'entite' => 'required',
            // 'mobile' => 'int',
            // 'email' => 'email',
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
            'nom.required' => 'Le nom du Client est Obligatoire',
            'prenom.required' => 'Le prénom du Client est Obligatoire',
            'sexe.required' => 'Le genre du Client est Obligatoire',
            'tel.required' => 'Le numéro principale du Client est Obligatoire',
            'entite.required' => 'Le nom du Client est Obligatoire',
            'tel.int' => 'Le numéro principale du client doit être en chiffre',
            'mobile.int' => 'Le numéro secondaire du client doit être en chiffre',
            'email' => 'L\'adresse email du client doit être une adresse valide',
        ];
    }
}
