<?php

namespace App\Http\Controllers;

use App\Models\Vehicle;
use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        

        $vehicles = Vehicle::select('*')->where('vStatus','=','2')->get();
        
        return view('parking.transaction', compact('vehicles'));
        
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($vId)
    {
        // dd($transaction);
        $transaction = DB::table('transaction')->join('transaction', 'transaction.vId', 'transaction.vId')->where('transaction.vId', $vId)->get();
        $transaction = DB::table('vehicle')->join('vehicle', 'vehicle.vId', 'vehicle.tId')->where('vehicle.tId', $tId)->get();
        
        // // foreach($order as $key => $value) {
        // //     dd($value->order_id);
        // // }
        
         return view('transaction.modals.view', compact('transaction', 'transaction'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(transaction $transaction)
    {
        //
        return view('transaction.edit', compact('transaction'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */ 
        public function destroy(Transaction $transaction)
        {
            $transaction->delete();
    
            return redirect('/transaction');   
        }
    
}
