<?php

namespace App\Http\Controllers;

use App\Models\Agent;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __invoke()
    {
        $totalAgentCount = Agent::count();
        $totalVerifiedAgentCount = Agent::verified()->count();

        return view('dashboard', compact('totalAgentCount', 'totalVerifiedAgentCount'));
    }
}
