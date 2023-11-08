@extends('layouts.layout')

@section('content')
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
    </form>
    
   
@endsection