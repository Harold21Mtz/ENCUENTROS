<?php

namespace App\Http\Controllers;

use App\Http\Requests\ScientificProgramRequest;
use App\Models\ScientificProgram;
use Illuminate\Http\Request;
use Throwable;
use Illuminate\Support\Facades\Auth;

class ScientificProgramController extends Controller
{
    public function showScientificProgram()
    {
        $scientificprograms = ScientificProgram::orderBy('created_at', 'DESC')->paginate(20);

        return view('program.scientificProgram', ['scientificprograms' => $scientificprograms]);
    }

    public function index(): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        $scientificprograms = ScientificProgram::orderBy('created_at', 'DESC')->paginate(20);

        return view('modules-admin.dashboardascientificprogram', ['scientificprograms' => $scientificprograms]);
    }

    public function status($id): \Illuminate\Http\RedirectResponse
    {
        $scientificprogram = ScientificProgram::find($id);
        try {
            if ($scientificprogram->status == 1) {
                ScientificProgram::where('id', $id)->update(['status' => 0]);
                return redirect()->back()->with('status', 'Se ha desactivado la programación de conferencias exitosamente.');
            } else {
                ScientificProgram::where('id', $id)->update(['status' => 1]);
                return redirect()->back()->with('status', 'Se ha activado la programación de conferencias exitosamente.');
            }
        } catch (Throwable $e) {
            return redirect()->back()->with('error', 'Reintente más tarde');
        }
    }

    public function store(ScientificProgramRequest $request): \Illuminate\Http\RedirectResponse
    {
        $user = Auth::user();
        $scientificprogram = new ScientificProgram();

        $scientificprogram->name_program = $request->name_program;
        $scientificprogram->date_presentation = $request->date_presentation;
        $scientificprogram->hour_presentation = $request->hour_presentation;
        $scientificprogram->activity = $request->activity;
        $scientificprogram->registerBy = $user->name;
        $scientificprogram->status = 1;

        $scientificprogram->save();
        return redirect()->back()->with('status', 'Programación de conferencias creada exitosamente.');
    }

    public function update(ScientificProgramRequest $request, $id): \Illuminate\Http\RedirectResponse
    {
        try {
            $user = Auth::user();
            $scientificprogram = ScientificProgram::find($id);

            if (!$scientificprogram) {
                return redirect()->back()->with('error', 'Programación de conferencias no encontrada.');
            }

            $scientificprogram->name_program = $request->name_program;
            $scientificprogram->date_presentation = $request->date_presentation;
            $scientificprogram->hour_presentation = $request->hour_presentation;
            $scientificprogram->activity = $request->activity;
            $scientificprogram->registerBy = $user->name;

            $scientificprogram->save();

            return redirect()->back()->with('status', 'Programación de conferencias actualizada exitosamente.');
        } catch (Throwable $e) {
            return redirect()->back()->with('error', 'Ocurrió un error al actualizar la Programación de conferencias. Por favor, reintente más tarde.');
        }
    }

    public function destroy($id)
    {
        try {
            $scientificprogram = ScientificProgram::findOrFail($id);
            $scientificprogram->delete();
            return redirect()->back()->with('status', 'Programación de conferencias eliminada exitosamente.');
        } catch (Throwable $e) {
            return redirect()->back()->with('error', 'Reintente más tarde');
        }
    }
}
