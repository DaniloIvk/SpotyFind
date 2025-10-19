@extends('layouts.default')

@section('page-title', $user ? __('Edit User') : __('Create User'))

<div class="container mx-auto px-4 py-8">
    <div class="max-w-2xl mx-auto">
        <div class="bg-white shadow-lg rounded-lg p-8">
            <h1 class="text-3xl font-bold text-gray-800 mb-6">
                {{ $user ? __('Edit User') : __('Create User') }}
            </h1>

            <form
                method="POST"
                action="{{ $user ? route('users.update', $user) : route('users.store') }}"
            >
                @csrf
                @if($user)
                    @method('PUT')
                @endif

                <div class="space-y-5">
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700 mb-1">
                            @lang('validation.attributes.name')
                        </label>
                        <input
                            type="text"
                            name="name"
                            id="name"
                            value="{{ old('name', $user?->name) }}"
                            class="w-full border border-gray-300 focus:ring-2 focus:ring-blue-400 rounded-md px-3 py-2 outline-none transition @error('name') border-red-500 @enderror"
                            required
                        >
                        @error('name')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700 mb-1">
                            @lang('validation.attributes.email')
                        </label>
                        <input
                            type="email"
                            name="email"
                            id="email"
                            value="{{ old('email', $user?->email) }}"
                            class="w-full border border-gray-300 focus:ring-2 focus:ring-blue-400 rounded-md px-3 py-2 outline-none transition @error('email') border-red-500 @enderror"
                            required
                        >
                        @error('email')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="password" class="block text-sm font-medium text-gray-700 mb-1">
                            @lang('validation.attributes.password')
                            @if($user)
                                <span class="text-gray-500">(@lang('leave blank to keep current'))</span>
                            @endif
                        </label>
                        <input
                            type="password"
                            name="password"
                            id="password"
                            class="w-full border border-gray-300 focus:ring-2 focus:ring-blue-400 rounded-md px-3 py-2 outline-none transition @error('password') border-red-500 @enderror"
                            {{ $user ? '' : 'required' }}
                        >
                        @error('password')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="password_confirmation" class="block text-sm font-medium text-gray-700 mb-1">
                            @lang('Confirm Password')
                        </label>
                        <input
                            type="password"
                            name="password_confirmation"
                            id="password_confirmation"
                            class="w-full border border-gray-300 focus:ring-2 focus:ring-blue-400 rounded-md px-3 py-2 outline-none transition"
                            {{ $user ? '' : 'required' }}
                        >
                    </div>

                    <div class="flex gap-3 pt-4">
                        <button
                            type="submit"
                            class="flex-1 bg-blue-500 hover:bg-blue-600 text-white font-medium py-2 rounded-md transition"
                        >
                            {{ $user ? __('Update User') : __('Create User') }}
                        </button>
                        <a
                            href="{{ route('users.index') }}"
                            class="flex-1 bg-gray-500 hover:bg-gray-600 text-white font-medium py-2 rounded-md transition text-center"
                        >
                            @lang('Cancel')
                        </a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
