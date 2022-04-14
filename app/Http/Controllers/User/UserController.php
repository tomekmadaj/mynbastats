<?php

declare(strict_types=1);

namespace App\Http\Controllers\User;

use Illuminate\Validation\Rule;
use App\Repository\UserRepository;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\UpdateUserProfile;
use Illuminate\Http\Request as HttpRequest;
use Illuminate\Support\Facades\Session;
use PHPUnit\Framework\MockObject\Rule\AnyParameters;

class UserController extends Controller
{
    private UserRepository $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function profile()
    {
        return view('me.profile', [
            'user' => Auth::user()
        ]);
    }

    public function edit()
    {
        return view('me.edit', [
            'user' => Auth::user()
        ]);
    }

    public function update(UpdateUserProfile $request)
    {
        //logika zapisu
        $user = Auth::user();
        $data = $request->validated();


        if (!empty($data['avatar'])) {
            //zapisujemy flik poprzez store('nazwa folderu', 'określamy dysk') na obiekcie UploadetFile
            $path = $data['avatar']->store('avatars', 'public');
            //zapisanie pliku określając jego nazwę poprzez saveAa() - drugi parametr to nazwa pliku
            //$path = $data['avatar']->storeAs('avatars', Auth::id() . '.jpg', 'public');
            if ($path) {
                Storage::disk('public')->delete($user->avatar);
                $data['avatar'] = $path;
            }
        } else {
            $data['avatar'] = $this->userRepository->getUserAvatar($user);
        }


        $this->userRepository->updateModel(
            Auth::user(),
            $data
        );
        
        return redirect()
            ->route('me.profile')
            ->with('success', 'Profil zaktualizowany');

            
    }

    public function updateValidationRules(HttpRequest $request)
    {
        //dd($request->all());
        //name
        //email
        //phone
        //reguły walidacji są wbudowane w laravela - dokumentacja
        $request->validate([
            'email' => 'required|unique:users|email', //unique:users - users to nazwa tabeli w którym ma szukać, 
            //kolejnym parametrem powinna być kolumna - jeżli nie ma podanej bieżę nazwę z klucza
            //email - sprawdza czy postać przesłana to rzeczywiście email
            'name' => 'required|max:2'
        ]);

        //alternatywny zapis
        // $request->validate([
        //     'email' => ['requierd', 'unique:users', 'email'],
        //     'name' => ['required', 'max:20']
        // ]);

        return redirect()
            ->route('me.profile')
            ->with('status', 'Profil zaktualizowany');
    }
}
