<?php

function generateRequestNo($id) {
    $year = date('Y');
    $month = date('m');
    $padId = str_pad($id, 6, '0', STR_PAD_LEFT);
    return "PP$year-$month-$padId";
}
