<?php
function generateAbn($random_number = null)
{
    $random_number = str_pad(($random_number ?? rand(1, 999999999)), 9, '0', STR_PAD_LEFT);
    $abn = "10" . $random_number;
    $weights = [10, 1, 3, 5, 7, 9, 11, 13, 15, 17, 19];
    $sum = 0;
    foreach ($weights as $position => $weight) {
        $digit = $abn[$position] - ($position ? 0 : 1);
        $sum += $weight * $digit;
    }
    return ((89 - ($sum % 89)) + 10) . $random_number;
}
printf(generateAbn());
?>