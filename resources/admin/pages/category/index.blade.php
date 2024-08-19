@extends('partials.layout')

@section('title')
    {{ 'Porthub Admin' }}
@endsection

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <div class="col-md-6 mt-5">
                <div class="card">
                    <div class="d-flex justify-content-between align-items-center">
                        <h5 class="card-header">Categories (6)</h5>
                        <button type="button" class="btn btn-primary me-4" data-bs-toggle="modal"
                            data-bs-target="#createCategoryModal">
                            Create
                        </button>
                    </div>
                    <div class="table-responsive text-nowrap">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>SL</th>
                                    <th>Category</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody class="table-border-bottom-0">
                                <tr>
                                    <td>1</td>
                                    <td>Category 1</td>
                                    <td>
                                        <span class="d-flex">
                                            <button type="button" class="me-4" data-bs-toggle="modal"
                                                data-bs-target="#editCategoryModal"
                                                style="border: none;
                                                background: transparent;
                                                color: red;
                                                font-size: 20px;">
                                                <i class='bx bx-pencil'></i>
                                            </button>
                                            <button type="button" class="" data-bs-toggle="modal"
                                                data-bs-target="#deleteCategoryModal"
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
            <div class="col-md-6 mt-5">
                <div class="card">
                    <div class="d-flex justify-content-between align-items-center">
                        <h5 class="card-header">Sub Categories (6)</h5>
                        <button type="button" class="btn btn-primary me-4" data-bs-toggle="modal"
                            data-bs-target="#createSubCategoryModal">
                            Create
                        </button>
                    </div>
                    <div class="table-responsive text-nowrap">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>SL</th>
                                    <th>Category</th>
                                    <th>Sub-Category</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody class="table-border-bottom-0">
                                <tr>
                                    <td>1</td>
                                    <td>Category 1</td>
                                    <td>Sub Category Name 1</td>
                                    <td>
                                        <span class="d-flex">
                                            <span class="d-flex">
                                                <button type="button" class="me-4" data-bs-toggle="modal"
                                                    data-bs-target="#editSubCategoryModal"
                                                    style="border: none;
                                                    background: transparent;
                                                    color: red;
                                                    font-size: 20px;">
                                                    <i class='bx bx-pencil'></i>
                                                </button>
                                                <button type="button" class="" data-bs-toggle="modal"
                                                    data-bs-target="#deleteSubCategoryModal"
                                                    style="border: none;
                                                    background: transparent;
                                                    color: red;
                                                    font-size: 20px;">
                                                    <i class='bx bx-trash'></i>
                                                </button>
                                            </span>
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

    <!-- Create Category Modal -->
    <div class="modal fade" id="createCategoryModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalCenterTitle">
                        Add item
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('category.store') }}" method="POST">
                        @csrf
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="categoryName">Category Name</label>
                                <input type="text" class="form-control" id="categoryName" name="name"
                                    placeholder="Enter category name" required>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">
                        Close
                    </button>
                    <button type="button" class="btn btn-primary">
                        Save changes
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Create Sub-Category Modal -->
    <div class="modal fade" id="createSubCategoryModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalCenterTitle">
                        Add item
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('sub-category.store') }}" method="POST">
                        @csrf
                        <div class="modal-body">
                            <div class="form-group mb-2">
                                <label for="categorySelect">Category</label>
                                <select class="form-control" id="categorySelect" name="category_id" required>
                                    <option value="1">category 1</option>
                                    <option value="2">category 2</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="subCategoryName">Sub-Category Name</label>
                                <input type="text" class="form-control" id="subCategoryName" name="name"
                                    placeholder="Enter sub-category name" required>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">
                        Close
                    </button>
                    <button type="button" class="btn btn-primary">
                        Save changes
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit Category Modal -->
    <div class="modal fade" id="editCategoryModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalCenterTitle">
                        Edit item
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('category.store') }}" method="POST">
                        @csrf
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="categoryName">Category Name</label>
                                <input type="text" class="form-control" id="categoryName" name="name"
                                    placeholder="Enter category name" required>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">
                        Close
                    </button>
                    <button type="button" class="btn btn-primary">
                        Save changes
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit Sub Category Modal -->
    <div class="modal fade" id="editSubCategoryModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalCenterTitle">
                        Edit item
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('category.store') }}" method="POST">
                        @csrf
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="categoryName">Category Name</label>
                                <input type="text" class="form-control" id="categoryName" name="name"
                                    placeholder="Enter category name" required>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">
                        Close
                    </button>
                    <button type="button" class="btn btn-primary">
                        Save changes
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Delete Category Modal -->
    <div class="modal fade" id="deleteCategoryModal" tabindex="-1" aria-hidden="true">
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

    <!-- Delete Sub Category Modal -->
    <div class="modal fade" id="deleteSubCategoryModal" tabindex="-1" aria-hidden="true">
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
