<?php

namespace App\Http\Controllers\Admin;

use App\Models\Land;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class LandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$lands = Land::all();
        $lands = DB::table('lands')->orderBy('id')->Paginate(5);

        return view('admin.lands.index', compact('lands'));
    }

    public function indexapi(){
        $lands = Land::get()->toJson(JSON_PRETTY_PRINT);
        return response($lands, 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.lands.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $landFields = $request->validate([
            'land_location' => ['required', 'min:3'],
            'land_size' => 'required',
            'land_price' => 'required',
            'land_description' => 'required',
        ]);

        Land::create($landFields);

        return to_route('admin.lands.index')->with('message', 'Land details added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Land $land)
    {
        //dd($land);
        return view('admin.lands.edit', compact('land'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Land $land)
    {
        //dd($land);
        $landFields = $request->validate([
            'land_location' => 'required',
            'land_size' => 'required',
            'land_price' => 'required',
            'land_description' => 'required',
        ]);

        $land->update($landFields);

        return to_route('admin.lands.index')->with('message', 'Land details updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($land)
    {
        dd($land);
    }
}
