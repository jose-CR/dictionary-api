<x-app-layout>
    <x-guest-layout>
        <form action="{{ route('subcategories.store') }}" method="post">
            @csrf
            <h1 class="text-2xl text-center mb-4">create sub category</h1>

            <section class="mb-4">
                <label for="category_id" class="block mb-2">categories</label>
                <select name="categoryId" id="category" class="w-full py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:border-blue-400">
                    <option value="" disabled selected>categories</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->category }}</option>
                    @endforeach
                </select>
            </section>

            <section class="mb-4">
                <label for="subcategory" class="block mb-2">Sub category</label>
                <input type="text" name="subcategory" id="subcategory" class="w-full py-2 px-4 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:border-blue-400">
            </section>

            <button type="submit" class="mt-4 px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700">Create</button>
        </form> 
    </x-guest-layout>
</x-app-layout>