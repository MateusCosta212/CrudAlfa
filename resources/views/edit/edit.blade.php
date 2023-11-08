@extends('layouts.layout')
@section('content')
    @if ($errors->has('contact'))
        <div class="alert alert-danger">{{ $errors->first('contact') }}</div>
    @endif
    @if ($errors->has('name'))
        <div class="alert alert-danger">{{ $errors->first('name') }}</div>
    @endif
    <h1 class="text-center">Update Contact</h1>
    <form method="POST" action="{{ route('update_contact', $contato->id) }}" class="text-center">
        @csrf
        @method('PUT')
        <div class="form-group text-center">
            <label for="name">Name:</label>
          <center><input type="text" name="name" id="name" class="form-control col-md-4" value="{{ $contato->name }}" required></center>
        </div>

        <div class="form-group text-center">
            <label for="contact">Contact:</label>
            <center><input type="text" name="contact" id="contact" class="form-control col-md-4" value="{{ $contato->contact }}" required></center>
        </div>

        <div class="form-group text-center">
            <label for="email">Email:</label>
            <center><input type="email" name="email" id="email" class="form-control col-md-4" value="{{ $contato->email }}" required></center>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('contact_list') }}" class="btn btn-danger">Back</a>
    </form>
@endsection