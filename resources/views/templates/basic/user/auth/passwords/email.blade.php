@extends($activeTemplate . 'layouts.frontend')
@section('content')
    @php
        $resetContent = getContent('reset_section.content', true);
    @endphp

    <div class="section ">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="login-section__content">
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block">
                                <div class="text-center login-section__image">
                                    <img src="{{ getImage('assets/images/frontend/reset_section/' . @$resetContent->data_values->image, '425x600') }}"
                                        alt="image" class="img-fluid login-section__image-is">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="login-form">
                                    <div class="mb-4">
                                        <p>{{ __($resetContent->data_values->title) }}</p>
                                    </div>
                                    <form method="POST" action="{{ route('user.password.email') }}">
                                        @csrf
                                        <div class="form-group">
                                            <label class="form-label">@lang('Email or Username')</label>
                                            <input type="text" class="form-control form--control" name="value"
                                                value="{{ old('value') }}" required autofocus="off">
                                        </div>

                                        <div class="form-group">
                                            <button type="submit"
                                                class="btn btn--base h-45 w-100">@lang('Submit')</button>
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
