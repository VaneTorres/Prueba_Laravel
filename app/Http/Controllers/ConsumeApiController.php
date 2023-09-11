<?php

namespace App\Http\Controllers;

use App\Models\Character;
use Illuminate\Http\Request;

class ConsumeApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function ConsumeApi()
    {
        //Limpiar la tabla
        Character::truncate();
        //Consumir la API
        $client = new \GuzzleHttp\Client();
        $request = $client->get('https://rickandmortyapi.com/api/character', ['verify' => false]);
        $data = json_decode($request->getBody());
        for($i = 0;$i <= $data->info->pages;$i++) {
            $request = $client->get('https://rickandmortyapi.com/api/character?page='.$i, ['verify' => false]);
            $characters = json_decode($request->getBody());
            foreach ($characters->results as $characters) {
                //Guardar los datos en la base de datos
                $character = new Character();
                $character->name = $characters->name;
                $character->status = $characters->status;
                $character->species = $characters->species;
                $character->type = $characters->type;
                $character->gender = $characters->gender;
                $character->origin_name = $characters->origin->name;
                $character->origin_url = $characters->origin->url;
                $character->image = $characters->image;
                $character->save();
            }
        }
        session()->flash('message', 'Consumo de API exitoso');
        return redirect()->route('index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Mostrar los datos en la vista
        $data = Character::paginate(20);
        return view('welcome', compact('data'));
    }



    public function edit(Request $request, $id)
    {
        $request->validate([
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        //Guardar los datos en la base de datos
        $characters = Character::findOrFail($id);
        $characters->name = $request->name;
        $characters->status = $request->status;
        $characters->species = $request->species;
        $characters->type = $request->type;
        $characters->gender = $request->gender;
        $characters->origin_name = $request->origin_name;
        $characters->origin_url = $request->origin_url;

        if ($request->hasFile('image')) {
            $uploadedImage = $request->file('image');
            $imageName = time() . '.' . $uploadedImage->getClientOriginalExtension();
            $destinationPath = public_path('/images');
            $uploadedImage->move($destinationPath, $imageName);
            $characters->image = $imageName;
        }
        $characters->save();
        session()->flash('message', 'Personaje actualizado correctamente');
        return redirect()->route('index');
    }


}
