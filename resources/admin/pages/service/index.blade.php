@extends('partials.layout')

@section('title')
    {{ 'Services' }}
@endsection

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="d-flex justify-content-between align-items-center">
                        <h5 class="card-header">Services ({{ $items->total() }})</h5>
                        <a href="{{ route('service.create') }}" class="btn btn-primary me-4">
                            Create
                        </a>
                    </div>
                    
                    {{-- pagination --}}
                    <div class="dataTables_paginate paging_simple_numbers mt-4"
                        style="width: 100%;
                        display: flex;
                        flex-direction: row-reverse;">
                        <ul class="pagination">
                            @if ($items->onFirstPage())
                                <li class="paginate_button page-item previous disabled">
                                    <a class="page-link">
                                        <i class="bx bx-chevron-left bx-18px"></i>
                                    </a>
                                </li>
                            @else
                                <li class="paginate_button page-item previous">
                                    <a class="page-link" href="{{ $items->previousPageUrl() }}">
                                        <i class="bx bx-chevron-left bx-18px"></i>
                                    </a>
                                </li>
                            @endif

                            @foreach ($items->getUrlRange(1, $items->lastPage()) as $page => $url)
                                <li class="paginate_button page-item {{ $page == $items->currentPage() ? 'active' : '' }}">
                                    <a href="{{ $url }}" class="page-link">
                                        {{ $page }}
                                    </a>
                                </li>
                            @endforeach

                            @if ($items->hasMorePages())
                                <li class="paginate_button page-item next">
                                    <a class="page-link" href="{{ $items->nextPageUrl() }}">
                                        <i class="bx bx-chevron-right bx-18px"></i>
                                    </a>
                                </li>
                            @else
                                <li class="paginate_button page-item next disabled">
                                    <a class="page-link">
                                        <i class="bx bx-chevron-right bx-18px"></i>
                                    </a>
                                </li>
                            @endif
                        </ul>
                    </div>

                    <div class="table-responsive text-nowrap">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>SL</th>
                                    <th>Thumb</th>
                                    <th>Title</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody class="table-border-bottom-0">
                                @forelse($items as $index => $item)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>
                                            <div class="avatar-wrapper">
                                                <div class="avatar me-2">
                                                    <img src="{{ asset($item->cover_photo) }}" alt="Service Image">
                                                </div>
                                            </div>
                                        </td>
                                        <td>{{ $item->title }}</td>
                                        <td>
                                            <span
                                                class="badge bg-{{ $item->status == 'active' ? 'success' : ($item->status == 'inactive' ? 'warning' : 'danger') }}">
                                                {{ ucfirst($item->status) }}
                                            </span>
                                        </td>
                                        <td>
                                            <span class="d-flex">
                                                <a href="{{ route('service.edit', ['id' => $item->id]) }}" class="me-4"
                                                    style="border: none; background: transparent; color: #696cff; font-size: 20px;">
                                                    <i class='bx bx-pencil'></i>
                                                </a>
                                                <button type="submit"
                                                    style="border: none; background: transparent; color: #696cff; font-size: 20px;"
                                                    data-bs-toggle="modal" data-bs-target="#deleteItemModal"
                                                    data-category-id="{{ $item->id }}"
                                                    onclick="document.getElementById('ItemID').value = {{ $item->id }}">
                                                    <i class='bx bx-trash'></i>
                                                </button>
                                            </span>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="7" class="text-center">No data found</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    {{-- pagination --}}
                    <div class="dataTables_paginate paging_simple_numbers mt-4"
                        style="width: 100%;
                        display: flex;
                        flex-direction: row-reverse;">
                        <ul class="pagination">
                            @if ($items->onFirstPage())
                                <li class="paginate_button page-item previous disabled">
                                    <a class="page-link">
                                        <i class="bx bx-chevron-left bx-18px"></i>
                                    </a>
                                </li>
                            @else
                                <li class="paginate_button page-item previous">
                                    <a class="page-link" href="{{ $items->previousPageUrl() }}">
                                        <i class="bx bx-chevron-left bx-18px"></i>
                                    </a>
                                </li>
                            @endif

                            @foreach ($items->getUrlRange(1, $items->lastPage()) as $page => $url)
                                <li class="paginate_button page-item {{ $page == $items->currentPage() ? 'active' : '' }}">
                                    <a href="{{ $url }}" class="page-link">
                                        {{ $page }}
                                    </a>
                                </li>
                            @endforeach

                            @if ($items->hasMorePages())
                                <li class="paginate_button page-item next">
                                    <a class="page-link" href="{{ $items->nextPageUrl() }}">
                                        <i class="bx bx-chevron-right bx-18px"></i>
                                    </a>
                                </li>
                            @else
                                <li class="paginate_button page-item next disabled">
                                    <a class="page-link">
                                        <i class="bx bx-chevron-right bx-18px"></i>
                                    </a>
                                </li>
                            @endif
                        </ul>
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
                    Do you want to delete this item?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">
                        Close
                    </button>
                    <form id="deleteForm" action="{{ route('service.delete', ['id' => 0]) }}" method="POST">
                        @csrf
                        <input type="hidden" name="id" id="ItemID">
                        <button type="submit" class="btn btn-primary">
                            Yes
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const deleteLinks = document.querySelectorAll('.delete-item');

            deleteLinks.forEach(link => {
                link.addEventListener('click', function(e) {
                    e.preventDefault();
                    const itemId = this.dataset.itemId;
                    const form = document.querySelector('#deleteForm');
                    form.action = '{{ route('service.delete', ['id' => '']) }}/' + itemId;
                });
            });
        });
    </script>
@endsection
