<?php

namespace App\Http\Controllers\API\V1;

use App\Models\Trailer;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\Resources\TrailerRequest;

class TrailerController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        //$trailer = Trailer::latest()->paginate(2);

        //return $this->sendResponse($trailer, 'Trailer list');
        $trailer = Trailer::orderBy('license_plate')->get();

        return response()->json($trailer);
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
     * @param  \App\Http\Requests\Resources\TrailerRequest  $request
     *
     *
     * @return \Illuminate\Http\Response
     */
    public function store(TrailerRequest $request)
    {
       // $array=serialize($request['document']);
        //echo '<pre>';print_r($array);exit;
         $trailer = Trailer::create([
            'license_plate' => $request['license_plate'],
            'fleetnumber' => $request['fleetnumber'],
            'merk' => $request['merk'],
            'date_of_firstadmission' => $request['date_of_firstadmission'],
            'document' => $request['document'],

        ]);
        return $this->sendResponse($trailer, 'Trailer Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Trailer  $trailer
     * @return \Illuminate\Http\Response
     */
    public function show(Trailer  $trailer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Trailer  $trailer
     * @return \Illuminate\Http\Response
     */
    public function edit(Trailer  $trailer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Trailer  $trailer
     * @return \Illuminate\Http\Response
     */
    public function update(TrailerRequest $request, $id)
    {
        $trailer = Trailer::findOrFail($id);

        $trailer->update($request->all());

        return $this->sendResponse($trailer, 'Trailer has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Trailer  $trailer
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

       // $this->authorize('isAdmin');

        $trailer = Trailer::findOrFail($id);
        // delete the user

        $trailer->delete();

        return $this->sendResponse([$trailer], 'Trailer has been Deleted');
    }
}
