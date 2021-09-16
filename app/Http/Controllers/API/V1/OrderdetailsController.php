<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Model\Orderdetails;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\Orders\OrderdetailsRequest;
use DB;
class OrderdetailsController extends BaseController
{
   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $orderdetails = Orderdetails::orderBy('order_num')->get();

        return response()->json($orderdetails);
        
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
     * @param  \App\Http\Requests\Resources\LaadadressRequest  $request
     *
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

         /*   $request->validate([
            'id' => 'required|unique:users',
    // .    'id' => 'required|exists:App\User,id', This works laravel 6 and up
            'body' => 'required',
        ]);
     $client = new Client([
            'klantnaam' => $request->input('klantnaam'),
            'adres' => $request->input('adres'),
            'postcode' => $request->input('postcode'),
            'plaats' => $request->input('plaats'),
            'kvk' => $request->input('kvk'),
            'btw_number' => $request->input('btw_number'),
            'user_id' => '1'

        ]);
        $client->save();
        //$insertedId = $client->id;
        
        return response()->json('Client created!'); */
       
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Laadadressen  $laadadressen
     * @return \Illuminate\Http\Response
     */
   
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Laadadressen  $laadadressen
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {  
/*       $client = Client::select('clients.*', 'contacts.*')
       ->join('contacts', 'clients.id', '=', 'contacts.client_id')
       ->where('clients.id', '=', $id)
       ->get(); 
        return response()->json($client);
        // */
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Laadadressen  $laadadressen
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $orderdetails = Orderdetails::findOrFail($id);

        $orderdetails->update($request->all());

        return $this->sendResponse($orderdetails, 'Orders has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Laadadressen  $laadadressen
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

       // $this->authorize('isAdmin');

        $orders = Orders::findOrFail($id);
        // delete the user

        $orders->delete();

        return $this->sendResponse([$orders], 'Orders has been Deleted');
    }


}
