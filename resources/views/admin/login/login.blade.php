@extends('layouts.app')

@section('content')
@if(Session::has('error'))
    <div class="alert alert-danger" role="alert">
      {{Session::get('error')}}
    </div>
@endif
<form method="POST" action="{{ route('admin.authlogin') }}">
    {{ csrf_field() }}
    <div class="form-group">
        <input class="form-control" type="text" placeholder="Email" name="email" value="{{ old('email') }}" required autofocus>
        @if ($errors->has('email'))
            <span class="help-block">
                <strong>{{ $errors->first('email') }}</strong>
            </span>
        @endif
    </div>
    <div class="form-group">
        <input class="form-control" type="password" placeholder="Password" name="password" required>
         @if ($errors->has('password'))
            <span class="help-block">
                <strong>{{ $errors->first('password') }}</strong>
            </span>
        @endif
    </div>
    <div class="form-group">
        <button class="btn btn-primary btn-block" type="submit">Login</button>
    </div>
</form>
@endsection