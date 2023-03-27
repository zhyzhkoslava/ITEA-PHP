<?php

$countries = 'Ukraine,USA,Canada,Germany,Spain,Argentina';

function sortStringItems(string $countries, string $delimiter = ',')
{
    $explodeStringArray = explode($delimiter, $countries);
    sort($explodeStringArray);
    $sortedString = implode($delimiter, $explodeStringArray);

    return $sortedString;
}

echo sortStringItems($countries);