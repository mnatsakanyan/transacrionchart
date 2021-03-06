@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-xs-12 col-md-6 col-md-offset-3">
            <div class="panel panel-default">
                <div class="panel-heading clearfix">
                    <h3 class="panel-title">{{ __('app.create_chart') }}</h3>
                </div>
                <div class="panel-body">
                    <form action="{{ route('charts.store') }}" method="post" class="form-validate">
                        {{csrf_field()}}
                        <div class="row">
                            <div class="col-xs-12 col-md-12">
                                <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                                    <label for="name">{{ __('app.title') }}</label>
                                    <input id="name" type="text" class="form-control required validate-min-length" data-min-length="2" name="title" value="{{ old('title') }}" required autofocus>
                                    @if ($errors->has('title'))
                                        <small class="help-block">{{ $errors->first('title') }}</small>
                                    @endif
                                </div>
                            </div>
                            <div class="col-xs-12 col-md-12">
                                <div class="form-group">
                                    <button class="btn btn-primary btn-block">{{ __('app.submit') }}</button>
                                </div>
                            </div>
                        </div>


                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection