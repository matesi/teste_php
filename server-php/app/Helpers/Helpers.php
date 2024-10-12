<?php

use Carbon\Carbon;

if (!function_exists('formatDate')) {
    function formatDate($date = '', $format = 'Y-m-d')
    {
        if ($date == '' || $date == null)
            return;

        return Carbon::parse($date)->format($format);
    }
}

if (!function_exists('formatDateToDB')) {
    function formatDateToDB($date = '')
    {
        if ($date == '' || $date == null)
            return;

        return Carbon::createFromFormat('Y-m-d\TH:i', strtotime($date));
    }
}