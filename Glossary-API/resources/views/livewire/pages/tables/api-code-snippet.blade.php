<div>
    @if (empty($enpoint) || empty($table))
        <table class="min-w-full bg-white border border-gray-200 rounded-lg shadow-lg mb-8">
            <tr>
                <td colspan="{{ isset($columns) && count($columns) > 0 ? count($columns) : 3 }}" class="text-center py-4 text-gray-600">
                    No hay datos disponibles.
                </td>
            </tr>
        </table>
    @elseif($table === 'category')
    <div class="bg-gray-900 text-white rounded-xl p-6 mb-10">
        <pre><code><span class="text-green-400">GET</span> {{ $enpoint }}</code></pre>
    </div>

    <div class="bg-gray-900 text-white rounded-xl p-6 mb-10">
        <pre><code>
{
    <span class="text-yellow-400">"info"</span>: {
    <span class="text-yellow-400">"count"</span>: <span class="text-blue-400">5</span>,
    <span class="text-yellow-400">"pages"</span>: <span class="text-blue-400">1</span>,
    <span class="text-yellow-400">"next"</span>: <span class="text-blue-400">null</span>,
    <span class="text-yellow-400">"prev"</span>: <span class="text-blue-400">null</span>
    },
    <span class="text-yellow-400">"data"</span>: [
        {<span class="text-yellow-400">"id"</span>: <span class="text-blue-400">1</span>, <span class="text-yellow-400">"category"</span>: <span class="text-blue-400">"ruso"</span>},
        {<span class="text-yellow-400">"id"</span>: <span class="text-blue-400">2</span>, <span class="text-yellow-400">"category"</span>: <span class="text-blue-400">"aleman"</span>},
        {<span class="text-yellow-400">"id"</span>: <span class="text-blue-400">3</span>, <span class="text-yellow-400">"category"</span>: <span class="text-blue-400">"ruso"</span>}

       ],
    <span class="text-yellow-400">"meta"</span>: {
    <span class="text-yellow-400">"current_page"</span>: <span class="text-blue-400">1</span>,
    <span class="text-yellow-400">"per_pages"</span>: <span class="text-blue-400">15</span>,
    <span class="text-yellow-400">"from"</span>: <span class="text-blue-400">1</span>,
    <span class="text-yellow-400">"to"</span>: <span class="text-blue-400">5</span>
    <span class="text-yellow-400">"last_page"</span>: <span class="text-blue-400">1</span>
    <span class="text-yellow-400">"total"</span>: <span class="text-blue-400">5</span>
    },
    <span class="text-yellow-400">"links"</span>: {
    <span class="text-yellow-400">"first"</span>: <span class="text-blue-400">"http://localhost:8000/api/categories?page=1"</span>,
    <span class="text-yellow-400">"prev"</span>: <span class="text-blue-400">null</span>,
    <span class="text-yellow-400">"next"</span>: <span class="text-blue-400">null</span>,
    <span class="text-yellow-400">"last"</span>: <span class="text-blue-400">"http://localhost:8000/api/categories?page=1"</span>
    },
}
        </code></pre>
    </div>
    @elseif($table === 'subcategory')
    <div class="bg-gray-900 text-white rounded-xl p-6 mb-10">
        <pre><code><span class="text-green-400">GET</span> {{ $enpoint }}</code></pre>
    </div>

    <div class="bg-gray-900 text-white rounded-xl p-6 mb-10">
        <pre><code>
{
    <span class="text-yellow-400">"info"</span>: {
    <span class="text-yellow-400">"count"</span>: <span class="text-blue-400">25</span>,
    <span class="text-yellow-400">"pages"</span>: <span class="text-blue-400">2</span>,
    <span class="text-yellow-400">"next"</span>: <span class="text-blue-400">"http://localhost:8000/api/subcategories?page=2"</span>,
    <span class="text-yellow-400">"prev"</span>: <span class="text-blue-400">null</span>
    },
    <span class="text-yellow-400">"data"</span>: [
        {<span class="text-yellow-400">"id"</span>: <span class="text-blue-400">1</span>, <span class="text-yellow-400">"categoryId"</span>: <span class="text-blue-400">1</span>, <span class="text-yellow-400">"subCategory"</span>: <span class="text-blue-400">"adjetivo"</span>},
        {<span class="text-yellow-400">"id"</span>: <span class="text-blue-400">2</span>, <span class="text-yellow-400">"categoryId"</span>: <span class="text-blue-400">1</span>, <span class="text-yellow-400">"subCategory"</span>: <span class="text-blue-400">"sustantivo"</span>},
        {<span class="text-yellow-400">"id"</span>: <span class="text-blue-400">3</span>, <span class="text-yellow-400">"categoryId"</span>: <span class="text-blue-400">1</span>, <span class="text-yellow-400">"subCategory"</span>: <span class="text-blue-400">"sustantivo"</span>},

       ],
    <span class="text-yellow-400">"meta"</span>: {
    <span class="text-yellow-400">"current_page"</span>: <span class="text-blue-400">1</span>,
    <span class="text-yellow-400">"per_pages"</span>: <span class="text-blue-400">15</span>,
    <span class="text-yellow-400">"from"</span>: <span class="text-blue-400">1</span>,
    <span class="text-yellow-400">"to"</span>: <span class="text-blue-400">15</span>
    <span class="text-yellow-400">"last_page"</span>: <span class="text-blue-400">2</span>
    <span class="text-yellow-400">"total"</span>: <span class="text-blue-400">25</span>
    },
    <span class="text-yellow-400">"links"</span>: {
    <span class="text-yellow-400">"first"</span>: <span class="text-blue-400">"http://localhost:8000/api/subcategories?page=1"</span>,
    <span class="text-yellow-400">"prev"</span>: <span class="text-blue-400">null</span>,
    <span class="text-yellow-400">"next"</span>: <span class="text-blue-400">"http://localhost:8000/api/subcategories?page=2"</span>,
    <span class="text-yellow-400">"last"</span>: <span class="text-blue-400">"http://localhost:8000/api/subcategories?page=2"</span>
    },
}
        </code></pre>
    </div>
    @elseif($table === 'words')
    <div class="bg-gray-900 text-white rounded-xl p-6 mb-10">
        <pre><code><span class="text-green-400">GET</span> {{ $enpoint }}</code></pre>
    </div>

    <div class="bg-gray-900 text-white rounded-xl p-6 mb-10">
        <pre><code>
{
    <span class="text-yellow-400">"info"</span>: {
        <span class="text-yellow-400">"count"</span>: <span class="text-blue-400">250</span>,
        <span class="text-yellow-400">"pages"</span>: <span class="text-blue-400">17</span>,
        <span class="text-yellow-400">"next"</span>: <span class="text-blue-400">"http://localhost:8000/api/words?page=2"</span>,
        <span class="text-yellow-400">"prev"</span>: <span class="text-blue-400">null</span>
    },
    <span class="text-yellow-400">"data"</span>: [
        {<span class="text-yellow-400">"id"</span>: <span class="text-blue-400">1</span>, <span class="text-yellow-400">"subCategoryId"</span>: <span class="text-blue-400">1</span>, <span class="text-yellow-400">"letter"</span>: <span class="text-blue-400">"f"</span>, <span class="text-yellow-400">"word"</span>: <span class="text-blue-400">"voluptatibus"</span>, 
        <span class="text-yellow-400">"definition"</span>: <span class="text-blue-400">'["illo","non","dolor"]'</span>, <span class="text-yellow-400">"spanishSentence"</span>: <span class="text-blue-400">"Voluptas est excepturi et."</span>, 
        <span class="text-yellow-400">"sentence"</span>: <span class="text-blue-400">"Nihil qui et voluptas aut."</span>
        <span class="text-yellow-400">"times"</span>: <span class="text-blue-400">{</span>
            <span class="text-yellow-400">"pasado"</span>: <span class="text-blue-400">{</span>
                    <span class="text-yellow-400">"definition"</span>: <span class="text-blue-400">'["menia", "maiac", "equi"]'</span>,
                    <span class="text-yellow-400">"spanishSentence"</span>: <span class="text-blue-400">"Earum adipisci molestiae ut explicabo."</span>, 
                    <span class="text-yellow-400">"sentence"</span>: <span class="text-blue-400">"Commodi repudiandae autem laborum nulla."</span>
                <span class="text-blue-400">}</span>
            <span class="text-blue-400">}</span>
        },
        {<span class="text-yellow-400">"id"</span>: <span class="text-blue-400">2</span>, <span class="text-yellow-400">"subCategoryId"</span>: <span class="text-blue-400">1</span>, <span class="text-yellow-400">"letter"</span>: <span class="text-blue-400">"x"</span>, <span class="text-yellow-400">"word"</span>: <span class="text-blue-400">"sequi"</span>, 
        <span class="text-yellow-400">"definition"</span>: <span class="text-blue-400">'["earum","ipsam","aliquam"]'</span>, 
        <span class="text-yellow-400">"spanishSentence"</span>: <span class="text-blue-400">"Ut ad omnis et dolorem recusandae iste delectus quo."</span>, 
        <span class="text-yellow-400">"sentence"</span>: <span class="text-blue-400">"Pariatur cumque ut dicta aut laudantium."</span>
        <span class="text-yellow-400">"times"</span>: <span class="text-blue-400">{</span>
            <span class="text-yellow-400">"pasado"</span>: <span class="text-blue-400">{</span>
                    <span class="text-yellow-400">"definition"</span>: <span class="text-blue-400">'["menia", "maiac", "equi"]'</span>,
                    <span class="text-yellow-400">"spanishSentence"</span>: <span class="text-blue-400">"Earum adipisci molestiae ut explicabo."</span>, 
                    <span class="text-yellow-400">"sentence"</span>: <span class="text-blue-400">"Commodi repudiandae autem laborum nulla."</span>
                <span class="text-blue-400">}</span>
            <span class="text-blue-400">}</span>
        },
        {<span class="text-yellow-400">"id"</span>: <span class="text-blue-400">3</span>, <span class="text-yellow-400">"subCategoryId"</span>: <span class="text-blue-400">1</span>, <span class="text-yellow-400">"letter"</span>: <span class="text-blue-400">"j"</span>, <span class="text-yellow-400">"word"</span>: <span class="text-blue-400">"eum"</span>, 
        <span class="text-yellow-400">"definition"</span>: <span class="text-blue-400">'["commodi","totam","tenetur"]'</span>, <span class="text-yellow-400">"spanishSentence"</span>: <span class="text-blue-400">"Est ut dolor mollitia sunt."</span>, 
        <span class="text-yellow-400">"sentence"</span>: <span class="text-blue-400">"Quas enim quis fugit."</span>
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
        <span class="text-yellow-400">"current_page"</span>: <span class="text-blue-400">1</span>,
        <span class="text-yellow-400">"per_pages"</span>: <span class="text-blue-400">15</span>,
        <span class="text-yellow-400">"from"</span>: <span class="text-blue-400">1</span>,
        <span class="text-yellow-400">"to"</span>: <span class="text-blue-400">15</span>
        <span class="text-yellow-400">"last_page"</span>: <span class="text-blue-400">17</span>
        <span class="text-yellow-400">"total"</span>: <span class="text-blue-400">250</span>
    },
    <span class="text-yellow-400">"links"</span>: {
        <span class="text-yellow-400">"first"</span>: <span class="text-blue-400">"http://localhost:8000/api/words?page=1"</span>,
        <span class="text-yellow-400">"prev"</span>: <span class="text-blue-400">null</span>,
        <span class="text-yellow-400">"next"</span>: <span class="text-blue-400">"http://localhost:8000/api/words?page=2"</span>,
        <span class="text-yellow-400">"last"</span>: <span class="text-blue-400">"http://localhost:8000/api/words?page=17"</span>
    },
}
        </code></pre>
    </div>    
    @endif
</div>
