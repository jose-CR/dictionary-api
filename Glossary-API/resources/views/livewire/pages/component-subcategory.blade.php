<div class="px-3 py-4 flex flex-col items-center">
    <div class="mb-4 flex justify-center w-full">
        <input 
            type="text" 
            class="border border-gray-300 rounded-lg p-2 w-full md:w-1/2 outline-none"
            placeholder="Buscar sub categoría..."
            wire:model.live="search">
    </div>
    <table class="w-full border-collapse">
        <thead>
            <tr class="text-lg bg-blue-200">
                @foreach ($columns as $column)
                    <th class="py-3 font-bold text-center bg-gray-200 text-gray-600 border border-gray-300">{{ $column }}</th>
                @endforeach
            </tr>
        </thead>
        <tbody>
            @if ($data->isEmpty())
                <tr>
                    <td colspan="{{ count($columns) }}" class="text-center py-4 text-gray-600">No hay datos disponibles.</td>
                </tr>
            @else
                @foreach ($data as $row)
                    <tr class="text-base bg-white">
                        @foreach ($columns as $column)
                            <td class="border border-gray-300 py-2 px-4 text-center text-black">
                                @if ($column === 'Id')
                                    {{ $row->id }}
                                @elseif ($column === 'Sub category')
                                    {{ $row->subcategory }}
                                @elseif ($column === 'Acciones')
                                <div class="flex items-center justify-center space-x-4">
                                    <a href="{{ route('update-subcategory', $row->id) }}" class="bg-blue-500 text-white py-2 px-4 rounded items-center">
                                        Edit
                                    </a>
                                    <form action="{{ route('subcategories.destroy', $row->id) }}" method="post">
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