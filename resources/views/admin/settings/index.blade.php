@extends('layouts.master')

@section('title', 'Dashboard-Settings')

@section('style')
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/bootstrap-select/bootstrap-select.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/select2/select2.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/formvalidation/dist/css/formValidation.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/node-waves/node-waves.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/typeahead-js/typeahead.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/bs-stepper/bs-stepper.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/dropzone/dropzone.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/flatpickr/flatpickr.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/bootstrap-datepicker/bootstrap-datepicker.css ') }}" />
    <link rel="stylesheet"
        href="{{ asset('assets/vendor/libs/bootstrap-daterangepicker/bootstrap-daterangepicker.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/jquery-timepicker/jquery-timepicker.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/pickr/pickr-themes.css ') }}" />

@endsection
@section('content')

    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Settings/</span> Settings</h4>
    <!-- Multi Column with Form Separator -->
    <div class="card mb-4">
        <h5 class="card-header">Settings</h5>
        <form class="card-body " action="{{ route('admin.settings.update', $setting->id) }}" method="POST"
            enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <h6>1. Setting Details</h6>
            <div class="row g-3">
                <div class="col-md-12">
                    <label class="form-label" for="multicol-logo">logo</label>
                    <input type="file" name="logo" id="multicol-logo"
                        class="form-control dropify @error('logo') is-invalid @enderror" value="{{ $setting->logo }}"
                        data-default-file="{{ asset($setting->logo) }}" placeholder="" />
                    @error('logo')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-md-12">
                    <label class="form-label" for="multicol-favicon">favicon</label>
                    <input type="file" name="favicon" id="multicol-favicon"
                        class="form-control dropify @error('favicon') is-invalid @enderror" value="{{ $setting->favicon }}"
                        data-default-file="{{ asset($setting->favicon) }}" placeholder="" />
                    @error('favicon')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-md-12">
                    <label class="form-label" for="multicol-email">email</label>
                    <input type="email" name="email" id="multicol-email"
                        class="form-control @error('email') is-invalid @enderror" value="{{ $setting->email }}"
                        placeholder="" />
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-md-12">
                    <label class="form-label" for="multicol-title">title</label>
                    <input type="text" name="title" id="multicol-title"
                        class="form-control @error('title') is-invalid @enderror" placeholder=""
                        value="{{ $setting->title }}" />
                    @error('title')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-md-12">
                    <label class="form-label" for="multicol-description">description</label>
                    <input type="text" name="description" id="multicol-description"
                        class="form-control @error('description') is-invalid @enderror" placeholder=""
                        value="{{ $setting->description }}" />
                    @error('description')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-md-12">
                    <label class="form-label" for="multicol-keywords">keywords</label>
                    <input type="text" name="keywords" id="multicol-keywords"
                        class="form-control @error('keywords') is-invalid @enderror" placeholder=""
                        value="{{ $setting->keywords }}" />
                    @error('keywords')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-md-12">
                    <label class="form-label" for="multicol-status">status</label>
                    <input type="text" name="status" id="multicol-status"
                        class="form-control @error('status') is-invalid @enderror" placeholder=""
                        value="{{ $setting->status }}" />
                    @error('status')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-md-12">
                    <label class="form-label" for="multicol-maintenance">maintenance</label>
                    <input type="text" name="maintenance" id="multicol-maintenance"
                        class="form-control @error('maintenance') is-invalid @enderror" placeholder="maintenance"
                        value="{{ $setting->maintenance }}" />
                    @error('maintenance')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-md-12">
                    <label class="form-label" for="multicol-phone">Phone No</label>
                    <input type="text" id="multicol-phone" name="phone"
                        class="form-control phone-mask @error('phone') is-invalid @enderror" placeholder="658 799 8941"
                        aria-label="658 799 8941" value="{{ $setting->phone }}" />
                    @error('phone')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <hr class="my-4 mx-n4" />
            <h6>2. Social Links </h6>
            <div class="row g-3">

                <div class="col-sm-6">
                    <label class="form-label" for="twitter-vertical">Twitter</label>
                    <input type="text" id="twitter-vertical" name="twitter"
                        class="form-control @error('twitter') is-invalid @enderror" value="{{ $setting->twitter }}"
                        placeholder="https://twitter.com/abc">
                    @error('twitter')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-sm-6">
                    <label class="form-label" for="facebook-vertical">Facebook</label>
                    <input type="text" id="facebook-vertical" name="facebook"
                        class="form-control @error('facebook') is-invalid @enderror"
                        placeholder="https://facebook.com/abc" value="{{ $setting->facebook }}">
                    @error('facebook')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-sm-6">
                    <label class="form-label" for="instagram-vertical">Instagram</label>
                    <input type="text" id="instagram-vertical" name="instagram"
                        class="form-control @error('instagram') is-invalid @enderror"
                        placeholder="https://plus.instagram.com/abc" value="{{ $setting->instagram }}">
                    @error('instagram')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-sm-6">
                    <label class="form-label" for="github-vertical">Github</label>
                    <input type="text" id="github-vertical" name="github"
                        class="form-control @error('github') is-invalid @enderror" value="{{ $setting->github }}"
                        placeholder="https://github.com/abc">
                    @error('github')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-sm-6">
                    <label class="form-label" for="youtube-vertical">Youtube</label>
                    <input type="text" id="youtube-vertical" name="youtube"
                        class="form-control @error('youtube') is-invalid @enderror" placeholder="https://youtube.com/abc"
                        value="{{ $setting->youtube }}">
                    @error('youtube')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-sm-6">
                    <label class="form-label" for="whatsapp-vertical">WhatsApp</label>
                    <input type="text" id="whatsapp-vertical" name="whatsapp"
                        class="form-control @error('whatsapp') is-invalid @enderror"
                        placeholder="https://wa.me/15551234567" value="{{ $setting->whatsapp }}">
                    @error('whatsapp')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>


            </div>
            <hr class="my-4 mx-n4" />
            <h6>3.Language </h6>
            <div class="col-md-12 select2-primary">
                <label class="form-label" for="multicol-language">Language</label>
                <select id="multicol-language" name="language"
                    class="select2 form-select @error('language') is-invalid @enderror">
                    <option value="en">English</option>
                    <option value="ar" selected>Arabic</option>
                </select>
                @error('language')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            {{-- <div class="col-12 my-2">
                <div class="card">
                    <h5 class="card-header">Color Picker</h5>
                    <div class="card-body">
                        <div class="row">
                            <div class="classic col col-sm-3 col-lg-2">
                                <p>Classic</p>
                                <div class="pickr">
                                    <button type="button" class="pcr-button" role="button"
                                        aria-label="toggle color picker dialog"
                                        style="--pcr-color:rgba(102, 108, 232, 1);"></button>
                                </div>
                            </div>
                            <div class="monolith col col-sm-3 col-lg-2">
                                <p>Monolith</p>
                                <div class="pickr">
                                    <button type="button" class="pcr-button" role="button"
                                        aria-label="toggle color picker dialog"
                                        style="--pcr-color:rgba(40, 208, 148, 1);"></button>
                                </div>
                            </div>
                            <div class="nano col col-sm-3 col-lg-2">
                                <p>Nano</p>
                                <div class="pickr">
                                    <button type="button" class="pcr-button" role="button"
                                        aria-label="toggle color picker dialog"
                                        style="--pcr-color:rgba(255, 73, 97, 1);"></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> --}}
            <div class="pt-4">
                <button type="submit" class="btn btn-primary me-sm-3 me-1">Submit</button>
                {{-- <button type="reset" class="btn btn-label-secondary">Cancel</button> --}}
            </div>
        </form>
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
    <script src="{{ asset('assets/vendor/libs/bs-stepper/bs-stepper.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/bootstrap-select/bootstrap-select.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/select2/select2.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/formvalidation/dist/js/FormValidation.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/formvalidation/dist/js/plugins/Bootstrap5.min.js') }}"></script>

    <!-- Vendors JS -->
    <script src="{{ asset('assets/vendor/libs/dropzone/dropzone.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/formvalidation/dist/js/plugins/AutoFocus.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/moment/moment.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/flatpickr/flatpickr.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/bootstrap-datepicker/bootstrap-datepicker.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/bootstrap-daterangepicker/bootstrap-daterangepicker.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/jquery-timepicker/jquery-timepicker.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/pickr/pickr.js') }}"></script>
    <!-- Page JS -->

    <script src="{{ asset('assets/js/form-wizard-numbered.js') }}"></script>
    <script src="{{ asset('assets/js/form-wizard-validation.js') }}"></script>
    <script src="{{ asset('assets/js/forms-pickers.js') }}"></script>
    <script src="{{ asset('assets/js/forms-file-upload.js') }}"></script>
@endsection
