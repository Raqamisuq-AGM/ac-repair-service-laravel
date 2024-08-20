<div class="row">
    <div class="col-md-6 mt-5">
        <div class="card">
            <div class="d-flex justify-content-between align-items-center">
                <h5 class="card-header">Categories ({{ $categoryCount }})</h5>
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
                        @if ($categories->isNotEmpty())
                            @foreach ($categories as $index => $category)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $category->category }}</td>
                                    <td>
                                        <span class="d-flex">
                                            <button type="button" class="me-4" data-bs-toggle="modal"
                                                data-bs-target="#editCategoryModal"
                                                wire:click="edit({{ $category->id }})"
                                                style="border: none; background: transparent; color: #696cff; font-size: 20px;">
                                                <i class='bx bx-pencil'></i>
                                            </button>

                                            <button type="button" class="" data-bs-toggle="modal"
                                                data-bs-target="#deleteCategoryModal"
                                                wire:click="deleteConfirmation({{ $category->id }})"
                                                style="border: none; background: transparent; color: #696cff; font-size: 20px;">
                                                <i class='bx bx-trash'></i>
                                            </button>
                                        </span>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="3" class="text-center">No data available</td>
                            </tr>
                        @endif
                    </tbody>
                </table>

                <!-- Pagination -->

            </div>
        </div>
    </div>
    <div class="col-md-6 mt-5">
        <div class="card">
            <div class="d-flex justify-content-between align-items-center">
                <h5 class="card-header">Sub Categories ({{ $subCategoryCount }})</h5>
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
                        @if ($subCategories->isNotEmpty())
                            @foreach ($subCategories as $index => $subCategory)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $subCategory->category->category }}</td>
                                    <td>{{ $subCategory->sub_category }}</td>
                                    <td>
                                        <span class="d-flex">
                                            <button type="button" class="me-4" data-bs-toggle="modal"
                                                data-bs-target="#editSubCategoryModal"
                                                wire:click="subEdit({{ $subCategory->id }})"
                                                style="border: none; background: transparent; color: #696cff; font-size: 20px;">
                                                <i class='bx bx-pencil'></i>
                                            </button>

                                            <button type="button" class="" data-bs-toggle="modal"
                                                data-bs-target="#deleteSubCategoryModal"
                                                wire:click="deleteSubConfirmation({{ $subCategory->id }})"
                                                style="border: none; background: transparent; color: #696cff; font-size: 20px;">
                                                <i class='bx bx-trash'></i>
                                            </button>
                                        </span>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="4" class="text-center">No data available</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Create Category Modal -->
    <div wire:ignore.self class="modal fade" id="createCategoryModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalCenterTitle">Add item</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form wire:submit.prevent="store">
                        <div class="form-group">
                            <label for="categoryName">Category Name</label>
                            <input type="text" class="form-control" id="categoryName" wire:model="category"
                                placeholder="Enter category name">
                        </div>
                        @error('category')
                            <div class="alert alert-danger mt-2">{{ $message }}</div>
                        @enderror
                        <div class="modal-footer">
                            <button type="button" class="btn btn-label-secondary"
                                data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Add</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Create Sub Category Modal -->
    <div wire:ignore.self class="modal fade" id="createSubCategoryModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalCenterTitle">Add item</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form wire:submit.prevent="subStore">
                        <div class="form-group mb-2">
                            <label for="categorySelect">Category</label>
                            <select class="form-control" id="categorySelect" wire:model="category">
                                <option value="">Select Category</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->category }}</option>
                                @endforeach
                            </select>
                        </div>
                        @error('category')
                            <div class="alert alert-danger mt-2">{{ $message }}</div>
                        @enderror
                        <div class="form-group">
                            <label for="categoryName">Category Name</label>
                            <input type="text" class="form-control" id="categoryName" wire:model="sub_category"
                                placeholder="Enter category name">
                        </div>
                        @error('sub_category')
                            <div class="alert alert-danger mt-2">{{ $message }}</div>
                        @enderror
                        <div class="modal-footer">
                            <button type="button" class="btn btn-label-secondary"
                                data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Add</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit Category Modal -->
    <div wire:ignore.self class="modal fade" id="editCategoryModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalCenterTitle">Edit item</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form wire:submit.prevent="update">
                        <input type="hidden" wire:model="editID">
                        <div class="form-group">
                            <label for="categoryName">Category Name</label>
                            <input type="text" class="form-control" id="categoryName" wire:model="category"
                                placeholder="Enter category name" required>
                        </div>
                        @error('category')
                            <div class="alert alert-danger mt-2">{{ $message }}</div>
                        @enderror
                        <div class="modal-footer">
                            <button type="button" class="btn btn-label-secondary"
                                data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit Sub Category Modal -->
    <div wire:ignore.self class="modal fade" id="editSubCategoryModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalCenterTitle">Edit item</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form wire:submit.prevent="subUpdate">
                        <div class="form-group mb-2">
                            <label for="categorySelect">Category</label>
                            <select class="form-control" id="categorySelect" wire:model="category">
                                <option value="">Select Category</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->category }}</option>
                                @endforeach
                            </select>
                        </div>
                        @error('category')
                            <div class="alert alert-danger mt-2">{{ $message }}</div>
                        @enderror
                        <input type="hidden" wire:model="editID">
                        <div class="form-group">
                            <label for="categoryName">Sub Category Name</label>
                            <input type="text" class="form-control" id="categoryName" wire:model="sub_category"
                                placeholder="Enter sub category name" required>
                        </div>
                        @error('sub_category')
                            <div class="alert alert-danger mt-2">{{ $message }}</div>
                        @enderror
                        <div class="modal-footer">
                            <button type="button" class="btn btn-label-secondary"
                                data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Delete Category Modal -->
    <div wire:ignore.self class="modal fade" id="deleteCategoryModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalCenterTitle">Delete item</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Do you want to delete this item?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" wire:click="delete()">
                        Yes
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Delete Sub Category Modal -->
    <div wire:ignore.self class="modal fade" id="deleteSubCategoryModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalCenterTitle">Delete item</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Do you want to delete this item?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" wire:click="subDelete()">
                        Yes
                    </button>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
        <script>
            window.addEventListener('close-modal', event => {
                $('#createCategoryModal').modal('hide');
                $('#createSubCategoryModal').modal('hide');
                $('#editCategoryModal').modal('hide');
                $('#editSubCategoryModal').modal('hide');
                $('#deleteCategoryModal').modal('hide');
                $('#deleteSubCategoryModal').modal('hide');
            });

            window.addEventListener('show-edit-modal', event => {
                $('#editCategoryModal').modal('show');
            });

            window.addEventListener('show-sub-edit-modal', event => {
                $('#editSubCategoryModal').modal('show');
            });


            window.addEventListener('show-delete-confirmation-modal', event => {
                $('#deleteCategoryModal').modal('show');
            });

            window.addEventListener('show-sub-delete-confirmation-modal', event => {
                $('#deleteSubCategoryModal').modal('show');
            });
        </script>
    @endpush
</div>
