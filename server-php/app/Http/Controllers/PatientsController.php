<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePatientsRequest;
use App\Http\Requests\UpdatePatientsRequest;
use App\Models\Patients;
use Illuminate\Http\RedirectResponse;
use Maatwebsite\Excel\Facades\Excel;

class PatientsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('Patients.store');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePatientsRequest $request): RedirectResponse
    {
        $file = $request->file('file');
        $fileName = time() . '_' . $file->getClientOriginalName();
        $request->file->move(public_path('storage/files'), $fileName);
        // return Redirect::route('patients/verify');
        return redirect('patients/verify')->with('success', 'O arquivo foi enviado com sucesso.');
    }

    /**
     * Display the specified resource.
     */
    public function verify($file = '1728863718_202404 - DADOS - 202404 - DADOS.csv')
    {
        $filePathToRead = public_path('storage/files');

        $getCsvData = file_get_contents($filePathToRead . '/' . $file);
        $csvData = array_map('str_getcsv', explode("\n", $getCsvData));
        dd($csvData);
        

        //return view('Patients.verify', ['patients' => $csvData]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function insert()
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Patients $patients)
    {
        $filePathToRead = 'storage/app/public/files';
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
