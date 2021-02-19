<?php

namespace App\Http\Controllers;

use App\Exports\AgentsExport;
use Illuminate\Http\Request;
use App\Models\Agent;
use PDF;
// use Excel;
use Illuminate\Support\Facades\File;
use Maatwebsite\Excel\Excel;

class ExportAgents
{
    public function __invoke(Request $request)
    {
        if ($request->has('download')) {
            if ($request->get('download') === 'pdf') {
                return $this->exportPDF();
            }

            if ($request->get('download') === 'csv') {
                return $this->exportCSV();
            }

            if ($request->get('download') === 'assets') {
                return $this->exportAssets();
            }
        }

        $agents = Agent::all();

        return view('pdf.agents.list', compact('agents'));
    }

    public function exportAssets()
    {
        $agents = Agent::verified()->get();

        if (! File::isDirectory(public_path('agents'))) {
            File::makeDirectory(public_path('agents'));
        }

        $agents->each(function ($agent) {
            $imagePath = storage_path('app/public/' . $agent->profile_photo_path);
            $image = \Image::make($imagePath);
            $image->save(public_path('agents/' . $agent->code.'_'.$agent->first_name . ' ' . $agent->last_name . '.' . File::extension($agent->profile_photo_path)));
        });

        $zip = new \ZipArchive();
        $fileName = 'observateurs.zip';

        if ($zip->open(public_path($fileName), \ZipArchive::CREATE) !== true) {
            return response()->json(['success' => false, 'message' => 'Impossible de creer l\'archive']);
        }

        $files = File::files(public_path('agents'));

        foreach ($files as $key => $value) {
            $relativeNameInZipFile = basename($value);
            $zip->addFile($value, $relativeNameInZipFile);
        }

        $zip->close();

        return response()->download(public_path($fileName));
    }

    public function exportCSV()
    {
        return (new AgentsExport())->download('observateurs.csv', Excel::CSV, ['Content-Type' => 'text/csv']);
    }

    public function exportPDF()
    {
        $agents = Agent::all();

        view()->share('agents', $agents);

        $pdf = PDF::loadView('pdf.agents.list');

        return $pdf->stream('observateurs.pdf');
    }
}
