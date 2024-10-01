<div>
    @if (empty($endpoint))
    <table class="min-w-full bg-white border border-gray-200 rounded-lg shadow-lg mb-8">
        <tr>
            <td colspan="{{ isset($columns) && count($columns) > 0 ? count($columns) : 3 }}" class="text-center py-4 text-gray-600">
                No hay datos disponibles.
            </td>
        </tr>
    </table>
    @elseif($table === 'category')
    <div class="bg-gray-900 text-white rounded-xl p-6 mb-10">
        <pre><code><span class="text-green-400">GET</span>{{$endpoint}}</code></pre>
    </div>

    <div class="bg-gray-900 text-white rounded-xl p-6 mb-10">
        <pre><code>
{
  <span class="text-yellow-400">"data"</span>: [
    {<span class="text-yellow-400">"id"</span>: <span class="text-blue-400">1</span>, <span class="text-yellow-400">"category"</span>: <span class="text-blue-400">"ruso"</span>},
  ]
}
        </code></pre>
    </div>
    @elseif($table === 'subcategory')
    <div class="bg-gray-900 text-white rounded-xl p-6 mb-10">
        <pre><code><span class="text-green-400">GET</span> {{$endpoint}}</code></pre>
    </div>

    <div class="bg-gray-900 text-white rounded-xl p-6 mb-10">
        <pre><code>
{
  <span class="text-yellow-400">"data"</span>: [
    {<span class="text-yellow-400">"id"</span>: <span class="text-blue-400">1</span>, <span class="text-yellow-400">"categoryId"</span>: <span class="text-blue-400">1</span>, <span class="text-yellow-400">"subCategory"</span>: <span class="text-blue-400">"adjetivo"</span>},
  ]
}
        </code></pre>
    </div>
    @elseif($table === 'words')
    <div class="bg-gray-900 text-white rounded-xl p-6 mb-10">
      <pre><code><span class="text-green-400">GET</span> {{$endpoint}}</code></pre>
  </div>

  <div class="bg-gray-900 text-white rounded-xl p-6 mb-10">
      <pre><code>
{
<span class="text-yellow-400">"data"</span>: [
  {<span class="text-yellow-400">"id"</span>: <span class="text-blue-400">1</span>, <span class="text-yellow-400">"SubCategoryId"</span>: <span class="text-blue-400">1</span>, <span class="text-yellow-400">"letter"</span>: <span class="text-blue-400">"f"</span>, <span class="text-yellow-400">"word"</span>: <span class="text-blue-400">"voluptatibus"</span>, 
  <span class="text-yellow-400">"definition"</span>: <span class="text-blue-400">'["illo","non","dolor"]'</span>, <span class="text-yellow-400">"sentence"</span>: <span class="text-blue-400">"Nihil qui et voluptas aut."</span>, 
  <span class="text-yellow-400">"spanishSentence"</span>: <span class="text-blue-400">"Voluptas est excepturi et."</span>
  <span class="text-yellow-400">"times"</span>: <span class="text-blue-400">{</span>
    <span class="text-yellow-400">"pasado"</span>: <span class="text-blue-400">{</span>
            <span class="text-yellow-400">"definition"</span>: <span class="text-blue-400">'["menia", "maiac", "equi"]'</span>,
            <span class="text-yellow-400">"spanishSentence"</span>: <span class="text-blue-400">"Earum adipisci molestiae ut explicabo."</span>, 
            <span class="text-yellow-400">"sentence"</span>: <span class="text-blue-400">"Commodi repudiandae autem laborum nulla."</span>
        <span class="text-blue-400">}</span>
    <span class="text-blue-400">}</span>
  },
]
}
      </code></pre>
  </div>    
    @endif
</div>
