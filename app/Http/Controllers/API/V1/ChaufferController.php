<?php

namespace App\Http\Controllers\API\V1;

use App\Models\Chauffer;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\Resources\ChaufferRequest;

class ChaufferController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        //$chauffer = Chauffer::latest()->paginate(2);

       // return $this->sendResponse($chauffer, 'Chauffer list');

       $chauffer = Chauffer::orderBy('name')->get();

       return response()->json($chauffer);
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
     * @param  \App\Http\Requests\Resources\ChaufferRequest  $request
     *
     *
     * @return \Illuminate\Http\Response
     */
    public function store(ChaufferRequest $request)
    {
        $chauffer = Chauffer::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'phone' => $request['phone'],
            'postalcode' => $request['postalcode'],
            'emergencynumber' => $request['emergencynumber'],
            'city' => $request['city']
        ]);
        return $this->sendResponse($chauffer, 'Chauffer Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Chauffer  $chauffer
     * @return \Illuminate\Http\Response
     */
    public function show(Chauffer  $chauffer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Chauffer  $chauffer
     * @return \Illuminate\Http\Response
     */
    public function edit(Chauffer  $chauffer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Chauffer  $chauffer
     * @return \Illuminate\Http\Response
     */
    public function update(ChaufferRequest $request, $id)
    {
        $chauffer = Chauffer::findOrFail($id);

        $chauffer->update($request->all());

        return $this->sendResponse($chauffer, 'Chauffer has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Chauffer  $chauffer
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

       // $this->authorize('isAdmin');

        $chauffer = Chauffer::findOrFail($id);
        // delete the user

        $chauffer->delete();

        return $this->sendResponse([$chauffer], 'Chauffer has been Deleted');
    }
}
