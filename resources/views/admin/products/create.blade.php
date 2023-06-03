@extends('layouts.master')

@section('title', 'Dashboard - Product')
@section('style')
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/bootstrap-maxlength/bootstrap-maxlength.css') }}" />

@endsection

@section('content')
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"> <a href="{{ route('admin.products.index') }}">Product
            </a> /</span>{{ __('dashboard.Products') }} </h4>
    <div class="container-xxl flex-grow-1 container-p-y">


        <!-- Offcanvas to add new Product -->
        <div class="card">
            <div class="card-header">
                <h5 id="offcanvasAddUserLabel" class="offcanvas-title">Create Product</h5>
            </div>
            <div class="card-body mx-0 flex-grow-0 pt-0 h-100">
                <form class="add-new-product pt-0 fv-plugins-bootstrap5 fv-plugins-framework" id="addNewUserForm"
                    action="{{ route('admin.products.store') }}" enctype="multipart/form-data" method="post">
                    @csrf
                    @method('POST')
                    <div class="mb-3 fv-plugins-icon-container">
                        <label class="form-label" for="add-product-name"> Name</label>
                        <input type="text" class="form-control  @error('name') is-invalid @enderror"
                            id="add-product-name" placeholder="product ..." name="name" aria-label="product ...">
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <div class="fv-plugins-message-container invalid-feedback"></div>
                    </div>

                    <div class="mb-3 fv-plugins-icon-container">
                        <label class="form-label" for="add-product-description">description</label>
                        <textarea type="text" id="add-product-description" class="form-control  @error('description') is-invalid @enderror"
                            placeholder="Add description" aria-label="Add description" name="description"></textarea>
                        @error('description')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <div class="fv-plugins-message-container invalid-feedback"></div>
                    </div>

                    <div class="mb-3 fv-plugins-icon-container">
                        <label class="form-label" for="add-product-price"> price</label>
                        <input type="text" class="form-control numeral-mask @error('price') is-invalid @enderror"
                            id="add-product-price" placeholder="product price" name="price" aria-label="product ...">
                        @error('price')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <div class="fv-plugins-message-container invalid-feedback"></div>
                    </div>

                    <div class="mb-3 fv-plugins-icon-container">
                        <label class="form-label" for="add-product-discount">Price discount</label>
                        <input type="text" class="form-control numeral-mask  @error('discount') is-invalid @enderror"
                            id="add-product-discount" placeholder="product discount" name="discount"
                            aria-label="product ...">
                        @error('discount')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <div class="fv-plugins-message-container invalid-feedback"></div>
                    </div>

                    <div class="mb-3 fv-plugins-icon-container">
                        <label class="form-label" for="add-product-stock">Number of product in stock</label>
                        <input type="text" class="form-control numeral-mask  @error('stock') is-invalid @enderror"
                            id="add-product-stock" placeholder="product stock" name="stock" aria-label="product ...">
                        @error('stock')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <div class="fv-plugins-message-container invalid-feedback"></div>
                    </div>


                    <div class="col-md-12 select2-primary">
                        <label class="form-label" for="multicol-category_id">Main Category</label>
                        <select id="multicol-category_id" name="category_id"
                            class="select2 form-select @error('category_id') is-invalid @enderror">
                            <option value="">Main Category</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @foreach ($category->child as $child)
                                    <option value="{{ $child->id }}">&nbsp;&nbsp;&#9733; {{ $child->name }}
                                    </option>
                                    @foreach ($child->child as $child2)
                                        <option value="{{ $child2->id }}">
                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&#9733;&#9733;
                                            {{ $child2->name }}
                                        </option>
                                    @endforeach
                                @endforeach
                            @endforeach
                        </select>
                        @error('category_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    {{-- jj --}}
                    <div class="my-2 py-2">
                        <div class="invoice-repeater">
                            <div data-repeater-list="group-a">
                                <div data-repeater-item="" style="">
                                    <div class="row">
                                        <div class="mb-3 col-lg-6 col-xl-3 col-12 mb-0">
                                            <label class="form-label" for="form-repeater-2-1">Username</label>
                                            <input type="text" id="form-repeater-2-1" class="form-control"
                                                placeholder="john.doe">
                                        </div>
                                        <div class="mb-3 col-lg-6 col-xl-3 col-12 mb-0">
                                            <label class="form-label" for="form-repeater-2-2">Password</label>
                                            <input type="password" id="form-repeater-2-2" class="form-control"
                                                placeholder="············">
                                        </div>
                                        <div class="mb-3 col-lg-6 col-xl-2 col-12 mb-0">
                                            <label class="form-label" for="form-repeater-2-3">Gender</label>
                                            <select id="form-repeater-2-3" class="form-select">
                                                <option value="Male">Male</option>
                                                <option value="Female">Female</option>
                                            </select>
                                        </div>
                                        <div class="mb-3 col-lg-6 col-xl-2 col-12 mb-0">
                                            <label class="form-label" for="form-repeater-2-4">Profession</label>
                                            <select id="form-repeater-2-4" class="form-select">
                                                <option value="Designer">Designer</option>
                                                <option value="Developer">Developer</option>
                                                <option value="Tester">Tester</option>
                                                <option value="Manager">Manager</option>
                                            </select>
                                        </div>
                                        <div class="mb-3 col-lg-12 col-xl-2 col-12 d-flex align-items-center mb-0">
                                            <button type="button" class="btn btn-label-danger mt-4 waves-effect"
                                                data-repeater-delete="">
                                                <i class="ti ti-x ti-xs me-1"></i>
                                                <span class="align-middle">Delete</span>
                                            </button>
                                        </div>
                                    </div>
                                    <hr>
                                </div>
                            </div>
                            <div class="mb-0">
                                <button type="button" class="btn btn-primary waves-effect waves-light"
                                    data-repeater-create="">
                                    <i class="ti ti-plus me-1"></i>
                                    <span class="align-middle">Add</span>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3 fv-plugins-icon-container">
                        <label for="formFile" class="form-label">Product Image </label>
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
@endsection
@section('script')
    <script src="{{ asset('assets/vendor/libs/autosize/autosize.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/cleavejs/cleave.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/cleavejs/cleave-phone.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/bootstrap-maxlength/bootstrap-maxlength.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/jquery-repeater/jquery-repeater.js') }}"></script>
    <script src="{{ asset('assets/js/forms-extras.js') }}"></script>
    <script>
        $('.dropify').dropify({
            messages: {
                default: 'Drag and drop a file here or click',
                replace: 'Drag and drop or click to replace',
                remove: '<i class="fas fa-trash"></i>',
                error: 'Ooops, something wrong appended.'
            },
            tpl: {
                wrap: '<div class="dropify-wrapper"></div>',
                loader: '<div class="dropify-loader"></div>',
                errorsContainer: '<div class="dropify-errors-container"><ul></ul></div>'
            }
        });

        $('.invoice-repeater, .repeater-default').repeater({
            show: function() {
                $(this).slideDown();
                // Feather Icons
                if (feather) {
                    feather.replace({
                        width: 14,
                        height: 14
                    });
                }
            },
            hide: function(deleteElement) {
                if (confirm('Are you sure you want to delete this element?')) {
                    $(this).slideUp(deleteElement);
                }
            }
        });
    </script>
@endsection
