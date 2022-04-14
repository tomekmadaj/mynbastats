<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddGameToUserList extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        //sprawdzamy czy użykownik jest zalogowany
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
            'gameId' => [
                'required',
                'integer',
                //sprawdzenie czy id jest unikalne w kolumnie game_id tabeli userGames
                'unique:userGames,game_id'
            ]
        ];
    }
}
