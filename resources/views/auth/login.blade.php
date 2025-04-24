@extends('layouts.app')

@section('content')
<main class="login-page" style="padding-top: 140px;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-5">
                <div class="card shadow-lg border-0 rounded-3 overflow-hidden">
                    <div class="card-header text-center bg-primary text-white py-3">
                        <h4 class="mb-0 fw-bold">Welcome Back</h4>
                    </div>
                    <div class="card-body p-4 p-md-5">
                        <form method="POST" action="{{ route('login') }}" name="login-form" class="needs-validation" novalidate="">
                            @csrf
                            <div class="mb-4">
                                <label for="email" class="form-label">Email address</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-light">
                                        <i class="bi bi-envelope"></i>
                                    </span>
                                    <input type="email" class="form-control @error('email') is-invalid @enderror"
                                           id="email" name="email" value="{{ old('email') }}"
                                           required autocomplete="email" autofocus placeholder="your.email@example.com">
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            {{-- <div class="mb-4">
                                <label for="password" class="form-label">Password</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-light">
                                        <i class="bi bi-lock"></i>
                                    </span>
                                    <input type="password" class="form-control @error('password') is-invalid @enderror"
                                           id="password" name="password" required autocomplete="current-password"
                                           placeholder="Enter your password">
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div> --}}

                            <div class="mb-4">
                                <label for="password" class="form-label">Password</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-light">
                                        <i class="bi bi-lock"></i>
                                    </span>
                                    <input type="password" class="form-control @error('password') is-invalid @enderror"
                                           id="password" name="password" required autocomplete="current-password"
                                           placeholder="Enter your password">
                                    <span class="input-group-text bg-light" style="cursor: pointer;"
                                          onclick="togglePassword()">
                                        <i class="bi bi-eye-slash" id="eye-icon"></i>
                                    </span>
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <script>
                            function togglePassword() {
                                var x = document.getElementById("password");
                                var icon = document.getElementById("eye-icon");
                                if (x.type === "password") {
                                    x.type = "text";
                                    icon.className = "bi bi-eye";
                                } else {
                                    x.type = "password";
                                    icon.className = "bi bi-eye-slash";
                                }
                            }
                            </script>


                            <div class="d-flex justify-content-between align-items-center mb-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                    <label class="form-check-label" for="remember">
                                        Remember me
                                    </label>
                                </div>
                                @if (Route::has('password.request'))
                                <a href="{{ route('password.request') }}" class="text-primary text-decoration-none">
                                    Forgot Password?
                                </a>
                                @endif
                            </div>

                            <div class="d-grid">
                                <button class="btn btn-primary py-2 fw-bold" type="submit">SIGN IN</button>
                            </div>

                            <hr class="my-4">

                            <div class="text-center">
                                <p class="mb-0">Don't have an account?</p>
                                <a href="{{ route('register') }}" class="btn btn-outline-primary mt-2">Create Account</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection

{{-- @section('styles') --}}
@push('styles')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
<style>
    .login-page {
        background-color: #f8f9fa;
        min-height: 100vh;
        padding-top: 140px;
        display: flex;
        align-items: center;
    }

    .card {
        transition: all 0.3s ease;
    }

    .card:hover {
        transform: translateY(-5px);
    }

    .input-group-text {
        border: none;
    }

    .form-control {
        border-left: none;
    }

    .form-control:focus {
        outline: none !important;
        box-shadow: none;
        border-color: #ced4da;
    }

    .btn-primary {
        letter-spacing: 1px;
    }

    .bi {
        font-family: "Bootstrap Icons" !important;
    }
</style>
@endpush

{{-- @endsection --}}



@section('scripts')
<script>
    // Add Bootstrap Icons if not already included in your layout
    if(!document.querySelector('link[href*="bootstrap-icons"]')) {
    const iconLink = document.createElement('link');
    iconLink.rel = 'stylesheet';
    iconLink.href = 'https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.0/font/bootstrap-icons.css';
    document.head.appendChild(iconLink);
}

</script>

@endsection
