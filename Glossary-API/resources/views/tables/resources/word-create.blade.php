<x-app-layout>
    <x-guest-layout>
        <form action="{{ route('words.store') }}" method="post">
            @csrf
            <h1 class="text-3xl font-bold text-center mb-6 text-gray-700">Crear Palabras</h1>
            
            <div class="flex flex-wrap -mx-2 mb-4 bg-white p-6 rounded-lg shadow-md">
                
                <!-- Subcategoría -->
                <div class="w-full md:w-1/2 px-2 mb-4">
                    <label for="sub_category_id" class="block mb-2 font-semibold text-gray-700">Subcategorías</label>
                    <select name="sub_category_id" class="w-full py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:border-blue-400">
                        <option value="" disabled selected>Subcategorías</option>
                        @foreach($subCategories as $subcategory)
                            <option value="{{ $subcategory->id }}">{{ $subcategory->category->category }} || {{ $subcategory->subcategory }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- Letra -->
                <div class="w-full md:w-1/2 px-2 mb-4">
                    <label for="letter" class="block mb-2 font-semibold text-gray-700">Letra</label>
                    <select name="letter" class="w-full py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:border-blue-400">
                        <option value="" disabled selected>Seleccionar una letra</option>
                        @foreach ($uniqueLetters as $letter)
                            <option value="{{ $letter }}">{{ $letter }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- Palabra -->
                <div class="w-full md:w-1/2 px-2 mb-4">
                    <label for="word" class="block mb-2 font-semibold text-gray-700">Palabra</label>
                    <input type="text" name="word" class="w-full py-2 px-4 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:border-blue-400">
                </div>

                <!-- Definición -->
                <div class="w-full md:w-1/2 px-2 mb-4">
                    <label for="definition" class="block mb-2 font-semibold text-gray-700">Definición</label>
                    <input type="text" name="definition" class="w-full py-2 px-4 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:border-blue-400">
                </div>

                <!-- Oración -->
                <div class="w-full md:w-1/2 px-2 mb-4">
                    <label for="sentence" class="block mb-2 font-semibold text-gray-700">Oración</label>
                    <input type="text" name="sentence" class="w-full py-2 px-4 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:border-blue-400">
                </div>

                <!-- Oración en Español -->
                <div class="w-full md:w-1/2 px-2 mb-4">
                    <label for="spanishSentence" class="block mb-2 font-semibold text-gray-700">Oración en Español</label>
                    <input type="text" name="spanishSentence" class="w-full py-2 px-4 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:border-blue-400">
                </div>

                <div class="w-full mb-6">
                    <h2 class="text-2xl font-semibold mb-4 text-gray-800 bg-gray-100 p-3 rounded-md shadow-sm">Tiempos: Pasado</h2>
                
                    <!-- Definición Pasado -->
                    <div class="border rounded-lg p-4 mb-4 bg-gray-50">
                        <h4 class="text-lg font-semibold mb-2">Pasado</h4>
                
                        <div class="mb-2">
                            <label for="times[pasado][definition][]" class="block text-gray-700">Definición (Pasado):</label>
                            <input type="text" name="times[pasado][definition][]" class="w-full mt-2 p-2 border border-gray-300 rounded-lg" placeholder="Definiciones (separadas por comas)">
                        </div>
                
                        <div class="mb-2">
                            <label for="times[pasado][sentence]" class="block text-gray-700">Oración (Pasado):</label>
                            <input type="text" name="times[pasado][sentence]" class="w-full mt-2 p-2 border border-gray-300 rounded-lg" placeholder="Oración">
                        </div>
                
                        <div class="mb-2">
                            <label for="times[pasado][spanishSentence]" class="block text-gray-700">Oración en Español (Pasado):</label>
                            <input type="text" name="times[pasado][spanishSentence]" class="w-full mt-2 p-2 border border-gray-300 rounded-lg" placeholder="Oración en español">
                        </div>
                    </div>
                </div>
                
                <!-- Sección Ing -->
                <div class="w-full mb-6">
                    <h2 class="text-2xl font-semibold mb-4 text-gray-800 bg-gray-100 p-3 rounded-md shadow-sm">Tiempos: Ing</h2>
                
                    <!-- Definición Ing -->
                    <div class="border rounded-lg p-4 mb-4 bg-gray-50">
                        <h4 class="text-lg font-semibold mb-2">Ing</h4>
                
                        <div class="mb-2">
                            <label for="times[ing][definition][]" class="block text-gray-700">Definición (Ing):</label>
                            <input type="text" name="times[ing][definition][]" class="w-full mt-2 p-2 border border-gray-300 rounded-lg" placeholder="Definiciones (separadas por comas)">
                        </div>
                
                        <div class="mb-2">
                            <label for="times[ing][sentence]" class="block text-gray-700">Oración (Ing):</label>
                            <input type="text" name="times[ing][sentence]" class="w-full mt-2 p-2 border border-gray-300 rounded-lg" placeholder="Oración">
                        </div>
                
                        <div class="mb-2">
                            <label for="times[ing][spanishSentence]" class="block text-gray-700">Oración en Español (Ing):</label>
                            <input type="text" name="times[ing][spanishSentence]" class="w-full mt-2 p-2 border border-gray-300 rounded-lg" placeholder="Oración en español">
                        </div>
                    </div>
                </div>
            </div>

            <button type="submit" class="w-full py-3 bg-blue-600 text-white rounded-md shadow-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:ring-opacity-75">
                Create
            </button>
        </form>
    </x-guest-layout>
</x-app-layout>
