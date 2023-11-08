@extends('layouts.layout')
@section('content')
    @if ($errors->has('contact'))
        <div class="alert alert-danger">{{ $errors->first('contact') }}</div>
    @endif
    @if ($errors->has('name'))
        <div class="alert alert-danger">{{ $errors->first('name') }}</div>
    @endif
    <h1>Update Contact</h1>
    <form method="POST" action="{{ route('update_contact', $contato->id) }}">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Nome:</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ $contato->name }}" required>
        </div>

        <div class="form-group">
            <label for="contact">Contato:</label>
            <input type="text" name="contact" id="contact" class="form-control" value="{{ $contato->contact }}"
                required>
        </div>

        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" name="email" id="email" class="form-control" value="{{ $contato->email }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('contact_list') }}" class="btn btn-danger">Back</a>

    </form>
@endsection
