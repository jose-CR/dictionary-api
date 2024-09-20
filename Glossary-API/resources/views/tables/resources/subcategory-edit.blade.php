<x-app-layout>
    <x-guest-layout>
        <form method="POST" action="{{ route('subcategories.update', $subcategory->id) }}">
            @csrf
            @method('PUT')

            <label for="subcategory">Sub Category:</label>
            <input type="text" name="subCategory" id="subcategory" class="w-full mt-5 mb-7 rounded-lg border border-blue-500 text-black shadow-lg outline-none" placeholder="Sub category" value="{{ old('subcategory', $subcategory->subcategory) }}">

            <button type="submit" class="mt-4 px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">Update</button>
        </form> 
    </x-guest-layout>
</x-app-layout>