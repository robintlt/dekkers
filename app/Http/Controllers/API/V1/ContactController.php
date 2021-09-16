<?php

namespace App\Http\Controllers\API\V1;
use App\Http\Requests\Clients\ContactRequest;
//use App\Http\Requests\Clients\ClientRequest;
use App\Models\Contact;
use App\Models\Client;
use Illuminate\Http\Request;
use DB;
class ContactController extends BaseController
{

    protected $contact = '';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Contact $contact)
    {
        //$this->middleware('auth:api');
        $this->contact = $contact;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       // $products = $this->product->latest()->with('category', 'tags')->paginate(10);

       // return $this->sendResponse($products, 'Product list');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Requests\Products\ProductRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ContactRequest $request)
    { 
        $lastid = Client::orderBy('created_at', 'desc')->first();
       
       $contacts = json_decode($request->more);
        $count = count($contacts);
        

        for ($i=0; $i < $count; $i++) { 
            $contact = new Contact();
            $contact->naam = $contacts[$i]->naam;
            $contact->emailadres = $contacts[$i]->emailadres;
            $contact->client_id = $lastid['id'];
            $contact->telefoonnummer = $contacts[$i]->telefoonnummer;

            $contact->save();
        }
        return response()->json('Contact created!');
       
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       
       $contact = Contact::select('contacts.*')
      ->where('contacts.client_id',$id)
      ->get();
    
        return response()->json($contact);
       // return $this->sendResponse($product, 'Product Details');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {  // print_r($request->more);
        //$contacts = json_decode($request->more);
        
        //Contact::where('client_id', '=', $id)->get();
       
        $contacts = json_decode($request->more);
        
        $count = count($contacts);
        

        for ($i=0; $i < $count; $i++) { 
            $contact = new Contact();
            $contact = Contact::find($contacts[$i]->id);
            $contact->naam = $contacts[$i]->naam;
            $contact->emailadres = $contacts[$i]->emailadres;
            //$contact->client_id = $contacts[$i]->client_id;
            $contact->telefoonnummer = $contacts[$i]->telefoonnummer;
           // $user = DB::table('contacts')->where('client_id',$id)->update($contact);

            $contact->save();
        }
        return response()->json('Contact has been updated!');
      
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

      /*  $this->authorize('isAdmin');

        $product = $this->product->findOrFail($id);

        $product->delete();

        return $this->sendResponse($product, 'Product has been Deleted');
        */
    }

    
}
