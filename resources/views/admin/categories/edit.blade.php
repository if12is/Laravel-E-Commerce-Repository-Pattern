@extends('layouts.master')

@section('title', 'Dashboard - Category')
@section('style')

@endsection

@section('content')
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"> <a href="{{ route('admin.categories.index') }}">Category
            </a> /</span> {{ $category->name }} </h4>
    <div class="container-xxl flex-grow-1 container-p-y">


        <!-- Offcanvas to add new Category -->
        <div class="card">
            <div class="card-header">
                <h5 id="offcanvasAddUserLabel" class="offcanvas-title">Update Category</h5>
            </div>
            <div class="card-body mx-0 flex-grow-0 pt-0 h-100">
                <form class="add-new-category pt-0 fv-plugins-bootstrap5 fv-plugins-framework" id="addNewUserForm"
                    action="{{ route('admin.categories.update', $category->id) }}" enctype="multipart/form-data"
                    method="post">
                    @csrf
                    @method('PUT')
                    <div class="mb-3 fv-plugins-icon-container">
                        <label class="form-label" for="add-category-name"> Name</label>
                        <input type="text" class="form-control  @error('name') is-invalid @enderror"
                            id="add-category-name" placeholder="category ..." name="name" value="{{ $category->name }}"
                            aria-label="category ...">
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <div class="fv-plugins-message-container invalid-feedback"></div>
                    </div>

                    <div class="mb-3 fv-plugins-icon-container">
                        <label class="form-label" for="add-category-slug">slug</label>
                        <textarea type="text" id="add-category-slug" class="form-control  @error('slug') is-invalid @enderror"
                            placeholder="Add slug" aria-label="Add slug" name="slug">{{ $category->slug }}</textarea>
                        @error('slug')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <div class="fv-plugins-message-container invalid-feedback"></div>
                    </div>
                    @if ($category->child_count < 1)

                        <div class="col-md-12 select2-primary">
                            <label class="form-label" for="multicol-parent_id">Main Category</label>
                            <select id="multicol-parent_id" name="parent_id"
                                class="select2 form-select @error('parent_id') is-invalid @enderror">
                                <option value=" " @if ($category->parent_id == null) selected @endif>Main Category
                                </option>
                                @foreach ($mainCategories as $item)
                                    <option value="{{ $item->id }}" @if ($category->parent_id == $item->id) selected @endif>
                                        {{ $item->name }}</option>
                                @endforeach
                            </select>
                            @error('parent_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    @endif
                    <div class="col-md-12 my-3 fv-plugins-icon-container">
                        <label for="formFile" class="form-label">Upload Category Image </label>
                        <input class="form-control dropify @error('image') is-invalid @enderror" name="image"
                            data-default-file="{{ asset($category->image) }}" type="file" id="formFile"
                            value="{{ old('image') }}">
                        @error('image')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <button type="submit"
                        class="btn btn-primary my-2 me-sm-3 me-1 data-submit waves-effect waves-light">Submit</button>
                    <button type="reset" class="btn btn-label-secondary waves-effect"
                        data-bs-dismiss="offcanvas">Cancel</button>
                    <input type="hidden">
                </form>
            </div>
        </div>
    </div>
@endsection
@section('script')
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
    </script>
@endsection
