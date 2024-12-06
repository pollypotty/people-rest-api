<?php

namespace App\Http\Controllers;

use App\Models\Person;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class PersonController extends Controller
{
    public function show(string $email)
    {
        try {
            $person = Person::findOrFail($email);
           
           return response()->json([
            "person" => $person,
           ], 200);

        } catch (ModelNotFoundException $e) {

            return response()->json([
                'error' => 'Person not found with the provided email address.',
            ], 400);
        }
    }

    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:people,email',
            'name' => 'required|string',
            'dept' => 'required|string',
            'phone' => ['required', 'regex:/^\+36 \(1\) 666-\d{4}$/'],
            'room' => 'nullable|string',
            'rank' => 'required|string',
        ]);

        $person = Person::create($request->all());

        return response()->json([
            'message' => 'person created successfully.',
            'person' => $person,
        ], 201);
    }

    public function destroy (string $email)
    {
        try {
            Person::findOrFail($email)->delete();

            return response()->json([
                'message' => 'Person deleted successfully.',
            ], 200);

        } catch (ModelNotFoundException $e) {

            return response()->json([
                'error' => 'Person not found with the provided email address.',
            ], 400);
        }
    }
}
