<?php

namespace App\Http\Controllers\API\V1;

use App\Models\Laadadressen;
//use Illuminate\Http\Request;
//use App\Http\Requests\Resources\LaadadressRequest;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\Resources\LaadadressRequest;

class LaadadressenController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        //$address = Laadadressen::latest()->paginate(2);

        //return $this->sendResponse($address, 'Laadadressen list');
        $address = Laadadressen::orderBy('bedrijfsnaam')->get();

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
     * @param  \App\Http\Requests\Resources\LaadadressRequest  $request
     *
     *
     * @return \Illuminate\Http\Response
     */
    public function store(LaadadressRequest $request)
    {
       $user = Laadadressen::create([
            'bedrijfsnaam' => $request['bedrijfsnaam'],
            'address' => $request['address'],
            'postcode' => $request['postcode'],
            'city' => $request['city'],
            'description' => $request['description'],
            'document' => $request['document'],
            'land' => $request['land'],
            'url' => $request['url']
        ]);
        // $imageName = time().'.'.$request->uploadfile->getClientOriginalExtension();
        // $request->uploadfile->move(public_path('images'), $imageName);

        return $this->sendResponse($user, 'Laadadressen Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Laadadressen  $laadadressen
     * @return \Illuminate\Http\Response
     */
    public function show(Laadadressen $laadadressen)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Laadadressen  $laadadressen
     * @return \Illuminate\Http\Response
     */
    public function edit(Laadadressen $laadadressen)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Laadadressen  $laadadressen
     * @return \Illuminate\Http\Response
     */
    public function update(LaadadressRequest $request, $id)
    {
        $user = Laadadressen::findOrFail($id);

        $user->update($request->all());

        return $this->sendResponse($user, 'Laadadressen has been updated');
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

        $user = Laadadressen::findOrFail($id);
        // delete the user

        $user->delete();

        return $this->sendResponse([$user], 'Laadadressen has been Deleted');
    }
}
