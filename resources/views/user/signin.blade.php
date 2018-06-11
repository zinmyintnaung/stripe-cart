@extends('layouts.master')

@section('content')
<div class="row">
    <div class="col-md-4 col-md-offset-4">
        <h1>Sign In</h1>
        @if(count($errors)>1)
        <div class="alert alert-danger">
            @foreach($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        </div>
        @endif
        <form action="{{ route('user.signin') }}" method="post">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="email">E-Mail</label>
                <input type="email" id="email" name="email" class="form-control">
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary">Sign In</button>

        </form>
    </div>
</div>
@endsection