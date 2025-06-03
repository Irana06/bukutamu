<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\BukuTamu;
use Illuminate\Http\Request;

class BukuTamuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Logic to retrieve and return all guestbook entries
        $bukuTamu = BukuTamu::all();

        return view('dashboard', compact('bukuTamu'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Logic to validate and store a new guestbook entry
        $validatedData = $request->validate([
            'nama' => 'required|string|max:255',
            'instansi' => 'required|string|max:255',
            'tanggal' => 'required|date',
        ]);

        $result = BukuTamu::create([
            'nama' => $validatedData['nama'],
            'instansi' => $validatedData['instansi'],
            'tanggal' => $validatedData['tanggal'],
        ]);

        // Logic to save the validated data into the database
        // BukuTamu::create($validatedData);

        return response()->json([
            'message' => 'Data Buku Tamu sudah ditambahkan',
            'data' => $result
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        // Logic to retrieve and return a specific guestbook entry
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Logic to validate and update a specific guestbook entry
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // Logic to delete a specific guestbook entry
    }
}
