<?php

namespace App\Http\Controllers\API\V1;

use App\Models\Truck;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\Resources\TruckRequest;

class TruckController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
      //  $truck = Truck::latest()->paginate(2);

       // return $this->sendResponse($truck, 'Truck list');
        $truck = Truck::orderBy('license_plate')->get();

        return response()->json($truck);
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
     * @param  \App\Http\Requests\Resources\TruckRequest  $request
     *
     *
     * @return \Illuminate\Http\Response
     */
    public function store(TruckRequest $request)
    {
          $truck = Truck::create([
            'license_plate' => $request['license_plate'],
            'truck_name_or_number' => $request['truck_name_or_number'],
            'fleetnummer' => $request['fleetnummer'],
            'brand' => $request['brand'],
            'model' => $request['model']
        ]);
        return $this->sendResponse($truck, 'Truck Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Truck  $truck
     * @return \Illuminate\Http\Response
     */
    public function show(Truck $truck)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Truck $truck
     * @return \Illuminate\Http\Response
     */
    public function edit(Truck $truck)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Resources\TruckRequest  $request
     * @param  \App\Models\Truck $truck
     * @return \Illuminate\Http\Response
     */
    public function update(TruckRequest $request, $id)
    {
        $truck = Truck::findOrFail($id);

        $truck->update($request->all());

        return $this->sendResponse($truck, 'Truck has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Truck $truck
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

       // $this->authorize('isAdmin');

        $user = Truck::findOrFail($id);
        // delete the user

        $user->delete();

        return $this->sendResponse([$user], 'Truck has been Deleted');
    }
}
