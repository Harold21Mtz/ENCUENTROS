<?php

namespace App\Http\Controllers;

use App\Http\Requests\ScientificCommiteeIRequest;
use App\Models\Organizing;
use App\Models\ScientificCommiteeI;
use App\Models\Slide;
use Illuminate\Http\Request;
use Throwable;
use Illuminate\Support\Facades\Auth;

class ScientificCommitteeIController extends Controller
{
    public function showScientificCommitteeI()
    {
        $slides = Slide::all();
        $scientificscommiteeI = ScientificCommiteeI::orderBy('created_at', 'DESC')->paginate(15);
        $organizings = Organizing::orderBy('created_at', 'DESC')->get();

        return view('organization.scientificCommitteeI', [
            'scientificscommiteeI' => $scientificscommiteeI,
            'organizings' => $organizings, 'slides'=>$slides
        ]);
    }

    public function index(): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        $user = Auth::user();
        $scientificscommiteeI = ScientificCommiteeI::orderBy('created_at', 'DESC')->paginate(10);
        $slides = Slide::all();

        return view('modules-admin.dashboardscientificcommiteeI', [
            'scientificscommiteeI' => $scientificscommiteeI,
            'user' => $user,
            'slides'=>$slides
        ]);
    }

    public function status($id): \Illuminate\Http\RedirectResponse
    {
        $scientificcommitee = ScientificCommiteeI::find($id);
        try {
            if ($scientificcommitee->status == 1) {
                ScientificCommiteeI::where('id', $id)->update(['status' => 0]);
                return redirect()->back()->with('status', 'Se ha desactivado el comite cientifico internacional exitosamente.');
            } else {
                ScientificCommiteeI::where('id', $id)->update(['status' => 1]);
                return redirect()->back()->with('status', 'Se ha activado el el comite cientifico internacional exitosamente.');
            }
        } catch (Throwable $e) {
            return redirect()->back()->with('error', 'Reintente más tarde');
        }
    }

    public function store(ScientificCommiteeIRequest $request): \Illuminate\Http\RedirectResponse
    {
        $user = Auth::user();
        $scientificcommitee = new ScientificCommiteeI();

        $scientificcommitee->scientific_name = $request->scientific_name;
        $scientificcommitee->scientific_title = $request->scientific_title;
        $scientificcommitee->scientific_university = $request->scientific_university;
        $scientificcommitee->scientific_description = $request->scientific_description;
        $scientificcommitee->registerBy = $user->name;
        $scientificcommitee->status = 1;

        $scientificcommitee->save();
        return redirect()->back()->with('status', 'El comite cientifico internacional fue creado exitosamente.');
    }

    public function update(ScientificCommiteeIRequest $request, $id): \Illuminate\Http\RedirectResponse
    {
        try {
            $user = Auth::user();
            $scientificcommitee = ScientificCommiteeI::find($id);

            if (!$scientificcommitee) {
                return redirect()->back()->with('error', 'Comite cientifico internacional no encontrado.');
            }

            $scientificcommitee->scientific_name = $request->scientific_name;
            $scientificcommitee->scientific_title = $request->scientific_title;
            $scientificcommitee->scientific_university = $request->scientific_university;
            $scientificcommitee->scientific_description = $request->scientific_description;
            $scientificcommitee->registerBy = $user->name;

            $scientificcommitee->save();

            return redirect()->back()->with('status', 'Comite cientifico internacional actualizado exitosamente.');
        } catch (Throwable $e) {
            return redirect()->back()->with('error', 'Ocurrió un error al actualizar el comite cientifico internacional. Por favor, reintente más tarde.');
        }
    }

    public function destroy($id)
    {
        try {
            $scientificcommitee = ScientificCommiteeI::findOrFail($id);
            $scientificcommitee->delete();
            return redirect()->back()->with('status', 'Comite cientifico internacional eliminado exitosamente.');
        } catch (Throwable $e) {
            return redirect()->back()->with('error', 'Reintente más tarde');
        }
    }
}
