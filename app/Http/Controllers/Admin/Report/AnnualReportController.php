<?php

namespace App\Http\Controllers\Admin\Report;

use App\Http\Controllers\Controller;
use App\Models\AnnualReport;
use Illuminate\Http\Request;

class AnnualReportController extends Controller
{
    public function index()
    {
        $annual_reports = AnnualReport::where('destroy', 0)->orderByDesc('year')->get();
        $path = '/admin/report/annual_report';
        $lang = ['az' => $path, 'en' => '/en' . $path, 'ru' => '/ru' . $path];
        return view('admin-panel.report.annual_report.index', compact('lang', 'annual_reports'));
    }
}
