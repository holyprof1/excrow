@extends($activeTemplate . 'layouts.frontend')
@section('content')
    <section class="section bg--light">
        <div class="container">
            <div class="row gy-4">
                <div class="col-lg-8 col-xl-9">
                    <div class="d-flex flex-wrap gap-4">

                        <div class="dash-card">
                            <div class="dash-card__header">
                                <h6 class="dash-card__value">{{ showAmount($data['balance']) }} {{ $general->cur_text }}</h6>
                                <div class="dash-card__icon icon icon--circle icon--md"><i class="la la-wallet"></i></div>
                            </div>
                            <div class="dash-card__body">
                                <h5 class="dash-card__title">@lang('Balance')</h5>
                            </div>
                        </div>

                        <div class="dash-card">
                            <div class="dash-card__header">
                                <h6 class="dash-card__value">{{ $data['pendingDeposit'] }}</h6>
                                <div class="dash-card__icon icon icon--circle icon--md"><i class="la la-pause-circle"></i></div>
                            </div>
                            <div class="dash-card__body">
                                <h5 class="dash-card__title">@lang('Pending Deposits')</h5>
                                <a href="{{ route('user.deposit.history', 'pending') }}">@lang('View All')</a>
                            </div>
                        </div>

                        <div class="dash-card">
                            <div class="dash-card__header">
                                <h6 class="dash-card__value">{{ $data['pendingWithdrawals'] }}</h6>
                                <div class="dash-card__icon icon icon--circle icon--md"><i class="fa fa-pause-circle"></i></div>
                            </div>
                            <div class="dash-card__body">
                                <h5 class="dash-card__title">@lang('Pending Withdrawals')</h5>
                                <a href="{{ route('user.withdraw.history', 'pending') }}">@lang('View All')</a>
                            </div>
                        </div>

                        <div class="dash-card">
                            <div class="dash-card__header">
                                <h6 class="dash-card__value">{{ $data['totalEscrow'] }}</h6>
                                <div class="dash-card__icon icon icon--circle icon--md">
                                    <i class="la la-handshake"></i>
                                </div>
                            </div>
                            <div class="dash-card__body">
                                <h5 class="dash-card__title">@lang('Total Escrow')</span></h5>
                                <a href="{{ route('user.escrow.index') }}">@lang('View All')</a>
                            </div>
                        </div>

                        <div class="dash-card">
                            <div class="dash-card__header">
                                <h6 class="dash-card__value">{{ $data['notAccepted'] }}</h6>
                                <div class="dash-card__icon icon icon--circle icon--md">
                                    <i class="fas fa-spinner"></i>
                                </div>
                            </div>
                            <div class="dash-card__body">
                                <h5 class="dash-card__title">@lang('Not Accepted')</h5>
                                <a href="{{ route('user.escrow.index', 'notAccepted') }}">@lang('View All')</a>
                            </div>
                        </div>

                        <div class="dash-card">
                            <div class="dash-card__header">
                                <h6 class="dash-card__value">{{ $data['accepted'] }}</h6>
                                <div class="dash-card__icon icon icon--circle icon--md">
                                    <i class="las la-check-circle"></i>
                                </div>
                            </div>
                            <div class="dash-card__body">
                                <h5 class="dash-card__title">@lang('Running Escrow')</h5>
                                <a href="{{ route('user.escrow.index', 'accepted') }}">@lang('View All')</a>
                            </div>
                        </div>

                        <div class="dash-card">
                            <div class="dash-card__header">
                                <h6 class="dash-card__value">{{ $data['completed'] }}</h6>
                                <div class="dash-card__icon icon icon--circle icon--md">
                                    <i class="la la-check-double"></i>
                                </div>
                            </div>
                            <div class="dash-card__body">
                                <h5 class="dash-card__title">@lang('Completed')</h5>
                                <a href="{{ route('user.escrow.index', 'completed') }}">@lang('View All')</a>
                            </div>
                        </div>

                        <div class="dash-card">
                            <div class="dash-card__header">
                                <h6 class="dash-card__value">{{ $data['disputed'] }}</h6>
                                <div class="dash-card__icon icon icon--circle icon--md">
                                    <i class="la la-exclamation-triangle"></i>
                                </div>
                            </div>
                            <div class="dash-card__body">
                                <h5 class="dash-card__title">@lang('Disputed')</h5>
                                <a href="{{ route('user.escrow.index', 'disputed') }}">@lang('View All')</a>
                            </div>
                        </div>

                        <div class="dash-card">
                            <div class="dash-card__header">
                                <h6 class="dash-card__value">{{ $data['cancelled'] }}</h6>
                                <div class="dash-card__icon icon icon--circle icon--md">
                                    <i class="la la-times-circle"></i>
                                </div>
                            </div>
                            <div class="dash-card__body">
                                <h5 class="dash-card__title">@lang('Canceled')</h5>
                                <a href="{{ route('user.escrow.index', 'canceled') }}">@lang('View All')</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-xl-3">
                    <div class="transaction--card">
                        <div class="body">
                            <h6 class="title">@lang('Latest Transactions')</h6>
                            <div class="list-group list-group-flush">
                                @forelse($transactions as $trx)
                                    <li class="list-group-item">
                                        @if ($trx->trx_type == '+')
                                            <span class="d-block fw-md text--success">+{{ $general->cur_sym }}{{ showAmount($trx->amount) }}</span>
                                        @else
                                            <span class="d-block fw-md text--danger">-{{ $general->cur_sym }}{{ showAmount($trx->amount) }}</span>
                                        @endif
                                        <a href="{{ route('user.transactions') }}?search={{ $trx->trx }}">
                                            <small>
                                                {{ __($trx->details) }}
                                            </small>
                                        </a>
                                    </li>
                                @empty
                                    <li class="list-group-item">@lang('No transaction yet')</li>
                                @endforelse
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>

    </section>
@endsection

@push('style')
    <style>
        a {
            color: #68a3f9;
            text-decoration: none;
        }

        .transaction--card {
            background-color: #fff;
            border-radius: 5px;
            border: 1px solid #f3f3f3;
            box-shadow: 0 0 5px 10px hsl(var(--black)/.01)
        }

        .transaction--card .title {
            padding: 1rem;
            border-bottom: 1px solid #f3f3f3;
        }

        .transaction--card .list-group-item {
            border-bottom: 1px solid hsl(var(--border)/.3);
        }

        .transaction--card .list-group-item:last-child {
            border-radius: 0 0 5px 5px;
        }
    </style>
@endpush
