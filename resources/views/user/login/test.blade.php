@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="//code.jquery.com/ui/1.13.1/themes/base/jquery-ui.css">
<form method="POST" action="{{ route('user.createUser') }}">
    {{ csrf_field() }}
    <div class="form-group">
        <input class="form-control" type="text" placeholder="First Name" name="first_name" value="{{ old('email') }}" required autofocus>
    </div>
    <div class="form-group">
        <input class="form-control" type="text" placeholder="Last Name" name="last_name" value="{{ old('email') }}" required autofocus>
    </div>
    <div class="form-group">
        <input class="form-control" type="email" placeholder="Email" name="email" value="{{ old('email') }}" required autofocus>
    </div>
    <div class="form-group">
        <input class="form-control" type="text" placeholder="Date Of Birth" id="dob" name="dob" value="{{ old('anual_income') }}" required autofocus>
    </div>
    <div class="form-group">
        <select class="form-control" name="job" required>
        <option value="">Occupation?</option>
            <option value="1">Private job</option>
            <option value="2">Government Job</option>
            <option value="3">Business</option>
        </select>
    </div>

    <div class="form-group">
        <select class="form-control" name="family_type" required>
        <option value="">Family Type?</option>
        <option value="1">Joint family</option>
            <option value="2">Nuclear family</option>
        </select>
    </div>

    <div class="form-group">
        <select class="form-control" name="gender" required>
        <option value="">Gender?</option>
            <option value="Male">Male</option>
            <option value="Female">Female</option>
        </select>
    </div>

    <div class="form-group">
        <select class="form-control" name="mangalik" required>
        <option value="">Managalik?</option>
            <option value="Yes">Yes</option>
            <option value="No">No</option>
        </select>
    </div>

    <div class="form-group">
        <input class="form-control" type="text" placeholder="Anual Income" name="anual_income" value="{{ old('anual_income') }}" required autofocus>
    </div>
    <div class="form-group">
        <input class="form-control" type="password" placeholder="Password" name="password" required>
    </div>
    <div class="form-group">
        <button class="btn btn-primary btn-block" type="submit">Register</button>
    </div>
</form>
<div class="text-center forgotpass"><a href="{{route('user.login')}}">Sign In</a></div>
@endsection