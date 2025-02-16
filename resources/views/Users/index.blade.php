@extends('template')
@section('title')
Lista de Usuarios
@endsection
@section('content')
    <div class="flex items-center justify-end mt-4">
        <x-secondary-button 
            class="ms-4"
            type="button" 
            x-data=""
            x-on:click="window.location.assign('{{ route('users.create') }}')">
            {{ __('Registrar nuevo usuario') }}
        </x-secondary-button>
    </div>
    <div>
        <div
            class="table-responsive"
        >
            <table
                class="table table-primary"
            >
                <thead>
                    <tr>
                        <th scope="col">id</th>
                        <th scope="col">nombre</th>
                        <th scope="col">Apellido</th>
                        <th scope="col">celular</th>
                        <th scope="col">carnet</th>
                        <th scope="col">genero</th>
                        <th scope="col">rol</th>
                        <th scope="col">email</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        
                    <tr class="">
                        <td scope="row">{{$user->id}}</td>
                        <td>{{$user->name}}</td>
                        <td>{{$user->last_name}}</td>
                        <td>{{$user->cellphone}}</td>
                        <td>{{$user->identity_number}}{{$user->cities->name}}</td>
                        <td>{{$user->gender}}</td>
                        <td>{{$user->roles->name}}</td>
                        <td>{{$user->email}}</td>

                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        
    </div>
@endsection