@extends('layouts.app')

@section('content')
<div class="panel panel-default">
    <div class="panel-heading clearfix">
        <h3 class="panel-title">{{ __('app.charts') }}</h3>
        <div class="buttons pull-right">
            <a class="btn btn-success" href="{{ route('charts.create') }}">
                <i class="icon-plus"></i>
                {{ __('app.create_chart') }}
            </a>
        </div>
    </div>
    <div class="panel-body">
        <div class="table-responsive">
            <div id="chartContainer" class="col-lg-12" style="height: 400px;padding:0">
                @include("admin.common.chart_init",['data'=>$data])
            </div>
        </div>
    </div>
</div>
@endsection

@push('styles')
    <link href="{{ asset('public/base/js/plugins/dataTables/datatables.min.css') }}" rel="stylesheet">
@endpush

@push('scripts')
    <script src="{{ asset('public/base/js/plugins/dataTables/datatables.min.js') }}"></script>
    <script src="https://canvasjs.com/assets/script/jquery.canvasjs.min.js"></script>
@endpush