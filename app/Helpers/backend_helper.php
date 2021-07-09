<?php

use Illuminate\Http\Request;

function showApproved($approve_reject_status)
{
    switch ($approve_reject_status) {
        case 0:
            return '<i class="fa fa-times-circle-o text-red"></i>';
            break;
        case 1:
            return '<i class="fa fa-check-circle text-green"></i>';
            break;
        case 2:
            return '<i class="fa fa-check-circle text-yellow"></i>';
            break;
    }
}