<div class="row">
    <input type="hidden" name="_method" value="PUT">
    <div class="col-xs-12 col-md-12">
        <div class="form-group {{ $errors->has('description') ? 'has-error' : '' }}">
            <label for="name">{{ __('app.description') }}</label>
            <textarea id="name"  class="form-control required validate-min-length" data-min-length="2" name="description" value="{{ old('description') }}" required autofocus>{{ $entity->description }}</textarea>
            @if ($errors->has('description'))
                <small class="help-block">{{ $errors->first('description') }}</small>
            @endif
        </div>

        <div class="form-group {{ $errors->has('price') ? 'has-error' : '' }}">
            <label for="name">{{ __('app.price') }}</label>
            <input type="text" id="name"  class="form-control required validate-min-length" data-min-length="2" name="price" value="{{ $entity->price }}" required autofocus>
            @if ($errors->has('price'))
                <small class="help-block">{{ $errors->first('price') }}</small>
            @endif
        </div>
        <div class="form-group {{ $errors->has('type') ? 'has-error' : '' }}">
            <label for="name">{{ __('app.type') }}</label>
            {{--<input type="text" id="name"  class="form-control required validate-min-length" data-min-length="2" name="type" value="{{ old('price') }}" required autofocus>--}}
            <div>
                <label class="radio-inline">
                    <input type="radio" name="type" value="0" @if($entity->type==0)checked="checked"@endif>{{__("app.credit")}}
                </label>
                <label class="radio-inline">
                    <input type="radio" name="type" value="1" @if($entity->type==1)checked="checked"@endif>{{__("app.debit")}}
                </label>
            </div>
            @if ($errors->has('type'))
                <small class="help-block">{{ $errors->first('type') }}</small>
            @endif
        </div>
        <div class="form-group {{ $errors->has('date') ? 'has-error' : '' }}">
            <label for="name">{{ __('app.date') }}</label>
            <input type="date" id="name"  class="form-control required validate-min-length" data-min-length="2" name="date" value="{{ $entity->date }}" required autofocus>
            @if ($errors->has('date'))
                <small class="help-block">{{ $errors->first('date') }}</small>
            @endif
        </div>
        <div class="form-group {{ $errors->has('chart_id') ? 'has-error' : '' }}">
            <label for="name">{{ __('app.chart') }}</label>
            <select id="name"  class="form-control required validate-min-length" data-min-length="2" name="chart_id" required autofocus>
                <option value="0">{{__("app.select_one")}}</option>
                @foreach($charts as $chart)
                    <option value="{{$chart->id}}" @if($entity->chart_id == $chart->id)selected="selected"@endif >{{$chart->title}}</option>
                @endforeach
            </select>
            @if ($errors->has('chart_id'))
                <small class="help-block">{{ $errors->first('chart_id') }}</small>
            @endif
        </div>
    </div>
    <div class="col-xs-12 col-md-12">
        <div class="form-group">
            <button class="btn btn-primary btn-block">{{ __('app.submit') }}</button>
        </div>
    </div>
</div>