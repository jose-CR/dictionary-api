<div class="px-3 py-4 flex flex-col items-center">
    <div class="mb-4 flex justify-center w-full">
        <input 
            type="text" 
            class="border border-gray-300 rounded-lg p-2 w-full md:w-1/2 outline-none"
            placeholder="Buscar palabra..."
            wire:model.live="search">
    </div>
    <table class="w-full border-collapse shadow-lg">
        <thead>
            <tr class="text-lg bg-blue-500 text-white">
                @foreach ($columns as $column)
                    <th class="py-3 font-bold text-center bg-gray-400 text-gray-200 border border-gray-300">{{ $column }}</th>
                @endforeach
            </tr>
        </thead>
        <tbody>
            @if ($data->isEmpty())
                <tr>
                    <td colspan="{{ count($columns) }}" class="text-center py-4 text-gray-600 italic">No hay datos disponibles.</td>
                </tr>
            @else
                @foreach ($data as $row)
                    <tr class="text-base bg-white hover:bg-gray-100 transition duration-200 ease-in-out">
                        @foreach ($columns as $column)
                            <td class="border border-gray-300 py-2 px-4 text-center text-black">
                                @if ($column === 'Id')
                                    {{ $row->id }}
                                @elseif ($column === 'Letter')
                                    {{ $row->letter }}
                                @elseif ($column === 'Word')
                                    {{ $row->word }}
                                @elseif ($column === 'Description')
                                    {{ $row->string_definition }}
                                @elseif ($column === 'Oración')
                                    <p class="text-sm italic">{{ $row->sentence }}</p>
                                @elseif ($column === 'Oracion en español')
                                    <p class="text-sm italic">{{ $row->spanish_sentence }}</p>
                                @elseif ($column === 'Times')
                                    <a href="{{ route('table-times') }}" class="text-gray-300 hover:text-gray-600 transition duration-200 no-underline">tiempos verbales</a>
                                @elseif ($column === 'Acciones')
                                    <div class="flex items-center justify-center space-x-4">
                                        <a href="{{ route('update-word', $row->id) }}" class="bg-blue-500 text-white py-2 px-4 rounded items-center">
                                            Edit
                                        </a>
                                        <form action="{{ route('words.destroy', $row->id) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="bg-red-500 text-white py-2 px-4 rounded items-center">Delete</button>
                                        </form>
                                    </div>
                                @endif
                            </td>
                        @endforeach
                    </tr>
                @endforeach
            @endif
        </tbody>
    </table>
    <div class="mt-4 flex justify-center w-full">
        <div class="pagination-container bg-white p-4 border border-gray-300 rounded-lg shadow-md">
            {{ $data->links() }}
        </div>
    </div>
</div>