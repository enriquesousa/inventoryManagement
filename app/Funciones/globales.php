<?php

use Illuminate\Support\Carbon;

// Convertir Currency a Numero Float
if(!function_exists('getAmount')){
    function getAmount($money)
    {
        $cleanString = preg_replace('/([^0-9\.,])/i', '', $money);
        $onlyNumbersString = preg_replace('/([^0-9])/i', '', $money);

        $separatorsCountToBeErased = strlen($cleanString) - strlen($onlyNumbersString) - 1;

        $stringWithCommaOrDot = preg_replace('/([,\.])/', '', $cleanString, $separatorsCountToBeErased);
        $removedThousandSeparator = preg_replace('/(\.|,)(?=[0-9]{3,}$)/', '',  $stringWithCommaOrDot);

        return (float) str_replace(',', '.', $removedThousandSeparator);
    }
}


// Para convertir numero en moneda
if(!function_exists('formatMoneda')){
    function formatMoneda($moneda)
    {
        return "$ ".number_format(sprintf('%0.2f', preg_replace("/[^0-9.]/", "", $moneda)),2);
    }
}

// Para regresar uan fecha en formato: "13 de Marzo, 2024".
if(!function_exists('formatFecha1')){
    function formatFecha1($fecha)
    {
        $dia = Carbon::parse($fecha)->locale('es')->isoFormat('D');
        $mes = ucfirst(Carbon::parse($fecha)->locale('es')->isoFormat('MMMM'));
        $año = Carbon::parse($fecha)->locale('es')->isoFormat('YYYY');
        // $fecha = Carbon::parse($fecha)->locale('es')->isoFormat('D [de] MMMM[,] YYYY');
        $fecha = $dia.' de '.$mes.', '.$año;
        return $fecha;
    }
}

