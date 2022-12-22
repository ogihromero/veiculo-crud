<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Criar Veículo') }}
        </h2>
    </x-slot>

    <div class="py-12 px-4">
        @if ($message = Session::get('success'))
        <div id="alert-1" class="flex p-4 mb-4 bg-blue-100 rounded-lg dark:bg-blue-200 w-1/3" role="alert">
            <svg aria-hidden="true" class="flex-shrink-0 w-5 h-5 text-blue-700 dark:text-blue-800" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
            <span class="sr-only">Info</span>
            <div class="ml-3 text-sm font-medium text-blue-700 dark:text-blue-800">
                {{ $message }}
            </div>
              <button id="triggerElement" type="button" class="ml-auto -mx-1.5 -my-1.5 bg-blue-100 text-blue-500 rounded-lg focus:ring-2 focus:ring-blue-400 p-1.5 hover:bg-blue-200 inline-flex h-8 w-8 dark:bg-blue-200 dark:text-blue-600 dark:hover:bg-blue-300" data-dismiss-target="#alert-1" aria-label="Close">
                <span class="sr-only">Close</span>
                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
            </button>
          </div>
        @endif
        <section class="overflow-x-auto relative sm:rounded-lg mx-auto container">
            <header class="mx-auto py-2">
                <h2 class="text-lg font-medium text-gray-900">
                    {{ __('Insira os dados do veículo a ser criado.') }}
                </h2>
        
                {{-- <p class="mt-1 text-sm text-gray-600">
                    {{ __('Insira os dados do veículo a ser criado.') }}
                </p> --}}
            </header>
        
            <form method="POST" action="{{ route('vehicles.store') }}">
                @csrf
        
                <!-- Modelo -->
                <div>
                    <x-input-label for="model" :value="__('Modelo')" />
                    <x-text-input id="model" class="block mt-1 w-full" type="text" name="model" :value="old('model')" required autofocus />
                    <x-input-error :messages="$errors->get('model')" class="mt-2" />
                </div>
        
                <!-- Marca -->
                <div class="mt-4">
                    <x-input-label for="brand" :value="__('Marca')" />
                    <x-text-input id="brand" class="block mt-1 w-full" type="text" name="brand" :value="old('brand')" required />
                    <x-input-error :messages="$errors->get('brand')" class="mt-2" />
                </div>
        
                <!-- Versão -->
                <div class="mt-4">
                    <x-input-label for="version" :value="__('Versão')" />
                    <x-text-input id="version" class="block mt-1 w-full" type="text" name="version" :value="old('version')" required />
                    <x-input-error :messages="$errors->get('version')" class="mt-2" />
                </div>
        
                <!-- Ano -->
                <div class="mt-4">
                    <x-input-label for="year" :value="__('Ano')" />
        
                    <x-text-input id="year" class="block mt-1 w-full"
                                    type="number"
                                    name="year" required />
        
                    <x-input-error :messages="$errors->get('year')" class="mt-2" />
                </div>
        
                <div class="flex items-center justify-end mt-4">
                    <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('vehicles.index') }}">
                        {{ __('Cancelar?') }}
                    </a>
        
                    <x-primary-button class="ml-4">
                        {{ __('Criar veículo') }}
                    </x-primary-button>
                </div>
            </form>
        </section>
        
    </div>
    

</x-app-layout>