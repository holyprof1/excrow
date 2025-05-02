@extends($activeTemplate . 'layouts.frontend')
@section('content')
    @php
        $contactContent = getContent('contact.content', true);
        $contactElements = getContent('contact.element', orderById: true);
        $socialElements = getContent('social_icon.element', orderById: true);
    @endphp
    <div class="section bg--light">
        <div class="container">
            <div class="card custom--card">
                <div class="card-body">
                    <div class="row g-4 flex-wrap-reverse">
                        <div class="col-lg-5 order-md-2">
                            <div class="d-flex justify-content-center mb-5">

                                <img src="{{ getImage('assets/images/frontend/contact/' . @$contactContent->data_values->image, '600x575') }}" alt="@lang('image')" class="img-fluid text-center">
                            </div>
                            @foreach ($contactElements as $contact)
                                <div class="contact-info">
                                    <div class="contact-info__icon-border">
                                        <div class="contact-info__icon">
                                            @php echo @$contact->data_values->icon @endphp
                                        </div>
                                    </div>
                                    <div class="contact-info__content">
                                        <h5 class="mt-0 mb-2">
                                            {{ __(@$contact->data_values->heading) }}
                                        </h5>
                                        <p class="mb-0">
                                            {{ __(@$contact->data_values->details) }}
                                        </p>
                                    </div>
                                </div>
                            @endforeach
                            <ul class="list list--row contact-social">
                                <li class="list--row__item">
                                    <p>@lang('Social:')</p>
                                </li>
                                @foreach ($socialElements as $social)
                                    <li class="list--row__item">
                                        <a href="{{ @$social->data_values->url }}" class="icon--circle" target="_blank">
                                            @php echo @$social->data_values->icon @endphp
                                        </a>
                                    </li>
                                @endforeach
                            </ul>

                        </div>
                        <div class="col-lg-7 order-md-2">
                            <form method="post" action="{{ route('contact.submit') }}" class="verify-gcaptcha">
                                @csrf
                                <div class="col-12">
                                    <h4 class="mt-0">
                                        {{ __(@$contactContent->data_values->heading) }}
                                    </h4>
                                </div>
                                <div class="form-group">
                                    <label class="form-label">@lang('Name')</label>
                                    <input name="name" type="text" class="form-control form--control" value="@if (auth()->user()) {{ auth()->user()->fullname }} @else{{ old('name') }} @endif" @if (auth()->user()) readonly @endif required>
                                </div>
                                <div class="form-group">
                                    <label class="form-label">@lang('Email')</label>
                                    <input name="email" type="email" class="form-control form--control" value="@if (auth()->user()) {{ auth()->user()->email }}@else{{ old('email') }} @endif" @if (auth()->user()) readonly @endif required>
                                </div>
                                <div class="form-group">
                                    <label class="form-label">@lang('Subject')</label>
                                    <input name="subject" type="text" class="form-control form--control" value="{{ old('subject') }}" required>
                                </div>
                                <div class="form-group">
                                    <label class="form-label">@lang('Message')</label>
                                    <textarea name="message" class="form-control form--control-textarea" rows="5" required>{{ old('message') }}</textarea>
                                </div>
                                <x-captcha />
                                <div class="form-group">
                                    <button type="submit" class="btn btn--base h-45 w-100">@lang('Submit')</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>
    <div class="map-view">
        <div class="container-fluid p-0">
            <div class="row g-0">
                <div class="col-12">
                    <iframe class="map-view__frame" src="https://maps.google.com/maps?q={{ @$contactContent->data_values->latitude }},{{ @$contactContent->data_values->longitude }}&hl=es;z=14&amp;output=embed"></iframe>
                </div>
            </div>
        </div>
    </div>
@endsection
