<div class="px-3 py-4 flex flex-col items-center">
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
                    @if (is_null($row->times))
                        <tr class="text-base bg-gray-100 hover:bg-gray-200 transition duration-200 ease-in-out">
                            @foreach ($columns as $column)
                                @if ($column === 'Id')
                                    <td class="border border-gray-300 py-2 px-4 text-center font-semibold">{{ $row->id }}</td>
                                @elseif ($column === 'Word')
                                    <td class="border border-gray-300 py-2 px-4 text-center italic">{{ $row->word }}</td>
                                @elseif ($column === 'Times')
                                    <td colspan="{{count($columns)}}" class="border border-gray-300 py-2 px-4 text-center text-gray-500 italic">
                                        No tiene tiempos verbales
                                    </td>
                                @break
                                @endif
                            @endforeach
                        </tr>
                    @else
                        @foreach ($row->times as $tense => $tenseData)
                            <tr class="text-base bg-white hover:bg-gray-100 transition duration-200 ease-in-out">
                                @foreach ($columns as $column)
                                    <td class="border border-gray-300 py-2 px-4 text-center">
                                        @if ($column === 'Id')
                                            <p class="font-semibold">{{ $row->id }}</p>
                                        @elseif ($column === 'Word')
                                            <p class="font-semibold italic">{{ $row->word }}</p>
                                        @elseif ($column === 'Times')
                                            <p class="block text-lg italic">{{ ucfirst($tense) }}</p>
                                        @elseif ($column === 'Definition')
                                            <p class="text-sm italic">{{ $this->formatDefinition($tenseData['definition']) }}</p>
                                        @elseif ($column === 'Sentence')
                                            <p class="text-sm italic">{{ $tenseData['sentence'] }}</p>
                                        @elseif ($column === 'oracion en español')
                                            <p class="text-sm italic">{{ $tenseData['spanishSentence'] }}</p>
                                        @endif
                                    </td>
                                @endforeach
                            </tr>
                        @endforeach
                    @endif
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
