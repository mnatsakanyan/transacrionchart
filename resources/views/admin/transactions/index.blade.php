@extends('layouts.app')

@section('content')
<div class="panel panel-default">
    <div class="panel-heading clearfix">
        <h3 class="panel-title">{{ __('app.transactions') }}</h3>
        <div class="buttons pull-right">
            <a class="btn btn-success" href="{{ route('transactions.create') }}">
                <i class="icon-plus"></i>
                {{ __('app.create') }}
            </a>
        </div>
    </div>
    <div class="panel-body">
        <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover data-table"
                   data-url="{{ route('transactions.data') }}"
                   data-columns-select='["id","description","price","created_at","actions"]'
                   data-columns-ignore="[4]" data-export="true">
                <thead>
                <tr>
                    <th class="width-xxs">#</th>
                    <th>{{ __('app.description') }}</th>
                    <th>{{ __('app.price') }}</th>
                    <th>{{ __('app.created_at') }}</th>
                    <th class="actions width-md">{{ __('app.actions') }}</th>
                </tr>
                </thead>
                <tbody>
                @foreach($transactions as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->description }}</td>
                        <td>{{ $user->price }}</td>
                        <td>{{ $user->created_at }}</td>
                        <td></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

@push('styles')
    <link href="{{ asset('public/base/js/plugins/dataTables/datatables.min.css') }}" rel="stylesheet">
@endpush

@push('scripts')
    <script src="{{ asset('public/base/js/plugins/dataTables/datatables.min.js') }}"></script>
@endpush