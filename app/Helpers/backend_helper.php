<?php

use Illuminate\Http\Request;

function showApproved($approve_reject_status)
{
    switch ($approve_reject_status) {
        case 0:
            return '<i class="fa fa-exclamation-triangle"></i>';
            break;
        case 1:
            return '<i class="fa fa-thumbs-up"></i>';
            break;
        case 2:
            return '<i class="fa fa-thumbs-down"></i>';
            break;
    }
}