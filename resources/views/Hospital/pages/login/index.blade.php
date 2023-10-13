<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('Dashboard/assets/plugins/login/fonts/icomoon/style.css') }}">

    <link rel="stylesheet" href="{{ asset('Dashboard/assets/plugins/login/css/owl.carousel.min.css') }}">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('Dashboard/assets/plugins/login/css/bootstrap.min.css') }}">

    <!-- Style -->
    <link rel="stylesheet" href="{{ asset('Dashboard/assets/plugins/login/css/style.css') }}">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>

    <title>Login</title>
</head>
<body>
@if(\Illuminate\Support\Facades\Session::has('msg'))
    <script>
        Toastify({
            text:"{{ \Illuminate\Support\Facades\Session::get('msg')  }}",
            duration: 3000,
            newWindow: true,
            close: true,
            gravity: "top", // `top` or `bottom`
            position: "right", // `left`, `center` or `right`
            backgroundColor: "linear-gradient(to right, rgb(255, 95, 109), rgb(255, 195, 113))",
            stopOnFocus: true, // Prevents dismissing of toast on hover
        }).showToast();
    </script>
@endif
    @foreach($errors->all() as $error)
        <script>
            Toastify({
                text:"{{ $error  }}",
                duration: 3000,
                newWindow: true,
                close: true,
                gravity: "top", // `top` or `bottom`
                position: "right", // `left`, `center` or `right`
                backgroundColor: "linear-gradient(to right, rgb(255, 95, 109), rgb(255, 195, 113))",
                stopOnFocus: true, // Prevents dismissing of toast on hover
            }).showToast();
        </script>
    @endforeach
<div class="content">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <img src="{{ asset('Dashboard/assets/plugins/login/images/default.png') }}" alt="Image" class="img-fluid">
            </div>
            <div class="col-md-6 contents">
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="mb-4" style="text-align: right">
                            <h3>تسجيل الدخول</h3>
                            <p class="mb-4">قم بتسجيل الدخول الي حسابك الخاص بك علي النظام</p>
                        </div>
                        <form action="{{ route('hospital.login.login') }}" method="post" style="direction: rtl;text-align: right">
                            @csrf
                            <div class="form-group first">
                                <label for="username">اسم المستخدم</label>
                                <input type="text" name="user_name"  class="form-control" id="username" value="{{ old('user_name') }}" >

                            </div>
                            <div class="form-group last mb-4">
                                <label for="password">كلمة المرور</label>
                                <input type="password" name="password" class="form-control" id="password">

                            </div>

                            <div class="d-flex mb-5 align-items-center">
                                <label class="control control--checkbox mb-0">
                                    <span class="caption mr-4">تذكرني</span>
                                    <input type="checkbox" checked="checked" name="remmber"/>
                                    <div class="control__indicator" style="right: 0 !important;"></div>

                                </label>
                                <span class="" style="margin-right: auto;margin-left: 0 !important;">
                                    <a href="#" class="forgot-pass" style="text-align: left;float: left;">
                                        نسيت كلمة المرور
                                    </a>
                                </span>
                            </div>

                            <input type="submit" value="دخول" class="btn btn-block btn-primary">

                        </form>
                    </div>
                </div>

            </div>

        </div>
    </div>
</div>


<script src="{{ asset('Dashboard/assets/js/jquery-3.5.1.min.js') }}"></script>
<!-- Bootstrap js-->
<script src="{{ asset('Dashboard/assets/js/bootstrap/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('Dashboard/assets/js/main-js/popper.min.js') }}"></script>
<script src="{{ asset('Dashboard/assets/js/main-js/bootstrap.min.js') }}"></script>

</body>
</html>
