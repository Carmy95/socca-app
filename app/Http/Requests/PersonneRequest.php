<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PersonneRequest extends FormRequest
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

            'nom' => 'required',
            'prenom' => 'required',
            'date2naissance' => 'required',
            'tel' => 'required|int',
            'sexe' => 'required',
            'chauffeur' => 'required'
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
            'nom.required' => 'Le nom est Obligatoire',
            'prenom.required' => 'Le prenom est Obligatoire',
            'date2naissance.required' => 'La date de naissance est Obligatoire',
            'tel.required' => 'Le numero principal est Obligatoire',
            'tel.int' => 'Le numero doit est en chiffre',
            'sexe.required' => 'Le genre est Obligatoire',
            'chauffeur.required' => 'La réponse a cette question est Obligatoire',
        ];
    }
}
