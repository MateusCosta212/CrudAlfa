@extends('layouts.layout') 

@section('content')
    <h1>Lista de Contatos</h1>
    
    <a href="{{ route('create_contact') }}" class="btn btn-primary mb-3">Register</a>

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Contato</th>
                <th>Email</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($contatos as $contato)
                <tr>
                    <td>{{ $contato->id }}</td>
                    <td>{{ $contato->name }}</td>
                    <td>{{ $contato->contact }}</td>
                    <td>{{ $contato->email }}</td>
                    <td>
                        <a href="{{ route('edit_contact', $contato->id) }}" class="btn btn-sm btn-info">Editar</a>
                        <form method="POST" action="{{ route('delete_contact', $contato->id) }}">
                            @csrf
                            @method('DELETE')
                        
                            <button type="submit" class="btn btn-sm btn-danger">Excluir</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
