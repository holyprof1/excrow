<header class="header-fixed header--primary">
    <div class="container">
        <div class="row g-0 align-items-center">
            <div class="col-6 col-lg-2">
                <a href="{{ route('home') }}" class="logo">
                    <img src="{{ getImage('assets/images/logoIcon/logo.png') }}" alt="@lang('image')" class="img-fluid logo__is">
                </a>
            </div>
            <div class="col-6 col-lg-10">
                <div class="nav-container">
                    {{-- langauage  --}}
                    @if ($general->multi_language)
                        <div class="form--select-transprant me-3 d-xl-none d-block">
                            <select class="form-select form--select-sm langSel">
                                @foreach ($language as $lang)
                                    <option value="{{ $lang->code }}" @if (session('lang') == $lang->code) selected @endif>
                                        {{ __($lang->name) }}</option>
                                @endforeach
                            </select>
                        </div>
                    @endif
                    <!-- Navigation Toggler  -->
                    <div class="d-flex justify-content-end align-items-center d-xl-none">
                        <button type="button" class="btn p-0 nav--toggle header-button text-white">
                            <i class="las la-bars"></i>
                        </button>
                    </div>
                    <!-- Navigation Toggler End -->

                    <!-- Navigation  -->
                    <nav class="navs">
                        <!-- Primary Menu  -->
                        <div class="header-menu">
                            <ul class="list primary-menu primary-menu--alt">
                                <li class="primary-menu__list">
                                    <a href="{{ route('home') }}" class="primary-menu__link">@lang('Home')</a>
                                </li>

                                @if ((auth()->user() && request()->routeIs('user.*')) || (auth()->user() && request()->routeIs('ticket*')))

                                    <li class="primary-menu__list has-sub">
                                        <a href="javascript:void(0)" class="primary-menu__link">@lang('Deposit')</a>

                                        <ul class="primary-menu__sub">
                                            <li class="primary-menu__sub-list">
                                                <a href="{{ route('user.deposit.index') }}" class="t-link primary-menu__sub-link">@lang('Deposit Now')</a>
                                            </li>
                                            <li class="primary-menu__sub-list">
                                                <a href="{{ route('user.deposit.history') }}" class="t-link primary-menu__sub-link">@lang('Deposit Log')</a>
                                            </li>
                                        </ul>
                                    </li>

                                    <li class="primary-menu__list has-sub">
                                        <a href="javascript:void(0)" class="primary-menu__link">
                                            @lang('Escrow')
                                        </a>

                                        <ul class="primary-menu__sub">
                                            <li class="primary-menu__sub-list">
                                                <a href="{{ route('user.escrow.step.one') }}" class="t-link primary-menu__sub-link">
                                                    @lang('New Escrow')
                                                </a>
                                            </li>
                                            <li class="primary-menu__sub-list">
                                                <a href="{{ route('user.escrow.index') }}" class="t-link primary-menu__sub-link">
                                                    @lang('All Escrow')
                                                </a>
                                            </li>
                                        </ul>
                                    </li>

                                    <li class="primary-menu__list has-sub">
                                        <a href="javascript:void(0)" class="primary-menu__link">@lang('Withdraw')</a>

                                        <ul class="primary-menu__sub">
                                            <li class="primary-menu__sub-list">
                                                <a href="{{ route('user.withdraw') }}" class="t-link primary-menu__sub-link">@lang('Withdraw Now')</a>
                                            </li>
                                            <li class="primary-menu__sub-list">
                                                <a href="{{ route('user.withdraw.history') }}" class="t-link primary-menu__sub-link">@lang('Withdrawal Log')</a>
                                            </li>
                                        </ul>
                                    </li>

                                    <li class="primary-menu__list">
                                        <a href="{{ route('user.transactions') }}" class="primary-menu__link">@lang('Transactions')</a>
                                    </li>

                                    <li class="primary-menu__list has-sub">
                                        <a href="javascript:void(0)" class="primary-menu__link">{{ auth()->user()->username }}</a>

                                        <ul class="primary-menu__sub">
                                            <li class="primary-menu__sub-list">
                                                <a href="{{ route('ticket.index') }}" class="t-link primary-menu__sub-link">@lang('Support Tickets')</a>
                                            </li>
                                            <li class="primary-menu__sub-list">
                                                <a href="{{ route('ticket.open') }}" class="t-link primary-menu__sub-link">@lang('Open New Ticket')</a>
                                            </li>
                                            <li class="primary-menu__sub-list">
                                                <a href="{{ route('user.change.password') }}" class="t-link primary-menu__sub-link">@lang('Change Password')</a>
                                            </li>
                                            <li class="primary-menu__sub-list">
                                                <a href="{{ route('user.profile.setting') }}" class="t-link primary-menu__sub-link">@lang('Profile Setting')</a>
                                            </li>
                                            <li class="primary-menu__sub-list">
                                                <a href="{{ route('user.twofactor') }}" class="t-link primary-menu__sub-link">@lang('2FA Security')</a>
                                            </li>
                                            <li class="primary-menu__sub-list">
                                                <a href="{{ route('user.logout') }}" class="t-link primary-menu__sub-link">@lang('Logout')</a>
                                            </li>
                                        </ul>
                                    </li>
                                @else
                                    @foreach ($pages as $k => $data)
                                        <li class="primary-menu__list">
                                            <a href="{{ route('pages', [$data->slug]) }}" class="primary-menu__link">{{ __($data->name) }}</a>
                                        </li>
                                    @endforeach

                                    <li class="primary-menu__list">
                                        <a href="{{ route('blogs') }}" class="primary-menu__link">@lang('Blogs')</a>
                                    </li>

                                    <li class="primary-menu__list">
                                        <a href="{{ route('contact') }}" class="primary-menu__link">@lang('Contact')</a>
                                    </li>
                                @endif
                                @if ($general->multi_language)
                                    <li class="primary-menu__list text-center d-xl-block d-none">
                                        <div class="form--select-transprant d-flex align-items-center ms-xxl-5 ms-xl-4">
                                            <select class="form-select form--select-sm langSel">
                                                @foreach ($language as $lang)
                                                    <option value="{{ $lang->code }}" @if (session('lang') == $lang->code) selected @endif>
                                                        {{ __($lang->name) }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </li>
                                @endif
                                @guest
                                    <li class="primary-menu__list">
                                        <a href="{{ route('user.login') }}" class="btn btn-base--outline ">@lang('Login')</a>
                                        <a href="{{ route('user.register') }}" class="btn btn--md btn--base  ms-3">@lang('Join Now')</a>
                                    </li>
                                @else
                                    <li class="primary-menu__list">
                                        <a href="{{ route('user.home') }}" class="btn btn--md btn-base--outline ">@lang('Dashboard')</a>
                                    </li>
                                @endguest
                            </ul>
                        </div>
                        <!-- User Login End -->
                    </nav>
                    <!-- Navigation End -->
                </div>
            </div>
        </div>
    </div>
</header>
