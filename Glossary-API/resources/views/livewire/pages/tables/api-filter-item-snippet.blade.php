<div>
    <ul class="list-disc pl-8 space-y-2">
        @foreach ($tuplas as $tupla)
        <li><code class="bg-gray-200 text-red-500 px-2 py-1 mb-20 rounded">{{$tupla['name']}}</code> {{$tupla['description']}}</li>
        @endforeach
    </ul>
    @if (empty($endpoint) || empty($table))
        <table class="min-w-full bg-white border border-gray-200 rounded-lg shadow-lg mb-8">
            <tr>
                <td colspan="{{ isset($columns) && count($columns) > 0 ? count($columns) : 3 }}" class="text-center py-4 text-gray-600">
                    No hay datos disponibles.
                </td>
            </tr>
        </table>
    @elseif($table === 'category')
        <div class="bg-gray-900 text-white rounded-xl p-6 mb-10">
            <pre><code><span class="text-green-400">GET</span> {{$endpoint}}</code></pre>
        </div>

        <div class="bg-gray-900 text-white rounded-xl p-6">
            <pre><code>
    {
      <span class="text-yellow-400">"info"</span>: {
        <span class="text-yellow-400">"count"</span>: <span class="text-blue-400">2</span>,
        <span class="text-yellow-400">"pages"</span>: <span class="text-blue-400">1</span>,
        <span class="text-yellow-400">"next"</span>: <span class="text-blue-400">null</span>,
        <span class="text-yellow-400">"prev"</span>: <span class="text-blue-400">null</span>
      },
      <span class="text-yellow-400">"data"</span>: [
        {<span class="text-yellow-400">"id"</span>: <span class="text-blue-400">1</span>, <span class="text-yellow-400">"category"</span>: <span class="text-blue-400">"ruso"</span>},
        {<span class="text-yellow-400">"id"</span>: <span class="text-blue-400">3</span>, <span class="text-yellow-400">"category"</span>: <span class="text-blue-400">"ruso"</span>}
      ],
      <span class="text-yellow-400">"meta"</span>: {
        <span class="text-yellow-400">"current_page"</span>: <span class="text-blue-400">1</span>,
        <span class="text-yellow-400">"per_pages"</span>: <span class="text-blue-400">15</span>,
        <span class="text-yellow-400">"from"</span>: <span class="text-blue-400">1</span>,
        <span class="text-yellow-400">"to"</span>: <span class="text-blue-400">2</span>
        <span class="text-yellow-400">"last_page"</span>: <span class="text-blue-400">1</span>
        <span class="text-yellow-400">"total"</span>: <span class="text-blue-400">2</span>
        },
        <span class="text-yellow-400">"links"</span>: {
        <span class="text-yellow-400">"first"</span>: <span class="text-blue-400">"http://localhost:8000/api/categories?category%5Beq%5D=ruso&page=1"</span>,
        <span class="text-yellow-400">"prev"</span>: <span class="text-blue-400">null</span>,
        <span class="text-yellow-400">"next"</span>: <span class="text-blue-400">null</span>,
        <span class="text-yellow-400">"last"</span>: <span class="text-blue-400">"http://localhost:8000/api/categories?category%5Beq%5D=ruso&page=1"</span>
        },
    }
            </code></pre>
        </div>
    @elseif($table === 'subcategory')
    <div class="bg-gray-900 text-white rounded-xl p-6 mb-10">
        <pre><code><span class="text-green-400">GET</span> {{$endpoint}}</code></pre>
    </div>

    <div class="bg-gray-900 text-white rounded-xl p-6">
        <pre><code>
{
  <span class="text-yellow-400">"info"</span>: {
    <span class="text-yellow-400">"count"</span>: <span class="text-blue-400">1</span>,
    <span class="text-yellow-400">"pages"</span>: <span class="text-blue-400">1</span>,
    <span class="text-yellow-400">"next"</span>: <span class="text-blue-400">null</span>,
    <span class="text-yellow-400">"prev"</span>: <span class="text-blue-400">null</span>
  },
  <span class="text-yellow-400">"data"</span>: [
    {<span class="text-yellow-400">"id"</span>: <span class="text-blue-400">15</span>, <span class="text-yellow-400">"categoryId"</span>: <span class="text-blue-400">3</span>, <span class="text-yellow-400">"subCategory"</span>: <span class="text-blue-400">"sustantivo"</span>},
  ],
  <span class="text-yellow-400">"meta"</span>: {
    <span class="text-yellow-400">"current_page"</span>: <span class="text-blue-400">1</span>,
    <span class="text-yellow-400">"per_pages"</span>: <span class="text-blue-400">15</span>,
    <span class="text-yellow-400">"from"</span>: <span class="text-blue-400">1</span>,
    <span class="text-yellow-400">"to"</span>: <span class="text-blue-400">1</span>
    <span class="text-yellow-400">"last_page"</span>: <span class="text-blue-400">1</span>
    <span class="text-yellow-400">"total"</span>: <span class="text-blue-400">1</span>
    },
 <span class="text-yellow-400">"links"</span>: {
    <span class="text-yellow-400">"first"</span>: <span class="text-blue-400">"http://localhost:8000/api/subcategories?id%5Beq%5D=15&page=1"</span>,
    <span class="text-yellow-400">"prev"</span>: <span class="text-blue-400">null</span>,
    <span class="text-yellow-400">"next"</span>: <span class="text-blue-400">null</span>,
    <span class="text-yellow-400">"last"</span>: <span class="text-blue-400">"http://localhost:8000/api/subcategories?id%5Beq%5D=15&page=1"</span>
    },
}
        </code></pre>
    </div>
    @elseif($table === 'words')
    <div class="bg-gray-900 text-white rounded-xl p-6 mb-10">
        <pre><code><span class="text-green-400">GET</span> {{$endpoint}}</code></pre>
    </div>

    <div class="bg-gray-900 text-white rounded-xl p-6">
        <pre><code>
{
  <span class="text-yellow-400">"info"</span>: {
    <span class="text-yellow-400">"count"</span>: <span class="text-blue-400">1</span>,
    <span class="text-yellow-400">"pages"</span>: <span class="text-blue-400">1</span>,
    <span class="text-yellow-400">"next"</span>: <span class="text-blue-400">null</span>,
    <span class="text-yellow-400">"prev"</span>: <span class="text-blue-400">null</span>
  },
  <span class="text-yellow-400">"data"</span>: [
    {<span class="text-yellow-400">"id"</span>: <span class="text-blue-400">15</span>, <span class="text-yellow-400">"subCategoryId"</span>: <span class="text-blue-400">2</span>, <span class="text-yellow-400">"letter"</span>: <span class="text-blue-400">"y"</span>, <span class="text-yellow-400">"word"</span>: <span class="text-blue-400">"cum"</span>, 
    <span class="text-yellow-400">"definition"</span>: <span class="text-blue-400">'["dolore","cum","reprehenderit"]'</span>, 
    <span class="text-yellow-400">"spanishSentence"</span>: <span class="text-blue-400">"Tenetur corporis aspernatur neque."</span>, <span class="text-yellow-400">"sentence"</span>: <span class="text-blue-400">"Excepturi dolor id ut dolor minus."</span>
    <span class="text-yellow-400">"times"</span>: <span class="text-blue-400">{</span>
      <span class="text-yellow-400">"pasado"</span>: <span class="text-blue-400">{</span>
              <span class="text-yellow-400">"definition"</span>: <span class="text-blue-400">'["menia", "maiac", "equi"]'</span>,
              <span class="text-yellow-400">"spanishSentence"</span>: <span class="text-blue-400">"Earum adipisci molestiae ut explicabo."</span>, 
              <span class="text-yellow-400">"sentence"</span>: <span class="text-blue-400">"Commodi repudiandae autem laborum nulla."</span>
          <span class="text-blue-400">}</span>
      <span class="text-blue-400">}</span>
    },
  ],
  <span class="text-yellow-400">"meta"</span>: {
    <span class="text-yellow-400">"current_page"</span>: <span class="text-blue-400">1</span>,
    <span class="text-yellow-400">"per_pages"</span>: <span class="text-blue-400">15</span>,
    <span class="text-yellow-400">"from"</span>: <span class="text-blue-400">1</span>,
    <span class="text-yellow-400">"to"</span>: <span class="text-blue-400">1</span>
    <span class="text-yellow-400">"last_page"</span>: <span class="text-blue-400">1</span>
    <span class="text-yellow-400">"total"</span>: <span class="text-blue-400">1</span>
    },
 <span class="text-yellow-400">"links"</span>: {
    <span class="text-yellow-400">"first"</span>: <span class="text-blue-400">"http://localhost:8000/api/words?id%5Beq%5D=15&page=1"</span>,
    <span class="text-yellow-400">"prev"</span>: <span class="text-blue-400">null</span>,
    <span class="text-yellow-400">"next"</span>: <span class="text-blue-400">null</span>,
    <span class="text-yellow-400">"last"</span>: <span class="text-blue-400">"http://localhost:8000/api/words?id%5Beq%5D=15&page=1"</span>
    },
}
        </code></pre>
    </div>
    @endif
</div>