<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePatientsRequest;
use App\Http\Requests\UpdatePatientsRequest;
use App\Models\Patients;

class PatientsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('Patients.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePatientsRequest $request)
    {
        $request->validate([
            'file' => 'required|mimes:csv|max:2048', // Example validation rules
        ]);
        $file = $request->file('file');
        $fileName = '/files/' . time() . '_' . $file->getClientOriginalName();
        $filePath = $file->storeAs('/public/storage', $fileName);
        $filePath = storage_path('app/public/storage/' . $filePath);
        chmod($filePath, 0644);

        return redirect()->back()->with('success', 'O arquivo foi enviado com sucesso.')
            ->with('file', $$file->getClientOriginalName());
    }

    /**
     * Display the specified resource.
     */
    public function show(Patients $patients)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Patients $patients)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePatientsRequest $request, Patients $patients)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Patients $patients)
    {
        //
    }
}
