@extends('layouts.master')

@section('title', 'Dashboard - Category')
@section('style')

    {{-- <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css" /> --}}
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/dropzone/dropzone.css') }}" />
    {{-- import css of datatabe --}}
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/flatpickr/flatpickr.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/animate-css/animate.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/sweetalert2/sweetalert2.css') }}" />
@endsection

@section('content')
    <h4 class="fw-bold py-3 mb-4">Category</h4>
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row g-4 mb-4">
            <div class="col-sm-6 col-xl-3">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex align-items-start justify-content-between">
                            <div class="content-left">
                                <span>Session</span>
                                <div class="d-flex align-items-center my-1">
                                    <h4 class="mb-0 me-2">21,459</h4>
                                    <span class="text-success">(+29%)</span>
                                </div>
                                <span>Total Users</span>
                            </div>
                            <span class="badge bg-label-primary rounded p-2">
                                <i class="ti ti-user ti-sm"></i>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-xl-3">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex align-items-start justify-content-between">
                            <div class="content-left">
                                <span>Paid Users</span>
                                <div class="d-flex align-items-center my-1">
                                    <h4 class="mb-0 me-2">4,567</h4>
                                    <span class="text-success">(+18%)</span>
                                </div>
                                <span>Last week analytics </span>
                            </div>
                            <span class="badge bg-label-danger rounded p-2">
                                <i class="ti ti-user-plus ti-sm"></i>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-xl-3">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex align-items-start justify-content-between">
                            <div class="content-left">
                                <span>Active Users</span>
                                <div class="d-flex align-items-center my-1">
                                    <h4 class="mb-0 me-2">19,860</h4>
                                    <span class="text-danger">(-14%)</span>
                                </div>
                                <span>Last week analytics</span>
                            </div>
                            <span class="badge bg-label-success rounded p-2">
                                <i class="ti ti-user-check ti-sm"></i>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-xl-3">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex align-items-start justify-content-between">
                            <div class="content-left">
                                <span>Pending Users</span>
                                <div class="d-flex align-items-center my-1">
                                    <h4 class="mb-0 me-2">237</h4>
                                    <span class="text-success">(+42%)</span>
                                </div>
                                <span>Last week analytics</span>
                            </div>
                            <span class="badge bg-label-warning rounded p-2">
                                <i class="ti ti-user-exclamation ti-sm"></i>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>



        <!-- Contextual Classes -->

        <div class="card">
            <div class="head-of-table row">
                <div class="col">
                    <h5 class="card-header">Categories</h5>
                </div>
                <div class="col-2">
                    <button class="dt-button add-new btn btn-primary my-3" tabindex="0" aria-controls="DataTables_Table_0"
                        type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasAddUser"><span><i
                                class="ti ti-plus me-0 me-sm-1 ti-xs"></i><span class="d-none d-sm-inline-block">Add
                                Category</span></span></button>
                </div>
            </div>
            <div class="card-datatable text-nowrap">
                <table class="table table-hover table-sm" id="datatable-ajax-category">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>name</th>
                            <th>Slug</th>
                            <th>image</th>
                            <th>Main Category</th>
                            <th>Ations</th>
                        </tr>

                        <div class="modal animate__animated animate__shakeX" id="deleteModal" tabindex="-1"
                            style="display: none;" aria-hidden="true">
                            <div class="modal-dialog modal-md" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="deleteModalLabel">Confirm Delete</h5>
                                    </div>
                                    <div class="modal-body text-center">
                                        <div class="swal2-icon swal2-warning swal2-icon-show" style="display: flex;">
                                            <div class="swal2-icon-content">!</div>
                                        </div>
                                        <h2 class="swal2-title" id="swal2-title" style="display: block;">Are you sure?</h2>
                                        <div class="swal2-html-container" id="swal2-html-container" style="display: block;">
                                            You won't be able to revert delete <span id="nameItem" class="text-danger">
                                            </span>!
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-label-secondary waves-effect"
                                            data-bs-dismiss="modal">
                                            Close
                                        </button>
                                        <form action="{{ route('admin.categories.delete') }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <input type="hidden" name="id" id="id">
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </thead>
                </table>
            </div>
        </div>
        <!--/ Contextual Classes -->

        <div class="card">
            <!-- Offcanvas to add new Category -->
            <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasAddUser"
                aria-labelledby="offcanvasAddUserLabel">
                <div class="offcanvas-header">
                    <h5 id="offcanvasAddUserLabel" class="offcanvas-title">Add Category</h5>
                    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"
                        aria-label="Close"></button>
                </div>
                <div class="offcanvas-body mx-0 flex-grow-0 pt-0 h-100">
                    <form class="add-new-category pt-0 fv-plugins-bootstrap5 fv-plugins-framework" id="addNewUserForm"
                        action="{{ route('admin.categories.store') }}" enctype="multipart/form-data" method="post">
                        @csrf
                        @method('POST')
                        <div class="mb-3 fv-plugins-icon-container">
                            <label class="form-label" for="add-category-name"> Name</label>
                            <input type="text" class="form-control  @error('name') is-invalid @enderror"
                                id="add-category-name" placeholder="category ..." name="name"
                                aria-label="category ...">
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <div class="fv-plugins-message-container invalid-feedback"></div>
                        </div>

                        <div class="mb-3 fv-plugins-icon-container">
                            <label class="form-label" for="add-category-slug">slug</label>
                            <textarea type="text" id="add-category-slug" class="form-control  @error('slug') is-invalid @enderror"
                                placeholder="Add slug" aria-label="Add slug" name="slug"></textarea>
                            @error('slug')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <div class="fv-plugins-message-container invalid-feedback"></div>
                        </div>

                        <div class="col-md-12 select2-primary">
                            <label class="form-label" for="multicol-parent_id">Main Category</label>
                            <select id="multicol-parent_id" name="parent_id"
                                class="select2 form-select @error('parent_id') is-invalid @enderror">
                                <option value="">Main Category</option>
                                @foreach ($mainCategories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                            @error('parent_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="mb-3 fv-plugins-icon-container">
                            <label for="formFile" class="form-label">Upload Category Image </label>
                            <input class="form-control dropify @error('image') is-invalid @enderror" name="image"
                                type="file" id="formFile" value="{{ old('image') }}">
                            @error('image')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <button type="submit"
                            class="btn btn-primary me-sm-3 me-1 data-submit waves-effect waves-light">Submit</button>
                        <button type="reset" class="btn btn-label-secondary waves-effect"
                            data-bs-dismiss="offcanvas">Cancel</button>
                        <input type="hidden">
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <!-- Vendors JS -->
    {{-- <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script> --}}
    {{-- <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script> --}}
    <script>
        $('.dropify').dropify({
            messages: {
                default: 'Drag and drop',
                remove: '<i class="fas fa-trash"></i>',
                error: 'Ooops, something wrong appended.'
            },
            tpl: {
                wrap: '<div class="dropify-wrapper"></div>',
                loader: '<div class="dropify-loader"></div>',
                errorsContainer: '<div class="dropify-errors-container"><ul></ul></div>'
            }
        });
    </script>
    <script src="{{ asset('assets/vendor/libs/dropzone/dropzone.js') }}"></script>

    <!-- Page JS -->
    <script src="{{ asset('assets/js/forms-file-upload.js') }}"></script>
    <!-- Vendors JS -->
    <script src="{{ asset('assets/vendor/libs/datatables/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/datatables-responsive/datatables.responsive.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.js') }}"></script>

    <script src="{{ asset('assets/vendor/libs/sweetalert2/sweetalert2.js') }}"></script>


    <script src="{{ asset('assets/js/extended-ui-sweetalert2.js') }}"></script>
    <script src="{{ asset('assets/js/ui-modals.js') }}"></script>
    <script src="{{ asset('assets/js/tables-datatables-advanced.js') }}"></script>

    <script>
        // make datatable ajax code to get data category
        $(document).ready(function() {
            $('#datatable-ajax-category').DataTable({
                "processing": true,
                "serverSide": true,
                "ajax": "{{ route('admin.cat.getallcategories') }}",
                "columns": [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex',
                        orderable: true,
                        searchable: true
                    },
                    {
                        data: 'name',
                        name: 'name',
                    },
                    {
                        data: 'slug',
                        name: 'slug'
                    },
                    {
                        data: 'image',
                        name: 'image'
                    },
                    {
                        data: 'parent',
                        name: 'parent'
                    },
                    {
                        data: 'action',
                        name: 'action',
                    },
                ]
            });
        });
        // pass id of item delete to the model
        $('#deleteModal').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var id = button.data('id')
            var name = button.data('name')
            var modal = $(this)
            modal.find('.modal-footer #id').val(id);
            modal.find('.modal-body #nameItem').html(name);
        })
    </script>
@endsection
