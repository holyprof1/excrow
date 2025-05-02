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
                            <div class="col-lg-6 d-none d-lg-block">
                                <div class="text-center login-section__image">
                                    <img src="{{ getImage('assets/images/frontend/auth/' . @$authContent->data_values->image, '425x600') }}"
                                        alt="@lang('image')" class="img-fluid login-section__image-is">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="login-form">
                                    <form method="POST" action="{{ route('user.data.submit') }}">
                                        @csrf
                                        <div class="row">
                                            <div class="form-group col-sm-6 mb-3">
                                                <label class="form-label">@lang('First Name')</label>
                                                <input type="text" class="form-control form--control" name="firstname"
                                                    value="{{ old('firstname') }}" required>
                                            </div>

                                            <div class="form-group col-sm-6 mb-3">
                                                <label class="form-label">@lang('Last Name')</label>
                                                <input type="text" class="form-control form--control" name="lastname"
                                                    value="{{ old('lastname') }}" required>
                                            </div>
                                            <div class="form-group col-sm-6 mb-3">
                                                <label class="form-label">@lang('Address')</label>
                                                <input type="text" class="form-control form--control" name="address"
                                                    value="{{ old('address') }}">
                                            </div>
                                            <div class="form-group col-sm-6 mb-3">
                                                <label class="form-label">@lang('State')</label>
                                                <input type="text" class="form-control form--control" name="state"
                                                    value="{{ old('state') }}">
                                            </div>
                                            <div class="form-group col-sm-6 mb-3">
                                                <label class="form-label">@lang('Zip Code')</label>
                                                <input type="text" class="form-control form--control" name="zip"
                                                    value="{{ old('zip') }}">
                                            </div>

                                            <div class="form-group col-sm-6 mb-3">
                                                <label class="form-label">@lang('City')</label>
                                                <input type="text" class="form-control form--control" name="city"
                                                    value="{{ old('city') }}">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <button type="submit" class="btn btn--base w-100 h-45">
                                                @lang('Submit')
                                            </button>
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

@push('style')
    <style>
        @media(max-width: 991px) {
            .login-form {
                padding-top: 32px !important
            }
        }
    </style>
@endpush
