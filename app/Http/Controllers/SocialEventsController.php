<?php

namespace App\Http\Controllers;

use App\Http\Requests\EventsRequest;
use App\Models\Event;
use App\Models\Slide;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Throwable;
use \Illuminate\Support\Facades\Auth;

class SocialEventsController extends Controller
{
    public function showSocialEvents()
    {
        $slides = Slide::all();
        $events = Event::orderBy('created_at', 'DESC')->paginate(4);
        return view('program.socialEvents', ['events' => $events, 'slides'=>$slides]);
    }

    public function index(): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        $user = Auth::user();
        $events = Event::orderBy('created_at', 'DESC')->paginate(2);

        return view('modules-admin.dashboardsocialevents', [
            'events' => $events,
            'user' => $user]);
    }

    public function show_image_hotels($id)
    {
        $hotel = Event::find($id);
        return $hotel->hotel_image;
    }

    private function uploadImage($request, $fieldName, $event): void
    {
        $image = $request->file($fieldName);
        if (isset($image)) {
            if (!file_exists('uploads/socialEvents/')) {
                mkdir('uploads/socialEvents/', 0777, true);
            }

            $imageName = $image->getClientOriginalName();
            $image->move('uploads/socialEvents/', $imageName);

            $event->$fieldName = $imageName;
        }
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

    public function store(EventsRequest $request)
    {
        try {
            Log::info($request);
            $user = Auth::user();
            $event = new Event();

            $event = $this->getEvent($request, $event, $user);

            return redirect()->back()->with('status', 'Evento social creado exitosamente.');
        } catch (\Exception $e) {
            Log::error($e->getMessage());

            return redirect()->back()->withInput()->withErrors(['error' => 'Ocurrió un error al crear el evento social. Por favor, reintente más tarde.']);
        }
    }

    public function update(EventsRequest $request, $id)
    {
        try {
            $user = Auth::user();
            $event = Event::findOrFail($id);

            $event = $this->getEvent($request, $event, $user);

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

    /**
     * @param EventsRequest $request
     * @param $event
     * @param \Illuminate\Contracts\Auth\Authenticatable|null $user
     * @return mixed
     */
    public function getEvent(EventsRequest $request, $event, ?\Illuminate\Contracts\Auth\Authenticatable $user): mixed
    {
        $this->uploadImage($request, 'event_image', $event);
        $this->uploadImage($request, 'event_image_one', $event);
        $this->uploadImage($request, 'event_image_two', $event);
        $this->uploadImage($request, 'event_image_three', $event);
        $this->uploadImage($request, 'event_image_four', $event);
        $this->uploadImage($request, 'event_image_five', $event);
        $this->uploadImage($request, 'event_image_six', $event);
        $this->uploadImage($request, 'event_image_seven', $event);
        $this->uploadImage($request, 'event_image_eight', $event);

        $event->event_title = $request->event_title;
        $event->event_description_one = $request->event_description_one;
        $event->event_description_two = $request->event_description_two;
        $event->registerBy = $user->name;
        $event->status = 1;

        $event->save();
        return $event;
    }

}
