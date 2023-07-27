@extends('dashboard.layouts.app')

@section('title','Commodities')

@section('head-imports')
    <link href="{{ asset('assets/metronic/css/datatables.bundle.css') }}" rel="stylesheet" />
@endsection

@section('content')
    <div class="card card-xxl-stretch mb-5 mb-xl-8">
        <!--begin::Header-->
        <div class="card-header border-0 pt-5">
            <h3 class="card-title align-items-start flex-column">
                <span class="card-label fw-bolder fs-3 mb-1">Commodities</span>
                <span class="text-muted mt-1 fw-bold fs-7">{{ $commodities }} Commodities</span>
            </h3>
            <div class="card-toolbar">
                <a href="{{ route('dashboard.commodities.create') }}" class="btn btn-sm btn-light btn-active-primary">
                    <!--begin::Svg Icon | path: icons/duotune/arrows/arr075.svg-->
                    <span class="svg-icon svg-icon-3">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <rect opacity="0.5" x="11.364" y="20.364" width="16" height="2" rx="1" transform="rotate(-90 11.364 20.364)" fill="black" />
                            <rect x="4.36396" y="11.364" width="16" height="2" rx="1" fill="black" />
                        </svg>
                    </span>
                    <!--end::Svg Icon-->New Commodity</a>
            </div>
        </div>
        <!--end::Header-->
        <!--begin::Body-->
        <div class="py-3">
            <div class="card">
                <div class="card-body">
                    <table id="commodities-laratable" class="table table-striped table-row-bordered gy-5 gs-7 border rounded">
                        <thead>
                            <tr class="fw-bolder fs-6 text-gray-800 px-7">
                                <th>Name</th>
                                <th>Image</th>
                                <th>Category</th>
                                <th>Sub Category</th>
                                <th>Quantity</th>
                                <th>Price</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                    </table>
                </div> <!-- end card-body -->
            </div> <!-- end card -->
        </div>
        <!--end::Body-->
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('assets/metronic/js/datatables.bundle.js') }}"></script>
    <script>
        $(document).ready(function(){
            $("#commodities-laratable").DataTable({
                serverSide: true,
                ajax: "{{ route('dashboard.commodities.index') }}",
                columns: [                
                        { name: 'name' },
                        { name: 'cover' },
                        { name: 'category' , orderable:false, searchable: false },
                        { name: 'subCategory.name' , orderable:false },
                        { name: 'quantity' },
                        { name: 'price' },
                        { name: 'state' },
                        { name: 'action' , orderable: false, searchable: false }
                ],
                "language": {
                "lengthMenu": "Show _MENU_",
                },
                "dom":
                "<'row'" +
                "<'col-sm-6 d-flex align-items-center justify-conten-start'l>" +
                "<'col-sm-6 d-flex align-items-center justify-content-end'f>" +
                ">" +

                "<'table-responsive'tr>" +

                "<'row'" +
                "<'col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start'i>" +
                "<'col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end'p>" +
                ">"
            });
        });
    </script>
@endpush