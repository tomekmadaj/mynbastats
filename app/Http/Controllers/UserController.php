<?php

declare(strict_types=1);

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use App\Repository\UserRepositoryInterface;

class UserController extends Controller
{
    private UserRepositoryInterface $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function list()
    {
        Gate::authorize('admin-level');

        $users = $this->userRepository->all();

        return View('user.list', ['users' => $users]);

        // if (!Gate::allows('admin-level')) {
        //     abort(403);
        // }

        // if (Gate::denies('admin-level')) {
        //     abort(403);
        // }

        // $response = Gate::inspect('admin=level');
        // if ($response->denied()) {
        //     echo $response->message();
        // }
    }

    public function show(int $userId)
    {
        $users = $this->userRepository->all()->toArray();
        $users = array_column($users, 'id');
        if (!in_array($userId, $users)) {
            return redirect()->back();
        }

        $userModel = $this->userRepository->get($userId);

        Gate::authorize('view', $userModel);

        return view('user.show', [
            'user' => $userModel
        ]);

        //sprawdzanie autoryzacji
        // $user = $request->user();
        // if (!$user->can('amin-level')) {
        //     abort(403);
        // }

        // $user = $request->user();
        // if ($user->cannot('admin-level')) {
        //     abort(403);
        // }

        // Policy
        // $user = $request->user();
        // if (!$user->can('view', $userModel)) {
        //     abort(403);
        // }

        //dla metody create nie porzebujemy przekazać modelu
        //przekazuemy w drugim argumencie model, który chcemy utworzyć
        // $user = $request->user();
        // if ($user->cannot('create', User::class)) {
        //     abort(403);
        // }

        //sam kontroller udostępnia nam możliwość sprawdzenia czy w danym miejscu mamy dostęp do danego zasobu
        // $this->authorize('admin-level');
        // $this->authorize('view', $userModel);
    }
}
