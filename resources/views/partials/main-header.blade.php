<div class="main-header row">
    <div class="col-sm-6 col-xs-7">
        <ul class="user-info pull-left">
            <li class="profile-info dropdown">
                <a data-toggle="dropdown" class="dropdown-toggle" href="#" aria-expanded="false">
                    <img width="44" class="img-circle avatar" alt="" src="{{ asset('base/images/user.png')  }}">{{ Auth::user()->name }} <span class="caret"></span>
                </a>
                <ul class="dropdown-menu">

                    <li><a class="post-submit" data-action="{{ route('logout') }}" href=""><i class="icon-logout"></i>{{ __('app.logout') }}</a></li>
                </ul>
            </li>
        </ul>
    </div>
</div>