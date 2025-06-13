<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AuthorController extends Controller
{
    public function index(){
        $authors = Author::all();

        if ($authors->isEmpty()) {
            return response()->json([
                "success" => "true",
                "message" => "Resource data not found",
            ], 200);
        }

        return response()->json([
            "success" => "true",
            "message" => "Get All Resources",
            "data" => $authors
        ], 200);
    }

    public function store(Request $request){
        $validator = Validator::make($request->all(),[
            'name' => 'required|string|max:100',
            'email' => 'required|email|max:100|unique:authors,email',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validator->errors(),
            ], 422);
        }

        $author = Author::create([
            'name' => $request->name,
            'email' => $request->email,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Resource added successfully',
            'data' => $author,
        ], 201);

    }

    public function show(string $id){
        $author = Author::find($id);

        if (!$author){
            return response()->json([
                'success' => false,
                'message' => 'Resource not found',
            ], 404);
        }

        return response()->json([
            'success' => true,
            'message' => 'Get Resource',
            'data' => $author
        ], 200);
    }

    public function update(string $id, Request $request){
        $author = Author::find($id);

        if (!$author) {
            return response()->json([
                'success' => false,
                'message' => 'Resource not found.',
            ], 404);
        }

        $validator = Validator::make($request->all(), [
            'name' => 'sometimes|required|string|max:100',
            'email' => 'sometimes|required|email|max:100|unique:authors,email,' . $id,
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validator->errors(),
            ], 422);
        }

        $data = [
            'name' => $request->name,
            'email' => $request->email,
        ];

        $author->update($request->only(['name', 'email']));

        return response()->json([
            'success' => true,
            'message' => 'Resource updated successfully',
            'data' => $author,
        ], 200);
    }

    public function destroy(string $id){
        $author = Author::find($id);

        if (!$author) {
            return response()->json([
                'success' => false,
                'message' => 'Resource not found.',
            ], 404);
        }

        $author->delete();

        return response()->json([
            'success' => true,
            'message' => 'Resource delected successfully'
        ], 200);
    }
}