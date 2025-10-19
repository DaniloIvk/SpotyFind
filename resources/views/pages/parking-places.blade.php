@extends('layouts.default')

@section('page-title', __('Parking Places'))

<div class="container mx-auto px-4 py-8">
    <div class="mb-6 flex justify-between items-center">
        <h1 class="text-3xl font-bold text-gray-800">@lang('Parking Places')</h1>
        <a
            href="{{ route('parking-places.create') }}"
            class="bg-blue-500 hover:bg-blue-600 text-white font-medium px-4 py-2 rounded-md transition"
        >
            @lang('Create Parking Place')
        </a>
    </div>

    @if (session('success'))
        <div class="mb-4 p-4 bg-green-50 border border-green-200 text-green-700 rounded-md">
            {{ session('success') }}
        </div>
    @endif

    <div class="bg-white shadow-lg rounded-lg overflow-hidden">
        <div class="p-4 border-b">
            <form method="GET" action="{{ route('parking-places.index') }}" class="flex gap-2">
                <input
                    type="text"
                    name="search"
                    value="{{ request('search') }}"
                    placeholder="@lang('Search parking places...')"
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
                        href="{{ route('parking-places.index') }}"
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
                        @lang('Name')
                    </th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        @lang('Spots')
                    </th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        @lang('Location')
                    </th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        @lang('Info')
                    </th>
                    <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">
                        @lang('Actions')
                    </th>
                </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                @forelse($parkingPlaces as $place)
                    <tr class="hover:bg-gray-50">
                        <td class="px-6 py-4">
                            <div class="text-sm font-medium text-gray-900">{{ $place->name }}</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-900">
                                <span class="font-semibold">{{ $place->taken_spots }}</span> / {{ $place->total_spots }}
                            </div>
                            <div class="w-full bg-gray-200 rounded-full h-2 mt-1">
                                <div
                                    class="bg-blue-600 h-2 rounded-full"
                                    style="width: {{ $place->total_spots > 0 ? ($place->taken_spots / $place->total_spots * 100) : 0 }}%"
                                ></div>
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-500">
                                {{ number_format($place->latitude, 6) }}, {{ number_format($place->longitude, 6) }}
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <div class="text-sm text-gray-500 max-w-xs truncate">
                                {{ $place->info ?? '-' }}
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                            <div class="flex gap-2 justify-end">
                                <a
                                    href="{{ route('parking-places.edit', $place) }}"
                                    class="text-blue-600 hover:text-blue-900"
                                >
                                    @lang('Edit')
                                </a>
                                <form
                                    method="POST"
                                    action="{{ route('parking-places.destroy', $place) }}"
                                    onsubmit="return confirm('@lang('Are you sure you want to delete this parking place?')')"
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
                        <td colspan="5" class="px-6 py-8 text-center text-gray-500">
                            @lang('No parking places found')
                        </td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>

        <div class="p-4 border-t">
            {{ $parkingPlaces->links() }}
        </div>
    </div>
</div>
