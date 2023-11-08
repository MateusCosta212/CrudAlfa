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
    <h1>Add Contact</h1>
    <form method="POST" action="{{ route('save_contact') }}">
        @csrf

        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" name="name" id="name" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="contact">Contact:</label>
            <input type="text" name="contact" id="contact" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" name="email" id="email" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary">Create</button>
        <a href="{{ route('contact_list') }}" class="btn btn-danger">Back</a>

    </form>
@endsection
