@extends('layout')

@section('content')
    <main class="login-form">
        <div class="cotainer">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header h2 d-flex justify-content-around">Employer Login</div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <button type="submit" class="btn btn-primary btn-block">
                                        Login with Email
                                    </button>
                                </div>
                                <div class="col-md-6">
                                    <button type="submit" class="btn btn-outline-primary btn-block">
                                        Login with Mobail#
                                    </button>
                                </div>
                            </div>
                            <form action="{{ route('login.post') }}" method="POST">
                                @csrf
                                <div class="row mt-2">
                                    <div class="col-md-12">
                                        <label for="email_address" class="text-md-right required">E-Mail</label>
                                        <input type="text" id="email_address" class="form-control" name="email"
                                            required autofocus>
                                        @if ($errors->has('email'))
                                            <span class="text-danger">{{ $errors->first('email') }}</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="row mt-2">
                                    <div class="col-md-12">
                                        <label for="password" class="text-md-right required">Password</label>
                                        <input type="password" id="password" class="form-control" name="password" required>
                                        @if ($errors->has('password'))
                                            <span class="text-danger">{{ $errors->first('password') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col-md-6">
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="remember"> Remember Me
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-md-6 d-flex flex-row-reverse">
                                        <span><a href="#">Forgot Password?</a></span>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-primary btn-block">
                                        Login
                                    </button>
                                    <div class="col-md-12 mt-2 d-flex justify-content-around">
                                        <span>Not a member?<a href="{{ route('register') }}">Login</a></span>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
