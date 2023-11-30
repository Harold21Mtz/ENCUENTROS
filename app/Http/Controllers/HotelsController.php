<?php

namespace App\Http\Controllers;

use App\Http\Requests\HotelsRequest;
use App\Models\Hotel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Throwable;
use \Illuminate\Support\Facades\Auth;

class HotelsController extends Controller
{
    public function showHotels()
    {
        $hotels = Hotel::orderBy('created_at', 'DESC')->paginate(5);

        return view('contact.hotels', ['hotels' => $hotels]);
    }

    public function index(): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        $hotels = Hotel::orderBy('created_at', 'DESC')->paginate(5);

        return view('modules-admin.dashboardhotels', ['hotels' => $hotels]);
    }

    public function show_image_hotels($id)
    {
        $hotel = Hotel::find($id);
        return $hotel->hotel_image;
    }

    public function status($id): \Illuminate\Http\RedirectResponse
    {
        $hotel = Hotel::find($id);
        try {
            if ($hotel->status == 1) {
                Hotel::where('id', $id)->update(['status' => 0]);
                return redirect()->back()->with('status', 'Se ha desactivado el hotel exitosamente.');
            } else {
                Hotel::where('id', $id)->update(['status' => 1]);
                return redirect()->back()->with('status', 'Se ha activado el hotel exitosamente.');
            }
        } catch (Throwable $e) {
            return redirect()->back()->with('error', 'Reintente más tarde');
        }
    }

    public function store(HotelsRequest $request): \Illuminate\Http\RedirectResponse
    {
        try {
            $user = Auth::user();
            $hotel = new Hotel();

            if ($request->hasFile('hotel_image')) {
                $hotel->hotel_image = $request->file('hotel_image')->store('uploads', 'public');
            }

            if ($request->hasFile('hotel_image_secondary_one')) {
                $hotel->hotel_image_secondary_one = $request->file('hotel_image_secondary_one')->store('uploads', 'public');
            }

            if ($request->hasFile('hotel_image_secondary_two')) {
                $hotel->hotel_image_secondary_two = $request->file('hotel_image_secondary_two')->store('uploads', 'public');
            }

            if ($request->hasFile('hotel_image_secondary_three')) {
                $hotel->hotel_image_secondary_three = $request->file('hotel_image_secondary_three')->store('uploads', 'public');
            }

            $hotel->hotel_name = $request->hotel_name;
            $hotel->hotel_description = $request->hotel_description;
            $hotel->hotel_contact_number = $request->hotel_contact_number;
            $hotel->hotel_contact_email = $request->hotel_contact_email;
            $hotel->registerBy = $user->name;
            $hotel->status = 1;

            $hotel->save();

            return redirect()->back()->with('status', 'Hotel creado exitosamente.');
        } catch (\Exception $e) {
            Log::error($e->getMessage());

            return redirect()->back()->withInput()->withErrors(['error' => 'Ocurrió un error al crear el hotel. Por favor, reintente más tarde.']);
        }
    }

    public function update(HotelsRequest $request, $id): \Illuminate\Http\RedirectResponse
    {
        Log::info($request);
        try {
            $user = Auth::user();
            $hotel = Hotel::find($id);

            if (!$hotel) {
                return redirect()->back()->with('error', 'Hotel no encontrado.');
            }


            $this->handleFile($request, 'hotel_image', $hotel, 'hotel_image');
            $this->handleFile($request, 'hotel_image_secondary_one', $hotel, 'hotel_image_secondary_one');
            $this->handleFile($request, 'hotel_image_secondary_two', $hotel, 'hotel_image_secondary_two');
            $this->handleFile($request, 'hotel_image_secondary_three', $hotel, 'hotel_image_secondary_three');

            $hotel->hotel_name = $request->hotel_name;
            $hotel->hotel_description = $request->hotel_description;
            $hotel->hotel_contact_number = $request->hotel_contact_number;
            $hotel->hotel_contact_email = $request->hotel_contact_email;

            $hotel->registerBy = $user->name;

            $hotel->save();

            Log::info('Hotel actualizado:', $hotel->toArray());

            return redirect()->back()->with('status', 'Hotel actualizado exitosamente.');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return redirect()->back()->with('error', 'Ocurrió un error al actualizar el hotel. Por favor, reintente más tarde.');
        }
    }

    private function handleFile($request, $fieldName, $hotel, $property)
{
    if ($request->hasFile($fieldName)) {
        $hotel->$property = $request->file($fieldName)->store('uploads', 'public');
    }
}

    public function destroy($id)
    {
        try {
            $hotel = Hotel::findOrFail($id);
            $hotel->delete();
            return redirect()->back()->with('status', 'Hotel eliminado exitosamente.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Reintente más tarde');
        }
    }

}
