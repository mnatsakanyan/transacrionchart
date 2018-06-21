
@if(session()->get("message"))
    {{session()->get("message")}}
@endif

@if(session()->get("error"))
    {{session()->get("error")}}
@endif

@if ($errors->any())
    @foreach($errors->all() as $error)
    <div class="alert alert-danger">
        <strong>Danger!</strong> {{$error}}
    </div>
    @endforeach
@endif
@if(session()->get("success"))
    <div class="alert alert-success">
        <strong>Success!</strong> {{session()->get("success")}}
    </div>
@endif
@if(session()->get("info"))
    <div class="alert alert-info">
        <strong>Info!</strong> {{session()->get("info")}}
    </div>
@endif
@if(session()->get("warning"))
    <div class="alert alert-warning">
        <strong>Warning!</strong> {{session()->get("warning")}}
    </div>
@endif
@if(session()->get("error"))
    <div class="alert alert-danger">
        <strong>Danger!</strong> {{session()->get("error")}}
    </div>
@endif