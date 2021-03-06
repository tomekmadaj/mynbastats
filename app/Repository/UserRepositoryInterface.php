<?php

declare(strict_types=1);

namespace App\Repository;

use App\Model\User;
use Illuminate\Support\Collection;

interface UserRepositoryInterface
{
    public function updateModel(User $user, array $data): void;

    public function getUserTeamAndPlayer(User $user): User;

    public function getTeams(): Collection;

    public function getPlayers(): Collection;

    public function all(): Collection;

    public function get(int $id): User;
}
