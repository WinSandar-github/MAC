<?php

namespace App\Http\Controllers\ReportController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Invoice;

class PaymentReportController extends Controller
{
    public function showPaymentList()
    {
        
         
        
        return view('reporting.payment.payment_list');
        
    }
}
