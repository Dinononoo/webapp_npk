<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sensor;
use App\Models\SensorData;
use App\Models\User;
use App\Models\FertilizerCalculationHistory;
class SensorController extends Controller
{
    public function index()
    {
        $sensors = Sensor::with('user')->paginate(10);
        return view('admin.sensors.index', compact('sensors'));
    }

    public function create()
    {
        $users = User::where('role', 'user')->get();
        return view('admin.sensors.create', compact('users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'sensor_id' => 'required|string|max:255',
        ]);

        Sensor::create([
            'user_id' => $request->user_id,
            'sensor_id' => $request->sensor_id,
        ]);

        return redirect()->route('admin.sensors.index')->with('success', 'Sensor added successfully.');
    }

    public function edit(Sensor $sensor)
    {
        $users = User::where('role', 'user')->get();
        return view('admin.sensors.edit', compact('sensor', 'users'));
    }

    public function update(Request $request, Sensor $sensor)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'sensor_id' => 'required|string|max:255',
        ]);

        $sensor->update([
            'user_id' => $request->user_id,
            'sensor_id' => $request->sensor_id,
        ]);

        return redirect()->route('admin.sensors.index')->with('success', 'Sensor updated successfully.');
    }

    public function destroy(Sensor $sensor)
    {
        $sensor->delete();
        return redirect()->route('admin.sensors.index')->with('success', 'Sensor deleted successfully.');
    }

    //N P K admin
    public function showNpk()
    {
        $uniqueSensors = Sensor::paginate(10);
        return view('admin.npks.shownpk', compact('uniqueSensors'));
    }

    public function show($id)
    {
        $sensor = Sensor::with(['sensorData' => function ($query) {
            $query->paginate(10);
        }])->findOrFail($id);
    
        $sensorData = $sensor->sensorData()->paginate(10);
    
        return view('admin.npks.detail', compact('sensor', 'sensorData'));
    }
    

}
