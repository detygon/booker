<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Agent;
use Dompdf\Dompdf;
use Dompdf\Options;
use PDF;

class ExportAgents
{
    public function __invoke(Request $request)
    {
        $agents = Agent::all();

        view()->share('agents', $agents);

        if ($request->has('download')) {
            $pdf = PDF::loadView('pdf.agents.list');

            return $pdf->stream('observateurs.pdf');
        }

        return view('pdf.agents.list');
    }
}
