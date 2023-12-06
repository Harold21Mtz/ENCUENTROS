<?php

namespace App\Http\Controllers;

use App\Http\Requests\EventsRequest;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Throwable;
use \Illuminate\Support\Facades\Auth;

class SocialEventsController extends Controller
{
    public function showSocialEvents()
    {
        $events = Event::orderBy('created_at', 'DESC')->paginate(5);
        return view('program.socialEvents', ['events' => $events]);
    }

    public function index(): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        $user = Auth::user();
        $events = Event::orderBy('created_at', 'DESC')->paginate(5);

        return view('modules-admin.dashboardsocialevents', [
            'events' => $events,
            'user' => $user]);
    }

    public function show_image_hotels($id)
    {
        $hotel = Event::find($id);
        return $hotel->hotel_image;
    }

    public function status($id): \Illuminate\Http\RedirectResponse
    {
        $event = Event::find($id);
        try {
            if ($event->status == 1) {
                Event::where('id', $id)->update(['status' => 0]);
                return redirect()->back()->with('status', 'Se ha desactivado el evento social exitosamente.');
            } else {
                Event::where('id', $id)->update(['status' => 1]);
                return redirect()->back()->with('status', 'Se ha activado el evento social exitosamente.');
            }
        } catch (Throwable $e) {
            return redirect()->back()->with('error', 'Reintente más tarde');
        }
    }

    public function store(EventsRequest $request): \Illuminate\Http\RedirectResponse
    {
        try {
            $user = Auth::user();
            $event = new Event();

            $imagen = $request->file('event_image');
            if (isset($imagen)) {
                if (!file_exists('uploads/socialEvents/')) {
                    mkdir('uploads/socialEvents/', 0777, true);
                }
                $nombreImagen = $imagen->getClientOriginalName();
                $imagen->move('uploads/socialEvents/', $nombreImagen);
                $event->event_image = $nombreImagen;
            }
            $imagenone = $request->file('event_image_one');
            if (isset($imagenone)) {
                if (!file_exists('uploads/socialEvents/')) {
                    mkdir('uploads/socialEvents/', 0777, true);
                }
                $nombreImagen = $imagenone->getClientOriginalName();
                $imagenone->move('uploads/socialEvents/', $nombreImagen);
                $event->event_imagen_one = $nombreImagen;
            }
            $imagentwo = $request->file('event_imagen_two');
            if (isset($event_imagen_two)) {
                if (!file_exists('uploads/socialEvents/')) {
                    mkdir('uploads/socialEvents/', 0777, true);
                }
                $nombreImagen = $imagentwo->getClientOriginalName();
                $imagentwo->move('uploads/socialEvents/', $nombreImagen);
                $event->event_imagen_two = $nombreImagen;
            }
            $imagenthree = $request->file('event_imagen_three');
            if (isset($imagenthree)) {
                if (!file_exists('uploads/socialEvents/')) {
                    mkdir('uploads/socialEvents/', 0777, true);
                }
                $nombreImagen = $imagenthree->getClientOriginalName();
                $imagenthree->move('uploads/socialEvents/', $nombreImagen);
                $event->event_imagen_three = $nombreImagen;
            }
            $imagenfour = $request->file('event_image_four');
            if (isset($imagenfour)) {
                if (!file_exists('uploads/socialEvents/')) {
                    mkdir('uploads/socialEvents/', 0777, true);
                }

                $nombreImagen = $imagenfour->getClientOriginalName();
                $imagenfour->move('uploads/socialEvents/', $nombreImagen);
                $event->event_imagen_four = $nombreImagen;
            }
            $imagenfive = $request->file('event_imagen_five');
            if (isset($imagenfive)) {
                if (!file_exists('uploads/socialEvents/')) {
                    mkdir('uploads/socialEvents/', 0777, true);
                }

                $nombreImagen = $imagenfive->getClientOriginalName();
                $imagenfive->move('uploads/socialEvents/', $nombreImagen);
                $event->event_imagen_five = $nombreImagen;
            }
            $imagensix = $request->file('event_image_six');
            if (isset($imagensix)) {
                if (!file_exists('uploads/socialEvents/')) {
                    mkdir('uploads/socialEvents/', 0777, true);
                }

                $nombreImagen = $imagensix->getClientOriginalName();
                $imagensix->move('uploads/socialEvents/', $nombreImagen);
                $event->event_imagen_six = $nombreImagen;
            }
            $imagenseven = $request->file('event_image_seven');
            if (isset($imagenseven)) {
                if (!file_exists('uploads/socialEvents/')) {
                    mkdir('uploads/socialEvents/', 0777, true);
                }

                $nombreImagen = $imagenseven->getClientOriginalName();
                $imagenseven->move('uploads/socialEvents/', $nombreImagen);
                $event->event_imagen_seven = $nombreImagen;
            }

            $imageneight = $request->file('event_image_eight');
            if (isset($imageneight)) {
                if (!file_exists('uploads/socialEvents/')) {
                    mkdir('uploads/socialEvents/', 0777, true);
                }

                $nombreImagen = $imageneight->getClientOriginalName();
                $imageneight->move('uploads/socialEvents/', $nombreImagen);
                $event->event_imagen_eight = $nombreImagen;
            }


            $event->event_title = $request->event_title;
            $event->event_description_one = $request->event_description_one;
            $event->event_description_two = $request->event_description_two;
            $event->registerBy = $user->name;
            $event->status = 1;

            $event->save();

            return redirect()->back()->with('status', 'Evento social creado exitosamente.');
        } catch (\Exception $e) {
            Log::error($e->getMessage());

            return redirect()->back()->withInput()->withErrors(['error' => 'Ocurrió un error al crear el evento social. Por favor, reintente más tarde.']);
        }
    }

    public function update(EventsRequest $request, $id): \Illuminate\Http\RedirectResponse
    {
        try {
            $user = Auth::user();
            $event = Event::findOrFail($id);

            $imagen = $request->file('event_image');
            if (isset($imagen)) {
                if (!file_exists('uploads/socialEvents/')) {
                    mkdir('uploads/socialEvents/', 0777, true);
                }
                $nombreImagen = $imagen->getClientOriginalName();
                $imagen->move('uploads/socialEvents/', $nombreImagen);
                $event->event_image = $nombreImagen;
            }
            $imagenone = $request->file('event_image_one');
            if (isset($imagenone)) {
                if (!file_exists('uploads/socialEvents/')) {
                    mkdir('uploads/socialEvents/', 0777, true);
                }
                $nombreImagen = $imagenone->getClientOriginalName();
                $imagenone->move('uploads/socialEvents/', $nombreImagen);
                $event->event_imagen_one = $nombreImagen;
            }
            $imagentwo = $request->file('event_imagen_two');
            if (isset($event_imagen_two)) {
                if (!file_exists('uploads/socialEvents/')) {
                    mkdir('uploads/socialEvents/', 0777, true);
                }
                $nombreImagen = $imagentwo->getClientOriginalName();
                $imagentwo->move('uploads/socialEvents/', $nombreImagen);
                $event->event_imagen_two = $nombreImagen;
            }
            $imagenthree = $request->file('event_imagen_three');
            if (isset($imagenthree)) {
                if (!file_exists('uploads/socialEvents/')) {
                    mkdir('uploads/socialEvents/', 0777, true);
                }
                $nombreImagen = $imagenthree->getClientOriginalName();
                $imagenthree->move('uploads/socialEvents/', $nombreImagen);
                $event->event_imagen_three = $nombreImagen;
            }
            $imagenfour = $request->file('event_image_four');
            if (isset($imagenfour)) {
                if (!file_exists('uploads/socialEvents/')) {
                    mkdir('uploads/socialEvents/', 0777, true);
                }

                $nombreImagen = $imagenfour->getClientOriginalName();
                $imagenfour->move('uploads/socialEvents/', $nombreImagen);
                $event->event_imagen_four = $nombreImagen;
            }
            $imagenfive = $request->file('event_imagen_five');
            if (isset($imagenfive)) {
                if (!file_exists('uploads/socialEvents/')) {
                    mkdir('uploads/socialEvents/', 0777, true);
                }

                $nombreImagen = $imagenfive->getClientOriginalName();
                $imagenfive->move('uploads/socialEvents/', $nombreImagen);
                $event->event_imagen_five = $nombreImagen;
            }
            $imagensix = $request->file('event_image_six');
            if (isset($imagensix)) {
                if (!file_exists('uploads/socialEvents/')) {
                    mkdir('uploads/socialEvents/', 0777, true);
                }

                $nombreImagen = $imagensix->getClientOriginalName();
                $imagensix->move('uploads/socialEvents/', $nombreImagen);
                $event->event_imagen_six = $nombreImagen;
            }
            $imagenseven = $request->file('event_image_seven');
            if (isset($imagenseven)) {
                if (!file_exists('uploads/socialEvents/')) {
                    mkdir('uploads/socialEvents/', 0777, true);
                }

                $nombreImagen = $imagenseven->getClientOriginalName();
                $imagenseven->move('uploads/socialEvents/', $nombreImagen);
                $event->event_imagen_seven = $nombreImagen;
            }

            $imageneight = $request->file('event_image_eight');
            if (isset($imageneight)) {
                if (!file_exists('uploads/socialEvents/')) {
                    mkdir('uploads/socialEvents/', 0777, true);
                }

                $nombreImagen = $imageneight->getClientOriginalName();
                $imageneight->move('uploads/socialEvents/', $nombreImagen);
                $event->event_imagen_eight = $nombreImagen;
            }


            $event->event_title = $request->event_title;
            $event->event_description_one = $request->event_description_one;
            $event->event_description_two = $request->event_description_two;
            $event->registerBy = $user->name;
            $event->status = 1;

            $event->save();

            return redirect()->back()->with('status', 'Evento social actualizado exitosamente.');
        } catch (\Exception $e) {
            Log::error($e->getMessage());

            return redirect()->back()->withInput()->withErrors(['error' => 'Ocurrió un error al actualizar el evento social. Por favor, reintente más tarde.']);
        }
    }

    public function destroy($id)
    {
        try {
            $event = Event::findOrFail($id);
            $event->delete();
            return redirect()->back()->with('status', 'Evento social eliminado exitosamente.');
        } catch (Throwable $e) {
            return redirect()->back()->with('error', 'Reintente más tarde');
        }
    }

}
