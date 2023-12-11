<?php

namespace App\Http\Controllers;

use App\Http\Requests\SubmissionRequest;
use App\Models\Slide;
use App\Models\Submission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Throwable;
use Illuminate\Support\Facades\Auth;

class AbstractSubmissionController extends Controller
{
    public function showAbstractSubmission()
    {
        $submissions = Submission::orderBy('created_at', 'DESC')->paginate(2);
        $slides = Slide::all();

        return view('authors-area.abstractSubmission', ['submissions' => $submissions, 'slides'=>$slides]);
    }

    public function index(): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        $user = Auth::user();
        $submissions = Submission::orderBy('created_at', 'DESC')->paginate(2);

        return view('modules-admin.dashboardabstractsubmission', [
            'submissions' => $submissions,
            'user' => $user]);
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

    public function store(SubmissionRequest $request): \Illuminate\Http\RedirectResponse
    {
        Log::info($request);
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

    public function update(SubmissionRequest $request, $id): \Illuminate\Http\RedirectResponse
    {
        try {
            $user = Auth::user();
            $submission = Submission::find($id);

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
