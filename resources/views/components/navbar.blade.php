@php($currentLocale = app()->currentLocale())

<div
    class="fixed left-0 right-0 top-0 w-screen px-6 py-3 h-16 flex justify-between items-stretch gap-4 shadow-lg bg-white"
>
    <div class="flex flex-row justify-evenly items-stretch gap-8">
        <a href="{{ route('welcome') }}" referrerpolicy="same-origin">
            <h1 class="text-2xl font-semibold my-auto">
                {{ config('app.name') }}
            </h1>
        </a>

        @auth
            <div class="hidden md:flex space-x-4">
                <a
                    href="{{ route('parking-places.index') }}"
                    class="text-gray-700 hover:text-blue-600 px-3 py-2 rounded-md text-sm font-medium transition"
                >
                    @lang('Parking Places')
                </a>
                @if(auth()->user()->role === \App\Enums\Role::ADMIN)
                    <a
                        href="{{ route('users.index') }}"
                        class="text-gray-700 hover:text-blue-600 px-3 py-2 rounded-md text-sm font-medium transition"
                    >
                        @lang('Users')
                    </a>
                @endif
            </div>
        @endauth
    </div>

    <div class="flex flex-row justify-evenly items-center gap-3">
        <div class="relative group cursor-pointer select-none my-auto">
            <span class="w-full h-full font-medium uppercase">{{ $currentLocale }}</span>

            <div class="absolute top-0 left-1/2 -translate-x-1/2 mt-[100%] w-full h-full box-content px-2 py-1">
                <div
                    class="absolute top-2 left-1/2 -translate-x-1/2 bg-white border border-gray-200 rounded-lg shadow-lg flex flex-col gap-1 opacity-0 pointer-events-none group-hover:opacity-100 group-hover:pointer-events-auto transition"
                >
                    @foreach(config('app.available_locales') as $locale)
                        @continue($locale === $currentLocale)

                        <a href="{{ route('locale.switch', $locale) }}"
                           class="hover:bg-slate-50 hover:text-slate-600 uppercase px-2 py-1">
                            {{ $locale }}
                        </a>
                    @endforeach
                </div>
            </div>
        </div>

        @auth
            <a
                href="{{ route('profile.show') }}"
                class="text-gray-700 hover:text-blue-600 px-3 py-2 rounded-md text-sm font-medium transition"
            >
                {{ auth()->user()->name }}
            </a>
            <form method="POST" action="{{ route('logout') }}" class="inline">
                @csrf
                <button
                    type="submit"
                    class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-md text-sm font-medium transition"
                >
                    @lang('Logout')
                </button>
            </form>
        @else
            <a
                href="{{ route('login') }}"
                class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-md text-sm font-medium transition"
            >
                @lang('Login')
            </a>
        @endauth
    </div>
</div>
