<div class="px-3 py-4 flex justify-center">
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
                    <td colspan="5" class="text-center py-4 text-gray-600">No hay datos disponibles.</td>
                </tr>
            @else
                @foreach ($data as $row)
                    <tr class="text-base bg-white">
                        @foreach ($row as $value)
                            <td class="border border-r-3 border-gray-300 py-2 px-4 text-center text-black text-pretty">{{ $value }}</td>    
                        @endforeach
                        @role('admin')
                            <td class="border border-r-3 border-gray-300 py-2 px-4 text-center text-black flex items-center justify-center space-x-4">
                                <button x-on:click="openButtonEdit('{{ $row['id'] }}')" class="bg-blue-500 text-white py-2 px-4 rounded items-center">Edit</button>

                                    <form action="{{ route('category.destroy', $row['id']) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="bg-red-500 text-white py-2 px-4 rounded items-center">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            <x-ui.dialog id="form-dialog-{{ $row['id'] }}" x-data="{ isOpen: false }" class="top-[50%] left-[20%]">
                                <x-slot name="slotdialog">
                                    <span class="absolute top-1 right-3 text-xl cursor-pointer text-[#555] bg-none p-0" x-on:click="closeButtonEdit('{{ $row['id'] }}')">X</span>
                                    <form id="editForm-{{ $row['id'] }}" action="{{ route('category.edit', $row['id']) }}" x-on:submit.prevent="submiteditForm('{{ $row['id'] }}', $event)" method="post">
                                        @csrf
                                        @method('PUT')
                                        <h1 class="flex justify-center text-2xl">Edit Category</h1>
                                        <hr class="border border-b-2">
                                        <input type="text" name="category" class="w-full mt-5 mb-7 rounded-lg border border-blue-500 text-black shadow-lg outline-none" placeholder="Category" value="{{ $row['category'] ?? '' }}">
                                        <button type="submit" class="block w-full mt-5 mb-7 px-4 py-3 bg-blue-600 text-white shadow-lg border-blue-600 hover:bg-blue-600 ou">Enviar</button>
                                    </form>                            
                                </x-slot>
                            </x-ui.dialog>
                        @endrole
                @endforeach
            @endif
        </tbody>
    </table>
</div>

    <!-- Very little is needed to make a happy life. - Marcus Aurelius -->