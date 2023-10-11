<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function index()
    {
        return view('payment.payment');
    }
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => 'required',
            'cardnumber' => 'required',
            'expdate' => 'required',
            'cvv' => 'required',
        ]);
        return redirect('payment.payment');
    }

}