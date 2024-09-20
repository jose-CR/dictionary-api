<x-app-layout>
    <x-guest-layout>
        <form action="{{ route('words.store') }}" method="post">
            @csrf
            <h1 class="text-2xl text-center mb-4">create words</h1>
            <div class="flex flex-wrap -mx-2 mb-4">
                <div class="w-full md:w-1/2 px-2 mb-4">
                    <label for="sub_category_id" class="block mb-2">Subcategories</label>
                    <select name="sub_category_id" class="w-full py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:border-blue-400">
                        <option value="" disabled selected>Subcategories</option>
                        @foreach($subCategories as $subcategory)
                            <option value="{{ $subcategory->id }}">{{ $subcategory->category->category }} || {{ $subcategory->subcategory }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="w-full md:w-1/2 px-2 mb-4">
                    <label for="letter" class="block mb-2">Letter</label>
                    <select name="letter" class="w-full py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:border-blue-400">
                        <option value="" disabled selected>Select a letter</option>
                        @foreach ($uniqueLetters as $letter)
                            <option value="{{ $letter }}">{{ $letter }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="w-full md:w-1/2 mb-4">
                    <label for="word" class="block mb-2">Word</label>
                    <input type="text" name="word" class="w-full py-2 px-4 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:border-blue-400">
                </div>

                <div class="w-full md:w-1/2 px-2 mb-4">
                    <label for="description" class="block mb-2">Description</label>
                    <input type="text" name="definition" class="w-full py-2 px-4 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:border-blue-400">
                </div>

                <div class="w-full md:w-1/2 px-2 mb-4">
                    <label for="sentence" class="block mb-2">Oración</label>
                    <input type="text" name="sentence" class="w-full py-2 px-4 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:border-blue-400">
                </div>

                <div class="w-full md:w-1/2 px-2 mb-4">
                    <label for="spanish_sentence" class="block mb-2">Oración en español</label>
                    <input type="text" name="spanishSentence" class="w-full py-2 px-4 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:border-blue-400">
                </div>
            </div>

            <button type="submit" class="w-full py-3 bg-blue-600 text-white rounded-md shadow-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:ring-opacity-75">Create</button>
        </form> 
    </x-guest-layout>
</x-app-layout>