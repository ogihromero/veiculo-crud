<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Veículo') }}
        </h2>
    </x-slot>

    <div class="py-12 px-4">
        <div class="overflow-x-auto relative shadow-md sm:rounded-lg mx-auto">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400 table-fixed">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
        
                    <tr>
                        <th scope="col" class="py-3 px-6">
                            ID do veículo
                        </th>
                        <th scope="col" class="py-3 px-6">
                            <div class="flex items-center">
                                Modelo
                                
                            </div>
                        </th>
                        <th scope="col" class="py-3 px-6">
                            <div class="flex items-center">
                                Marca
                                
                            </div>
                        </th>
                        <th scope="col" class="py-3 px-6">
                            <div class="flex items-center">
                                Versao
                                
                            </div>
                        </th>
                        <th scope="col" class="py-3 px-6">
                            <div class="flex items-center">
                                Ano
                                
                            </div>
                        </th>
                        <th scope="col" class="py-3 px-6">
                            <span class="sr-only">Ação</span>
                        </th>
                    </tr>
                </thead>
                <tbody>
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                            <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $vehicle->id }}
                            </th>
                            <td class="py-4 px-6">
                                {{$vehicle->model}}
                            </td>
                            <td class="py-4 px-6">
                                {{$vehicle->brand}}
                            </td>
                            <td class="py-4 px-6">
                                {{$vehicle->version}}
                            </td>
                            <td class="py-4 px-6">
                                {{$vehicle->year}}
                            </td>
                            <td class="py-4 px-6 text-right">
                            <form action="{{ route('vehicles.destroy',$vehicle->id) }}" method="POST">
        
                                <a class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800" href="{{ route('vehicles.edit',$vehicle->id) }}">Edit</a>
        
                                @csrf
                                @method('DELETE')
        
                                <button type="submit" class="text-white bg-blue-700 hover:bg-red-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-red-700 focus:outline-none dark:focus:ring-blue-800" onclick="return confirm('Isso apagará o veículo e todas suas manutenções. Tem certeza?')">Delete</button>
                            </form>
                                
                            </td>
                        </tr>
                   
                </tbody>
            </table>
        </div>
    </div>

</x-app-layout>