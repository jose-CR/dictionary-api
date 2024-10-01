<article class="px-8 py-10 max-w-6xl mx-auto bg-gradient-to-br from-white via-gray-100 to-gray-50 shadow-lg rounded-xl">
    <h1 class="text-4xl font-bold text-gray-900 mb-8 text-center">API Documentation</h1>

    <section>
        <h2 class="text-2xl font-semibold text-gray-700 mb-4">Introduction</h2>
        <p class="text-lg text-gray-600 leading-relaxed mb-8">
            Lorem ipsum dolor sit amet consectetur, adipisicing elit. Nostrum, a?
        </p>
    </section>

    <section>
        <h2 class="text-2xl font-semibold text-gray-700 mb-4">REST API Overview</h2>
        <p class="text-lg text-gray-600 mb-4">
            <strong class="font-semibold text-gray-800">Base URL:</strong>
            <a href="{{ route('principal') }}" class="text-indigo-600 hover:underline">http://localhost:8000/api</a>
        </p>
        <p class="text-lg text-gray-600 mb-8">
            All requests are <span class="bg-gray-200 text-red-500 px-2 py-1 rounded">GET</span> and use <span class="bg-gray-200 text-red-500 px-2 py-1 rounded">https</span>. Responses are returned in <span class="bg-gray-200 text-red-500 px-2 py-1 rounded">JSON</span> format.
        </p>

        <!-- Example API Call -->
        <div class="bg-gray-900 text-white rounded-xl p-6 mb-10">
            <pre><code><span class="text-green-400">GET</span> http://localhost:8000/api</code></pre>
        </div>
    </section>

    <!-- API Resources -->
    <section>
        <h2 class="text-2xl font-semibold text-gray-700 mb-4">Available Resources</h2>
        <div class="bg-gray-900 text-white rounded-xl p-6 mb-10">
            <pre><code>
                {
                <span class="text-yellow-400">"categories"</span>: <span class="text-blue-400">"http://localhost:8000/api/categories"</span>,
                <span class="text-yellow-400">"subcategories"</span>: <span class="text-blue-400">"http://localhost:8000/api/subcategories"</span>,
                <span class="text-yellow-400">"words"</span>: <span class="text-blue-400">"http://localhost:8000/api/words"</span>
                }
            </code></pre>
        </div>
    </section>

    <section>
        <p class="text-2xl font-semibold text-gray-700 mb-4">There are currently three available resources:</p>
        <ul class="space-y-6">
            <li class="border-l-4 border-indigo-500 pl-4">
                <a href="#category" class="text-indigo-600 font-medium">Category</a>
                <p class="text-gray-600">Lorem ipsum dolor sit amet consectetur adipisicing elit. Culpa, voluptatibus?</p>
            </li>
            <li class="border-l-4 border-indigo-500 pl-4">
                <a href="#subcategory" class="text-indigo-600 font-medium">Subcategory</a>
                <p class="text-gray-600">Lorem ipsum dolor sit amet consectetur adipisicing elit. Culpa, voluptatibus?</p>
            </li>
            <li class="border-l-4 border-indigo-500 pl-4">
                <a href="#words" class="text-indigo-600 font-medium">Words</a>
                <p class="text-gray-600">Lorem ipsum dolor sit amet consectetur adipisicing elit. Culpa, voluptatibus?</p>
            </li>
        </ul>
    </section>

    <!-- Pagination Example -->
    <section class="mt-12">
        <h2 class="text-2xl font-semibold text-gray-700 mb-4">Pagination</h2>
        <p class="text-lg text-gray-600 mb-6">You can paginate the resources using the following structure:</p>

        <table class="min-w-full bg-white border border-gray-200 rounded-lg shadow-lg mb-8">
            <thead class="bg-indigo-50 border-b">
                <tr>
                    <th class="py-2 px-4 text-center text-gray-700">Key</th>
                    <th class="py-2 px-4 text-center text-gray-700">Type</th>
                    <th class="py-2 px-4 text-center text-gray-700">Description</th>
                </tr>
            </thead>
            <tbody>
                <tr class="border-b">
                    <td class="py-2 px-4 text-center text-gray-600">pages</td>
                    <td class="py-2 px-4 text-center text-gray-600">int</td>
                    <td class="py-2 px-4 text-center text-gray-600">The total number of pages available.</td>
                </tr>
            </tbody>
        </table>

        <div class="bg-gray-900 text-white rounded-xl p-6 mb-10">
            <pre><code><span class="text-green-400">GET</span> http://localhost:8000/api/words?page=10</code></pre>
        </div>
    
        <div class="bg-gray-900 text-white rounded-xl p-6 mb-10">
            <pre><code>
    {
      <span class="text-yellow-400">"info"</span>: {
        <span class="text-yellow-400">"count"</span>: <span class="text-blue-400">250</span>,
        <span class="text-yellow-400">"pages"</span>: <span class="text-blue-400">17</span>,
        <span class="text-yellow-400">"next"</span>: <span class="text-blue-400">"http://localhost:8000/api/words?page=11"</span>,
        <span class="text-yellow-400">"prev"</span>: <span class="text-blue-400">"http://localhost:8000/api/words?page=9"</span>
      },
      <span class="text-yellow-400">"data"</span>: [
        {<span class="text-yellow-400">"id"</span>: <span class="text-blue-400">136</span>, <span class="text-yellow-400">"subCategoryId"</span>: <span class="text-blue-400">14</span>, <span class="text-yellow-400">"letter"</span>: <span class="text-blue-400">"o"</span>, <span class="text-yellow-400">"word"</span>: <span class="text-blue-400">"iure"</span>, 
        <span class="text-yellow-400">"definition"</span>: <span class="text-blue-400">'["kiss", "pip", "min"]'</span>, <span class="text-yellow-400">"spanishSentence"</span>: <span class="text-blue-400">"Et quis consequuntur 
        at impedit ut in incidunt."</span>, <span class="text-yellow-400">"sentence"</span>: <span class="text-blue-400">"Dolorem odit aut a sapiente eligendi nisi quia."</span>,
        <span class="text-yellow-400">"times"</span>: <span class="text-blue-400">{</span>
            <span class="text-yellow-400">"pasado"</span>: <span class="text-blue-400">{</span>
                    <span class="text-yellow-400">"definition"</span>: <span class="text-blue-400">'["menia", "maiac", "equi"]'</span>,
                    <span class="text-yellow-400">"spanishSentence"</span>: <span class="text-blue-400">"Earum adipisci molestiae ut explicabo."</span>, 
                    <span class="text-yellow-400">"sentence"</span>: <span class="text-blue-400">"Commodi repudiandae autem laborum nulla."</span>
                <span class="text-blue-400">}</span>
            <span class="text-blue-400">}</span>
        },
        {<span class="text-yellow-400">"id"</span>: <span class="text-blue-400">137</span>, <span class="text-yellow-400">"subCategoryId"</span>: <span class="text-blue-400">14</span>, <span class="text-yellow-400">"letter"</span>: <span class="text-blue-400">"p"</span>, <span class="text-yellow-400">"word"</span>: <span class="text-blue-400">"nihil"</span>, 
        <span class="text-yellow-400">"definition"</span>: <span class="text-blue-400">'["kia", "mia", "nia"]'</span>, <span class="text-yellow-400">"spanishSentence"</span>: <span class="text-blue-400">"Quia quod alias deleniti."</span>, 
        <span class="text-yellow-400">"sentence"</span>: <span class="text-blue-400">"Excepturi enim ipsa minus fugit quis."</span>,
        <span class="text-yellow-400">"times"</span>: <span class="text-blue-400">{</span>
            <span class="text-yellow-400">"pasado"</span>: <span class="text-blue-400">{</span>
                    <span class="text-yellow-400">"definition"</span>: <span class="text-blue-400">'["menia", "maiac", "equi"]'</span>,
                    <span class="text-yellow-400">"spanishSentence"</span>: <span class="text-blue-400">"Earum adipisci molestiae ut explicabo."</span>, 
                    <span class="text-yellow-400">"sentence"</span>: <span class="text-blue-400">"Commodi repudiandae autem laborum nulla."</span>
                <span class="text-blue-400">}</span>
            <span class="text-blue-400">}</span>
        },
        {<span class="text-yellow-400">"id"</span>: <span class="text-blue-400">138</span>, <span class="text-yellow-400">"subCategoryId"</span>: <span class="text-blue-400">14</span>, <span class="text-yellow-400">"letter"</span>: <span class="text-blue-400">"y"</span>, <span class="text-yellow-400">"word"</span>: <span class="text-blue-400">"cupiditate"</span>, 
        <span class="text-yellow-400">"definition"</span>: <span class="text-blue-400">'["menia", "maiac", "equi"]'</span>, <span class="text-yellow-400">"spanishSentence"</span>: <span class="text-blue-400">"Earum adipisci 
        molestiae ut explicabo."</span>, <span class="text-yellow-400">"sentence"</span>: <span class="text-blue-400">"Commodi repudiandae autem laborum nulla."</span>,
        <span class="text-yellow-400">"times"</span>: <span class="text-blue-400">{</span>
            <span class="text-yellow-400">"pasado"</span>: <span class="text-blue-400">{</span>
                    <span class="text-yellow-400">"definition"</span>: <span class="text-blue-400">'["menia", "maiac", "equi"]'</span>,
                    <span class="text-yellow-400">"spanishSentence"</span>: <span class="text-blue-400">"Earum adipisci molestiae ut explicabo."</span>, 
                    <span class="text-yellow-400">"sentence"</span>: <span class="text-blue-400">"Commodi repudiandae autem laborum nulla."</span>
                <span class="text-blue-400">}</span>
            <span class="text-blue-400">}</span>
        }
      ],
      <span class="text-yellow-400">"meta"</span>: {
        <span class="text-yellow-400">"current_page"</span>: <span class="text-blue-400">10</span>,
        <span class="text-yellow-400">"per_pages"</span>: <span class="text-blue-400">15</span>,
        <span class="text-yellow-400">"from"</span>: <span class="text-blue-400">136</span>,
        <span class="text-yellow-400">"to"</span>: <span class="text-blue-400">150</span>
        <span class="text-yellow-400">"last_page"</span>: <span class="text-blue-400">17</span>
        <span class="text-yellow-400">"total"</span>: <span class="text-blue-400">250</span>
      },
      <span class="text-yellow-400">"links"</span>: {
        <span class="text-yellow-400">"first"</span>: <span class="text-blue-400">"http://localhost:8000/api/words?page=1"</span>,
        <span class="text-yellow-400">"prev"</span>: <span class="text-blue-400">"http://localhost:8000/api/words?page=9"</span>,
        <span class="text-yellow-400">"next"</span>: <span class="text-blue-400">"http://localhost:8000/api/words?page=11"</span>,
        <span class="text-yellow-400">"last"</span>: <span class="text-blue-400">"http://localhost:8000/api/words?page=17"</span>
      },
    }
            </code></pre>
        </div>  
    </section>

    <x-pages.content-tables table="category">
        <x-slot:resources>Category</x-slot:resources>
        <x-slot:pResources>There is a total of <code class="bg-gray-200 text-red-500 px-2 py-1 rounded">1</code> category sorted by id.</x-slot:pResources>
        <x-slot:schema>category schema</x-slot:schema>
        <x-slot:topicAll>Get All Categories</x-slot:topicAll>
        <x-slot:ptopicAll>You can access the list of categories using the <code class="bg-gray-200 text-red-500 px-2 py-1 rounded">/categories</code> endpoint.</x-slot:ptopicAll>
        <x-slot:topicSingle>Get a single category</x-slot:topicSingle>
        <x-slot:ptopicSingle> You can get a single categories by adding the <code class="bg-gray-200 text-red-500 px-2 py-1 rounded">id</code> as a parameter: <code class="bg-gray-200 text-red-500 px-2 py-1 rounded">/categories/1</code></x-slot:ptopicSingle>
        <x-slot:topicFilter>Filter Categories</x-slot:topicFilter>
        <x-slot:ptopicFilter> You can filter categories by adding query parameters to the URL. To start filtering, add a <code class="bg-gray-200 text-red-500 px-2 py-1 rounded">?</code> followed by the query. Chain multiple queries using <code class="bg-gray-200 text-red-500 px-2 py-1 rounded">&</code>.</x-slot:ptopicFilter>
        <x-slot:ptopicFilter2> Example: To filter categories for "ruso", use: <code class="bg-gray-200 text-red-500 px-2 py-1 rounded">?category[eq]=ruso</code></x-slot:ptopicFilter2>
    </x-pages.content-tables>
    <x-pages.content-tables table="subcategory">
        <x-slot:resources>Sub category</x-slot:resources>
        <x-slot:pResources>There is a total of <code class="bg-gray-200 text-red-500 px-2 py-1 rounded">6</code> sub category sorted by id.</x-slot:pResources>
        <x-slot:schema>sub category schema</x-slot:schema>
        <x-slot:topicAll>Get All Sub categories</x-slot:topicAll>
        <x-slot:ptopicAll>You can access the list of sub categories using the <code class="bg-gray-200 text-red-500 px-2 py-1 rounded">/subcategories</code> endpoint.</x-slot:ptopicAll>
        <x-slot:topicSingle>Get a single sub category</x-slot:topicSingle>
        <x-slot:ptopicSingle> You can get a single sub categories by adding the <code class="bg-gray-200 text-red-500 px-2 py-1 rounded">id</code> as a parameter: <code class="bg-gray-200 text-red-500 px-2 py-1 rounded">/subcategories/1</code></x-slot:ptopicSingle>
        <x-slot:topicFilter>Filter sub categories</x-slot:topicFilter>
        <x-slot:ptopicFilter> You can filter subcategories by adding query parameters to the URL. To start filtering, add a <code class="bg-gray-200 text-red-500 px-2 py-1 rounded">?</code> followed by the query. Chain multiple queries using <code class="bg-gray-200 text-red-500 px-2 py-1 rounded">&</code>.</x-slot:ptopicFilter>
        <x-slot:ptopicFilter2> Example: To filter subcategories for "id", use: <code class="bg-gray-200 text-red-500 px-2 py-1 rounded">?id[eq]=15</code></x-slot:ptopicFilter2>
    </x-pages.content-tables>
    <x-pages.content-tables table="words">
        <x-slot:resources>Words</x-slot:resources>
        <x-slot:pResources>There is a total of <code class="bg-gray-200 text-red-500 px-2 py-1 rounded">25</code> words sorted by id.</x-slot:pResources>
        <x-slot:schema>words schema</x-slot:schema>
        <x-slot:topicAll>Get All Words</x-slot:topicAll>
        <x-slot:ptopicAll>You can access the list of words using the <code class="bg-gray-200 text-red-500 px-2 py-1 rounded">/words</code> endpoint.</x-slot:ptopicAll>
        <x-slot:topicSingle>Get a single word</x-slot:topicSingle>
        <x-slot:ptopicSingle> You can get a single word by adding the <code class="bg-gray-200 text-red-500 px-2 py-1 rounded">id</code> as a parameter: <code class="bg-gray-200 text-red-500 px-2 py-1 rounded">/words/1</code></x-slot:ptopicSingle>
        <x-slot:topicFilter>Filter Words</x-slot:topicFilter>
        <x-slot:ptopicFilter> You can filter words by adding query parameters to the URL. To start filtering, add a <code class="bg-gray-200 text-red-500 px-2 py-1 rounded">?</code> followed by the query. Chain multiple queries using <code class="bg-gray-200 text-red-500 px-2 py-1 rounded">&</code>.</x-slot:ptopicFilter>
        <x-slot:ptopicFilter2> Example: To filter word for "id", use: <code class="bg-gray-200 text-red-500 px-2 py-1 rounded">?id[eq]=15</code></x-slot:ptopicFilter2>
    </x-pages.content-tables>
</article>