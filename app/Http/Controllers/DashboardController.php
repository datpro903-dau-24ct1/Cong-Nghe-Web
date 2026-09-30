<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Customer;
use App\Models\Room;
use App\Models\Service;

class DashboardController extends Controller
{
    public function index()
    {
        $totalRooms = Room::count();

        $availableRooms = Room::where('status', 'available')->count();

        $occupiedRooms = Room::where('status', 'occupied')->count();

        $maintenanceRooms = Room::where('status', 'maintenance')->count();

        $totalCustomers = Customer::count();

        $totalBookings = Booking::count();

        $totalServices = Service::count();

        $revenue = Booking::whereIn('status', [
            'confirmed',
            'checked_in',
            'checked_out'
        ])->sum('total_amount');

        $recentBookings = Booking::with('customer')
            ->latest()
            ->take(5)
            ->get();

        return view('dashboard', compact(
            'totalRooms',
            'availableRooms',
            'occupiedRooms',
            'maintenanceRooms',
            'totalCustomers',
            'totalBookings',
            'totalServices',
            'revenue',
            'recentBookings'
        ));
    }
}