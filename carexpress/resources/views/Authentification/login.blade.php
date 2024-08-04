@extends('layouts.templatecar')

@section('content')
    <div class="container mx-auto p-4 max-w-md">
        <!-- Formulaire de connexion -->
        <div
            class="container__form container--signin bg-white rounded-lg shadow-md p-6 mt-4 -translate-y-4 transition-transform flex flex-col">
            <form action="{{route('login.customer')}}" method="POST" class="form" id="form2">
                @csrf
                <h1 class="form__title text-center text-2xl font-semibold mb-10">Connexion</h1>
                {{-- notification --}}
                @if (session('success'))
                    <div class="flex items-center bg-green-500 text-white text-sm font-bold px-4 py-3" role="alert">
                        <svg class="fill-current w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                            <path
                                d="M12.432 0c1.34 0 2.01.912 2.01 1.957 0 1.305-1.164 2.512-2.679 2.512-1.269 0-2.009-.75-1.974-1.99C9.789 1.436 10.67 0 12.432 0zM8.309 20c-1.058 0-1.833-.652-1.093-3.524l1.214-5.092c.211-.814.246-1.141 0-1.141-.317 0-1.689.562-2.502 1.117l-.528-.88c2.572-2.186 5.531-3.467 6.801-3.467 1.057 0 1.233 1.273.705 3.23l-1.391 5.352c-.246.945-.141 1.271.106 1.271.317 0 1.357-.392 2.379-1.207l.6.814C12.098 19.02 9.365 20 8.309 20z" />
                        </svg>
                        <p>{{ session('success') }}.</p>
                    </div>
                @endif
                @if ($errors->any())
                    <div role="alert">
                        <div class="bg-red-500 text-white font-bold rounded-t px-4 py-2">
                            Danger
                        </div>
                        <div class="border border-t-0 border-red-400 rounded-b bg-red-100 px-4 py-3 text-red-700">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                @endif
                {{-- end notification --}}
                <input type="email" placeholder="Email" name="email" value="{{ old('email') }}"
                    class="input mt-5 mb-4 p-3 w-full rounded outline-none border border-red-200 shadow-md" />
                <div class="relative">
                    <input type="password" id="passwordInput" placeholder="Mot de passe" name="password"
                        class="input mt-3 mb-5 p-3 w-full rounded outline-none border border-red-200 shadow-md" />
                    <span id="togglePassword"
                        class="eye-icon absolute transform translate-y-6 -translate-x-6 cursor-pointer">
                        <i class="fas fa-eye text-gray-500 hover:text-gray-700"></i>
                    </span>
                </div>


                <a href="#" class="link text-blue-500 hover:underline block mb-5 p-2">Mot de passe oublié ?</a>
                <a href="{{ route('registercustomer') }}"
                    class="link text-end text-reg-500 hover:underline block mb-5 p-2 text-right">S'inscrire</a>
                <button
                    class="btn bg-green-500 hover:bg-green-700 focus:outline-none text-white font-bold py-2 px-4 rounded w-full">
                    Se connecter
                </button>
            </form>
        </div>
    </div>
@endsection
