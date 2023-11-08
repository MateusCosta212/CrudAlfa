@extends('layouts.layout') 

@section('content')
    <h1>Lista de Contatos</h1>
    
    <a href="{{ route('create_contact') }}" class="btn btn-primary mb-3">Cadastrar</a>

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
            <!-- Loop pelos dados do contato e exibição na tabela -->
            @foreach($contatos as $contato)
                <tr>
                    <td>{{ $contato->id }}</td>
                    <td>{{ $contato->name }}</td>
                    <td>{{ $contato->contact }}</td>
                    <td>{{ $contato->email }}</td>
                    <td>
                        <!-- Botões de ação, como editar ou excluir -->
                        
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
