<?php

namespace App\Http\Controllers;

use App\Enums\Role;
use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class UserController extends Controller
{
    public function index(): View
    {
        $search = request()->string('search')->trim();

        $users = User::query()
                     ->where('role', Role::USER)
                     ->when($search->isNotEmpty(), function (Builder $query) use ($search) {
                         $search = $search->wrap('%')->value();

                         return $query
                             ->where(function (Builder $q) use ($search) {
                                 $q->whereLike('name', $search)
                                   ->orWhereLike('email', $search);
                             });
                     })
                     ->latest()
                     ->paginate();

        return view('pages.users')
            ->with([
                'users' => $users,
            ]);
    }

    public function create(): View
    {
        return view('pages.edit-user')
            ->with([
                'user' => null,
            ]);
    }

    public function store(UserRequest $request): RedirectResponse
    {
        $data = $request->validated();

        User::create($data);

        return redirect()
            ->route('users.index')
            ->with('success', __('User created successfully'));
    }

    public function edit(User $user): View
    {
        return view('pages.edit-user')
            ->with([
                'user' => $user,
            ]);
    }

    public function update(UserRequest $request, User $user): RedirectResponse
    {
        $data = $request->validated();

        // Only update password if provided
        if (empty($data['password'])) {
            unset($data['password']);
        }

        $user->update($data);

        return redirect()
            ->route('users.index')
            ->with('success', __('User updated successfully'));
    }

    public function destroy(User $user): RedirectResponse
    {
        $user->delete();

        return redirect()
            ->route('users.index')
            ->with('success', __('User deleted successfully'));
    }
}
