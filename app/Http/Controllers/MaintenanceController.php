<?php

namespace App\Http\Controllers;

use App\Models\Maintenance;
use App\Models\Vehicle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;

class MaintenanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $maintenances = Maintenance::where('user_id', Auth::id())->orderBy('date', 'ASC')->get();
        return View::make('maintenances.index')->with('maintenances', $maintenances);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $vehicles = Vehicle::where('user_id', Auth::id())->get();
        return View::make('maintenances.create')->with('vehicles', $vehicles);
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
            'vehicle_id' => 'required',
            'date' => 'required|date|after:'.now()->addHours(2),

        ]
        );
        Maintenance::create($request->all() + ['user_id'=> Auth::id()]);
        return redirect()->route('maintenances.index')->with('success', 'Manutenção Agendada.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Maintenance  $maintenance
     * @return \Illuminate\Http\Response
     */
    public function show(Maintenance $maintenance)
    {
        return view('maintenances.show', compact('maintenance'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Maintenance  $maintenance
     * @return \Illuminate\Http\Response
     */
    public function edit(Maintenance $maintenance)
    {
        return view('maintenances.edit', compact('maintenance'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Maintenance  $maintenance
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Maintenance $maintenance)
    {
        $request->validate([
            'vehicle_id' => 'required',
            'date' => 'required|date|after:'.now()->addHours(2),

        ]
        );
        $maintenance->update($request->all() + ['user_id'=> Auth::id()]);
        return redirect()->route('maintenances.index')->with('success', 'Manutenção atualizada com sucesso.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Maintenance  $maintenance
     * @return \Illuminate\Http\Response
     */
    public function destroy(Maintenance $maintenance)
    {
        $maintenance->delete();
        return redirect()->route('maintenances.index')
                        ->with('success','Manutenção cancelada com sucesso');
    }
}
