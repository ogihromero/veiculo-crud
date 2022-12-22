<?php

namespace App\Http\Controllers;

use App\Models\Vehicle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;

class VehicleController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vehicles = Vehicle::where('user_id', Auth::id())->get();
        return View::make('vehicles.index')->with('vehicles', $vehicles);
    }

    public function create()
    {
        return View::make('vehicles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'model' =>'required|max:255',
            'brand' =>'required|max:255',
            'version' =>'required|max:255',
            'year' =>'required|integer|min:1900|max:'.now()->year,


        ]);
        Vehicle::create($request->all() + ['user_id'=> Auth::id()]);
        
        return redirect()->route('vehicles.index')->with('success', 'Vehicle created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Vehicle  $vehicle
     * @return \Illuminate\Http\Response
     */
    public function show(Vehicle $vehicle)
    {
        return view('vehicles.show', compact('vehicle'));
    }

    public function edit(Vehicle $vehicle)
    {
        return view('vehicles.edit', compact('vehicle'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Vehicle  $vehicle
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Vehicle $vehicle)
    {
        $request->validate([
            'model' =>'required|max:255',
            'brand' =>'required|max:255',
            'version' =>'required|max:255',
            'year' =>'required|integer|min:1900|max:'.now()->year,


        ]);
        $vehicle->update($request->all() + ['user_id'=> Auth::id()]);
        return redirect()->route('vehicles.index')->with('success', 'Veículo atualizado com sucesso.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Vehicle  $vehicle
     * @return \Illuminate\Http\Response
     */
    public function destroy(Vehicle $vehicle)
    {
        $vehicle->delete();
        return redirect()->route('vehicles.index')
                        ->with('success','Veículo apagado com sucesso');
    }
}
