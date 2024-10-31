<?php

use Carbon\Carbon;

if (!function_exists('formatDateFromDB')) {
    function formatDateFromDB($dateToFormat = '', $format = 'd/m/Y')
    {
        if ($dateToFormat == '' || $dateToFormat == null)
            return;

        return Carbon::parse($dateToFormat)->format($format);
    }
}

if (!function_exists('formatDateToDB')) {
    function formatDateToDB($dateToDb = '')
    {
        if ($dateToDb == '' || $dateToDb == null) {
            return;
        }

        $dateToDb = preg_replace('/(\/)/', '-', $dateToDb);
        return date('Y-m-d\TH:i', strtotime($dateToDb));
    }
}

if (!function_exists('nameUploadFile')) {
    function nameUploadFile($file)
    {
        $fileName = strtolower(time() . '_' . str()->random(5) . '_' . preg_replace('/([^A-Za-z0-9-_.]|( ))/', '_', $file->getClientOriginalName()));

        return $fileName;
    }
}

if (!function_exists('VerifyNamesCsvColumns')) {
    function VerifyNamesCsvColumns($verifyHeaders): array
    {
        $headers = array_map('trim', explode(',', env('CORRET_CSV_COLUMNS')));
        $errorMessage = 'O arquivo selecionado não contém os seguintes cabecalhos: ';
        $errorColumns = 0;
        $returnStatusCode = 200;

        foreach ($verifyHeaders as $key => $value) {
            if ($headers[$key] != $value) {
                $errorColumns++;
                $statusCode = 400;
                $errorMessage = $errorMessage . ($key > 0 ? ', ' : '') . $headers[$key];
            }
        }

        $returnMessage = $errorColumns > 0 ? $errorMessage : 'Ok';

        return [
            'statusCode' => $returnStatusCode,
            'message' => $returnMessage
        ];
    }
}