<div>
    @if (empty($columns) || empty($rows))
        <table class="min-w-full bg-white border border-gray-200 rounded-lg shadow-lg mb-8">
            <tr>
                <td colspan="{{ isset($columns) && count($columns) > 0 ? count($columns) : 3 }}" class="text-center py-4 text-gray-600">
                    No hay datos disponibles.
                </td>
            </tr>
        </table>
    @else
        <table class="min-w-full bg-white border border-gray-200 rounded-lg shadow-lg mb-8">
            <thead class="bg-indigo-50 border-b">
                <tr>
                    @foreach ($columns as $column)
                        <th class="py-2 px-4 text-center text-gray-700">{{ $column }}</th>
                    @endforeach
                </tr>
            </thead>
            <tbody>
                @foreach ($rows as $row)
                    <tr class="border-b">
                        @foreach ($row as $cell)
                            <td class="py-2 px-4 text-center text-gray-600">{{ $cell }}</td>
                        @endforeach
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
