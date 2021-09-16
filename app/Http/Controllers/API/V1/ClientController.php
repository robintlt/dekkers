<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Models\Client;
use App\Model\Contact;
use Illuminate\Http\Request;
//use App\Http\Requests\Clients\ClientRequest;
use DB;
class ClientController extends BaseController
{
   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$client = Client::all();
        //::orderBy('start_date', 'ASC')
        $client = Client::orderBy('klantnaam')->get();

        return response()->json($client);
        
        //
      //  $address = Laadadressen::latest()->paginate(2);

       // return $this->sendResponse($address, 'Laadadressen list');
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
        
        return response()->json('Client created!');
       
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
      $client = Client::select('clients.*', 'contacts.*')
       ->join('contacts', 'clients.id', '=', 'contacts.client_id')
       ->where('clients.id', '=', $id)
       ->get(); 
        return response()->json($client);
        //
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
        $client = Client::findOrFail($id);

        $client->update($request->all());

        return $this->sendResponse($client, 'Cliet has been updated');
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

        $client = Client::findOrFail($id);
        // delete the user

        $client->delete();

        return $this->sendResponse([$client], 'Client has been Deleted');
    }

}
