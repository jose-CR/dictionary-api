<section class="mt-12">
    <h2 id="{{$table}}" class="text-2xl font-semibold text-gray-700 mb-4">{{$resources}}</h2>
    <p class="text-lg text-gray-600 mb-6">
        {{$pResources}}
    </p>

    <h2 class="text-2xl font-semibold text-gray-700 mb-4">{{$schema}}</h2>

    <livewire:pages.tables.simple-table :table="$table" />

    <h2 class="text-2xl font-semibold text-gray-700 mb-4">{{$topicAll}}</h2>
    <p class="text-lg text-gray-600 mb-6">{{$ptopicAll}}</p>

    <livewire:pages.tables.api-code-snippet :table="$table" />
</section>
<section class="mt-12">
    <h2 class="text-2xl font-semibold text-gray-700 mb-4">{{$topicSingle}}</h2>
    <p class="text-lg text-gray-600 mb-6">{{$ptopicSingle}}</p>

    <livewire:pages.tables.api-single-item-snippet :table="$table"/>
</section>

<section class="mt-12">
    <h2 class="text-2xl font-semibold text-gray-700 mb-4">{{$topicFilter}}</h2>
    <p class="text-lg text-gray-600 mb-6">{{$ptopicFilter}}</p>
    <p class="text-lg text-gray-600 mb-6">{{$ptopicFilter2}}</p>

    <p class="text-lg text-gray-600 mb-6">Available filters:</p>

    <livewire:pages.tables.api-filter-item-snippet :table="$table"/>
</section>