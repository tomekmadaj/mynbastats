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
        $user = Auth::user();

        //$user = $this->userRepository->getUserTeamAndPlayer($user);

        return view('me.profile', [
            'user' => $user
        ]);
    }

    public function edit()
    {
        $user = Auth::user();
        $userPlayerTeam = $this->userRepository->getUserPlayerTeam($user->personId);

        $teams = $this->userRepository->getTeams();
        $players = $this->userRepository->getPlayers();

        return view('me.edit', [
            'user' => $user,
            'userPlayerTeam' => $userPlayerTeam,
            'teams' => $teams,
            'players' => $players,
        ]);
    }

    public function update(UpdateUserProfile $request)
    {
        //logika zapisu
        $user = Auth::user();
        $data = $request->validated();

        if ($data['player'] == 0) {
            return redirect()
                ->route('me.edit')
                ->with('error', 'Please select your favourite player');
        }


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
