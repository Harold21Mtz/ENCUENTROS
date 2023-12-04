<?php

namespace App\Http\Controllers;

use App\Http\Requests\TopicsRequest;
use App\Models\Topic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Throwable;
use \Illuminate\Support\Facades\Auth;

class TopicsController extends Controller
{
    public function showThematicAreas()
    {
        // Obtén los datos de los temas
        $topics = Topic::orderBy('created_at', 'DESC')->paginate(4);

        // Verifica si la solicitud es una petición AJAX
        if (request()->ajax()) {
            // Si es una petición AJAX, devuelve los datos en formato JSON
            return response()->json(['topics' => $topics]);
        }

        // Si no es una petición AJAX, renderiza la vista normal
        return view('authors-area.thematicAreas', ['topics' => $topics]);
    }

    public function showThematicAreasIndex()
    {
        $topics  = Topic::orderBy('created_at', 'DESC')->paginate(4);
        return view('authors-area.thematicAreas', ['topics' => $topics]);
    }

    public function index(): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        $user = Auth::user();
        $topics = Topic::orderBy('created_at', 'DESC')->paginate(4);

        return view('modules-admin.dashboardtopics', [
            'topics' => $topics,
            'user' => $user,]);
    }

    public function show_image_topics($id)
    {
        $topic = Topic::find($id);
        return $topic->program_image;
    }

    public function status($id): \Illuminate\Http\RedirectResponse
    {
        $topic = Topic::find($id);
        try {
            if ($topic->status == 1) {
                Topic::where('id', $id)->update(['status' => 0]);
                return redirect()->back()->with('status', 'Se ha desactivado el programa exitosamente.');
            } else {
                Topic::where('id', $id)->update(['status' => 1]);
                return redirect()->back()->with('status', 'Se ha activado el programa exitosamente.');
            }
        } catch (Throwable $e) {
            return redirect()->back()->with('error', 'Reintente más tarde');
        }
    }

    public function store(TopicsRequest $request): \Illuminate\Http\RedirectResponse
    {
        $user = Auth::user();
        $topic = new Topic();

        if ($request->hasFile('program_image')) {
            $topic->program_image = $request->file('program_image')->store('uploads', 'public');
        }


        $topic->program_name = $request->program_name;
        $topic->program_description = $request->program_description;
        $topic->program_topics = $request->program_topics;
        $topic->registerBy = $user->name;
        $topic->status = 1;

        $topic->save();
        Log::info($topic);
        return redirect()->back()->with('status', 'Programa creado exitosamente.');
    }

    public function update(TopicsRequest $request, $id): \Illuminate\Http\RedirectResponse
    {
        Log::info($request);
        try {
            $user = Auth::user();
            $topic = Topic::find($id);

            if (!$topic) {
                return redirect()->back()->with('error', 'Programa no encontrado.');
            }


            $this->handleFile($request, 'program_image', $topic, 'program_image');

            $topic->program_name = $request->program_name;
            $topic->program_description = $request->program_description;
            $topic->program_topics = $request->program_topics;

            $topic->registerBy = $user->name;

            $topic->save();

            Log::info('Programa actualizado:', $topic->toArray());

            return redirect()->back()->with('status', 'Programa actualizado exitosamente.');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return redirect()->back()->with('error', 'Ocurrió un error al actualizar el Programa. Por favor, reintente más tarde.');
        }
    }

    private function handleFile($request, $fieldName, $topic, $property)
{
    if ($request->hasFile($fieldName)) {
        $topic->$property = $request->file($fieldName)->store('uploads', 'public');
    }
}

    public function destroy($id)
    {
        try {
            $topic = Topic::findOrFail($id);
            $topic->delete();
            return redirect()->back()->with('status', 'Programa eliminado exitosamente.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Reintente más tarde');
        }
    }

}
