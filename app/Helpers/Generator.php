<?php

function generateLoanNo() {
    return 'CWLN'.mt_rand(100000000000, 999999999999);
}

function generateWithdrawNo() {
    return 'CWWD'.mt_rand(100000000000, 999999999999);
}

function generateFlutterwaveTransactionNo() {
    return 'CWFW'.mt_rand(100000000000, 999999999999);
}

function generateBudPayTransactionNo() {
    return 'CWBP'.mt_rand(100000000000, 999999999999);
}

function generateRefundTransactionNo() {
    return 'CWRF'.mt_rand(100000000000, 999999999999);
}
