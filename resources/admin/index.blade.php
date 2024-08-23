@extends('partials.layout')

@section('title')
    {{ 'Admin Dashboard' }}
@endsection

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <div class="col-lg-6 col-md- col-6 mb-4">
                <div class="card">
                    <div class="card-body pb-3">
                        <span class="d-block fw-medium mb-1">Total Traffic</span>
                        <h3 class="card-title mb-1">{{ $trafficCount }}</h3>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-12 col-6 mb-4">
                <div class="card">
                    <div class="card-body pb-3">
                        <span class="d-block fw-medium mb-1">Unread mails</span>
                        <h3 class="card-title mb-1">{{ $unreadMailCount }}</h3>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="card">
                    <h5 class="card-header">Latest Traffic statistics</h5>
                    <div class="table-responsive text-nowrap">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>IP</th>
                                    <th>Platform</th>
                                    <th>Device</th>
                                    <th>Browser</th>
                                    <th>City</th>
                                    <th>Country</th>
                                    <th>Country code</th>
                                    <th>Zip code</th>
                                    <th>Date/Time</th>
                                </tr>
                            </thead>
                            <tbody class="table-border-bottom-0">
                                @if ($traffics->isNotEmpty())
                                    @foreach ($traffics as $traffic)
                                        <tr>
                                            <td>{{ $traffic->ip }}</td>
                                            <td>{{ $traffic->platform }}</td>
                                            <td>{{ $traffic->device }}</td>
                                            <td>{{ $traffic->browser }}</td>
                                            <td>{{ $traffic->city }}</td>
                                            <td>{{ $traffic->country }}</td>
                                            <td>{{ $traffic->country_code }}</td>
                                            <td>{{ $traffic->zip_code }}</td>
                                            <td>
                                                @php
                                                    $formattedDate = \Carbon\Carbon::parse(
                                                        $traffic->created_at,
                                                    )->format('d-m-y h:i A');
                                                @endphp
                                                {{ $formattedDate }}
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="9" class="text-center">
                                            No data available
                                        </td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="col-md-12 mt-5">
                <div class="card">
                    <h5 class="card-header">Unread Mails</h5>
                    <div class="table-responsive text-nowrap">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Email</th>
                                    <th>Subject</th>
                                    <th>Phone</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody class="table-border-bottom-0">
                                @if ($unreadMails->isNotEmpty())
                                    @foreach ($unreadMails as $unreadMail)
                                        <tr>
                                            <td>{{ $unreadMail->email }}</td>
                                            <td>{{ $unreadMail->subject }}</td>
                                            <td>{{ $unreadMail->phone }}</td>
                                            <td>
                                                <span class="badge bg-label-waring me-1"
                                                    style="ckground-color: #fff2d6 !important;color: #ffab00 !important;">
                                                    {{ $unreadMail->status }}
                                                </span>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="4" class="text-center">
                                            No data available
                                        </td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
