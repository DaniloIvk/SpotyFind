<?php

namespace App\Http\Controllers;

use App\Http\Requests\ParkingPlaceRequest;
use App\Models\ParkingPlace;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class ParkingPlaceController extends Controller
{
    public function index(): View
    {
        $search = request()->string('search')->trim();

        $parkingPlaces = ParkingPlace::query()
                                     ->when($search->isNotEmpty(), function (Builder $query) use ($search) {
                                         $search = $search->wrap('%')->value();

                                         return $query->whereLike('name', $search);
                                     })
                                     ->latest()
                                     ->paginate();

        return view('pages.parking-places')
            ->with([
                'parkingPlaces' => $parkingPlaces,
            ]);
    }

    public function create(): View
    {
        return view('pages.edit-parking-place')
            ->with([
                'parkingPlace' => null,
            ]);
    }

    public function store(ParkingPlaceRequest $request): RedirectResponse
    {
        $data = $request->validated();
        $data['taken_spots'] = 0; // Default to 0 when creating

        ParkingPlace::create($data);

        return redirect()
            ->route('parking-places.index')
            ->with('success', __('Parking place created successfully'));
    }

    public function edit(ParkingPlace $parkingPlace): View
    {
        return view('pages.edit-parking-place')
            ->with([
                'parkingPlace' => $parkingPlace,
            ]);
    }

    public function update(ParkingPlaceRequest $request, ParkingPlace $parkingPlace): RedirectResponse
    {
        $parkingPlace->update($request->validated());

        return redirect()
            ->route('parking-places.index')
            ->with('success', __('Parking place updated successfully'));
    }

    public function destroy(ParkingPlace $parkingPlace): RedirectResponse
    {
        $parkingPlace->delete();

        return redirect()
            ->route('parking-places.index')
            ->with('success', __('Parking place deleted successfully'));
    }
}
