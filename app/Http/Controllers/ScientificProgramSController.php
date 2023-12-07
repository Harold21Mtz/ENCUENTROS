<?php

namespace App\Http\Controllers;

use App\Http\Requests\ScientificProgramSRequest;
use App\Models\ScientificProgramS;
use Illuminate\Http\Request;
use Throwable;
use Illuminate\Support\Facades\Auth;

class ScientificProgramSController extends Controller
{
    public function showScientificProgramS()
    {
        $scientificprogramsS = ScientificProgramS::orderBy('created_at', 'DESC')->paginate(4);

        return view('program.scientificProgramS', ['scientificprogramsS' => $scientificprogramsS]);
    }

    public function index(): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        $user = Auth::user();
        $scientificprogramsS = ScientificProgramS::orderBy('created_at', 'DESC')->paginate(2);

        return view('modules-admin.dashboardascientificprogramS', [
            'scientificprogramsS' => $scientificprogramsS,
            'user' => $user,]);
    }

    public function status($id): \Illuminate\Http\RedirectResponse
    {
        $scientificprogramS = ScientificProgramS::find($id);
        try {
            if ($scientificprogramS->status == 1) {
                ScientificProgramS::where('id', $id)->update(['status' => 0]);
                return redirect()->back()->with('status', 'Se ha desactivado la programación de conferencias exitosamente.');
            } else {
                ScientificProgramS::where('id', $id)->update(['status' => 1]);
                return redirect()->back()->with('status', 'Se ha activado la programación de conferencias exitosamente.');
            }
        } catch (Throwable $e) {
            return redirect()->back()->with('error', 'Reintente más tarde');
        }
    }

    public function store(ScientificProgramSRequest $request): \Illuminate\Http\RedirectResponse
    {
        $user = Auth::user();
        $scientificprogramS = new ScientificProgramS();

        $scientificprogramS->name_program = $request->name_program;
        $scientificprogramS->date_presentation = $request->date_presentation;
        $scientificprogramS->hour_presentation = $request->hour_presentation;
        $scientificprogramS->activity = $request->activity;
        $scientificprogramS->registerBy = $user->name;
        $scientificprogramS->status = 1;

        $scientificprogramS->save();
        return redirect()->back()->with('status', 'Programación de conferencias creada exitosamente.');
    }

    public function update(ScientificProgramSRequest $request, $id): \Illuminate\Http\RedirectResponse
    {
        try {
            $user = Auth::user();
            $scientificprogramS = ScientificProgramS::find($id);

            if (!$scientificprogramS) {
                return redirect()->back()->with('error', 'Programación de conferencias no encontrada.');
            }

            $scientificprogramS->name_program = $request->name_program;
            $scientificprogramS->date_presentation = $request->date_presentation;
            $scientificprogramS->hour_presentation = $request->hour_presentation;
            $scientificprogramS->activity = $request->activity;
            $scientificprogramS->registerBy = $user->name;

            $scientificprogramS->save();

            return redirect()->back()->with('status', 'Programación de conferencias actualizada exitosamente.');
        } catch (Throwable $e) {
            return redirect()->back()->with('error', 'Ocurrió un error al actualizar la Programación de conferencias. Por favor, reintente más tarde.');
        }
    }

    public function destroy($id)
    {
        try {
            $scientificprogramS = ScientificProgramS::findOrFail($id);
            $scientificprogramS->delete();
            return redirect()->back()->with('status', 'Programación de conferencias eliminada exitosamente.');
        } catch (Throwable $e) {
            return redirect()->back()->with('error', 'Reintente más tarde');
        }
    }
}
