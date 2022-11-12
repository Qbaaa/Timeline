<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\File;

class EventController extends Controller {

    public function index(){
        $events = Event::all();
        return view('event.index', compact('events'))->with('i', 0);
    }

    public function getEvent() {
        $types = Type::all();
        return view("event.create", compact( 'types'));
    }

    public function postEvent(Request $request) {
        $request->validate([
            'name' => 'required',
            'date' => 'required',
            'short_description' => 'required',
            'detailed_description' => 'required',
            'file_image' => 'required|mimes:png,jpg,jpeg',
            'type' => 'required',
        ],
            [
                'name.required' => 'Pole nazwa jest wymagane.',
                'date.required' => 'Pole data zaistnienia jest wymagane.',
                'short_description.required' => 'Pole krótki opis jest wymagane.',
                'detailed_description.required' => 'Pole szczegółowy opis jest wymagane.',
                'file_image.required' => 'Pole ilustracja graficzna jest wymagane.',
                'file_image.mimes' => 'Obraz pliku musi być plikiem typu: png, jpg, jpeg.',
                'type.required' => 'Pole typ jest wymagane.',
            ]);

        $imageName = time().'_'.$request->name.'.'.$request->file_image->extension();
        $request->file_image->move(public_path('images'), $imageName); // public/images/

        Event::create([
            'name' => $request->name,
            'date' => $request->date,
            'short_description' => $request->short_description,
            'detailed_description' => $request->detailed_description,
            'file_image' => $imageName,
            'type_id' => $request->type,
        ]);

        return back()->with('success', 'Zdarzenie zostało stworzone.');
    }

    public function show($id){
        $event = Event::findOrFail($id);
        $types = Type::all();

        return view('event.edit', compact('event', 'types'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'date' => 'required',
            'short_description' => 'required',
            'detailed_description' => 'required',
            'type_id' => 'required',
        ],
            [
                'name.required' => 'Pole nazwa jest wymagane.',
                'date.required' => 'Pole data zaistnienia jest wymagane.',
                'short_description.required' => 'Pole krótki opis jest wymagane.',
                'detailed_description.required' => 'Pole szczegółowy opis jest wymagane.',
                'type_id.required' => 'Pole typ jest wymagane.',
            ]);

        $event = Event::findOrFail($id);
        if ($request->file_image == null) {
            $input = $request->except('file_image');
        } else {
            $input = $request->all();
            $request->validate([
                'file_image' => 'mimes:png,jpg,jpeg',
            ],
                [
                    'file_image.mimes' => 'Obraz pliku musi być plikiem typu: png, jpg, jpeg.',
                ]);
            $imageName = time().'_'.$request->name.'.'.$request->file_image->extension();
            $request->file_image->move(public_path('images'), $imageName); // public/images/
            File::delete(public_path("images\\".$event->file_image));
            Arr::set($input, 'file_image', $imageName);
        }
        $event->fill($input)->save();

        return back()->with('success', 'Zdarzenia o id '.$event->id.' zostało zaktualizowane.');
    }

    public function remove($id)
    {
        $event = Event::findOrFail($id);
        File::delete(public_path("images\\".$event->file_image));
        $event->delete();

        return back()->with('success', 'Zdarzenia o id '.$id.' zostało usunięte.');
    }

}
