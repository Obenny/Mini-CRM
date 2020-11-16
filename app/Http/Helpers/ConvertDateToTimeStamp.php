<?php


namespace App\Http\Helpers;
use Carbon\Carbon;


class ConvertDateToTimeStamp
{
    public static function convertDateToTimeStamp($date)
    {
        return Carbon::createFromFormat('Y-m-d H:i:s', $date)->format('d-m-Y H:i:s');
    }
}
