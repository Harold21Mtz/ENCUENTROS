<?php

namespace App\Http\Controllers;

use App\Http\Requests\SlideRequest;
use App\Models\Slide;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Throwable;
use \Illuminate\Support\Facades\Auth;


class SlideController extends Controller
{
    public function showSlide()
    {
        $slides = Slide::orderBy('created_at', 'DESC')->paginate(5);

        return view('include.header', [
            'slides' => $slides
        ]);
    }

    public function index(): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        $user = Auth::user();
        $slides = Slide::orderBy('created_at', 'DESC')->paginate(5);

        return view('modules-admin.dashboardslides', [
            'slides' => $slides,
            'user' => $user
        ]);
    }

    public function status($id): \Illuminate\Http\RedirectResponse
    {
        $slide = Slide::find($id);
        try {
            if ($slide->status == 1) {
                Slide::where('id', $id)->update(['status' => 0]);
                return redirect()->back()->with('status', 'Se ha desactivado el slide exitosamente.');
            } else {
                Slide::where('id', $id)->update(['status' => 1]);
                return redirect()->back()->with('status', 'Se ha activado el slide exitosamente.');
            }
        } catch (Throwable $e) {
            return redirect()->back()->with('error', 'Reintente más tarde');
        }
    }

    public function store(SlideRequest $request): \Illuminate\Http\RedirectResponse
    {
        try {
            $user = Auth::user();
            $slide = new Slide();

            $slide = $this->getSlide($request, $slide, $user);

            return redirect()->back()->with('status', 'Slide creado exitosamente.');
        } catch (\Exception $e) {
            Log::error($e->getMessage());

            return redirect()->back()->withInput()->withErrors(['error' => 'Ocurrió un error al crear el Slide. Por favor, reintente más tarde.']);
        }
    }

    public function update(SlideRequest $request, $id): \Illuminate\Http\RedirectResponse
    {
        try {
            Log::info($request);
            $user = Auth::user();
            $slide = Slide::findOrFail($id);

            if (!$slide) {
                return redirect()->back()->with('error', 'Slide no encontrado.');
            }


            $slide = $this->getSlide($request, $slide, $user);

            return redirect()->back()->with('status', 'Slide actualizado exitosamente.');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return redirect()->back()->with('error', 'Ocurrió un error al actualizar el slide. Por favor, reintente más tarde.');
        }
    }

    public function destroy($id)
    {
        try {
            $slide = Slide::findOrFail($id);
            $slide->delete();
            return redirect()->back()->with('status', 'Slide eliminado exitosamente.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Reintente más tarde');
        }
    }

    private function uploadImage($request, $fieldName, $slide): void
    {
        $image = $request->file($fieldName);
        if (isset($image)) {
            $basePath = 'uploads/slides/';

            // Define directory based on fieldName
            $directory = ($fieldName === 'conference_logo') ? 'logo' : '';

            if (!file_exists($basePath . $directory)) {
                mkdir($basePath . $directory, 0777, true);
            }

            $imageName = $image->getClientOriginalName();
            $image->move($basePath . $directory, $imageName);

            $slide->$fieldName = $directory . '/' . $imageName;
        }
    }


    public function getSlide(SlideRequest $request, $slide, ?\Illuminate\Contracts\Auth\Authenticatable $user): mixed
    {
        $this->uploadImage($request, 'conference_logo', $slide);
        $this->uploadImage($request, 'conference_image', $slide);
        $this->uploadImage($request, 'conference_image_secondary_one', $slide);
        $this->uploadImage($request, 'conference_image_secondary_two', $slide);
        $this->uploadImage($request, 'conference_image_secondary_three', $slide);
        $this->uploadImage($request, 'conference_image_secondary_four', $slide);
        $this->uploadImage($request, 'conference_image_secondary_five', $slide);

        $slide->conference_name = $request->conference_name;
        $slide->conference_date = $request->conference_date;
        $slide->university_name = $request->university_name;
        $slide->faculty_name = $request->faculty_name;
        $slide->registerBy = $user->name;
        $slide->status = 1;

        $slide->save();
        return $slide;
    }
}
