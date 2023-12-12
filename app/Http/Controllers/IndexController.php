<?php

namespace App\Http\Controllers;

use App\Http\Requests\IndexRequest;
use Illuminate\Http\Request;
use Throwable;
use Illuminate\Support\Facades\Auth;
use App\Models\Date;
use App\Models\Index;
use App\Models\Slide;
use App\Models\Topic;

class IndexController extends Controller
{

    public function showIndex(){
        $topics = Topic::orderBy('created_at', 'DESC')->get();
        $dates = Date::orderBy('created_at', 'DESC')->get();
        $slides = Slide::orderBy('created_at', 'DESC')->get();
        $indexs = Index::orderBy('created_at', 'DESC')->get();

        return view('index', [
            'topics' => $topics,
            'dates' => $dates,
            'slides'=> $slides,
        'indexs'=>$indexs]);
    }

    public function index(){
        $user = Auth::user();
        $slides = Slide::orderBy('created_at', 'DESC')->get();
        $indexs = Index::orderBy('created_at', 'DESC')->get();

        return view('index', [
            'user' => $user,
            'slides'=> $slides,
        'indexs'=>$indexs]);
    }

    public function status($id): \Illuminate\Http\RedirectResponse
    {
        $index = Index::find($id);
        try {
            if ($index->status == 1) {
                Index::where('id', $id)->update(['status' => 0]);
                return redirect()->back()->with('status', 'Se ha desactivado la informacion del index exitosamente.');
            } else {
                Index::where('id', $id)->update(['status' => 1]);
                return redirect()->back()->with('status', 'Se ha activado la informacion del index exitosamente.');
            }
        } catch (Throwable $e) {
            return redirect()->back()->with('error', 'Reintente más tarde');
        }
    }

    public function store(IndexRequest $request): \Illuminate\Http\RedirectResponse
    {
        $user = Auth::user();
        $index = new Index();

        $index->description_one = $request->description_one;
        $index->description_two = $request->description_two;
        $index->ufpso_student = $request->ufpso_student;
        $index->ufpso_graduate = $request->ufpso_graduate;
        $index->external_professional = $request->external_professional;
        $index->oral_presenter = $request->oral_presenter;
        $index->description_three = $request->description_three;
        $index->message = $request->message;
        $index->registerBy = $user->name;
        $index->status = 1;

        $index->save();
        return redirect()->back()->with('status', 'Informacion del index creada exitosamente.');
    }

    public function update(IndexRequest $request, $id): \Illuminate\Http\RedirectResponse
    {
        try {
            $user = Auth::user();
            $index = Index::find($id);

            if (!$index) {
                return redirect()->back()->with('error', 'Informacion del index no encontrada.');
            }

            $index->description_one = $request->description_one;
            $index->description_two = $request->description_two;
            $index->ufpso_student = $request->ufpso_student;
            $index->ufpso_graduate = $request->ufpso_graduate;
            $index->external_professional = $request->external_professional;
            $index->oral_presenter = $request->oral_presenter;
            $index->description_three = $request->description_three;
            $index->message = $request->message;
            $index->registerBy = $user->name;

            $index->save();

            return redirect()->back()->with('status', 'Informacion del index actualizada exitosamente.');
        } catch (Throwable $e) {
            return redirect()->back()->with('error', 'Ocurrió un error al actualizar la Informacion del index de conferencias. Por favor, reintente más tarde.');
        }
    }

    public function destroy($id)
    {
        try {
            $index = Index::findOrFail($id);
            $index->delete();
            return redirect()->back()->with('status', 'Informacion del index eliminada exitosamente.');
        } catch (Throwable $e) {
            return redirect()->back()->with('error', 'Reintente más tarde');
        }
    }
}
