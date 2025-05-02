@extends($activeTemplate . 'layouts.frontend')
@section('content')
    @php
        $authContent = getContent('auth.content', true);
    @endphp

    <div class="section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="login-section__content">
                        <div class="row">
                            <div class="col-lg-6  d-none d-lg-block">
                                <div class="text-center login-section__image">
                                    <img src="{{ getImage('assets/images/frontend/auth/' . @$authContent->data_values->image, '425x600') }}"
                                        alt="image" class="img-fluid login-section__image-is">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="login-form">
                                    <div class="mb-4">
                                        <p>@lang('Your account is verified successfully. Now you can change your password. Please enter a strong password and don\'t share it with anyone.')</p>
                                    </div>
                                    <form method="POST" action="{{ route('user.password.update') }}">
                                        @csrf
                                        <input type="hidden" name="email" value="{{ $email }}">
                                        <input type="hidden" name="token" value="{{ $token }}">
                                        <div class="form-group">
                                            <label class="form-label">@lang('Password')</label>
                                            <input type="password" class="form-control form--control" name="password"
                                                required>
                                            @if ($general->secure_password)
                                                <div class="input-popup">
                                                    <p class="error lower">@lang('1 small letter minimum')</p>
                                                    <p class="error capital">@lang('1 capital letter minimum')</p>
                                                    <p class="error number">@lang('1 number minimum')</p>
                                                    <p class="error special">@lang('1 special character minimum')</p>
                                                    <p class="error minimum">@lang('6 character password')</p>
                                                </div>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label">@lang('Confirm Password')</label>
                                            <input type="password" class="form-control form--control"
                                                name="password_confirmation" required>
                                        </div>
                                        <div class="form-group">
                                            <button type="submit" class="btn btn--base h-45 w-100">
                                                @lang('Submit')</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@if ($general->secure_password)
    @push('script-lib')
        <script src="{{ asset('assets/global/js/secure_password.js') }}"></script>
    @endpush
@endif


@push('script')
    <script>
        @if ($general->secure_password)
            $('input[name=password]').on('input', function() {
                secure_password($(this));
            });
        @endif
    </script>
@endpush
