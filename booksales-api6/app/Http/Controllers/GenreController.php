<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class GenreController extends Controller
{
    public function index(){
        $genres = Genre::all();

        if ($genres->isEmpty()) {
            return response()->json([
                "success" => "true",
                "message" => "Resource data not found",
            ], 200);
        }

        return response()->json([
            "success" => "true",
            "message" => "Get All Resources",
            "data" => $genres 
        ], 200);
    }

    public function store(Request $request){
        $validator = Validator::make ($request->all(), [
            'name' => 'required|string|max:100',
            'description' => 'required|string',
        ]);

    if ($validator->fails()){
        return response()->json([
            'success' => false,
            'message' => $validator->errors(),

        ], 422);
    }

    $genre =Genre::create([
        'name' => $request->name,
        'description' => $request->description,
    ]);

    return response()->json([
        'success' => true,
        'message' => 'Resource added successfully',
        'data' => $genre,
    ], 201);

    }

    public function show(string $id){
        $genre = Genre::find($id);

        if (!$genre){
            return response()->json([
                'success' => false,
                'message' => 'Resource not found.'
            ], 400);

        }

            return response()->json([
                'success' => true,
                'message' => 'Get Resource',
                'data' => $genre
            ], 200);
    }

    public function update(Request $request, string $id) {
        $genre = Genre::find($id);
        if (!$genre) {
            return response()->json([
                'success' => false,
                'message' => 'Resource not found.'
            ], 404);
        }

        $validator = Validator::make ($request->all(), [
            'name' => 'required|string|max:100',
            'description' => 'required|string',
        ]);

        if ($validator->fails()){
            return response()->json([
                'success' => false,
                'message' => $validator->errors(),
            ], 422);
        }

        $data = [
            'name' => $request->name,
            'description' => $request->description,
        ];

        $genre->update($data);
        return response()->json([
            'success' => true,
            'message' => 'Resource updated successfully',
            'data' => $genre,
        ], 200);

    }

    public function destroy(string $id){
        $genre = Genre::find($id);

        if (!$genre){
            return response()->json([
                'success' => false,
                'message'=> 'Resource not found.'
            ], 404);

        }

        $genre->delete();

            return response()->json([
                'success' => true,
                'message' => 'Get Resource'
            ], 200);
    }

}
