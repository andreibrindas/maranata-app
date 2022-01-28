<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index() {
        
        $user_name = Auth::user()->name;

        $query = Service::query();
        $columns = ['video_mixer', 'proiectie', 'camera_1', 'camera_2', 'camera_3', 'sunet'];

        foreach($columns as $column) {
            $query->orWhere($column, 'LIKE', '%' . $user_name . '%');
        }

        $services = $query->get();

        
        if(Auth::user()->hasRole('admin')) {


            return view('admindash', [
                'services' => $services
            ]);
        } elseif (Auth::user()->hasRole('user')) {
            return view('dashboard', [
                'services' => $services
            ]);
        }

    }
}
