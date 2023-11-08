@extends('layouts.layout')
@section('content')
    @if ($errors->has('contact'))
        <div class="alert alert-danger">{{ $errors->first('contact') }}</div>
    @endif
    @if ($errors->has('name'))
        <div class="alert alert-danger">{{ $errors->first('name') }}</div>
    @endif
    @if ($errors->has('email'))
        <div class="alert alert-danger">{{ $errors->first('email') }}</div>
    @endif
    <h1 align="center">Add Contact</h1>
    <br>
    <form method="POST" action="{{ route('save_contact') }}" class="text-center">
        @csrf
        <div class="form-group text-center">
            <label for="name">Name:</label>
            <center> <input type="text" name="name" id="name" class="form-control col-md-4" required> 
        </div>

        <div class="form-group text-center">
            <label for="contact">Contact:</label>
            <center> <input type="text" name="contact" id="contact" class="form-control col-md-4" required></center>
        </div>
        <div class="form-group text-center">
            <label for="email">Email:</label>
            <center>   <input type="email" name="email" id="email" class="form-control col-md-4" required></center>
        </div>
        <button type="submit" class="btn btn-primary">Create</button>
        <a href="{{ route('contact_list') }}" class="btn btn-danger">Back</a>
    </form>
@endsection
