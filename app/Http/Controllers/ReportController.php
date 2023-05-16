<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReportController extends Controller
{

    public function ReportHistory(Request $request){
        $histories = History::whereDate('created_at', '>=', $request->from_date)->whereDate('created_at', '<=', $request->to_date)->paginate(10);

        return view('admin.transactions.index', [
            'histories' => $histories,
        ]);


    }
}
