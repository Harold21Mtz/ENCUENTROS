<?php

namespace App\Http\Controllers;

use App\Http\Requests\DatesRequest;
use App\Models\Date;
use App\Models\Slide;
use Illuminate\Http\Request;
use Throwable;
use Illuminate\Support\Facades\Auth;

class ImportantDatesController extends Controller
{
    public function showImportantDates()
    {
        $slides = Slide::all();
        $dates = Date::orderBy('created_at', 'DESC')->paginate(10);

        return view('authors-area.importantDates', ['dates' => $dates, 'slides'=>$slides]);

    }

    public function index(): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        $user = Auth::user();
        $dates = Date::orderBy('created_at', 'DESC')->paginate(10);

        return view('modules-admin.dashboardimportantdates', [
            'dates' => $dates,
            'user' => $user,
        ]);
    }

    public function status($id): \Illuminate\Http\RedirectResponse
    {
        $date = Date::find($id);
        try {
            if ($date->status == 1) {
                Date::where('id', $id)->update(['status' => 0]);
                return redirect()->back()->with('status', 'Se ha desactivado la fecha importante exitosamente.');
            } else {
                Date::where('id', $id)->update(['status' => 1]);
                return redirect()->back()->with('status', 'Se ha activado la fecha importante exitosamente.');
            }
        } catch (Throwable $e) {
            return redirect()->back()->with('error', 'Reintente más tarde');
        }
    }

    public function store(DatesRequest $request): \Illuminate\Http\RedirectResponse
    {
        $user = Auth::user();
        $date = new Date();

        $date->date_name = $request->date_name;
        $date->date_important = $request->date_important;
        $date->date_description = $request->date_description;
        $date->registerBy = $user->name;
        $date->status = 1;

        $date->save();
        return redirect()->back()->with('status', 'Fecha importante creada exitosamente.');
    }

    public function update(DatesRequest $request, $id): \Illuminate\Http\RedirectResponse
    {
        try {
            $user = Auth::user();
            $date = Date::find($id);

            if (!$date) {
                return redirect()->back()->with('error', 'Fecha importante no encontrada.');
            }


            $date->date_name = $request->date_name;
            $date->date_important = $request->date_important;
            $date->date_description = $request->date_description;

            $date->registerBy = $user->name;

            $date->save();

            return redirect()->back()->with('status', 'Fecha importante actualizada exitosamente.');
        } catch (Throwable $e) {
            return redirect()->back()->with('error', 'Ocurrió un error al actualizar la Fecha importante. Por favor, reintente más tarde.');
        }
    }

    public function destroy($id)
    {
        try {
            $date = Date::findOrFail($id);
            $date->delete();
            return redirect()->back()->with('status', 'Fecha importante eliminada exitosamente.');
        } catch (Throwable $e) {
            return redirect()->back()->with('error', 'Reintente más tarde');
        }
    }
}
