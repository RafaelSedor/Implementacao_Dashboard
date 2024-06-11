<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $dashboard = DB::table('dashboard')->first();

        if (!$dashboard) {
            return response()->json(['message' => 'No data found'], 404);
        }

        $data = [
            'totalUsers' => $dashboard->totalUsers,
            'activeUsers' => $dashboard->activeUsers,
            'recentActivity' => json_decode($dashboard->recentActivity, true),
            'downloads' => json_decode($dashboard->downloads, true),
            'access' => json_decode($dashboard->access, true),
            'metrics' => json_decode($dashboard->metrics, true),
            'transactions' => json_decode($dashboard->transactions, true),
        ];

        return response()->json(['data' => $data]);
    }
}
