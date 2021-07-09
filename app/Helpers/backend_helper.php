<?php

use Illuminate\Http\Request;

function showApproved($approve_reject_status)
{
    switch ($approve_reject_status) {
        case TRUE:
            return '<i class="fa fa-check-circle text-green"></i>';
            break;
        case FALSE:
            return '<i class="fa fa-times-circle-o text-red"></i>';
            break;
    }
}