@extends('partials.layout')

@section('title')
    {{ 'Teams' }}
@endsection

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="d-flex justify-content-between align-items-center">
                        <h5 class="card-header">Teams (6)</h5>
                        <a href="{{ route('team.create') }}" class="btn btn-primary me-4">
                            Create
                        </a>
                    </div>
                    <div class="table-responsive text-nowrap">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>SL</th>
                                    <th>Avatar</th>
                                    <th>Name</th>
                                    <th>Position</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody class="table-border-bottom-0">
                                <tr>
                                    <td>1</td>
                                    <td>
                                        <div class="avatar-wrapper">
                                            <div class="avatar me-2">
                                                <img src="{{ asset('/uploads/img/service6-5.jpg') }}" alt="Avatar">
                                            </div>
                                        </div>
                                    </td>
                                    <td>Team memeber name</td>
                                    <td>Team position</td>
                                    <td>
                                        <span class="d-flex">
                                            <a href="{{ route('team.edit', ['id' => '1']) }}" class="me-4"
                                                style="border: none;
                                                background: transparent;
                                                color: red;
                                                font-size: 20px;">
                                                <i class='bx bx-pencil'></i>
                                            </a>
                                            <button type="button" class="" data-bs-toggle="modal"
                                                data-bs-target="#deleteItemModal"
                                                style="border: none;
                                                background: transparent;
                                                color: red;
                                                font-size: 20px;">
                                                <i class='bx bx-trash'></i>
                                            </button>
                                        </span>
                                    </td>
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

    <!-- Delete item Modal -->
    <div class="modal fade" id="deleteItemModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalCenterTitle">
                        Delete item
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Do you want to delete this item
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">
                        Close
                    </button>
                    <form action="#">
                        @csrf
                        <button type="button" class="btn btn-primary">
                            Yes
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
