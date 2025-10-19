<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class ProfileController extends Controller
{
    public function show(): View
    {
        return view('pages.profile')
            ->with([
                'user' => auth()->user(),
            ]);
    }

    public function update(ProfileRequest $request): RedirectResponse
    {
        $user = auth()->user();

        $data = $request->validated();

        if (empty($data['password'])) {
            unset($data['password']);
        }

        $user->update($data);

        return redirect()
            ->route('profile.show')
            ->with('success', __('Profile updated successfully'));
    }
}
