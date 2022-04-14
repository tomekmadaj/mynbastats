<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Doctrine\DBAL\Schema\View;
use App\Http\Controllers\Controller;
use App\Model\User;
use Illuminate\Support\Facades\Gate;
use App\Repository\UserRepository as UserRepositoryInterface;

class UserController extends Controller
{
    private UserRepositoryInterface $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function list(Request $request)
    {
        //autentykacja użytkownika
        if (!Gate::allows('admin-level')) {
            abort(403);
        }

        // if (Gate::denies('admin-level')) {
        //     abort(403);
        // }

        //Gate::authorize zwróci 403 - to samo co z if powyżej -tylko znacznie prościej
        //Gate::authorize('admin-level');

        // $response = Gate::inspect('admin=level');
        // if ($response->denied()) {
        //     echo $response->message();
        // }

        $users = $this->userRepository->all();

        return View('user.list', ['users' => $users]);
    }

    public function show(Request $request, int $userId)
    {
        $userModel = $this->userRepository->get($userId);

        //możemy poprzez obiekt użytownika  sprawdzić autoryzację
        // $user = $request->user();
        // if (!$user->can('amin-level')) {
        //     abort(403);
        // }

        //         $user = $request->user();
        // if ($user->cannot('admin-level')) {
        //     abort(403);
        // }

        //alanlogicznie dla Policy
        // $user = $request->user();
        // if (!$user->can('view', $userModel)) {
        //     abort(403);
        // }

        //dla metody create nie porzebujemy przekazać modelu
        //oprzekazuemy w drugim argumencie model, który chcemy utworzyć
        // $user = $request->user();
        // if ($user->cannot('create', User::class)) {
        //     abort(403);
        // }

        //sam kontroller udostępnia nam możliwość sprawdzenia czy w danym miejscu mamy dostęp do danego zasobu
        // $this->authorize('admin-level');
        // $this->authorize('view', $userModel);

       // Gate::authorize('admin-level');

        //pierwszy parametr do nazwa akcji, drugi to nasz model
        //system rozpozna, któej polityki użyć do modelu User ponieważ jest ona powiązana z modelem User
        Gate::authorize('view', $userModel);

        return view('user.show', [
            'user' => $userModel
        ]);
    }
}
