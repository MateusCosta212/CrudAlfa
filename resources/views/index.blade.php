@extends('layouts.layout') <!-- Estende o layout principal (layout.blade.php) -->

@section('content')
    <h1>Lista de Contatos</h1>
    
    <a href="#" class="btn btn-primary mb-3">Cadastrar</a>

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
       
        </tbody>
    </table>
@endsection