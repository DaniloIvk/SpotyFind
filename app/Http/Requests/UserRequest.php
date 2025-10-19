<?php

namespace App\Http\Requests;

use App\Enums\Role;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Validation\Rule;

class UserRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array|string>
     */
    public function rules(): array
    {
        $currentUser = auth()->user();
        $user = $this->route('user');

        return [
            'role' => [
                'sometimes',
                'integer',
                Rule::excludeIf($currentUser->role !== Role::ADMIN),
                Rule::enum(Role::class),
            ],
            'name' => [
                'required',
                'string',
                'min:2',
                'max:255',
            ],
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique('users', 'email')->ignore($user),
            ],
            'password' => [
                'nullable',
                Rule::requiredIf(! $user),
                'confirmed',
                'string',
                'min:8',
                'max:255',
            ],
        ];
    }
}
