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
        return view('contact.hotels');
    }

    public function index(): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('modules-admin.dashboardhotels', [
            'hotels' => Hotel::orderBy('created_at', 'DESC')->get(),
        ]);
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
                Hotel::where('hotel_id', $id)->update(['status' => 0]);
                return redirect()->back()->with('status', 'Se ha desactivado el hotel exitosamente.');
            } else {
                Hotel::where('hotel_id', $id)->update(['status' => 1]);
                return redirect()->back()->with('status', 'Se ha activado el hotel exitosamente.');
            }
        } catch (Throwable $e) {
            return redirect()->back()->with('error', 'Reintente más tarde');
        }
    }

    public function store(HotelsRequest $request): \Illuminate\Http\RedirectResponse
    {
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
        $hotel->registerBy = $user->name; // Usar el ID del usuario autenticado
        $hotel->status = 1;

        $hotel->save();
        Log::info($hotel);
        return redirect()->back()->with('status', 'Hotel creado exitosamente.');
    }

    public function edit($id)
    {
        if ($id == 'clear') {
            session()->forget('id_to_update');
            return redirect()->back()->with('clear', 1);
        }
        session(['id_to_update' => $id]);
        return redirect()->back()->with('data', Hotel::find($id));
    }

    public function update(HotelsRequest $request, $id): \Illuminate\Http\RedirectResponse
    {
        $user = Auth::user();
        $hotel = Hotel::find($id);

        if (!$hotel) {
            return redirect()->back()->with('error', 'Hotel no encontrado.');
        }

        // Verifica si se han enviado nuevos archivos de imágenes y actualízalos si es necesario
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

        // Actualiza las propiedades del hotel
        $hotel->hotel_name = $request->hotel_name;
        $hotel->hotel_description = $request->hotel_description;
        $hotel->hotel_contact_number = $request->hotel_contact_number;
        $hotel->hotel_contact_email = $request->hotel_contact_email;

        // Actualiza el usuario registrado por (si es necesario)
        $hotel->registerBy = $user->name; // Puedes ajustar esto según tus necesidades

        // Guarda el hotel actualizado en la base de datos
        $hotel->save();

        Log::info($hotel);

        return redirect()->back()->with('status', 'Hotel actualizado exitosamente.');
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
