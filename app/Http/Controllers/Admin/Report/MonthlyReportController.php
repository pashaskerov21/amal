<?php

namespace App\Http\Controllers\Admin\Report;

use App\Http\Controllers\Controller;
use App\Http\Requests\Report\MonthlyReportRequest;
use App\Models\AnnualReport;
use App\Models\MonthlyReport;
use App\Models\ReportMonth;
use App\Models\ReportYear;
use App\Models\Service;
use Illuminate\Http\Request;

class MonthlyReportController extends Controller
{
    public function index()
    {
        $monthly_reports = MonthlyReport::where('destroy', 0)->orderByDesc('year')->orderByDesc('month')->get();
        $path = '/admin/report/monthly_report';
        $lang = ['az' => $path, 'en' => '/en' . $path, 'ru' => '/ru' . $path];
        return view('admin-panel.report.monthly_report.index', compact('lang', 'monthly_reports'));
    }
    public function create()
    {
        $services = Service::where('destroy', 0)->orderBy('order')->get();
        $months = ReportMonth::where('destroy', 0)->orderBy('id')->get();
        $years = ReportYear::where('destroy', 0)->orderByDesc('value')->get();
        $path = '/admin/report/monthly_report/create';
        $lang = ['az' => $path, 'en' => '/en' . $path, 'ru' => '/ru' . $path];
        return view('admin-panel.report.monthly_report.add', compact('lang', 'services', 'months','years'));
    }
    public function store(MonthlyReportRequest $request)
    {
        $monthlyReportExist = MonthlyReport::where([
            'destroy' => 0,
            'service_id' => $request['service_id'],
            'year' => $request['year'],
            'month' => $request['month'],
        ])->first();
        if ($monthlyReportExist) {
            return redirect()->back()->with('monthly_report_exist_message', 'true');
        }
        $annualReport = AnnualReport::where([
            'destroy' => 0,
            'service_id' => $request['service_id'],
            'year' => $request['year'],
        ])->first();
        if ($annualReport) {
            $annualReport->main_value += $request['main_value'];
            $annualReport->total_amount += $request['total_amount'];
            $annualReport->save();
        } else {
            AnnualReport::create([
                'service_id' => $request['service_id'],
                'year' => $request['year'],
                'main_value' => $request['main_value'],
                'total_amount' => $request['total_amount'],
            ]);
        }
        MonthlyReport::create([
            'service_id' => $request['service_id'],
            'year' => $request['year'],
            'month' => $request['month'],
            'main_value' => $request['main_value'],
            'total_amount' => $request['total_amount'],
        ]);
        return redirect()->route('admin.report.monthly_report.index')->with('store_message', 'true');
    }
    public function edit(string $id)
    {
        $monthly_report = MonthlyReport::findOrFail($id);
        $services = Service::where('destroy', 0)->orderBy('order')->get();
        $months = ReportMonth::where('destroy', 0)->orderBy('id')->get();
        $years = ReportYear::where('destroy', 0)->orderByDesc('value')->get();
        $path = '/admin/report/monthly_report/edit/' . $id;
        $lang = ['az' => $path, 'en' => '/en' . $path, 'ru' => '/ru' . $path];
        return view('admin-panel.report.monthly_report.edit', compact('lang', 'monthly_report', 'services', 'months','years'));
    }
    public function update(MonthlyReportRequest $request, string $id)
    {
        $monthlyReportExist = MonthlyReport::where([
            'destroy' => 0,
            'service_id' => $request['service_id'],
            'year' => $request['year'],
            'month' => $request['month'],
        ])->first();
        if ($monthlyReportExist && $monthlyReportExist->id != $id) {
            return redirect()->back()->with('monthly_report_exist_message', 'true');
        }
        $monthly_report = MonthlyReport::findOrFail($id);
        
        $annualReport = AnnualReport::where([
            'destroy' => 0,
            'service_id' => $request['service_id'],
            'year' => $request['year'],
        ])->first();
        $annualReport_service = AnnualReport::where([
            'destroy' => 0,
            'service_id' => $monthly_report['service_id'],
        ])->first();
        $annualReport_year = AnnualReport::where([
            'destroy' => 0,
            'year' => $monthly_report['year'],
        ])->first();
        if($monthly_report['service_id'] != $request['service_id']){
            $annualReport_service->main_value -= $monthly_report['main_value'];
            $annualReport_service->total_amount -= $monthly_report['total_amount'];
        }
        if($annualReport_year['service_id'] != $request['service_id']){
            $annualReport_year->main_value -= $monthly_report['main_value'];
            $annualReport_year->total_amount -= $monthly_report['total_amount'];
        }
        if ($annualReport) {
            $annualReport->main_value -= $monthly_report['main_value'];
            $annualReport->total_amount -= $monthly_report['total_amount'];
            $annualReport->main_value += $request['main_value'];
            $annualReport->total_amount += $request['total_amount'];
            $annualReport->save();
        } else {
            AnnualReport::create([
                'service_id' => $request['service_id'],
                'year' => $request['year'],
                'main_value' => $request['main_value'],
                'total_amount' => $request['total_amount'],
            ]);
        }
        $monthly_report->update([
            'service_id' => $request['service_id'],
            'year' => $request['year'],
            'month' => $request['month'],
            'main_value' => $request['main_value'],
            'total_amount' => $request['total_amount'],
        ]);
        return redirect()->route('admin.report.monthly_report.index')->with('update_message', 'true');
    }
    public function destroy(string $id)
    {
        $monthly_report = MonthlyReport::findOrFail($id);
        $monthly_report->destroy = 1;
        $monthly_report->save();

        $current_monthly_reports = MonthlyReport::where([
            'destroy' => 0,
            'service_id' => $monthly_report['service_id'],
            'year' => $monthly_report['year'],
        ])->get();

        $annualReport = AnnualReport::where([
            'destroy' => 0,
            'service_id' => $monthly_report['service_id'],
            'year' => $monthly_report['year'],
        ])->first();

        if ($current_monthly_reports->count() === 0) {
            $annualReport->destroy = 1;
            $annualReport->save();
        } else {
            $annualReport->main_value -= $monthly_report['main_value'];
            $annualReport->total_amount -= $monthly_report['total_amount'];
            $annualReport->save();
        }

        return redirect()->route('admin.report.monthly_report.index')->with('delete_message', 'true');
    }
}
