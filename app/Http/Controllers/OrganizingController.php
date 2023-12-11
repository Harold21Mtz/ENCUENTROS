<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrganizingRequest;
use App\Models\Organizing;
use Illuminate\Http\Request;
use Throwable;
use \Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class OrganizingController extends Controller
{

    public function index(): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        $user = Auth::user();
        $organizings = Organizing::orderBy('created_at', 'DESC')->paginate(5);

        return view('modules-admin.dashboardorganizing', [
            'organizings' => $organizings,
            'user' => $user]);
    }

    public function status($id): \Illuminate\Http\RedirectResponse
    {
        $organizing = Organizing::find($id);
        try {
            if ($organizing->status == 1) {
                Organizing::where('id', $id)->update(['status' => 0]);
                return redirect()->back()->with('status', 'Se ha desactivado la entidad organizadora exitosamente.');
            } else {
                Organizing::where('id', $id)->update(['status' => 1]);
                return redirect()->back()->with('status', 'Se ha activado la entidad organizadora exitosamente.');
            }
        } catch (Throwable $e) {
            return redirect()->back()->with('error', 'Reintente más tarde');
        }
    }

    public function store(OrganizingRequest $request): \Illuminate\Http\RedirectResponse
    {
        try {
            $user = Auth::user();
            $organizing = new Organizing();

            $image = $request->file('organizing_image');
            if (isset($image)) {
                if (!file_exists('uploads/organizing/')) {
                    mkdir('uploads/organizing/', 0777, true);
                }
    
                $imageName = $image->getClientOriginalName();
                $image->move('uploads/organizing/', $imageName);
    
                $organizing->organizing_image = $imageName;
            }

            $organizing->organizing_name = $request->organizing_name;
            $organizing->registerBy = $user->name;
                    $organizing->status = 1;
                    $organizing->save();

            return redirect()->back()->with('status', 'Entidad organizadora creado exitosamente.');
        } catch (\Exception $e) {
            Log::error($e->getMessage());

            return redirect()->back()->withInput()->withErrors(['error' => 'Ocurrió un error al crear la Entidad organizadora . Por favor, reintente más tarde.']);
        }
    }

    public function update(OrganizingRequest $request, $id): \Illuminate\Http\RedirectResponse
    {
        try {
            Log::info($request);
            $user = Auth::user();
            $organizing = Organizing::findOrFail($id);

            if (!$organizing) {
                return redirect()->back()->with('error', 'Entidad organizadora no encontrada.');
            }


            $image = $request->file('organizing_image');
            if (isset($image)) {
                if (!file_exists('uploads/organizing/')) {
                    mkdir('uploads/organizing/', 0777, true);
                }
    
                $imageName = $image->getClientOriginalName();
                $image->move('uploads/organizing/', $imageName);
    
                $organizing->organizing_image = $imageName;
            }

            $organizing->organizing_name = $request->organizing_name;
            $organizing->registerBy = $user->name;
                    $organizing->save();

            return redirect()->back()->with('status', 'Entidad organizadora actualizada exitosamente.');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return redirect()->back()->with('error', 'Ocurrió un error al actualizar la Entidad organizadora. Por favor, reintente más tarde.');
        }
    }

    public function destroy($id)
    {
        try {
            $organizing = Organizing::findOrFail($id);
            $organizing->delete();
            return redirect()->back()->with('status', 'Entidad organizadora eliminada exitosamente.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Reintente más tarde');
        }
    }

}
