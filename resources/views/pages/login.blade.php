@extends('layouts.default')

@section('page-title', __('login'))

@section('scripts')
    @vite(['resources/js/login.js'])
@endsection

<main
    class="w-full h-full flex flex-col justify-center items-center gap-4 bg-slate-50 bg-[url({{ asset('assets/images/background.jpg') }})]"
>
    <form
        id="loginForm"
        method="POST"
        action="{{ route('login.submit') }}"
        class="w-full max-w-sm bg-white shadow-lg rounded-xl p-8"
        novalidate
    >
        <h1 class="text-2xl font-semibold text-gray-800 mb-6 text-center">
            @lang('login')
        </h1>

        <div class="space-y-5">
            @csrf

            <div>
                <label for="email" class="block text-sm text-gray-700 mb-1">
                    @lang('validation.attributes.email')
                </label>
                <input
                    type="email"
                    name="email"
                    id="email"
                    value="{{ old('email') }}"
                    autocomplete="email"
                    class="w-full border border-gray-300 focus:ring-2 focus:ring-blue-400 rounded-md px-3 py-2 outline-none transition"
                    required
                    autofocus
                >
            </div>

            <div>
                <label for="password" class="block text-sm text-gray-700 mb-1">
                    @lang('validation.attributes.password')
                </label>
                <input
                    type="password"
                    name="password"
                    id="password"
                    autocomplete="current-password"
                    class="w-full border border-gray-300 focus:ring-2 focus:ring-blue-400 rounded-md px-3 py-2 outline-none transition"
                    required
                >
            </div>

            <div class="flex items-center">
                <input
                    type="checkbox"
                    name="remember"
                    id="remember"
                    class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded"
                >
                <label for="remember" class="ml-2 block text-sm text-gray-700">
                    @lang('Remember me')
                </label>
            </div>

            @if ($errors->any())
                <div class="mb-4 text-sm text-red-600 bg-red-50 border border-red-200 rounded-md p-3">
                    <ul class="list-disc list-inside">
                        @foreach ($errors->all() as $error)
                            <li class="mt-2 first:mt-0">{{ __($error) }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <button
                type="submit"
                class="w-full bg-blue-500 hover:bg-blue-600 text-white font-medium py-2 rounded-md transition"
            >
                @lang('login')
            </button>
        </div>
    </form>
</main>
