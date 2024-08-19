@extends('partials.layout')

@section('title')
    {{ 'Porthub Admin' }}
@endsection

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <div class="col-lg-6 col-md- col-6 mb-4">
                <div class="card">
                    <div class="card-body pb-3">
                        <span class="d-block fw-medium mb-1">Total Traffic</span>
                        <h3 class="card-title mb-1">276k</h3>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-12 col-6 mb-4">
                <div class="card">
                    <div class="card-body pb-3">
                        <span class="d-block fw-medium mb-1">Unread mails</span>
                        <h3 class="card-title mb-1">276k</h3>
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
                                <tr>
                                    <td>
                                        123.56.25.98
                                    </td>
                                    <td>Windows</td>
                                    <td>WebKit</td>
                                    <td>Chrome</td>
                                    <td>Dhaka</td>
                                    <td>Bangladesh</td>
                                    <td>BD</td>
                                    <td>1212</td>
                                    <td>24-08-19 08:09 PM</td>
                                </tr>
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
                                <tr>
                                    <td>test@example.com</td>
                                    <td>test subject</td>
                                    <td>0168544269</td>
                                    <td>
                                        <span class="badge bg-label-waring me-1"
                                            style="ckground-color: #fff2d6 !important;color: #ffab00 !important;">Unread</span>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
