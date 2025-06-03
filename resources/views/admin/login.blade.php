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
                            <h3 class="card-title text-left mb-3">Login</h3>



                            <form action="{{ route('actionLogin') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="inputEmail">Username or email *</label>
                                    <input type="email" class="form-control p_input text-white" id="inputEmail"
                                        name="email" value="{{ old('email') }}">
                                    <span id="errorEmail" class="text-danger"
                                        style="font-size: 12px; font-style:italic"></span>
                                </div>

                                <div class="form-grou mb-5">
                                    <label for="inputPassword">Password *</label>
                                    <input type="password" class="form-control p_input text-white" id="inputPassword"
                                        name="password">
                                    <span id="errorPassword" class="text-danger"
                                        style="font-size: 12px; font-style:italic"></span>
                                </div>




                                <div class=" text-end">
                                    <button type="submit" class="btn btn-primary btn-block enter-btn"
                                        id="btnLogin">Login</button>
                                </div>


                                <p class="sign-up">Don't have an Account?<a href="#"> Sign Up</a></p>
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

    {{-- CDN toastr --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    @if (session('registerSuccess'))
        <script>
            toastr.success(@json(session('registerSuccess')))
        </script>
    @endif

    @if (session('loginFailed'))
        <script>
            toastr.error(@json(session('loginFailed')))
        </script>
    @endif

    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="{{ asset('assetTemplate/temlate/assets/vendors/js/vendor.bundle.base.js') }}"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="{{ asset('assetTemplate/temlate/assets/js/off-canvas.js') }}"></script>
    <script src="{{ asset('assetTemplate/temlate/assets/js/hoverable-collapse.js') }}"></script>
    <script src="{{ asset('assetTemplate/temlate/assets/js/misc.js') }}"></script>
    <script src="{{ asset('assetTemplate/temlate/assets/js/settings.js') }}"></script>
    <script src="{{ asset('assetTemplate/temlate/assets/js/todolist.js') }}"></script>
    <!-- endinject -->

    <script>
        // Email require
        document.getElementById('inputEmail').addEventListener('input', (inputEmail) => {
            const btnLogin = document.getElementById('btnLogin');
            let isValid = true;

            const email = inputEmail.target.value;
            const errorEmail = document.getElementById('errorEmail');
            errorEmail.textContent = '';
            const emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;

            if (!email) {
                errorEmail.textContent = 'Email must be filled in!';
                isValid = false
            } else if (!emailPattern.test(email)) {
                errorEmail.textContent = 'Email is invalid!';
                isValid = false
            }

            if (isValid == true) {
                btnLogin.disabled = false
            } else {
                btnLogin.disabled = true
            }
        })

        // Password require
        document.getElementById('inputPassword').addEventListener('input', (inputPassword) => {
            const btnLogin = document.getElementById('btnLogin');
            let isValid = true;

            const password = inputPassword.target.value;
            const errorPassword = document.getElementById('errorPassword');
            errorPassword.textContent = '';

            if (!password) {
                errorPassword.textContent = 'Password must be filled in!';
            } else if (password.length < 8) {
                errorPassword.textContent = 'Password must be at least 8 characters.';
            }

            if (isValid == true) {
                btnLogin.disabled = false;
            } else {
                btnLogin.disabled = true;
            }
        })
    </script>
</body>

</html>
