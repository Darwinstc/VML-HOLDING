<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){

        $data =User::all();

     return response()->json($data, 200);
    }
    public function show($id)
    {
        $data = User::findOrFail($id);

        return response()->json($data, 200);
    }
    public function update(Request $request, $id)
    {
        $data = User::findOrFail($id);
        $data->fill($request->all());
        $data->save();
        
        return response()->json($data,200);

    }
}
