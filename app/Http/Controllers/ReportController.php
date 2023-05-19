<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\History;

class ReportController extends Controller
{

    public function ReportHistory($from_date,$to_date){
        $histories = History::whereDate('created_at', '>=', $from_date)->whereDate('created_at', '<=',$to_date)->get();


        $pdf = Pdf::loadView('admin.transactions.reports', compact("histories","from_date","to_date"));
        return $pdf->download('report.pdf');

    }

    public function ReportProduct($from_date,$to_date){
        dd($from_date,$to_date);
        $products = Product::whereDate('created_at', '>=', $from_date)->whereDate('created_at', '<=',$to_date)->get();

        $pdf = Pdf::loadView('admin.products.reports', compact("products","from_date","to_date"));
        return $pdf->download('report.pdf');

    }
}
