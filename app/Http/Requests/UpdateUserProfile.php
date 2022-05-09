<?php

namespace App\Http\Requests;

use App\Rules\AlphaSpaces;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class UpdateUserProfile extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        //  domyślnie return false;
        //zalogowany użytkonik mam prawo do edycji własnych danych
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $userId = Auth::id();
        return [
            'email' => [
                'required',
                //'unique:users',
                Rule::unique('users')->ignore($userId),
                'email'
            ],
            //unique:users - users to nazwa tabeli w którym ma szukać, 
            //kolejnym parametrem powinna być kolumna - jeżli nie ma podanej bieżę nazwę z klucza
            //email - sprawdza czy postać przesłana to rzeczywiście email
            'name' => [
                'required',
                'max:50',
                new AlphaSpaces()
            ],
            // 'phone' => [
            //     'min:6'
            // ],
            //przykłąd z minimalną wysokością i szerokością
            //'avatar' => 'dimensions:min_width=100,min_height=200,max_width=100,max_height=200'
            //reguła na ratio 3/2
            //'avatar' => 'nullable|file|image|dimensions:ratio=3/2',
            //podstawowa reguła na image - oczekujemy pliku - obrazku (conent type -roszerzenie)
            'avatar' => 'nullable|file|image',
        ];
    }

    public function messages()
    {
        return [
            //email - nazwa pola, unique - nazwa reguły
            'email.unique' => 'Podany adres email jest zajęty',
            'name.max' => 'Maksymalna ilość znaków to :max'
        ];
    }
}
