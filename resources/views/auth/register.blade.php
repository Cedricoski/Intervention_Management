@extends('layouts.base')

@section('content')
<div class="flex min-h-full">
    <div class="flex flex-1 flex-col justify-center py-12 px-4 sm:px-6 lg:flex-none lg:px-20 xl:px-24">
        <div class="mx-auto w-full max-w-sm lg:w-96">
            <div>
                <img class="h-12 w-auto" src="https://tailwindui.com/img/logos/mark.svg?color=indigo&shade=600" alt="Your Company">
                <h2 class="mt-6 text-3xl font-bold tracking-tight text-gray-900">Créez votre compte!</h2>
                <p class="mt-2 text-sm text-gray-600">
                    Ou
                    <a href="{{ route('login') }}" class="font-medium text-indigo-600 hover:text-indigo-500">Se connecter</a>
                </p>
            </div>

            <div class="mt-8">
                <div class="mt-6">
                    <form action="{{ route('register') }}" method="POST" class="space-y-6">
                    @csrf
                        <div class="space-y-1">
                            <label for="name" class="block text-sm font-medium text-gray-700">Nom</label>
                            <div class="mt-1">
                                <input id="name" name="name" type="text" class="block w-full appearance-none rounded-md border border-gray-300 px-3 py-2 placeholder-gray-400 shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm" value="{{ old('name') }}">
                                @error('name')
                                <span class="text-red-400 text-sm">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="space-y-1">
                            <label for="pseudo" class="block text-sm font-medium text-gray-700">Pseudo</label>
                            <div class="mt-1">
                                <input id="pseudo" name="pseudo" type="text" class="block w-full appearance-none rounded-md border border-gray-300 px-3 py-2 placeholder-gray-400 shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm" value="{{ old('pseudo') }}">
                                @error('pseudo')
                                <span class="text-red-400 text-sm">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div>
                            <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                            <div class="mt-1">
                                <input id="email" name="email" type="email" class="block w-full appearance-none rounded-md border border-gray-300 px-3 py-2 placeholder-gray-400 shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm" value="{{ old('email') }}">
                                @error('email')
                                <span class="text-red-400 text-sm">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="space-y-1">
                            <label for="password" class="block text-sm font-medium text-gray-700">Mot de passe</label>
                            <div class="mt-1">
                                <input id="password" name="password" type="password" class="block w-full appearance-none rounded-md border border-gray-300 px-3 py-2 placeholder-gray-400 shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm" value="{{ old('password') }}">
                                @error('password')
                                    <span class="text-red-400 text-sm">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="space-y-1">
                            <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Confirmmation du mot de passe</label>
                            <div class="mt-1">
                                <input id="password_confirmation" name="password_confirmation" type="password" class="block w-full appearance-none rounded-md border-2 border-gray-300 px-3 py-2 placeholder-gray-400 shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm" value="{{ old('password_confirmation') }}">
                                @error('password_confirmation')
                                <span class="text-red-400 text-sm">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div>
                            <button type="submit" class="flex w-full justify-center rounded-md border border-transparent bg-indigo-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">S'enregistrer</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="relative hidden w-0 flex-1 lg:block">
        <img class="absolute inset-0 h-full w-full object-cover" src="https://images.unsplash.com/photo-1505904267569-f02eaeb45a4c?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1908&q=80" alt="">
    </div>
</div>
@endsection