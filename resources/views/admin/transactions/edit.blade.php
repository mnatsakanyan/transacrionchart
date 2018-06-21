@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-xs-12 col-md-6 col-md-offset-3">
        <div class="panel panel-default">
            <div class="panel-heading clearfix">
                <h3 class="panel-title">{{ __('app.edit') }}</h3>
            </div>
            <div class="panel-body">
                <form action="{{ route('transactions.update',$entity->id) }}" method="post" class="form-validate">
                    {{csrf_field()}}
                    @include("admin.transactions.editform",['charts'=>$charts])

                </form>
            </div>
        </div>
    </div>
</div>
@endsection