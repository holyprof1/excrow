@extends($activeTemplate . 'layouts.frontend')
@section('content')
    @php
        $bannerContent = getContent('banner.content', true);
    @endphp

    <section class="hero"
        style="background-image:url({{ getImage('assets/images/frontend/banner/' . @$bannerContent->data_values->background_image, '1800x790') }});">
        <div class="hero__content">
            <div class="container">
                <div class="row g-4 justify-content-center align-items-center justify-xxl-between banner-form">

                    <div class="col-md-9 col-lg-7 col-xxl-6 text-center text-lg-start">
                        <h2 class="hero__content-title text-capitalize text--white mt-0">
                            {{ __(@$bannerContent->data_values->heading) }}
                        </h2>
                        <p class="hero__content-para text--white mx-auto ms-lg-0">
                            {{ __(@$bannerContent->data_values->subheading) }}
                        </p>
                        @include($activeTemplate . 'partials.escrow_form')
                    </div>
                    <div class="col-lg-5 col-xxl-6 d-none d-lg-block">
                        <img src="{{ getImage('assets/images/frontend/banner/' . @$bannerContent->data_values->front_image, '665x575') }}"
                            alt="image" class="img-fluid">
                    </div>
                </div>
            </div>
        </div>
    </section>

    @if ($sections->secs != null)
        @foreach (json_decode($sections->secs) as $sec)
            @include($activeTemplate . 'sections.' . $sec)
        @endforeach
    @endif
@endsection
