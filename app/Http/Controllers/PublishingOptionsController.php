<?php

namespace App\Http\Controllers;

use App\Http\Requests\PublishingsRequest;
use App\Models\Publishing;
use App\Models\Slide;
use Illuminate\Http\Request;
use Throwable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class PublishingOptionsController extends Controller
{
    public function showPublishingOptions()
    {
        $publishings = Publishing::orderBy('created_at', 'DESC')->paginate(6);
        $slides = Slide::all();
        return view('authors-area.publishingOptions', ['publishings' => $publishings,  'slides'=>$slides]);
    }

    public function index(): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        $slides = Slide::all();
        $user = Auth::user();
        $publishings = Publishing::orderBy('created_at', 'DESC')->paginate(4);

        return view('modules-admin.dashboardpublishingoptions', [
            'publishings' => $publishings,
            'user' => $user, 'slides'=>$slides]);
    }

    public function status($id): \Illuminate\Http\RedirectResponse
    {
        $publishings = Publishing::find($id);
        try {
            if ($publishings->status == 1) {
                Publishing::where('id', $id)->update(['status' => 0]);
                return redirect()->back()->with('status', 'Se ha desactivado la opción de publicación exitosamente.');
            } else {
                Publishing::where('id', $id)->update(['status' => 1]);
                return redirect()->back()->with('status', 'Se ha activado la opción de publicación exitosamente.');
            }
        } catch (Throwable $e) {
            return redirect()->back()->with('error', 'Reintente más tarde');
        }
    }

    public function store(PublishingsRequest $request): \Illuminate\Http\RedirectResponse
    {
        try {
            $user = Auth::user();
            $publishing = new Publishing();

            if ($request->hasFile('image_journal')) {
                $publishing->image_journal = $request->file('image_journal')->store('uploads', 'public');
            }

            $publishing->name_journal = $request->name_journal;
            $publishing->link_journal = $request->link_journal;
            $publishing->registerBy = $user->name;
            $publishing->status = 1;

            $publishing->save();
            return redirect()->back()->with('status', 'Opción de publicación creado exitosamente.');
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->withErrors(['error' => 'Ocurrió un error al crear la Opción de publicación. Por favor, reintente más tarde.']);
        }
    }

    public function update(PublishingsRequest $request, $id): \Illuminate\Http\RedirectResponse
    {
        try {
            $user = Auth::user();
            $publishing = Publishing::find($id);

            if (!$publishing) {
                return redirect()->back()->with('error', 'Opción de publicación no encontrada.');
            }

            $this->handleFile($request, 'image_journal', $publishing, 'image_journal');

            $publishing->name_journal = $request->name_journal;
            $publishing->link_journal = $request->link_journal;
            $publishing->registerBy = $user->name;

            $publishing->save();

            return redirect()->back()->with('status', 'Opción de publicación actualizada exitosamente.');
        } catch (Throwable $e) {
            return redirect()->back()->with('error', 'Ocurrió un error al actualizar la opción de publicación. Por favor, reintente más tarde.');
        }
    }

    private function handleFile($request, $fieldName, $publishing, $property)
    {
        if ($request->hasFile($fieldName)) {
            $publishing->$property = $request->file($fieldName)->store('uploads', 'public');
        }
    }

    public function destroy($id)
    {
        try {
            $publishing = Publishing::findOrFail($id);
            $publishing->delete();
            return redirect()->back()->with('status', 'Opción de publicación eliminada exitosamente.');
        } catch (Throwable $e) {
            return redirect()->back()->with('error', 'Reintente más tarde');
        }
    }
}
