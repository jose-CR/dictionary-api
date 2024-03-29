@props(['data'])

@if ($data->lastPage() > 1)
    <nav aria-label="Page navigation" class="flex justify-center">
        <ul class="inline-flex -space-x-px text-sm">
            @if ($data->previousPageUrl())
                <li>
                    <a href="{{ $data->previousPageUrl() }}" class="flex items-center justify-center px-3 h-8 ms-0 leading-tight text-gray-500 bg-white border border-e-0 border-gray-300 rounded-s-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">Anterior</a>
                </li>
            @endif

            @foreach ($data->getUrlRange(1, $data->lastPage()) as $page => $url)
                <li>
                    <a href="{{ $url }}" class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">{{ $page }}</a>
                </li>
            @endforeach

            @if ($data->nextPageUrl())
                <li>
                    <a href="{{ $data->nextPageUrl() }}" class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 rounded-e-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">Siguiente</a>
                </li>
            @endif
        </ul>
    </nav>
@endif