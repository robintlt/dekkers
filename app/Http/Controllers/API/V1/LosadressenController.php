<?php

namespace App\Http\Controllers\API\V1;

use App\Models\Losadressen;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\Resources\LosadressRequest;

class LosadressenController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
       // $address = Losadressen::latest()->paginate(2);

        //return $this->sendResponse($address, 'Losadressen list');
        $address = Losadressen::orderBy('bedrijfsnaam')->get();

        return response()->json($address);
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
     * @param  \App\Http\Requests\Resources\LosadressRequest  $request
     *
     *
     * @return \Illuminate\Http\Response
     */
    public function store(LosadressRequest $request)
    {
         $user = Losadressen::create([
            'bedrijfsnaam' => $request['bedrijfsnaam'],
            'address' => $request['address'],
            'postcode' => $request['postcode'],
            'city' => $request['city'],
            'description' => $request['description'],
            'land' => $request['land'],
            'url' => $request['url']
        ]);
        return $this->sendResponse($user, 'Losadressen Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Losadressen  $losadressen
     * @return \Illuminate\Http\Response
     */
    public function show(Losadressen $losadressen)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Losadressen  $losadressen
     * @return \Illuminate\Http\Response
     */
    public function edit(Losadressen $losadressen)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Losadressen  $losadressen
     * @return \Illuminate\Http\Response
     */
    public function update(LosadressRequest $request, $id)
    {
        $user = Losadressen::findOrFail($id);

        $user->update($request->all());

        return $this->sendResponse($user, 'Losadressen has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Losadressen  $losadressen
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

       // $this->authorize('isAdmin');

        $user = Losadressen::findOrFail($id);
        // delete the user

        $user->delete();

        return $this->sendResponse([$user], 'Losadressen has been Deleted');
    }
}
