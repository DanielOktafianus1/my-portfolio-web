<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>ADMIN PORTLINE</title>
    <!-- plugins:css -->
    <link rel="stylesheet"
        href="{{ asset('assetTemplate/template/assets/vendors/mdi/css/materialdesignicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assetTemplate/template/assets/vendors/css/vendor.bundle.base.css') }}">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="{{ asset('assetTemplate/template/assets/css/style.css') }}">
    <!-- End layout styles -->

    {{-- CDN toastr --}}
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet" />


</head>

<body>

    <div class="container-scroller">
        <div class="container-fluid page-body-wrapper full-page-wrapper">
            <div class="row w-100 m-0">
                <div class="content-wrapper full-page-wrapper d-flex align-items-center auth login-bg">
                    <div class="card col-lg-4 mx-auto">
                        <div class="card-body px-5 py-5">
                            <h3 class="card-title text-left mb-3">Register</h3>
                            <form action="{{ route('actionRegister') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="inputName">Username</label>
                                    <input type="text" class="form-control p_input text-white" name="name"
                                        id="inputName" value="{{ old('name') }}">
                                    @error('name')
                                        <span class="text-danger"
                                            style="font-size: 12px; font-style:italic">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="inputEmail">Email</label>
                                    <input type="email" class="form-control p_input text-white" name="email"
                                        id="inputEmail" value="{{ old('email') }}">
                                    @error('email')
                                        <span class="text-danger"
                                            style="font-size: 12px; font-style:italic">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="inputPassword">Password</label>
                                    <input type="password" class="form-control p_input text-white" name="password"
                                        id="inputPassword">
                                    @error('password')
                                        <span class="text-danger"
                                            style="font-size: 12px; font-style:italic">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group mb-5">
                                    <label for="inputPassword">Confirm Password *</label>
                                    <input type="password" class="form-control p_input text-white" id="inputPassword"
                                        name="password_confirmation">

                                    @error('password')
                                        <span class="text-danger"
                                            style="font-size: 12px; font-style:italic">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="text-end">
                                    <button type="submit" class="btn btn-primary btn-block enter-btn">Create
                                        Acount</button>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
                <!-- content-wrapper ends -->
            </div>
            <!-- row ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>

    {{-- CDN jQuery --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    {{-- CDN Toastr --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    {{-- Alert failed register --}}
    @if (session('registerValidateError'))
        <script>
            toastr.error(@json(session('registerValidateError')))
        </script>
    @endif



    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="../../assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="{{ asset('assetTemplate/template/assets/js/off-canvas.js') }}"></script>
    <script src="{{ asset('assetTemplate/template/assets/js/hoverable-collapse.js') }}"></script>
    <script src="{{ asset('assetTemplate/template/assets/js/misc.js') }}"></script>
    <script src="{{ asset('assetTemplate/template/assets/js/settings.js') }}"></script>
    <script src="{{ asset('assetTemplate/template/assets/js/todolist.js') }}"></script>
    <!-- endinject -->

</body>

</html>
