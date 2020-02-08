@extends('layout')
@section('title', 'Login')
@section('content')
    <div class="container">
        <div class="row justify-content-md-center">
            <div class="col-md-3">
                <form class="form-horizontal login-form" method="POST" novalidate action="{{ route('login') }}">
                    <h1 class="text-center">Please Login</h1>
                    <br>
                    {{ csrf_field() }}
                    <div class="form-group {{ $errors->has('email') ? ' was-validated' : '' }}">
                        <input id="email" type="text" placeholder="Email" class="form-control" autocomplete="off" name="email"
                               value="{{ old('email') }}" required autofocus>
                        @if ($errors->has('email'))
                            <div class="invalid-feedback">
                                {{ $errors->first('email') }}
                            </div>
                        @endif
                    </div>
                    <div class="form-group{{ $errors->has('password') ? ' was-validated' : '' }}">
                        <input id="password" type="password" placeholder="Password" class="form-control" autocomplete="off"
                               name="password" required>
                        @if ($errors->has('password'))
                            <div class="invalid-feedback">{{ $errors->first('password') }}</div>
                        @endif
                    </div>
                    <div class="form-group" style="margin-top: 30px">
                        <button type="submit" class="btn btn-primary btn-block">Login</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
