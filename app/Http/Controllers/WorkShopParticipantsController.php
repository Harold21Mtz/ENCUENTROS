<?php

namespace App\Http\Controllers;

use App\Http\Requests\WorkShopParticipantRequest;
use App\Models\WorkShopParticipant;
use Illuminate\Http\Request;
use Throwable;
use \Illuminate\Support\Facades\Auth;

class WorkShopParticipantsController extends Controller
{
    public function showWorkShopParticipants(): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        $participants = WorkShopParticipant::orderBy('created_at', 'DESC')->paginate(15);

        return view('program.workShopParticipants', ['participants' => $participants]);
    }

    public function index(): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        $participants = WorkShopParticipant::orderBy('created_at', 'DESC')->paginate(15);

        return view('modules-admin.dashboardworkshopparticipants', ['participants' => $participants]);
    }

    public function show_image_participants($id)
    {
        $participant = WorkShopParticipant::find($id);
        return $participant->participant_profile;
    }

    public function status($id): \Illuminate\Http\RedirectResponse
    {
        $participant = WorkShopParticipant::find($id);
        try {
            if ($participant->status == 1) {
                WorkShopParticipant::where('id', $id)->update(['status' => 0]);
                return redirect()->back()->with('status', 'Se ha desactivado el participante del workshop exitosamente.');
            } else {
                WorkShopParticipant::where('id', $id)->update(['status' => 1]);
                return redirect()->back()->with('status', 'Se ha activado el participante del workshop exitosamente.');
            }
        } catch (Throwable $e) {
            return redirect()->back()->with('error', 'Reintente más tarde');
        }
    }

    public function store(WorkShopParticipantRequest $request): \Illuminate\Http\RedirectResponse
    {
        try {
            $user = Auth::user();
            $participant = new WorkShopParticipant();

            if ($request->hasFile('participant_profile')) {
                $participant->participant_profile = $request->file('participant_profile')->store('uploads', 'public');
            }

            if ($request->hasFile('participant_image_country')) {
                $participant->participant_image_country = $request->file('participant_image_country')->store('uploads', 'public');
            }

            $participant->participant_name = $request->participant_name;
            $participant->participant_title = $request->participant_title;
            $participant->participant_presentation = $request->participant_presentation;
            $participant->participant_description = $request->participant_description;
            $participant->participant_university = $request->participant_university;
            $participant->registerBy = $user->name;
            $participant->status = 1;

            $participant->save();

            return redirect()->back()->with('status', 'Participante del workshop creado exitosamente.');
        } catch (\Exception $e) {

            return redirect()->back()->withInput()->withErrors(['error' => 'Ocurrió un error al crear el participante del workshop. Por favor, reintente más tarde.']);
        }
    }

    public function update(WorkShopParticipantRequest $request, $id): \Illuminate\Http\RedirectResponse
    {
        try {
            $user = Auth::user();
            $participant = WorkShopParticipant::find($id);

            if (!$participant) {
                return redirect()->back()->with('error', 'Participante del workshop no encontrado.');
            }


            $this->handleFile($request, 'participant_profile', $participant, 'participant_profile');
            $this->handleFile($request, 'participant_image_country', $participant, 'participant_image_country');

            $participant->participant_name = $request->participant_name;
            $participant->participant_title = $request->participant_title;
            $participant->participant_presentation = $request->participant_presentation;
            $participant->participant_description = $request->participant_description;
            $participant->participant_university = $request->participant_university;
            $participant->registerBy = $user->name;

            $participant->save();

            return redirect()->back()->with('status', 'Participante del workshop actualizado exitosamente.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Ocurrió un error al actualizar el participante del workshop. Por favor, reintente más tarde.');
        }
    }

    private function handleFile($request, $fieldName, $participant, $property)
{
    if ($request->hasFile($fieldName)) {
        $participant->$property = $request->file($fieldName)->store('uploads', 'public');
    }
}

    public function destroy($id)
    {
        try {
            $participant = WorkShopParticipant::findOrFail($id);
            $participant->delete();
            return redirect()->back()->with('status', 'Participante del workshop eliminado exitosamente.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Reintente más tarde');
        }
    }
}
