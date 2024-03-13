<?php


if(!function_exists('getAmount')){

    // Convertir Currency a Numero Float
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


if(!function_exists('formatMoneda')){

    // Para convertir numero en moneda
    function formatMoneda($moneda)
    {
        return "$ ".number_format(sprintf('%0.2f', preg_replace("/[^0-9.]/", "", $moneda)),2);
    }

}