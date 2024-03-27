<div class="report bg-general">
    <div class="container">
        <div class="row">
            <div class="col-sm-6 mb-3">
                <select class="select" id="report_service_select">
                    @foreach ($services as $service)
                        <option value="{{ $service->id }}">
                            {{ $service->getTranslate->where('lang', Session('lang'))->first()->title }}</option>
                    @endforeach
                </select>

            </div>
            <div class="col-sm-6 mb-3 d-flex justify-content-sm-end">
                <select class="select" name="" id="report_type_select">
                    <option selected value="0">{{ __('main.annual') }}</option>
                    <option value="1">{{ __('main.monthly') }}</option>
                </select>
            </div>
        </div>
        <div class="table-content report_table" id="anual_report">
            <table class="table table-row text-center">
                <thead>
                    <tr>
                        <th>{{ __('main.years') }}</th>
                        <th>{{ __('main.edilen_yardimlarin_sayi') }}</th>
                        <th>{{ __('main.amount') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($annual_reports as $report)
                        <tr data-service-id="{{$report->service_id}}">
                            <td>{{ $report->year }}</td>
                            <td>{{ $report->main_value }}</td>
                            <td>{{ $report->total_amount }} AZN</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="table-content report_table" id="monthly_report">
            <table class="table table-row text-center">
                <thead>
                    <tr>
                        <th>{{ __('main.months') }}</th>
                        <th>{{ __('main.years') }}</th>
                        <th>{{ __('main.edilen_yardimlarin_sayi') }}</th>
                        <th>{{ __('main.amount') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($monthly_reports as $report)
                        <tr data-service-id="{{$report->service_id}}">
                            <td>{{ $report->getMonth->where('lang', Session('lang'))->first()->title }}</td>
                            <td>{{ $report->year }}</td>
                            <td>{{ $report->main_value }}</td>
                            <td>{{ $report->total_amount }} AZN</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@push('report_js')
    <script>
        $('.report_table').addClass('d-none');
        $('.report_table').eq($('#report_type_select').val()).removeClass('d-none');
        $('#report_type_select').on('change', function() {
            $('.report_table').addClass('d-none');
            $('.report_table').eq($('#report_type_select').val()).removeClass('d-none');
        });

        $('.report_table tbody tr').addClass('d-none');
        $(`.report_table tbody tr[data-service-id="${$('#report_service_select').val()}"]`).removeClass('d-none');
        $('#report_service_select').on('change', function() {
            $('.report_table tbody tr').addClass('d-none');
            $(`.report_table tbody tr[data-service-id="${$('#report_service_select').val()}"]`).removeClass('d-none');
        });
    </script>
@endpush
