@extends('partials.layout')

@section('title')
    {{ 'Traffics' }}
@endsection

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="d-flex justify-content-between align-items-center">
                        <h5 class="card-header">Traffics (6)</h5>
                    </div>
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

                        <div class="dataTables_paginate paging_simple_numbers mt-4"
                            style="width: 100%;
                                display: flex;
                                flex-direction: row-reverse;">
                            <ul class="pagination">
                                <li class="paginate_button page-item previous disabled">
                                    <a class="page-link">
                                        <i class="bx bx-chevron-left bx-18px"></i>
                                    </a>
                                </li>
                                <li class="paginate_button page-item active">
                                    <a href="#" class="page-link">
                                        1
                                    </a>
                                </li>
                                <li class="paginate_button page-item ">
                                    <a href="#" class="page-link">
                                        2
                                    </a>
                                </li>
                                <li class="paginate_button page-item disabled"><a class="page-link">
                                        …
                                    </a>
                                </li>
                                <li class="paginate_button page-item ">
                                    <a href="#" class="page-link">
                                        15
                                    </a>
                                </li>
                                <li class="paginate_button page-item next">
                                    <a href="#" class="page-link">
                                        <i class="bx bx-chevron-right bx-18px"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
