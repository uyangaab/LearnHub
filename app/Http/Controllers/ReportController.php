<?php

namespace App\Http\Controllers;

use App\Models\Report;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function index()
    {
        $reports = Report::where('student_id', auth()->user()->id)->get();
        return view('reports.index', compact('reports'));
    }
}
