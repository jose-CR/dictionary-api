<x-app-layout>
    <x-guest-layout>
        <form action="{{ route('words.update', $words->id) }}" method="post" class="max-w-xl mx-auto p-4">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="word" class="block text-gray-700">Word:</label>
                <input type="text" id="word" name="word" value="{{ $words->word ?? '' }}" placeholder="Word" class="w-full mt-2 p-2 border border-gray-300 rounded-lg">
            </div>

            <div class="mb-4">
                <label for="definition" class="block text-gray-700">Description:</label>
                <input type="text" id="definition" name="definition" value="{{ $words->definition ?? '' }}" placeholder="Description" class="w-full mt-2 p-2 border border-gray-300 rounded-lg">
            </div>

            <div class="mb-4">
                <label for="sentence" class="block text-gray-700">Sentence:</label>
                <input type="text" id="sentence" name="sentence" value="{{ $words->sentence ?? '' }}" placeholder="Sentence" class="w-full mt-2 p-2 border border-gray-300 rounded-lg">
            </div>

            <div class="mb-4">
                <label for="spanishSentence" class="block text-gray-700">Oración en español:</label>
                <input type="text" name="spanishSentence" value="{{ $words->spanish_sentence ?? '' }}" placeholder="Oración en español" class="w-full mt-2 p-2 border border-gray-300 rounded-lg">
            </div>
            
            <div class="mb-4">

                @if (isset($words->times) && is_array($words->times))
                <label for="times" class="block text-gray-700">Times:</label>
                    @foreach ($words->times as $timeKey => $time)
                        <div class="border rounded-lg p-4 mb-4 bg-gray-50">
                            <h4 class="text-lg font-semibold mb-2">{{ ucfirst($timeKey) }}</h4>

                            <div class="mb-2">
                                <label for="{{ $timeKey }}_definition" class="block text-gray-700">Definition ({{ ucfirst($timeKey) }}):</label>
                                <input type="text" id="{{ $timeKey }}_definition" name="times[{{ $timeKey }}][definition]" 
                                value="{{ is_array($time['definition'] ?? null) ? implode(', ', $time['definition']) : $time['definition'] }}" 
                                placeholder="Definitions (comma separated)" class="w-full mt-2 p-2 border border-gray-300 rounded-lg">
                            </div>

                            <div class="mb-2">
                                <label for="{{ $timeKey }}_sentence" class="block text-gray-700">Sentence ({{ ucfirst($timeKey) }}):</label>
                                <input type="text" id="{{ $timeKey }}_sentence" name="times[{{ $timeKey }}][sentence]" 
                                value="{{ $time['sentence'] ?? '' }}" 
                                placeholder="Sentence" class="w-full mt-2 p-2 border border-gray-300 rounded-lg">
                            </div>

                            <div class="mb-2">
                                <label for="{{ $timeKey }}_spanishSentence" class="block text-gray-700">Oración en español ({{ ucfirst($timeKey) }}):</label>
                                <input type="text" id="{{ $timeKey }}_spanishSentence" name="times[{{ $timeKey }}][spanishSentence]" 
                                value="{{ $time['spanishSentence'] ?? '' }}" 
                                placeholder="Oración en español" class="w-full mt-2 p-2 border border-gray-300 rounded-lg">
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
            <button type="submit" class="mt-4 px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">Update</button>
        </form>
    </x-guest-layout>
</x-app-layout>