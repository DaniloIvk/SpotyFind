@extends('layouts.default')

@section('page-title', __('Users'))

<div class="container mx-auto px-4 py-8">
    <div class="mb-6 flex justify-between items-center">
        <h1 class="text-3xl font-bold text-gray-800">@lang('Users')</h1>
        <a
            href="{{ route('users.create') }}"
            class="bg-blue-500 hover:bg-blue-600 text-white font-medium px-4 py-2 rounded-md transition"
        >
            @lang('Create User')
        </a>
    </div>

    @if (session('success'))
        <div class="mb-4 p-4 bg-green-50 border border-green-200 text-green-700 rounded-md">
            {{ session('success') }}
        </div>
    @endif

    <div class="bg-white shadow-lg rounded-lg overflow-hidden">
        <div class="p-4 border-b">
            <form method="GET" action="{{ route('users.index') }}" class="flex gap-2">
                <input
                    type="text"
                    name="search"
                    value="{{ request('search') }}"
                    placeholder="@lang('Search users...')"
                    class="flex-1 border border-gray-300 focus:ring-2 focus:ring-blue-400 rounded-md px-3 py-2 outline-none"
                >
                <button
                    type="submit"
                    class="bg-gray-500 hover:bg-gray-600 text-white font-medium px-4 py-2 rounded-md transition"
                >
                    @lang('Search')
                </button>
                @if(request('search'))
                    <a
                        href="{{ route('users.index') }}"
                        class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-medium px-4 py-2 rounded-md transition"
                    >
                        @lang('Clear')
                    </a>
                @endif
            </form>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full">
                <thead class="bg-gray-50 border-b">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        @lang('validation.attributes.name')
                    </th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        @lang('validation.attributes.email')
                    </th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        @lang('Created At')
                    </th>
                    <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">
                        @lang('Actions')
                    </th>
                </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                @forelse($users as $user)
                    <tr class="hover:bg-gray-50">
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm font-medium text-gray-900">{{ $user->name }}</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-500">{{ $user->email }}</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-500">{{ $user->created_at->format('Y-m-d H:i') }}</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                            <div class="flex gap-2 justify-end">
                                <a
                                    href="{{ route('users.edit', $user) }}"
                                    class="text-blue-600 hover:text-blue-900"
                                >
                                    @lang('Edit')
                                </a>
                                <form
                                    method="POST"
                                    action="{{ route('users.destroy', $user) }}"
                                    onsubmit="return confirm('@lang('Are you sure you want to delete this user?')')"
                                    class="inline"
                                >
                                    @csrf
                                    @method('DELETE')
                                    <button
                                        type="submit"
                                        class="text-red-600 hover:text-red-900"
                                    >
                                        @lang('Delete')
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="px-6 py-8 text-center text-gray-500">
                            @lang('No users found')
                        </td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>

        <div class="p-4 border-t">
            {{ $users->links() }}
        </div>
    </div>
</div>
