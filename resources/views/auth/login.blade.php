@extends('auth/authApp')
@section('content')
    <!-- Section -->
    <section class="fullscreen" data-bg-parallax="images/pages/1.jpg">
        <div class="container">
            <div>
                <div class="text-center m-b-30">
                    <a href="{{route('main')}}" class="logo">
                        <img src="images/logo-dark.png" alt="Polo Logo">
                    </a>
                </div>
                <div class="row">
                    <div class="col-lg-5 center p-50 background-white b-r-6">
                        <h3>Login to your Account</h3>
                        <form action="{{route('auth.login')}}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label class="sr-only">Username or Email</label>
                                <input type="text" name="email" class="form-control" placeholder="Email">
                            </div>
                            <div class="form-group m-b-5">
                                <label class="sr-only">Password</label>
                                <input type="password" name="password" class="form-control" placeholder="Password">
                            </div>
                            <div class="form-group form-inline text-left">
                                <div class="form-check">
                                    <label>
                                        <input type="checkbox" name="remember"><small class="m-l-10"> Remember me</small>
                                    </label>
                                </div>
                            </div>
                            <div class="col-lg-12 form-group">
                                @foreach($errors->all() as $key => $error)
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        {{$error}}
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                                    </div>
                                @endforeach
                            </div>
                            <div class="text-left form-group">
                                <button type="submit" class="btn">Login</button>
                            </div>
                        </form>
                        <p class="small">Don't have an account yet? <a href="{{route('auth.register')}}">Register New Account</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end: Section -->
@endsection
