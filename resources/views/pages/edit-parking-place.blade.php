@extends('layouts.default')

@section('page-title', $parkingPlace ? __('Edit Parking Place') : __('Create Parking Place'))

<div class="container mx-auto px-4 py-8">
    <div class="max-w-2xl mx-auto">
        <div class="bg-white shadow-lg rounded-lg p-8">
            <h1 class="text-3xl font-bold text-gray-800 mb-6">
                {{ $parkingPlace ? __('Edit Parking Place') : __('Create Parking Place') }}
            </h1>

            <form
                method="POST"
                action="{{ $parkingPlace ? route('parking-places.update', $parkingPlace) : route('parking-places.store') }}"
            >
                @csrf
                @if($parkingPlace)
                    @method('PUT')
                @endif

                <div class="space-y-5">
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700 mb-1">
                            @lang('Name')
                        </label>
                        <input
                            type="text"
                            name="name"
                            id="name"
                            value="{{ old('name', $parkingPlace?->name) }}"
                            class="w-full border border-gray-300 focus:ring-2 focus:ring-blue-400 rounded-md px-3 py-2 outline-none transition @error('name') border-red-500 @enderror"
                            required
                        >
                        @error('name')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="info" class="block text-sm font-medium text-gray-700 mb-1">
                            @lang('Info')
                        </label>
                        <textarea
                            name="info"
                            id="info"
                            rows="3"
                            class="w-full border border-gray-300 focus:ring-2 focus:ring-blue-400 rounded-md px-3 py-2 outline-none transition @error('info') border-red-500 @enderror"
                        >{{ old('info', $parkingPlace?->info) }}</textarea>
                        @error('info')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label for="latitude" class="block text-sm font-medium text-gray-700 mb-1">
                                @lang('Latitude')
                            </label>
                            <input
                                type="number"
                                step="0.00000001"
                                name="latitude"
                                id="latitude"
                                value="{{ old('latitude', $parkingPlace?->latitude) }}"
                                class="w-full border border-gray-300 focus:ring-2 focus:ring-blue-400 rounded-md px-3 py-2 outline-none transition @error('latitude') border-red-500 @enderror"
                                required
                            >
                            @error('latitude')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="longitude" class="block text-sm font-medium text-gray-700 mb-1">
                                @lang('Longitude')
                            </label>
                            <input
                                type="number"
                                step="0.00000001"
                                name="longitude"
                                id="longitude"
                                value="{{ old('longitude', $parkingPlace?->longitude) }}"
                                class="w-full border border-gray-300 focus:ring-2 focus:ring-blue-400 rounded-md px-3 py-2 outline-none transition @error('longitude') border-red-500 @enderror"
                                required
                            >
                            @error('longitude')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label for="total_spots" class="block text-sm font-medium text-gray-700 mb-1">
                                @lang('Total Spots')
                            </label>
                            <input
                                type="number"
                                name="total_spots"
                                id="total_spots"
                                value="{{ old('total_spots', $parkingPlace?->total_spots) }}"
                                min="1"
                                class="w-full border border-gray-300 focus:ring-2 focus:ring-blue-400 rounded-md px-3 py-2 outline-none transition @error('total_spots') border-red-500 @enderror"
                                required
                            >
                            @error('total_spots')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        @if($parkingPlace)
                            <div>
                                <label for="taken_spots" class="block text-sm font-medium text-gray-700 mb-1">
                                    @lang('Taken Spots')
                                </label>
                                <input
                                    type="number"
                                    name="taken_spots"
                                    id="taken_spots"
                                    value="{{ old('taken_spots', $parkingPlace?->taken_spots) }}"
                                    min="0"
                                    class="w-full border border-gray-300 focus:ring-2 focus:ring-blue-400 rounded-md px-3 py-2 outline-none transition @error('taken_spots') border-red-500 @enderror"
                                >
                                @error('taken_spots')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                        @endif
                    </div>

                    <div class="flex gap-3 pt-4">
                        <button
                            type="submit"
                            class="flex-1 bg-blue-500 hover:bg-blue-600 text-white font-medium py-2 rounded-md transition"
                        >
                            {{ $parkingPlace ? __('Update Parking Place') : __('Create Parking Place') }}
                        </button>
                        <a
                            href="{{ route('parking-places.index') }}"
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
