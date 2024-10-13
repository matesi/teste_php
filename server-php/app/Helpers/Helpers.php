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