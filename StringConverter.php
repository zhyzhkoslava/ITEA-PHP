<?php

const CONVERTER_MODE_STRTOUPPER = 1;
const CONVERTER_MODE_STRTOLOWER = 2;
const CONVERTER_MODE_UCFIRST = 3;
const CONVERTER_MODE_UCWORDS = 4;
const CONVERTER_MODE_INVERT_CASE = 5;

function convert(string $input, int $mode): string
{
    switch ($mode){
        case 1:
            $res = strtoupper($input);
            break;
        case 2:
            $res = strtolower($input);
            break;
        case 3:
            $res = ucfirst($input);
            break;
        case 4:
            $res = ucwords($input);
            break;
        case 5:
            $res = strtolower($input) ^ strtoupper($input) ^ $input;
            break;
    }

    return $res;
}

echo convert('hello world', CONVERTER_MODE_STRTOUPPER);