<ul id="side-nav" class="main-menu navbar-collapse collapse">
    {{--<li class="{{ Request::segment(2) == '' ? 'active' : '' }}">--}}
        {{--<a href="">--}}
            {{--<i class="icon-gauge"></i>--}}
            {{--<span class="title">{{ __('app.main_page') }}</span>--}}
        {{--</a>--}}
    {{--</li>--}}
    {{--<li class="{{ Request::segment(2) == 'barbers' ? 'active' : '' }}">--}}
        {{--<a href="">--}}
            {{--<i class="icon-users"></i>--}}
            {{--<span class="title">{{ __('app.user_management') }}</span>--}}
        {{--</a>--}}
    {{--</li>--}}
    <li class="{{ Request::segment(2) == 'charts' ? 'active' : '' }}">
        <a href="{{route("charts.index")}}">
            <i class="icon-users"></i>
            <span class="title">{{ __('app.charts') }}</span>
        </a>
    </li>
    <li class="{{ Request::segment(2) == 'transactions' ? 'active' : '' }}">
        <a href="{{route("transactions.index")}}">
            <i class="icon-users"></i>
            <span class="title">{{ __('app.transactions') }}</span>
        </a>
    </li>
</ul>