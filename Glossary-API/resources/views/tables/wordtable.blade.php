<x-layouts.layout>
    <x-slot:title> English Word List </x-slot:title>

    <x-slot name="slotcontent">
        <x-ui.dialog x-ref="dialogRefEmpty" class="top-[50%] left-[50%]">
            <x-slot name="slotdialog">
                <span @click=" close() " class="absolute top-1 right-3 text-xl cursor-pointer text-[#555] bg-none p-0">X</span>
                <form action="{{ route('word.create') }}" method="post">
                    @csrf
                    <h1 class="text-2xl text-center mb-4">create words</h1>
                    <div class="flex flex-wrap -mx-2 mb-4">
                        <div class="w-full md:w-1/2 px-2 mb-4">
                            <label for="sub_category_id" class="block mb-2">Subcategories</label>
                            <select name="sub_category_id" class="w-full py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:border-blue-400">
                                <option value="" disabled selected>Subcategories</option>
                                @foreach($subCategories as $subcategory)
                                    <option value="{{ $subcategory->id }}">{{ $subcategory->subcategory }}</option>
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
                            <input type="text" name="spanish_sentence" class="w-full py-2 px-4 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:border-blue-400">
                        </div>
                    </div>
        
                    <button type="submit" class="w-full py-3 bg-blue-600 text-white rounded-md shadow-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:ring-opacity-75">Enviar</button>
                </form> 
            </x-slot>
        </x-ui.dialog>        

        <x-content.word :columns="['id', 'Letter', 'Word', 'description', 'oracion', 'oracion en español' , 'Accions' ]" :data="$wordData" />

        <x-ui.pagination :data="$word" />
    </x-slot>
</x-layouts.layout>