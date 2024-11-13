<div class="p-6 space-y-6">
    <!-- Sección de categorías -->
    @foreach ($categories as $category)
        <div class="bg-white p-6 rounded-lg shadow-lg space-y-4">
            <div class="mb-4">
                <h3 class="text-xl font-semibold text-gray-800">Category:</h3>
                <a href="{{ route('categories.show', ['category' => $category->id]) }}"
                   class="text-indigo-500 hover:text-indigo-700 transition duration-200">
                    {{ $category->category }}
                </a>
            </div>

            <!-- Subcategorías -->
            @foreach ($subcategories as $subcategory)
                <div class="mb-3">
                    <h4 class="text-md font-medium text-gray-700">Subcategory:</h4>
                    <a href="{{ route('subcategories.show', ['subcategory' => $subcategory->id]) }}"
                       class="text-indigo-500 hover:text-indigo-700 transition duration-200">
                        {{ $subcategory->subcategory }}
                    </a>
                </div>
            @endforeach

            <!-- Palabras -->
            @foreach ($words as $word)
                <div class="mb-6 bg-gray-100 p-4 rounded-lg shadow-sm">
                    <p><strong class="text-gray-700">Letter:</strong> <a href="{{ route('words.show', ['word' => $word->id]) }}" class="text-indigo-500 hover:text-indigo-700">{{ $word->letter }}</a></p>
                    <p><strong class="text-gray-700">Word:</strong> <a href="{{ route('words.show', ['word' => $word->id]) }}" class="text-indigo-500 hover:text-indigo-700">{{ $word->word }}</a></p>
                    <p><strong class="text-gray-700">Definition:</strong> <a href="{{ route('words.show', ['word' => $word->id]) }}" class="text-indigo-500 hover:text-indigo-700">{{ $word->String_Definition }}</a></p>
                    <p><strong class="text-gray-700">Oración en español:</strong> <a href="{{ route('words.show', ['word' => $word->id]) }}" class="text-indigo-500 hover:text-indigo-700">{{ $word->spanish_sentence }}</a></p>
                    <p><strong class="text-gray-700">Oración:</strong> <a href="{{ route('words.show', ['word' => $word->id]) }}" class="text-indigo-500 hover:text-indigo-700">{{ $word->sentence }}</a></p>

                    <!-- Verificación del campo times -->
                    @if ($word->times)
                        <div class="mt-4 space-y-4">
                            <h5 class="text-lg font-semibold text-gray-800">Tiempos:</h5>

                            <!-- Pasado -->
                            <div class="mb-2 pl-4 border-l-4 border-indigo-500">
                                <h6 class="text-sm font-bold text-gray-700">Pasado:</h6>
                                <p><strong class="text-gray-600">Definición:</strong> <a href="{{ route('words.show', ['word' => $word->id]) }}" class="text-indigo-500 hover:text-indigo-700">{{ implode(', ', $word->times['pasado']['definition']) }}</a></p>
                                <p><strong class="text-gray-600">Oración en español:</strong> <a href="{{ route('words.show', ['word' => $word->id]) }}" class="text-indigo-500 hover:text-indigo-700">{{ $word->times['pasado']['spanishSentence'] }}</a></p>
                                <p><strong class="text-gray-600">Oración:</strong> <a href="{{ route('words.show', ['word' => $word->id]) }}" class="text-indigo-500 hover:text-indigo-700">{{ $word->times['pasado']['sentence'] }}</a></p>
                            </div>

                            <!-- Ing -->
                            <div class="mb-2 pl-4 border-l-4 border-indigo-500">
                                <h6 class="text-sm font-bold text-gray-700">Ing:</h6>
                                <p><strong class="text-gray-600">Definición:</strong> <a href="{{ route('words.show', ['word' => $word->id]) }}" class="text-indigo-500 hover:text-indigo-700">{{ implode(', ', $word->times['ing']['definition']) }}</a></p>
                                <p><strong class="text-gray-600">Oración en español:</strong> <a href="{{ route('words.show', ['word' => $word->id]) }}" class="text-indigo-500 hover:text-indigo-700">{{ $word->times['ing']['spanishSentence'] }}</a></p>
                                <p><strong class="text-gray-600">Oración:</strong> <a href="{{ route('words.show', ['word' => $word->id]) }}" class="text-indigo-500 hover:text-indigo-700">{{ $word->times['ing']['sentence'] }}</a></p>
                            </div>
                        </div>
                    @else
                        <p class="text-red-600 font-medium">No hay tiempos</p>
                    @endif
                </div>
            @endforeach
        </div>
    @endforeach
</div>

