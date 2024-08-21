@extends('partials.layout')

@section('title')
    {{ 'Mails' }}
@endsection

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="d-flex justify-content-between align-items-center">
                        <h5 class="card-header">Mails ({{ $counts }})</h5>
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
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Subject</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody class="table-border-bottom-0">
                                @forelse($items as $index => $item)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $item->email }}</td>
                                        <td>{{ $item->phone }}</td>
                                        <td>{{ $item->subject }}</td>
                                        <td>
                                            <span
                                                class="badge bg-{{ $item->status == 'read' ? 'success' : ($item->status == 'unread' ? 'warning' : 'danger') }}">
                                                {{ ucfirst($item->status) }}
                                            </span>
                                        </td>
                                        <td>
                                            <span class="d-flex">
                                                <a href="{{ route('contact_mail.view', ['id' => $item->id]) }}"
                                                    class="me-4"
                                                    style="border: none; background: transparent; color: #696cff; font-size: 20px;">
                                                    <i class="fa-regular fa-eye"></i>
                                                </a>
                                            </span>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="text-center">No data found</td>
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
@endsection
