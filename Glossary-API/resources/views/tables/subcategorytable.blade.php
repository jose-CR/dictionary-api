<x-layouts.layout>
    <x-slot:title> English sub category List </x-slot:title>

    <x-slot name="slotcontent">

        <x-ui.dialog x-ref="dialogRefEmpty" class="top-[69%] left-[30%]">
            <x-slot name="slotdialog">
                <span @click=" close() "  class="absolute top-1 right-3 text-xl cursor-pointer text-[#555] bg-none p-0">X</span>
                <form action="{{ route('subcategory.create') }}" method="post">
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

                    <button type="submit" class="w-full py-3 bg-blue-600 text-white rounded-md shadow-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:ring-opacity-75">Enviar</button>
                </form> 
            </x-slot>
        </x-ui.dialog>

        <x-content.subcategory :columns="['Id', 'Sub category', 'Accions' ]" :data="$subCategoryData" />

        <x-ui.pagination :data="$subCategory" />
    </x-slot>
</x-layouts.layout>