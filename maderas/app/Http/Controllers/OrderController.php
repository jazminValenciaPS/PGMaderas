<?php

namespace App\Http\Controllers;
use App\Order;
use App\User;
use App\shipments;
use App\Addresse;
use Illuminate\Support\Facades\Auth;
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
        return $orden = DB::table('orders')
        ->join('order_status','order_status.PK_order_status','=','orders.status')
        ->join('shipments','orders.id_shipment','=','shipments.PK_shipments' )
        ->join('shipment_status','shipment_status.PK_shipment_status','=','shipments.status')
        ->join('users','orders.id_user','=','users.id' )
        ->join('persons','users.id_person','=','persons.PK_persons')
        ->select('orders.total','order_status.status_name as statusOrder','shipments.subtotal',
        'persons.first_name','persons.last_name','shipment_status.name as statusShipments')
        ->where('order_status.status_name', '=', 'Pendiente','or','shipment_status.name','shipment_status.name', '=', 'Pendiente')
        ->get();
        
    }

    public function store(Request $request)
    {
        $correo = $request->correo;

        $idUser1 = Auth::user()->id; //con esto te lo da :*
        print($idUser1);

        $shipments = new shipments();
        $order = new Order();
    
        $shipments->id_type = $request->id_type;
        $shipments->id_address = 1;
        $shipments->shipping_date = date("Y-m-d ");
        $shipments->shipping_time =  date("Y-m-d H:i:s",strtotime(date("Y-m-d H:i:s")."+ 1 days"));
        $shipments->subtotal = $request->subtotal;
        $shipments->status = 1;
        $shipments->save();

        $id_shipment= $shipments->PK_shipments;

        $order->id_user=$idUser1;
        $order->id_shipment = $id_shipment;
        $order->date = date("Y-m-d ");
        $order->time =date("H:i:s");
        $order->total = $request->total;
        $order->id_payment = $request->id_payment;
        $order->status = 1;
        $order->save();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
  

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
