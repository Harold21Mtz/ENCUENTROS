<?php

namespace App\Http\Controllers;

use App\Http\Requests\SubmissionsRequest;
use App\Models\Submission;
use Illuminate\Http\Request;
use Throwable;
use Illuminate\Support\Facades\Auth;

class AbstractSubmissionController extends Controller
{
    public function showAbstractSubmission()
    {
        $submissions = Submission::orderBy('created_at', 'DESC')->paginate(2);

        return view('authors-area.abstractSubmission', ['submissions' => $submissions]);
    }

    public function index(): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        $submissions = Submission::orderBy('created_at', 'DESC')->paginate(3);

        return view('modules-admin.dashboardabstractsubmission', ['submissions' => $submissions]);
    }

    public function status($id): \Illuminate\Http\RedirectResponse
    {
        $submission = Submission::find($id);
        try {
            if ($submission->status == 1) {
                Submission::where('id', $id)->update(['status' => 0]);
                return redirect()->back()->with('status', 'Se ha desactivado la presentación de resúmenes exitosamente.');
            } else {
                Submission::where('id', $id)->update(['status' => 1]);
                return redirect()->back()->with('status', 'Se ha activado la presentación de resúmenes exitosamente.');
            }
        } catch (Throwable $e) {
            return redirect()->back()->with('error', 'Reintente más tarde');
        }
    }

    public function store(SubmissionsRequest $request): \Illuminate\Http\RedirectResponse
    {
        $user = Auth::user();
        $submission = new Submission();

        $submission->submission_conference = $request->submission_conference;
        $submission->submission_strucuture = $request->submission_strucuture;
        $submission->submission_description = $request->submission_description;
        $submission->registerBy = $user->name;
        $submission->status = 1;

        $submission->save();
        return redirect()->back()->with('status', 'Presentación de resúmenes creada exitosamente.');
    }

    public function update(SubmissionsRequest $request, $id): \Illuminate\Http\RedirectResponse
    {
        try {
            $user = Auth::user();
            $submission = Date::find($id);

            if (!$submission) {
                return redirect()->back()->with('error', 'Presentación de resúmenes no encontrada.');
            }


            $submission->submission_conference = $request->submission_conference;
            $submission->submission_strucuture = $request->submission_strucuture;
            $submission->submission_description = $request->submission_description;

            $submission->registerBy = $user->name;

            $submission->save();

            return redirect()->back()->with('status', 'Presentación de resúmenes actualizada exitosamente.');
        } catch (Throwable $e) {
            return redirect()->back()->with('error', 'Ocurrió un error al actualizar la Fecha importante. Por favor, reintente más tarde.');
        }
    }

    public function destroy($id)
    {
        try {
            $submission = Submission::findOrFail($id);
            $submission->delete();
            return redirect()->back()->with('status', 'Presentación de resúmenes eliminada exitosamente.');
        } catch (Throwable $e) {
            return redirect()->back()->with('error', 'Reintente más tarde');
        }
    }
}
