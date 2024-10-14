<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePatientsRequest;
use App\Http\Requests\UpdatePatientsRequest;
use App\Models\Patients;
use Illuminate\Http\RedirectResponse;
use Request;

class PatientsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('Patients.storeForm');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePatientsRequest $request)
    {
        $file = $request->file('file');
        $fileName = time() . '_' . $file->getClientOriginalName();
        $request->file->move(public_path('storage/files'), $fileName);
        $filePathToRead = public_path('storage/files') . '/' . $fileName;
        $getCsvData = file_get_contents($filePathToRead);
        $csvData = array_map('str_getcsv', explode("\n", $getCsvData));
        $verifyHeaders = $csvData[0];
        $headers = ['nome1', 'nascimento', 'codigo', 'guia', 'entrada', 'saida'];
        $errorMessage = 'O arquivo selecionado não contém os seguintes cabecalhos: ';
        $messageView = 'O arquivo ' . $request->file->getClientOriginalName() . ' foi enviado com sucesso. Clique no botão Avançar (botão azul) para verificar o conteúdo do arquivo.';
        $classDivMessageView = 'alert-success';
        $disabled = '';
        $classButtonDisabled = '';

        foreach ($verifyHeaders as $key => $value) {
            //echo $value . "\n";
            if ($headers[$key] != $value) {
                $errorMessage = $errorMessage . ($key > 0 ? ', ' : '') . $headers[$key];
                $classDivMessageView = 'alert-danger';
                $disabled = 'disabled ';
                $classButtonDisabled = ' disabled-button';
            }
        }

        //dd($verifyHeaders);

        if ($classDivMessageView == 'alert-danger') {
            $messageView = $errorMessage;
        }

        return view('Patients.storeResponse', [
            'messageView' => $messageView,
            'classDivMessageView' => $classDivMessageView,
            'filenameInput' => $fileName,
            'disabled' => $disabled,
            'classButtonDisabled' => $classButtonDisabled
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function verify(Request $request)
    {
        $filePathToRead = public_path('storage/files') . '/' . Request::post('fileName');
        $getCsvData = file_get_contents($filePathToRead);
        $csvData = array_map('str_getcsv', explode("\n", $getCsvData));
        $csvHeaders = $csvData[0];
        $patients = [];

        foreach ($csvData as $key => $value) {
            if ($key > 0) {
                foreach ($csvHeaders as $keyHeader => $valueHeader) {
                    $patients[$key][$csvHeaders[$keyHeader]] = $value[$keyHeader];
                }
            }
        }
        // dd($patients);

        return view('Patients.verify', ['patients' => $patients, 'headers' => $csvHeaders]);
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
