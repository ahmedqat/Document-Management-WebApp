<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="Cache-Control" content="no-store">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Office Document</title>
    <link rel="icon" type="image/png" href="{{ asset('assets/icons/logo.png') }}">


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <link href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.js"></script>

    <link rel="stylesheet" href="{{ asset('assets/styles/main_page.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/styles/plugins.bundle.css') }}" type="text/css" />
</head>

<body>

    <!-- Body Content -->
    <div class="container-fluid container-fluid-wrap login-background">
        <img class="login-background-img" src="{{ asset('assets/icons/login-background-2.jpg') }}">
        <!-- Main Content -->
        <div class="content-body justify-content-center text-align-center">
            <div class="container login-container-wrap">
                <div class="login-container">
                    <img class="login-xmu-icon" src="{{ asset('assets/icons/linc-logo.png') }}" alt="XMUM Library">
                    <div class="login-menu-title">
                        Welcome to Office Document
                    </div>
                    <div class="login-form-section">
                        <form method="POST" id="login_form" class="form" action="{{ route('login.auth') }}">
                            @csrf
                            <div class="d-flex flex-column">
                                <div class="fv-row mb-4">
                                    <label class="required login-input-title">Campus ID</label>
                                    <div class="field-holder">
                                        <input type="text" class="form-control login-input" id="campus_id"
                                            name="campus_id" placeholder="Campus ID" value="{{ request('campus_id') ?: old('campus_id') }}">


                                        @error('campus_id')
                                        <p class="text-danger text-xs mt-1">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="fv-row mb-4">
                                    <label class="required login-input-title">Password</label>
                                    <div class="field-holder password">
                                        <input type="password" class="form-control login-input" id="campus_password"
                                            name="campus_password" placeholder="Password">

                                        @error('campus_password')
                                        <p class="text-danger text-xs mt-1">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            @if(session('login_error'))
                            <div class="alert alert-danger">{{ session('login_error') }}</div>
                            @endif

                            <div class="button-holder">
                                <button type="submit" class="btn btn-login" data-users-modal-action="submit">
                                    Login
                                </button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="assets/script/plugins.bundle.js"></script>
    <script src="assets/script/scripts.bundle.js"></script>
    <script src="assets/script/login.js"></script>

</body>

</html>
