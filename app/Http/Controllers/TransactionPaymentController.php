<?php

namespace App\Http\Controllers;

use App\transaction_payment;
use App\booking_detail;
use App\business;
use Illuminate\Http\Request;
use Auth;
use Storage;

class TransactionPaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index_spAdmin()
    {
      return view('transaction/status_trans',['status_spadmin'=>booking_detail::all()]);
    }

    public function invoice_final(booking_detail $id_booking)
    {
      return view('transaction/payment_method', ['booking_detail'=>$id_booking]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\transaction_payment  $transaction_payment
     * @return \Illuminate\Http\Response
     */
    public function show(transaction_payment $transaction_payment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\transaction_payment  $transaction_payment
     * @return \Illuminate\Http\Response
     */
    public function edit(transaction_payment $transaction_payment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\transaction_payment  $transaction_payment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, transaction_payment $transaction_payment)
    {
      if($request->bukti_transfer){
        $path = $request->bukti_transfer->store('transaction','public');
      }else {
        $path = '';
      }

      $transaction_payment->tgl_transfer = date("Y-m-d H:i:s", strtotime('+7 hours'));
      $transaction_payment->bukti_transfer = $path;
      $transaction_payment->save();

      return redirect(route('index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\transaction_payment  $transaction_payment
     * @return \Illuminate\Http\Response
     */
    public function destroy(transaction_payment $transaction_payment)
    {
        //
    }
}
