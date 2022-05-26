<?php

declare(strict_types=1);

namespace App\Http\Controllers\User;

use App\Repository\UserRepositoryInterface;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\UpdateUserProfile;
use Illuminate\Http\Request as HttpRequest;

class UserController extends Controller
{
    private UserRepositoryInterface $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function profile()
    {
        $user = Auth::user();
        $userData = $this->userRepository->getUserTeamAndPlayer($user);

        return view('me.profile', [
            'user' => $userData
        ]);
    }

    public function edit()
    {
        $user = Auth::user();
        $userData = $this->userRepository->getUserTeamAndPlayer($user);

        $teamsData = $this->userRepository->getTeams();
        $playersData = $this->userRepository->getPlayers();

        return view('me.edit', [
            'user' => $userData,
            'teams' => $teamsData,
            'players' => $playersData,
        ]);
    }

    public function update(UpdateUserProfile $request)
    {
        $user = Auth::user();
        $data = $request->validated();

        if ($data['player'] == 0) {
            return redirect()
                ->route('me.edit')
                ->with('error', 'Please select your favourite player');
        } elseif ($data['team'] == 0) {
            return redirect()
                ->route('me.edit')
                ->with('error', 'Please select your favourite team');
        }

        if (!empty($data['avatar'])) {
            //zapisujemy plik poprzez store('nazwa folderu', 'określamy dysk') na obiekcie UploadetFile
            $path = $data['avatar']->store('avatars', 'public');
            //zapisanie pliku określając jego nazwę poprzez store() - drugi parametr to nazwa pliku
            //$path = $data['avatar']->storeAs('avatars', Auth::id() . '.jpg', 'public');
            if ($path) {
                Storage::disk('public')->delete($user->avatar);
                $data['avatar'] = $path;
            }
        } else {
            $data['avatar'] = $user->avatar;
        }

        $this->userRepository->updateModel(
            Auth::user(),
            $data
        );

        return redirect()
            ->route('me.profile')
            ->with('success', 'Profil zaktualizowany');
    }
}
