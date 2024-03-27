<?php

namespace App\Http\Controllers\Admin\Report;

use App\Http\Controllers\Controller;
use App\Http\Requests\Report\ReportYearRequest;
use App\Models\AnnualReport;
use App\Models\MonthlyReport;
use App\Models\ReportYear;
use Illuminate\Http\Request;
use SebastianBergmann\CodeCoverage\Report\Xml\Report;

class ReportYearController extends Controller
{
    public function index()
    {
        $years = ReportYear::where('destroy', 0)->orderByDesc('value')->get();
        $path = '/admin/report/year';
        $lang = ['az' => $path, 'en' => '/en' . $path, 'ru' => '/ru' . $path];
        return view('admin-panel.report.year.index', compact('lang', 'years'));
    }
    public function create()
    {
        $path = '/admin/report/year/create';
        $lang = ['az' => $path, 'en' => '/en' . $path, 'ru' => '/ru' . $path];
        return view('admin-panel.report.year.add', compact('lang'));
    }
    public function store(ReportYearRequest $request)
    {
        $valueExist = ReportYear::where('value', $request['value'])->where('destroy', 0)->first();
        if($valueExist){
            return redirect()->back()->with('report_year_exist_message', 'true');
        }
        ReportYear::create([
            'value' => $request['value']
        ]);
        return redirect()->route('admin.report.year.index')->with('store_message', 'true');
    }
    public function destroy(string $id)
    {
        $year = ReportYear::where('id', $id)->first();
        $year->destroy = 1;
        $year->save();

        AnnualReport::where('year', $year['value'])->update(['destroy' => 1]);
        MonthlyReport::where('year', $year['value'])->update(['destroy' => 1]);
        return redirect()->route('admin.report.year.index')->with('delete_message','true');
    }
}
