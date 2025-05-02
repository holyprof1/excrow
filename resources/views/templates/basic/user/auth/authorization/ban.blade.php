@extends($activeTemplate . 'layouts.app')
@section('panel')
    @php
        $banContent = getContent('ban_page.content', true);
    @endphp
    <div class="section bg--light">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-7 col-md-8 col-12 text-center">
                    <div class="ban-section">
                        <h4 class="text-center text-danger">
                            {{ __(@$banContent->data_values->heading) }}
                        </h4>

                        <img src="{{ getImage('assets/images/frontend/ban_page/' . @$banContent->data_values->image) }}"
                            alt="@lang('Ban Image')">
                        <div class="mt-3">
                            <p class="fw-bold mb-1">@lang('Reason'):</p>
                            <p>{{ $user->ban_reason }}</p>
                        </div>
                        <a href="{{ route('home') }}" class="btn btn--base">
                            <i class="las la-undo"></i>
                            @lang('Go Back')
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
