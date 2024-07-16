<x-layouts.layout>
    <x-slot:title> English category List </x-slot:title>

    <x-slot name="slotcontent">
        <x-ui.dialog x-ref="dialogRefEmpty" class="top-[38%] left-[30%]">
                <x-slot name="slotdialog">
                    <span @click=" close() " class="absolute top-1 right-3 text-xl cursor-pointer text-[#555] bg-none p-0">X</span>
                    <form action="{{ route('category.create') }}" method="post">
                        @csrf
                        <h1 class="text-2xl text-center mb-4">create category</h1>

                        <section class="mb-4">
                            <label for="category" class="block mb-2">Category</label>
                            <input type="text" name="category" id="category" class="w-full py-2 px-4 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:border-blue-400">
                        </section>

                        <button type="submit" class="w-full py-3 bg-blue-600 text-white rounded-md shadow-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:ring-opacity-75">Enviar</button>
                    </form> 
                </x-slot>
        </x-ui.dialog>

    @role('admin')
        <livewire:components.category-table :role="'admin'" />
    @endrole
    @role('user')
        <livewire:components.category-table :role="'user'" />
    @endrole
        <x-ui.pagination :data="$category" />
    </x-slot>
</x-layouts.layout>