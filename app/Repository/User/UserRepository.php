<?php

declare(strict_types=1);

namespace App\Repository\User;

use App\Model\Team;
use App\Model\User;
use App\Model\Player;
use App\Repository\UserRepository as UserRepositoryInterface;
use Illuminate\Support\Collection;

class UserRepository implements UserRepositoryInterface
{
    private User $userModel;
    private Team $teamModel;
    private Player $playerModel;

    public function __construct(User $userModel, Team $teamModel, Player $playerModel)
    {
        $this->userModel = $userModel;
        $this->teamModel = $teamModel;
        $this->playerModel = $playerModel;
    }

    public function updateModel(User $user, array $data): void
    {
        // dd($data['player']);
        $user->email = $data['email'] ?? $user->email;
        $user->name = $data['name'] ?? $user->name;
        // $user->phone = $data['phone'] ?? $user->phone;
        $user->avatar = $data['avatar'] ?? null;
        $user->teamId = $data['team'] ?? null;
        $user->personId = $data['player'] ?? null;

        $user->save();
    }

    public function getUserAvatar(User $user)
    {
        return $user->avatar;
    }

    public function getUserTeamAndPlayer(User $user)
    {
        //$user->load('teams');
        // $user->load('players');

        return $user;
    }

    public function getTeams(): Collection
    {
        return $this->teamModel->currentTeams()->get();
    }

    public function getPlayers(): Collection
    {
        return $this->playerModel->activePlayers()->get();
    }

    public function getUserPlayerTeam($personId)
    {
        return $this->playerModel->select('teamId')->find($personId);
    }

    public function all(): Collection
    {
        return $this->userModel->with('teams')->with('players')->get();
    }

    public function get(int $id): User
    {
        return $this->userModel->find($id);
    }
}
