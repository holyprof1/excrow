@php
    $categories = App\Models\Category::active()->get();
@endphp
<form action="{{ route('user.escrow.step.one.submit') }}" method="POST">
    @csrf
    <div class="row g-4">
        <div class="col-md-12">
            <div class="input-group h-50">
                <select name="type" class="input-group-text input-group-width bg-white pe-2 form--control" required>
                    <option value="">@lang('Select One')</option>
                    <option value="1" selected>@lang('I am Selling')</option>
                    <option value="2">@lang('I am Buying')</option>
                </select>

                <select name="category_id" class="form-select form--control" required>
                    <option value="">@lang('Select One')</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ __($category->name) }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-md-12">
            <div class="input-group">
                <span class="input-group-text input-group-width bg-white">@lang('For the Amount Of')</span>
                <input type="number" step="any" class="form-control form--control" name="amount" required>
                <span class="input-group-text bg-white border-end">{{ __($general->cur_text) }}</span>
            </div>
        </div>
    </div>

    <div class="mx-auto mt-4 hero-button">
        <button type="submit" class="btn btn--xl btn--base">@lang('Continue to Next')</button>
    </div>
</form>
