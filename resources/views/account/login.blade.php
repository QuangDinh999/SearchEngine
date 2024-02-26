@extends('layout.master-mini')
@section('content')
    <div class="content-wrapper d-flex align-items-center justify-content-center auth theme-one" style="background-image: url({{ url('assets/images/auth/register.jpg') }}); background-size: cover;">
        <div class="row w-100">
            <div class="col-lg-4 mx-auto">
                <div class="auto-form-wrapper">
                    <form action="
                    {{ route('account.loginProcess') }}
                    " method="post">
                        @csrf
                        <div class="form-group" >
                            <label class="label">Email</label>
                            <div class="input-group">
                                <input type="email" name="email" class="form-control" placeholder="Email">
                                <div class="input-group-append">
                <span class="input-group-text">
                  <i class="mdi mdi-check-circle-outline"></i>
                </span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="label">Password</label>
                            <div class="input-group">
                                <input type="password" name="password" class="form-control" placeholder="*********">
                                <div class="input-group-append">
                <span class="input-group-text">
                  <i class="mdi mdi-check-circle-outline"></i>
                </span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-primary submit-btn btn-block">Login</button>
                        </div>
                        <div class="form-group d-flex justify-content-between">
                            <div class="form-check form-check-flat mt-0">
                            </div>
                            <a href="
                            " class="text-small forgot-password text-black">Forgot Password</a>
                        </div>
                    </form>
                </div>
                <ul class="auth-footer">
                    <li>
                        <a href="#">Conditions</a>
                    </li>
                    <li>
                        <a href="#">Help</a>
                    </li>
                    <li>
                        <a href="#">Terms</a>
                    </li>
                </ul>
                <p class="footer-text text-center">Copyright © 2023 Bootstrapdash. All rights reserved.</p>
            </div>
        </div>
    </div>

@endsection
