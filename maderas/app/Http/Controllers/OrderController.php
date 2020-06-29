<?php

namespace App\Http\Controllers;
use App\Order;
use App\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orden = DB::table('orders')
        ->join('order_status','order_status.PK_order_status','=','orders.status')
        ->join('shipments','orders.id_shipment','=','shipments.PK_shipments' )
        ->join('shipment_status','shipment_status.PK_shipment_status','=','shipments.status')
        ->join('users','orders.id_user','=','users.id' )
        ->join('persons','users.id_person','=','persons.PK_persons')
        ->select('orders.total','order_status.status_name as statusOrder','shipments.subtotal',
        'persons.first_name','persons.last_name','shipment_status.name as statusShipments')
        ->where('order_status.status_name', '=', 'Entregado','orshipment_status.name','shipment_status.name', '=', 'Entrgado')
        ->distinct()
        ->get();

        return $orden;
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
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
    public function destroy($id)
    {
        //
    }
}
