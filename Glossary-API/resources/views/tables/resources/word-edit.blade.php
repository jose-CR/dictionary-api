<x-app-layout>
    <x-guest-layout>
        <form action="{{ route('words.update', $word->id) }}" method="post">
            @csrf
            @method('PUT')

            <label for="word" class="block text-gray-700">Word:</label>
            <input type="text" id="word" name="word" value="{{ $word->word ?? '' }}" placeholder="Word" class="w-full mt-2 p-2 border border-gray-300 rounded-lg">

            <label for="definition" class="block text-gray-700">Description:</label>
            <input type="text" id="definition" name="definition" value="{{ $word->definition ?? '' }}" placeholder="Description" class="w-full mt-2 p-2 border border-gray-300 rounded-lg">

            <label for="sentence" class="block text-gray-700">Sentence:</label>
            <input type="text" id="sentence" name="sentence" value="{{ $word->sentence ?? '' }}" placeholder="Sentence" class="w-full mt-2 p-2 border border-gray-300 rounded-lg">

            <label for="spanishSentence" class="block text-gray-700">Oración en español:</label>
            <input type="text" name="spanishSentence" value="{{ $word->spanish_sentence ?? '' }}" placeholder="Oración en español" class="w-full mt-2 p-2 border border-gray-300 rounded-lg">            

            <button type="submit" class="mt-4 px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">Update</button>
        </form>
    </x-guest-layout>
</x-app-layout>
