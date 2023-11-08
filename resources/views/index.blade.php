@extends('layouts.layout')

@section('content')
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <div class="container">
        <div class="text-center">
            <h1 align="center">Contact List</h1>
            <a href="{{ route('create_contact') }}" class="btn btn-success mb-3 mx-auto">Register</a>
        </div>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Contact</th>
                    <th>Email</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($contatos as $contato)
                    <tr>
                        <td>{{ $contato->id }}</td>
                        <td>{{ $contato->name }}</td>
                        <td>{{ $contato->contact }}</td>
                        <td>{{ $contato->email }}</td>
                        <td class="d-flex">
                            <a href="{{ route('edit_contact', $contato->id) }}" class="btn btn-sm btn-info">
                                <i class="fas fa-edit"></i>
                            </a>
                            <button type="button" class="btn btn-sm btn-danger ml-2" data-toggle="modal"
                                data-target="#confirmDeleteModal{{ $contato->id }}">
                                <i class="fas fa-trash-alt"></i>
                            </button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    @foreach ($contatos as $contato)
        <div class="modal fade" id="confirmDeleteModal{{ $contato->id }}" tabindex="-1" role="dialog"
            aria-labelledby="confirmDeleteModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="confirmDeleteModalLabel">Deletion Confirmation</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Are you sure you want to delete this contact? </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <form method="POST" action="{{ route('delete_contact', $contato->id) }}" class="ml-2"
                            id="deleteForm{{ $contato->id }}">
                            @csrf
                            @method('DELETE')
                            <button type="submit" form="deleteForm{{ $contato->id }}"
                                class="btn btn-danger">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection
