<?php

namespace App\Http\Controllers;

use App\Http\Requests\SpeakersRequest;
use App\Models\Speaker;
use Illuminate\Http\Request;
use Throwable;
use \Illuminate\Support\Facades\Auth;

class SpeakersController extends Controller
{
    public function showSpeakers()
    {
        $speakers = Speaker::orderBy('created_at', 'DESC')->paginate(15);

        return view('program.speakers', ['speakers' => $speakers]);
    }

    public function index(): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        $speakers = Speaker::orderBy('created_at', 'DESC')->paginate(15);

        return view('modules-admin.dashboardspeakers', ['speakers' => $speakers]);
    }

    public function show_image_speakers($id)
    {
        $speaker = Speaker::find($id);
        return $speaker->speaker_profile;
    }

    public function status($id): \Illuminate\Http\RedirectResponse
    {
        $speaker = Speaker::find($id);
        try {
            if ($speaker->status == 1) {
                Speaker::where('id', $id)->update(['status' => 0]);
                return redirect()->back()->with('status', 'Se ha desactivado el ponente exitosamente.');
            } else {
                Speaker::where('id', $id)->update(['status' => 1]);
                return redirect()->back()->with('status', 'Se ha activado el ponente exitosamente.');
            }
        } catch (Throwable $e) {
            return redirect()->back()->with('error', 'Reintente más tarde');
        }
    }

    public function store(SpeakersRequest $request): \Illuminate\Http\RedirectResponse
    {
        try {
            $user = Auth::user();
            $speaker = new Speaker();

            if ($request->hasFile('speaker_profile')) {
                $speaker->speaker_profile = $request->file('speaker_profile')->store('uploads', 'public');
            }

            if ($request->hasFile('speaker_image_country')) {
                $speaker->speaker_image_country = $request->file('speaker_image_country')->store('uploads', 'public');
            }

            $speaker->speaker_name = $request->speaker_name;
            $speaker->speaker_title = $request->speaker_title;
            $speaker->speaker_presentation = $request->speaker_presentation;
            $speaker->speaker_description = $request->speaker_description;
            $speaker->speaker_university = $request->speaker_university;
            $speaker->registerBy = $user->name;
            $speaker->status = 1;

            $speaker->save();

            return redirect()->back()->with('status', 'Ponente creado exitosamente.');
        } catch (\Exception $e) {

            return redirect()->back()->withInput()->withErrors(['error' => 'Ocurrió un error al crear el ponente. Por favor, reintente más tarde.']);
        }
    }

    public function update(SpeakersRequest $request, $id): \Illuminate\Http\RedirectResponse
    {
        try {
            $user = Auth::user();
            $speaker = Speaker::find($id);

            if (!$speaker) {
                return redirect()->back()->with('error', 'Ponente no encontrado.');
            }


            $this->handleFile($request, 'speaker_profile', $speaker, 'speaker_profile');
            $this->handleFile($request, 'speaker_image_country', $speaker, 'speaker_image_country');

            $speaker->speaker_name = $request->speaker_name;
            $speaker->speaker_title = $request->speaker_title;
            $speaker->speaker_presentation = $request->speaker_presentation;
            $speaker->speaker_description = $request->speaker_description;
            $speaker->speaker_university = $request->speaker_university;
            $speaker->registerBy = $user->name;

            $speaker->save();

            return redirect()->back()->with('status', 'Ponente actualizado exitosamente.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Ocurrió un error al actualizar el ponente. Por favor, reintente más tarde.');
        }
    }

    private function handleFile($request, $fieldName, $speaker, $property)
{
    if ($request->hasFile($fieldName)) {
        $speaker->$property = $request->file($fieldName)->store('uploads', 'public');
    }
}

    public function destroy($id)
    {
        try {
            $speaker = Speaker::findOrFail($id);
            $speaker->delete();
            return redirect()->back()->with('status', 'Ponente eliminado exitosamente.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Reintente más tarde');
        }
    }


}
