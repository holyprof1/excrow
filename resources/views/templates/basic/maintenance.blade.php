@extends($activeTemplate . 'layouts.app')
@section('panel')
    @php
        $maintenanceContent = getContent('maintenance_mode.content', true);
    @endphp

    <section class="maintenance-page d-flex align-items-center justify-content-center">
        <div class="container">
            <div class="row justify-content-center align-items-center">
                <div class="col-lg-7 text-center">
                    <div class="row justify-content-center">
                        <div class="col-xl-10">
                            <h4 class="text--danger">{{ __(@$maintenanceContent->data_values->heading) }}</h4>
                        </div>
                        <div class="col-sm-6 col-8 col-lg-12">
                            <img src="{{ getImage('assets/images/frontend/maintenance_mode/' . @$maintenanceContent->data_values->image, '600x320') }}"
                                alt="@lang('image')" class="img-fluid mx-auto mb-5">
                        </div>
                    </div>
                    <p class="mx-auto text-center">@php echo $maintenanceContent->data_values->description @endphp</p>
                </div>
            </div>
        </div>
    </section>
@endsection
