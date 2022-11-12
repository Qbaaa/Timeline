<?php

namespace App\Http\Controllers;

use App\Models\Type;
use Illuminate\Http\Request;

class TypeController extends Controller {

    public function index(){
        $types = Type::all();
        return view('type.index', compact('types'))->with('i', 0);
    }

    public function getType() {
        return view("type.create");
    }

    public function createType(Request $request) {
        $request->validate([
            'name' => 'required',
            'color' => 'required',
        ],
            [
                'name.required' => 'Pole nazwa jest wymagane.',
                'color.required' => 'Pole kolor jest wymagane.',
            ]);

        Type::create([
            'name' => $request->name,
            'color' => $request->color,
        ]);

        return back()->with('success', 'Typ został stworzony.');
    }

    public function show($id){
        $type = Type::findOrFail($id);

        return view('type.edit', compact('type'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
        ],
            [
                'name.required' => 'Pole nazwa jest wymagane.',
            ]);

        $type = Type::findOrFail($id);

        $input = $request->all();
        $type->fill($input)->save();

        return back()->with('success', 'Typ o id '.$type->id.' został zaktualizowany.');
    }

    public function remove($id)
    {
        $type = Type::findOrFail($id);
        $type->delete();

        return back()->with('success', 'Zdarzenia o id '.$id.' zostało usunięte.');
    }

}
