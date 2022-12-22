<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @if (count($maintenances) === 0)
                        <p class="font-bold mx-auto text-center"> Você não tem manutenção agendada </p>
                    @else
                        <p class="font-bold"> Manutenções da próximas semana: {{ count($maintenances) }} </p>
                        <br>

                        <div class="overflow-x-auto relative shadow-md sm:rounded-lg mx-auto">
                            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400 table-fixed">
                                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        
                                    <tr>
                                        <th scope="col" class="py-3 px-6">
                                            Data Agendada
                                        </th>
                                        <th scope="col" class="py-3 px-6">
                                            <div class="flex items-center">
                                                Veículo
                                                
                                            </div>
                                        </th>
                                       
                                        <th scope="col" class="py-3 px-6">
                                            <div class="px-12 flex items-center justify-end">
                                               Ações de Controle
                                                
                                            </div>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($maintenances as $maintenance)
                                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                            <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                {{ $maintenance->date }}
                                            </th>
                                            <td class="py-4 px-6">
                                                <a href="{{ route('vehicles.show',$maintenance->vehicle->id) }}" class="underline hover:no-underline">{{$maintenance->vehicle->id}},
                                                    {{$maintenance->vehicle->model}}, 
                                                    {{$maintenance->vehicle->brand}} - 
                                                    {{$maintenance->vehicle->year}}</a>
                                                
                                            </td>
                                            <td class="py-4 px-6 text-right">
                                            <form action="{{ route('maintenances.destroy',$maintenance->id) }}" method="POST">
                           
                                                <a class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800" href="{{ route('maintenances.show',$maintenance->id) }}">Exibir</a>
                        
                                                <a class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800" href="{{ route('maintenances.edit',$maintenance->id) }}">Editar</a>
                        
                                                @csrf
                                                @method('DELETE')
                        
                    
                                                <button class="text-white bg-blue-700 hover:bg-red-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-red-700 focus:outline-none dark:focus:ring-blue-800" type="button" data-modal-toggle="popup-modal">
                                                    Apagar
                                                  </button>
                                                <div id="popup-modal"  class="fixed top-0 left-0 right-0 z-50 hidden p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-modal md:h-full">
                                                    <div class="relative w-full h-full max-w-md md:h-auto">
                                                        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                                            <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-toggle="popup-modal">
                                                                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                                                                <span class="sr-only">Close modal</span>
                                                            </button>
                                                            <div class="p-6 text-center">
                                                                <svg aria-hidden="true" class="mx-auto mb-4 text-gray-400 w-14 h-14 dark:text-gray-200" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                                                <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Tem certeza que quer cancelar a manutenção?</h3>
                                                                <button data-modal-toggle="popup-modal" type="submit" class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">
                                                                    Sim, tenho certeza.
                                                                </button>
                                                                <button data-modal-toggle="popup-modal" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Não, voltar</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                                
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @endif

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
