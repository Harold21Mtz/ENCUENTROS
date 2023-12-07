<?php

namespace App\Http\Controllers;

use App\Http\Requests\HotelsRequest;
use App\Models\Hotel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
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
        $user = Auth::user();
        $hotels = Hotel::orderBy('created_at', 'DESC')->paginate(1);

        return view('modules-admin.dashboardhotels', [
            'hotels' => $hotels,
            'user' => $user]);
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

            $hotel = $this->getHotel($request, $hotel, $user);

            return redirect()->back()->with('status', 'Hotel creado exitosamente.');
        } catch (\Exception $e) {
            Log::error($e->getMessage());

            return redirect()->back()->withInput()->withErrors(['error' => 'Ocurrió un error al crear el hotel. Por favor, reintente más tarde.']);
        }
    }

    public function update(HotelsRequest $request, $id): \Illuminate\Http\RedirectResponse
    {
        try {
            Log::info($request);
            $user = Auth::user();
            $hotel = Hotel::findOrFail($id);


            $hotel = $this->getHotel($request, $hotel, $user);

            return redirect()->back()->with('status', 'Hotel actualizado exitosamente.');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return redirect()->back()->with('error', 'Ocurrió un error al actualizar el hotel. Por favor, reintente más tarde.');
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

    private function uploadImage($request, $fieldName, $hotel): void
    {
        $image = $request->file($fieldName);
        if (isset($image)) {
            if (!file_exists('uploads/hotels/')) {
                mkdir('uploads/hotels/', 0777, true);
            }

            $imageName = $image->getClientOriginalName();
            $image->move('uploads/hotels/', $imageName);

            $hotel->$fieldName = $imageName;
        }
    }

    public function getHotel(HotelsRequest $request, $hotel, ?\Illuminate\Contracts\Auth\Authenticatable $user): mixed
    {
        $this->uploadImage($request, 'hotel_image', $hotel);
        $this->uploadImage($request, 'hotel_image_secondary_one', $hotel);
        $this->uploadImage($request, 'hotel_image_secondary_two', $hotel);
        $this->uploadImage($request, 'hotel_image_secondary_three', $hotel);

        $hotel->hotel_name = $request->hotel_name;
        $hotel->hotel_description = $request->hotel_description;
        $hotel->hotel_contact_number = $request->hotel_contact_number;
        $hotel->hotel_contact_email = $request->hotel_contact_email;
        $hotel->hotel_location = $request->hotel_location;
        $hotel->registerBy = $user->name;
        $hotel->status = 1;

        $hotel->save();
        return $hotel;
    }

}
