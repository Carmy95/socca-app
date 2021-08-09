<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CommandeRequest extends FormRequest
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
            'client' => 'required',
            'depart' => 'required',
            'arrive' => 'required',
            'marchandise' => 'required',
            'camion' => 'required',
            'dateLivraison' => 'required',
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
            'client.required' => 'Veillez selectionner un client svp!!',
            'depart.required' => 'Veillez renseigner un lieu de depart svp!!',
            'arrive.required' => 'Veillez renseigner un lieu d\'arrivé svp!!',
            'marchandise.required' => 'Veillez renseigner la marchandise svp!!',
            'camion.required' => 'Veillez renseigner le type de camion que vous souhaitez svp!!',
            'dateLivraison.required' => 'veillez renseigner la date de livraison souhaité du camion svp!!',
        ];
    }
}
