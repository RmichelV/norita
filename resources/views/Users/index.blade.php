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
                        <td>
                            <x-secondary-button 
                                class="ms-4 bg-blue-500 hover:bg-red-600 text-white"
                                type="button" 
                                x-data=""
                                x-on:click="window.location.assign('{{ route('users.edit', $user->id) }}')">
                                {{ __('Editar') }}
                            </x-secondary-button>
                            <x-danger-button 
                            x-data="" 
                            x-on:click="$dispatch('open-modal', 'confirm-role-deletion-{{ $user->id }}')">
                                Eliminar 
                            </x-danger-button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        
    </div>

        <!-- Modales para eliminar roles -->
        @foreach ($users as $user)
        <x-modal name="confirm-role-deletion-{{ $user->id }}" maxWidth="2xl">
            <div class="p-6">
                <h2 class="text-lg font-semibold mb-4">¿Estás seguro de que deseas eliminar al usuario {{$user->name}}?</h2>
                <p class="text-gray-600 dark:text-gray-400 mb-6">
                    Esta acción es irreversible. Todos los permisos asociados a este rol se perderán.
                </p>
                <div class="flex justify-end space-x-4">
                    <!-- Botón para cancelar -->
                    <x-secondary-button x-on:click="$dispatch('close-modal', 'confirm-role-deletion-{{ $user->id }}')">
                        Cancelar
                    </x-secondary-button>
                    <!-- Formulario para eliminar el rol -->
                    <form method="POST" action="{{ route('users.destroy', $user->id) }}">
                        @csrf
                        @method('DELETE')
                        <x-danger-button type="submit">
                            Eliminar usuario
                        </x-danger-button>
                    </form>
                </div>
            </div>
        </x-modal>
    @endforeach
@endsection