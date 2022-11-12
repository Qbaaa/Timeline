<?php
namespace App\Http\Controllers;

use App\Models\Process;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\File;

class ProcessController extends Controller {

    public function index(){
        $processes = Process::all();
        return view('process.index', compact('processes'))->with('i', 0);
    }

    public function getProcess() {
        return view("process.create");
    }

    public function createProcess(Request $request) {
        $request->validate([
            'name' => 'required',
            'date_start' => 'required',
            'date_end' => 'required',
            'short_description' => 'required',
            'detailed_description' => 'required',
            'file_image' => 'required|mimes:png,jpg,jpeg',
        ],
            [
                'name.required' => 'Pole nazwa jest wymagane.',
                'date_start.required' => 'Pole data rozpoczęcia jest wymagane.',
                'date_end.required' => 'Pole data zakończenia jest wymagane.',
                'short_description.required' => 'Pole krótki opis jest wymagane.',
                'detailed_description.required' => 'Pole szczegółowy opis jest wymagane.',
                'file_image.required' => 'Pole ilustracja graficzna jest wymagane.',
                'file_image.mimes' => 'Obraz pliku musi być plikiem typu: png, jpg, jpeg.',
            ]);

        $imageName = time().'_'.$request->name.'.'.$request->file_image->extension();
        $request->file_image->move(public_path('images'), $imageName); // public/images/

        Process::create([
            'name' => $request->name,
            'date_start' => $request->date_start,
            'date_end' => $request->date_end,
            'short_description' => $request->short_description,
            'detailed_description' => $request->detailed_description,
            'file_image' => $imageName,
        ]);

        return back()->with('success', 'Proces został stworzony.');
    }

    public function show($id){
        $process = Process::findOrFail($id);
        return view('process.edit', compact('process'));
    }

    public function remove($id)
    {
        $process = Process::findOrFail($id);
        File::delete(public_path("images\\".$process->file_image));
        $process->delete();

        return back()->with('success', 'Proces o id '.$id.' został usunięty.');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'date_start' => 'required',
            'date_end' => 'required',
            'short_description' => 'required',
            'detailed_description' => 'required',
        ],
            [
                'name.required' => 'Pole nazwa jest wymagane.',
                'date_start.required' => 'Pole data rozpoczęcia jest wymagane.',
                'date_end.required' => 'Pole data zakończenia jest wymagane.',
                'short_description.required' => 'Pole krótki opis jest wymagane.',
                'detailed_description.required' => 'Pole szczegółowy opis jest wymagane.',
            ]);

        $process = Process::findOrFail($id);

        if ($request->file_image == null) {
            $input = $request->except('file_image');
        } else {
            $input = $request->all();
            $request->validate([
                'file_image' => 'required|mimes:png,jpg,jpeg',
            ],
                [
                    'file_image.required' => 'Pole ilustracja graficzna jest wymagane.',
                    'file_image.mimes' => 'Obraz pliku musi być plikiem typu: png, jpg, jpeg.',
                ]);

            $imageName = time().'_'.$request->name.'.'.$request->file_image->extension();
            $request->file_image->move(public_path('images'), $imageName); // public/images/
            File::delete(public_path("images\\".$process->file_image));
            Arr::set($input, 'file_image', $imageName);
        }
        $process->fill($input)->save();

        return back()->with('success', 'Zdarzenia o id '.$process->id.' zostało zaktualizowane.');
    }

}
