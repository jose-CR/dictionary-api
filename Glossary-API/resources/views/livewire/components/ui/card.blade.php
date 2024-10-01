<div class="p-6 space-y-6">
    <!-- Sección de categorías -->
    @foreach ($categories as $category)
        <div class="bg-white p-4 rounded-lg shadow-md">
            <div class="mb-3">
                <h3 class="text-lg font-semibold text-gray-800">Category:</h3>
                <a href="{{ route('categories.show', ['category' => $category->id]) }}"
                   class="text-indigo-400 hover:no-underline hover:text-indigo-600 transition duration-200">
                    {{ $category->category }}
                </a>
            </div>

            <!-- Subcategorías -->
            @foreach ($subcategories as $subcategory)
                <div class="mb-2">
                    <h4 class="text-md font-medium text-gray-700">Subcategory:</h4>
                    <a href="{{ route('subcategories.show', ['subcategory' => $subcategory->id]) }}"
                       class="text-indigo-400 hover:text-indigo-600 transition duration-200">
                        {{ $subcategory->subcategory }}
                    </a>
                </div>
            @endforeach

            <!-- Palabras -->
            @foreach ($words as $word)
                <div class="mb-4">
                    <p><strong class="text-gray-600">Letter:</strong> <a href="{{route('words.show', ['word' => $word->id])}}">{{ $word->letter }}</a></p>
                    <p><strong class="text-gray-600">Word:</strong> <a href="{{route('words.show', ['word' => $word->id])}}">{{ $word->word }}</a></p>
                    <p><strong class="text-gray-600">Definition:</strong> <a href="{{route('words.show', ['word' => $word->id])}}">{{ $word->String_Definition }}</a></p>
                    <p><strong class="text-gray-600">Oración en español:</strong> <a href="{{route('words.show', ['word' => $word->id])}}">{{ $word->spanish_sentence }}</a></p>
                    <p><strong class="text-gray-600">Oración:</strong> <a href="{{route('words.show', ['word' => $word->id])}}">{{ $word->sentence }}</a></p>

                    <!-- Verificación del campo times -->
                    @if ($word->times)
                        <div class="mt-4">
                            <h5 class="text-md font-semibold text-gray-700">Tiempos:</h5>

                            <!-- Pasado -->
                            <div class="mb-2">
                                <h6 class="text-sm font-bold text-gray-600">Pasado:</h6>
                                <p><strong class="text-gray-600">Definición:</strong> <a href="{{route('words.show', ['word' => $word->id])}}">{{ implode(', ', $word->times['pasado']['definition']) }}</a></p>
                                <p><strong class="text-gray-600">Oración en español:</strong> <a href="{{route('words.show', ['word' => $word->id])}}">{{ $word->times['pasado']['spanishSentence'] }}</a></p>
                                <p><strong class="text-gray-600">Oración:</strong> <a href="{{route('words.show', ['word' => $word->id])}}">{{ $word->times['pasado']['sentence'] }}</a></p>
                            </div>

                            <!-- Ing -->
                            <div class="mb-2">
                                <h6 class="text-sm font-bold text-gray-600">Ing:</h6>
                                <p><strong class="text-gray-600">Definición:</strong> <a href="{{route('words.show', ['word' => $word->id])}}">{{ implode(', ', $word->times['ing']['definition']) }}</a></p>
                                <p><strong class="text-gray-600">Oración en español:</strong> <a href="{{route('words.show', ['word' => $word->id])}}">{{ $word->times['ing']['spanishSentence'] }}</a></p>
                                <p><strong class="text-gray-600">Oración:</strong> <a href="{{route('words.show', ['word' => $word->id])}}">{{ $word->times['ing']['sentence'] }}</a></p>
                            </div>
                        </div>
                    @else
                        <p><strong class="text-red-600">No tiene tiempos disponibles.</strong></p>
                    @endif
                </div>
            @endforeach
        </div>
    @endforeach
</div>
