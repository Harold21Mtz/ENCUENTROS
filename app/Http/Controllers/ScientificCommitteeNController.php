<?php

namespace App\Http\Controllers;

use App\Http\Requests\ScientificCommiteeNRequest;
use App\Models\Organizing;
use App\Models\ScientificCommiteeN;
use Illuminate\Http\Request;
use Throwable;
use Illuminate\Support\Facades\Auth;

class ScientificCommitteeNController extends Controller
{
    public function showScientificCommitteeN()
    {
        $scientificscommiteeN = ScientificCommiteeN::orderBy('created_at', 'DESC')->paginate(15);
        $organizings = Organizing::orderBy('created_at', 'DESC')->get();

        return view('organization.scientificCommitteeN', [
            'scientificscommiteeN' => $scientificscommiteeN,
            'organizings' => $organizings
        ]);
    }

    public function index(): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        $user = Auth::user();
        $scientificscommiteeN = ScientificCommiteeN::orderBy('created_at', 'DESC')->paginate(10);

        return view('modules-admin.dashboardscientificcommiteeN', [
            'scientificscommiteeN' => $scientificscommiteeN,
            'user' => $user,
        ]);
    }

    public function status($id): \Illuminate\Http\RedirectResponse
    {
        $scientificcommitee = ScientificCommiteeN::find($id);
        try {
            if ($scientificcommitee->status == 1) {
                ScientificCommiteeN::where('id', $id)->update(['status' => 0]);
                return redirect()->back()->with('status', 'Se ha desactivado el comite cientifico nacional exitosamente.');
            } else {
                ScientificCommiteeN::where('id', $id)->update(['status' => 1]);
                return redirect()->back()->with('status', 'Se ha activado el el comite cientifico nacional exitosamente.');
            }
        } catch (Throwable $e) {
            return redirect()->back()->with('error', 'Reintente más tarde');
        }
    }

    public function store(ScientificCommiteeNRequest $request): \Illuminate\Http\RedirectResponse
    {
        $user = Auth::user();
        $scientificcommitee = new ScientificCommiteeN();

        $scientificcommitee->scientific_name = $request->scientific_name;
        $scientificcommitee->scientific_title = $request->scientific_title;
        $scientificcommitee->scientific_university = $request->scientific_university;
        $scientificcommitee->scientific_description = $request->scientific_description;
        $scientificcommitee->registerBy = $user->name;
        $scientificcommitee->status = 1;

        $scientificcommitee->save();
        return redirect()->back()->with('status', 'El comite cientifico nacional fue creado exitosamente.');
    }

    public function update(ScientificCommiteeNRequest $request, $id): \Illuminate\Http\RedirectResponse
    {
        try {
            $user = Auth::user();
            $scientificcommitee = ScientificCommiteeN::find($id);

            if (!$scientificcommitee) {
                return redirect()->back()->with('error', 'Comite cientifico nacional no encontrado.');
            }

            $scientificcommitee->scientific_name = $request->scientific_name;
            $scientificcommitee->scientific_title = $request->scientific_title;
            $scientificcommitee->scientific_university = $request->scientific_university;
            $scientificcommitee->scientific_description = $request->scientific_description;
            $scientificcommitee->registerBy = $user->name;

            $scientificcommitee->save();

            return redirect()->back()->with('status', 'Comite cientifico nacional actualizado exitosamente.');
        } catch (Throwable $e) {
            return redirect()->back()->with('error', 'Ocurrió un error al actualizar el comite cientifico nacional. Por favor, reintente más tarde.');
        }
    }

    public function destroy($id)
    {
        try {
            $scientificcommitee = ScientificCommiteeN::findOrFail($id);
            $scientificcommitee->delete();
            return redirect()->back()->with('status', 'Comite cientifico nacional eliminado exitosamente.');
        } catch (Throwable $e) {
            return redirect()->back()->with('error', 'Reintente más tarde');
        }
    }
}
