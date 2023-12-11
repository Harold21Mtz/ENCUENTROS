<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrganizingCommiteeRequest;
use App\Models\Organizing;
use App\Models\OrganizingCommitee;
use Illuminate\Http\Request;
use Throwable;
use Illuminate\Support\Facades\Auth;

class OrganizingCommitteeController extends Controller
{
    public function showOrganizingCommittee()
    {
        $organizingscommitee = OrganizingCommitee::orderBy('created_at', 'DESC')->paginate(10);
        $organizings = Organizing::orderBy('created_at', 'DESC')->get();

        return view('organization.organizingCommittee', ['organizingscommitee' => $organizingscommitee,
        'organizings' => $organizings]);
    }

    public function index(): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        $user = Auth::user();
        $organizingscommitee = OrganizingCommitee::orderBy('created_at', 'DESC')->paginate(10);

        return view('modules-admin.dashboardorganizingcommitee', [
            'organizingscommitee' => $organizingscommitee,
            'user' => $user,
        ]);
    }

    public function status($id): \Illuminate\Http\RedirectResponse
    {
        $organizingcommitee = OrganizingCommitee::find($id);
        try {
            if ($organizingcommitee->status == 1) {
                OrganizingCommitee::where('id', $id)->update(['status' => 0]);
                return redirect()->back()->with('status', 'Se ha desactivado el Organizador exitosamente.');
            } else {
                OrganizingCommitee::where('id', $id)->update(['status' => 1]);
                return redirect()->back()->with('status', 'Se ha activado el Organizador exitosamente.');
            }
        } catch (Throwable $e) {
            return redirect()->back()->with('error', 'Reintente más tarde');
        }
    }

    public function store(OrganizingCommiteeRequest $request): \Illuminate\Http\RedirectResponse
    {
        $user = Auth::user();
        $organizingcommitee = new OrganizingCommitee();

        $organizingcommitee->organizer_charge = $request->organizer_charge;
        $organizingcommitee->organizer_name = $request->organizer_name;
        $organizingcommitee->organizer_title = $request->organizer_title;
        $organizingcommitee->organizer_university = $request->organizer_university;
        $organizingcommitee->organizer_description = $request->organizer_description;
        $organizingcommitee->registerBy = $user->name;
        $organizingcommitee->status = 1;

        $organizingcommitee->save();
        return redirect()->back()->with('status', 'El organizador fue creado exitosamente.');
    }

    public function update(OrganizingCommiteeRequest $request, $id): \Illuminate\Http\RedirectResponse
    {
        try {
            $user = Auth::user();
            $organizingcommitee = OrganizingCommitee::find($id);

            if (!$organizingcommitee) {
                return redirect()->back()->with('error', 'Organizador no encontrado.');
            }


            $organizingcommitee->organizer_charge = $request->organizer_charge;
        $organizingcommitee->organizer_name = $request->organizer_name;
        $organizingcommitee->organizer_title = $request->organizer_title;
        $organizingcommitee->organizer_university = $request->organizer_university;
        $organizingcommitee->organizer_description = $request->organizer_description;
        $organizingcommitee->registerBy = $user->name;

            $organizingcommitee->save();

            return redirect()->back()->with('status', 'Organizador actualizado exitosamente.');
        } catch (Throwable $e) {
            return redirect()->back()->with('error', 'Ocurrió un error al actualizar el Organizador. Por favor, reintente más tarde.');
        }
    }

    public function destroy($id)
    {
        try {
            $organizingcommitee = OrganizingCommitee::findOrFail($id);
            $organizingcommitee->delete();
            return redirect()->back()->with('status', 'Organizador eliminado exitosamente.');
        } catch (Throwable $e) {
            return redirect()->back()->with('error', 'Reintente más tarde');
        }
    }
}
