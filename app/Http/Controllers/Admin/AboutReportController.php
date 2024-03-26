<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AboutReport;
use App\Models\AboutReportTranslate;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AboutReportController extends Controller
{
    public function index()
    {
        $about_reports = AboutReport::where('destroy', 0)->orderBy('order')->get();
        $path = '/admin/about_report';
        $lang = ['az' => $path, 'en' => '/en' . $path, 'ru' => '/ru' . $path];
        return view('admin-panel.about_report.index', compact('lang', 'about_reports'));
    }
    public function create()
    {
        $path = '/admin/about_report/create';
        $lang = ['az' => $path, 'en' => '/en' . $path, 'ru' => '/ru' . $path];
        return view('admin-panel.about_report.add', compact('lang'));
    }
    public function store(Request $request)
    {
        $maxOrder = AboutReport::max('order');
        $newOrder = ($maxOrder === null) ? 1 : $maxOrder + 1;
        $report_id = AboutReport::create([
            'value' => $request['value'] ?? 0,
            'order' => $newOrder,
        ])->id;
        for($i = 0; $i < count($request->lang); $i++){
            AboutReportTranslate::create([
                'report_id' => $report_id,
                'title' => $request['title'][$i],
                'lang' => $request['lang'][$i],
            ]);
        };
        return redirect()->route('admin.about_report.index')->with('store_message', 'true');
    }
    public function edit(string $id)
    {
        $about_report = AboutReport::findOrFail($id);
        $path = '/admin/about_report/edit/'.$id;
        $lang = ['az' => $path, 'en' => '/en' . $path, 'ru' => '/ru' . $path];
        return view('admin-panel.about_report.edit',compact('lang', 'about_report'));
    }
    public function update(Request $request, string $id)
    {
        AboutReport::where('id', $id)->update([
            'value' => $request['value'] ?? 0,
        ]);
        for($i = 0; $i < count($request->lang); $i++){
            AboutReportTranslate::where(['report_id' => $id, 'lang' => $request['lang'][$i]])->update([
                'title' => $request['title'][$i],
            ]);
        }
        return redirect()->route('admin.about_report.index')->with('update_message', 'true');
    }
    public function sort(Request $request)
    {
        $order_data = $request['data'];
        try {
            DB::beginTransaction();

            foreach ($order_data as $data) {
                AboutReport::where('id', $data['id'])->update(['order' => $data['order']]);
            }

            DB::commit();

            return response()->json('sort_success', 200);
        } catch (Exception $e) {
            DB::rollBack();
            return response()->json($e->getMessage(), 500);
        }
    }
    public function destroy(string $id)
    {
        AboutReport::where('id', $id)->update([
            'destroy' => 1
        ]);
        return redirect()->route('admin.about_report.index')->with('delete_message','true');
    }
}
