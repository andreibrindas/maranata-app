<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Service;
use App\Models\Programare;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $services = Service::all();

        return view('services.index', [
            'services' => $services
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::all();
        return view('services.create', [
            'users' => $users
        ]);
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
            'date' => 'required',
            'video_mixer' => 'required',
            'sunet' => 'required'
        ]);

        $roles = ['video_mixer', 'proiectie', 'camera_1', 'camera_2', 'camera_3', 'sunet'];

        foreach ($roles as $role) {
            if ($request->input($role)) {
                var_dump($request->input($role));
                Programare::create([
                    'user_id'   => $request->input($role),
                    'date'      => $request->input('date'),
                    'role'      => $role,
                ]);
            }
        }
        // die();

        $service = Service::create([
            'date'          => $request->input('date'),
            'video_mixer'   => $request->input('video_mixer'),
            'proiectie'     => $request->input('proiectie'),
            'camera_1'      => $request->input('camera_1'),
            'camera_2'      => $request->input('camera_2'),
            'camera_3'      => $request->input('camera_3'),
            'sunet'         => $request->input('sunet'),
        ]);

      

        return redirect('/services');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function show(Service $service)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function edit(Service $service)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Service $service)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function destroy(Service $service)
    {
        $service->delete();
        return redirect('/services');
    }
}
