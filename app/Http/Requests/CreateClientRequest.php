<?php

namespace App\Http\Requests;

use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Http\FormRequest;

class CreateClientRequest extends FormRequest
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
            'Prenom' => 'required',
            'Nom' => 'required',
            'Pays' => 'required',
            'Ville' => 'required',
            'Adresse_Numero' => 'required|numeric|min:1',
            'Adresse' => 'required',
            'Code_Postale' => 'required|numeric|min:1',
            'Telephone' => 'required|numeric',
        ];
    }
}
