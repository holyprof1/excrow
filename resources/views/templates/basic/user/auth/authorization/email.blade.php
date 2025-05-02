@extends($activeTemplate . 'layouts.frontend')
@section('content')
    @php
        $verifyContent = getContent('verify_section.content', true);
    @endphp

    <div class="section bg--light">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="login-section__content">
                        <div class="row justify-content-center">
                            <div class="col-lg-6 d-none d-lg-block">
                                <div class="text-center login-section__image">
                                    <img src="{{ getImage('assets/images/frontend/verify_section/' . @$verifyContent->data_values->image, '425x600') }}"
                                        alt="image" class="img-fluid login-section__image-is">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="verification-code-wrapper login-form">
                                    <div class="verification-area">
                                        <form action="{{ route('user.verify.email') }}" method="POST" class="submit-form">
                                            @csrf
                                            <p class="verification-text">@lang('A 6 digit verification code sent to your email address'):
                                                {{ showEmailAddress(auth()->user()->email) }}</p>

                                            @include($activeTemplate . 'partials.verification_code')

                                            <div class="mb-3">
                                                <button type="submit"
                                                    class="btn btn--base w-100 h-45">@lang('Submit')</button>
                                            </div>

                                            <div class="mb-3">
                                                <p>
                                                    @lang('If you don\'t get any code'),
                                                    <a href="{{ route('user.send.verify.code', 'email') }}"
                                                        class="text--base">
                                                        @lang('Try again')</a>
                                                </p>

                                                @if ($errors->has('resend'))
                                                    <small
                                                        class="text-danger d-block">{{ $errors->first('resend') }}</small>
                                                @endif
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
    </div>
@endsection
