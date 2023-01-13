<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Renter;
use App\Http\Requests\StoreRenterRequest;
use App\Http\Requests\UpdateRenterRequest;

class RenterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $renters = Renter::all();
        return response()->json($renters);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRenterRequest $request)
    {
        $renter = new Renter();
        $renter->fill($request->all());
        $renter->save();
        return response()->json($renter, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $renter = Renter::find($id);
        if (is_null($renter)) {
            return response()->json(["message"=>"ID not found"], 404);
        }
        return response()->json($renter);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRenterRequest $request, $id)
    {
        $renter = Renter::find($id);
        if (is_null($renter)) {
            return response()->json(["message"=>"ID not found"], 404);
        }
        $renter->fill($request->all());
        $renter->save();
        return response()->json($renter);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $renter = Renter::find($id);
        if (is_null($renter)) {
            return response()->json(["message"=>"ID not found"], 404);
        }
        Renter::destroy($id);
        return response()->noContent();
    }
}
