@extends('layout')

@section('content')
    <main class="login-form">
        <div class="cotainer">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header h2 d-flex justify-content-around">Employer Signup</div>
                        <div class="card-body">

                            <form action="{{ route('register.post') }}" method="POST">
                                @csrf
                                <div class="row">

                                    <div class="col-md-6">
                                        <label for="name" class="text-md-right required">First Name</label>
                                        <input type="text" id="first_name" class="form-control" name="first_name" required
                                            autofocus>
                                        @if ($errors->has('first_name'))
                                            <span class="text-danger">{{ $errors->first('first_name') }}</span>
                                        @endif
                                    </div>

                                    <div class="col-md-6">
                                        <label for="name" class="text-md-right required">Last Name</label>
                                        <input type="text" id="last_name" class="form-control" name="last_name" required
                                            autofocus>
                                        @if ($errors->has('last_name'))
                                            <span class="text-danger">{{ $errors->first('last_name') }}</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="email_address" class="text-md-right required">E-Mail</label>
                                        <input type="text" id="email_address" class="form-control" name="email"
                                            required autofocus>
                                        @if ($errors->has('email'))
                                            <span class="text-danger">{{ $errors->first('email') }}</span>
                                        @endif
                                    </div>
                                    <div class="col-md-6">
                                        <label for="password" class="text-md-right required">Password</label>
                                        <input type="password" id="password" class="form-control" name="password" required>
                                        @if ($errors->has('password'))
                                            <span class="text-danger">{{ $errors->first('password') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="password" class="text-md-right required">Mobile#</label>
                                        <div class="form-group">
                                            <span class="px-2">+971</span>
                                            <input type="text" name="mobail" class="form-control" placeholder="(0)52 123 4567" />
                                        </div>
                                        @if ($errors->has('mobail'))
                                            <span class="text-danger">{{ $errors->first('mobail') }}</span>
                                        @endif
                                    </div>
                                    <div class="col-md-6">
                                        <label for="password" class="text-md-right required">Emirates</label>
                                        <select class="form-control" placeholder="emirates" id="emirates" name="emirates"
                                            required autofocus>
                                            <option value="">Emirates</option>
                                            @php
                                                $emirates = ['Abu Dhabi', 'Dubai', 'Sharjah', 'Ajman', 'Umm Al Quwain', 'Ras Al Khaimah', 'Fujairah'];
                                                foreach ($emirates as $data) {
                                                    echo '<option value="' . $data . '" >' . $data . '</option>';
                                                }
                                            @endphp
                                        </select>
                                        @if ($errors->has('emirates'))
                                            <span class="text-danger">{{ $errors->first('emirates') }}</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="row">

                                    <div class="col-md-12 d-flex justify-content-around">
                                        <button type="submit" class="btn btn-primary">
                                            Register
                                        </button>
                                    </div>
                                    <div class="col-md-12 d-flex justify-content-around">
                                        <span>Already a member?<a href="{{ route('login') }}">Login</a></span>
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
