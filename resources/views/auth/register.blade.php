@extends('template')
@section('title')
    Registro de Usuarios
@endsection
@section('content')
    <form method="POST" action="{{ route('users.store') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Nombre(s):')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" placeholder="Ej. Michel"/>
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Last_Name -->
        <div>
            <x-input-label for="last_name" :value="__('Apellido(s):')" />
            <x-text-input id="last_name" class="block mt-1 w-full" type="text" name="last_name" :value="old('last_name')" required autofocus autocomplete="name" placeholder="Ej. Villalba"/>
            <x-input-error :messages="$errors->get('last_name')" class="mt-2" />
        </div>

        <!-- Cellphone -->
        <div>
            <x-input-label for="cellphone" :value="__('Celular:')" />
            <x-numeric-input 
                id="cellphone" 
                class="block mt-1 w-full" 
                name="cellphone" 
                :value="old('cellphone')" 
                required autofocus autocomplete="cellphone" 
                :min="'61111111'" 
                :max="'79999999'" 
                :maxLength="8" 
                :minLength="8"
                placeholder="Ej. 6111111"/>
            <x-input-error :messages="$errors->get('cellphone')" class="mt-2" />
        </div>
        <!--identity_Number -->
        <div>
            <x-input-label for="identity_number" :value="__('Carnet de Identidad: ')" />
            <x-numeric-input 
                id="identity_number" 
                class="block mt-1 w-full" 
                name="identity_number" 
                :value="old('identity_number')" 
                required autofocus autocomplete="identity_number" 
                :min="'10000'" 
                :max="'9999999999'" 
                :maxLength="10" 
                :minLength="5" 
                placeholder="Ej. 6443223"/>
            <x-input-error :messages="$errors->get('cellphone')" class="mt-2" />
        </div>
        <!--Extention-->
        <div>
            <x-input-label for="city" :value="__('Expedito en:')" />
            
                <select
                    class="block mt-1 w-full" 
                    name="city_id"
                    id="city_id"
                    required
                >
                    <option value="" disabled selected>Seleciona una ciudad</option>
                    @foreach ($cities as $city)
                    <option value="{{ $city->id }}" {{ old('city_id') == $city->id ? 'selected' : '' }}>
                        {{ $city->name }}
                    </option>
                    @endforeach
                </select>
                <x-input-error :messages="$errors->get('city_id')" class="mt-2" />
        </div>
        <!--gender-->
        <div>
            <x-input-label for="gender" :value="__('Seleccione el género: ')" />
            
            <select
                class="block mt-1 w-full"
                name="gender"
                id="gender"
                required
            >
                <option value="" disabled selected>Selecciona un género</option>
                <option value="Femenino" {{ old('gender') == 'Femenino' ? 'selected' : '' }}>Femenino</option>
                <option value="Masculino" {{ old('gender') == 'Masculino' ? 'selected' : '' }}>Masculino</option>
        </select>
                <x-input-error :messages="$errors->get('gender')" class="mt-2" />
        </div>
          <!--Rol-->
          <div>
            <x-input-label for="role_id" :value="__('Tipo de rol:')" />
            
                <select
                    class="block mt-1 w-full" 
                    name="role_id"
                    id="role_id"
                    required
                >
                    <option value="" disabled selected>Seleciona un rol</option>
                    @foreach ($roles as $role)
                        <option value="{{ $role->id }}" {{ old('role_id') == $role->id ? 'selected' : '' }}>
                            {{ $role->name }}
                        </option>
                    @endforeach
                </select>
                <x-input-error :messages="$errors->get('role_id')" class="mt-2" />
        </div>
        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Correo electrónico')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" placeholder="Ej. example@gmail.com"/>
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Contraseña')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password"
                            placeholder="Ej. Ee12//Aa" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirmar Contraseña')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" 
                            placeholder="Replique la contraseña de arriba"
                            />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-secondary-button 
                class="ms-4"
                type="button" 
                x-data=""
                x-on:click="window.location.assign('{{ route('users.index') }}')">
                {{ __('Cancelar') }}
            </x-secondary-button>

            <x-primary-button class="ms-4">
                {{ __('Registrar') }}
            </x-primary-button>
        </div>
    </form>
@endsection
