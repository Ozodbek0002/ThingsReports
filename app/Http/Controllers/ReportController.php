<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\History;

class ReportController extends Controller
{

    public function ReportHistory($from_date,$to_date){
        $histories = History::whereDate('created_at', '>=', $from_date)->whereDate('created_at', '<=',$to_date)->get();

//        return view('admin.transactions.reports', [
//            'histories' => $histories,
//        ]);

        $pdf = Pdf::loadView('admin.transactions.reports', compact("histories","from_date","to_date"));
        return $pdf->download('report.pdf');

    }
}
