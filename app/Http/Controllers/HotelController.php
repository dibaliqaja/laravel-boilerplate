<?php

namespace App\Http\Controllers;

use App\Hotel;
use Illuminate\Http\Request;

class HotelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $per_page = $request->per_page ? $request->per_page : 10;
        $page     = $request->page ? $request->page : 1;
        $order_by = $request->order_by ? $request->order_by : 'asc';
        $sort_by  = $request->sort_by ? $request->sort_by : 'created_at';
        $search   = $request->search;

        $hotel  = Hotel::query();
        $hotels = $hotel->orderBy($sort_by, $order_by)
                         ->where('name', 'LIKE', "%{$search}%")
                         ->paginate($per_page);

        $response = [
            'status'    => 'success',
            'message'   => 'Success Query All Hotels',
            'per_page'  => $per_page,
            'page'      => $page,
            'order_by'  => $order_by,
            'sort_by'   => $sort_by,
            'search'    => $search,
            'data'      => $hotels->items()
        ];

        return response($response, 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name'      => 'required',
            'address'   => 'required',
            'latitude'  => 'required',
            'longitude' => 'required'
        ]);

        $name       = $request->input('name');
        $address    = $request->input('address');
        $latitude   = $request->input('latitude');
        $longitude  = $request->input('longitude');

        $hotel = [
            'name'      => $name,
            'address'   => $address,
            'latitude'  => $latitude,
            'longitude' => $longitude
        ];

        Hotel::create($hotel);

        $response = [
            'status'    => 200,
            'message'   => $name . ' is successfully created',
            'data'      => $hotel
        ];

        return response($response);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $hotel = Hotel::whereId($id)->first();

        $response = [
            'status'    => 200,
            'message'   => $hotel->name . ' is successfully retrieved',
            'data'      => $hotel
        ];

        return response($response);
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
        $this->validate($request, [
            'name'      => 'required',
            'address'   => 'required',
            'latitude'  => 'required',
            'longitude' => 'required'
        ]);

        $name       = $request->input('name');
        $address    = $request->input('address');
        $latitude   = $request->input('latitude');
        $longitude  = $request->input('longitude');

        $hotel = [
            'name'      => $name,
            'address'   => $address,
            'latitude'  => $latitude,
            'longitude' => $longitude
        ];

        Hotel::whereId($id)->update($hotel);

        $response = [
            'status'    => 200,
            'message'   => $name . ' is successfully updated',
            'data'      => $hotel
        ];

        return response($response);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $hotel = Hotel::findOrFail($id);
        $hotel->delete();

        $response = [
            'status'    => 200,
            'message'   => $hotel->name . ' is successfully deleted'
        ];

        return response($response);
    }
}
