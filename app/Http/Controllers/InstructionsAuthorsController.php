<?php

namespace App\Http\Controllers;

use App\Http\Requests\InstructionsRequest;
use App\Models\Instruction;
use App\Models\Slide;
use Illuminate\Http\Request;
use Throwable;
use Illuminate\Support\Facades\Auth;

class InstructionsAuthorsController extends Controller
{
    public function showInstructionsAuthors()
    {
        $slides = Slide::all();
        $instructions = Instruction::orderBy('created_at', 'DESC')->paginate(2);
        return view('authors-area.instructionsAuthors', ['instructions' => $instructions, 'slides'=>$slides]);
    }

    public function index(): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        $user = Auth::user();
        $instructions = Instruction::orderBy('created_at', 'DESC')->paginate(1);

        return view('modules-admin.dashboardinstructionauthors', [
            'instructions' => $instructions,
            'user' => $user,]);
    }

    public function status($id): \Illuminate\Http\RedirectResponse
    {
        $instructions = Instruction::find($id);
        try {
            if ($instructions->status == 1) {
                Instruction::where('id', $id)->update(['status' => 0]);
                return redirect()->back()->with('status', 'Se ha desactivado la instrucción del autor exitosamente.');
            } else {
                Instruction::where('id', $id)->update(['status' => 1]);
                return redirect()->back()->with('status', 'Se ha activado la instrucción del autor exitosamente.');
            }
        } catch (Throwable $e) {
            return redirect()->back()->with('error', 'Reintente más tarde');
        }
    }

    public function store(InstructionsRequest $request): \Illuminate\Http\RedirectResponse
    {
        $user = Auth::user();
        $instruction = new Instruction();

        $instruction->instruction_conference = $request->instruction_conference;
        $instruction->instruction_description = $request->instruction_description;
        $instruction->instruction_aspects = $request->instruction_aspects;

        $instruction->registerBy = $user->name;
        $instruction->status = 1;

        $instruction->save();
        return redirect()->back()->with('status', 'Instrucción de autor creada exitosamente.');
    }

    public function update(InstructionsRequest $request, $id): \Illuminate\Http\RedirectResponse
    {
        try {
            $user = Auth::user();
            $instruction = Instruction::find($id);

            if (!$instruction) {
                return redirect()->back()->with('error', 'Instrucción de autor no encontrada.');
            }


            $instruction->instruction_conference = $request->instruction_conference;
            $instruction->instruction_description = $request->instruction_description;
            $instruction->instruction_aspects = $request->instruction_aspects;

            $instruction->registerBy = $user->name;

            $instruction->save();

            return redirect()->back()->with('status', 'Instrucción de autor actualizada exitosamente.');
        } catch (Throwable $e) {
            return redirect()->back()->with('error', 'Ocurrió un error al actualizar la Instrucción de autor. Por favor, reintente más tarde.');
        }
    }

    public function destroy($id)
    {
        try {
            $instruction = Instruction::findOrFail($id);
            $instruction->delete();
            return redirect()->back()->with('status', 'Instrucción de autor eliminada exitosamente.');
        } catch (Throwable $e) {
            return redirect()->back()->with('error', 'Reintente más tarde');
        }
    }
}
