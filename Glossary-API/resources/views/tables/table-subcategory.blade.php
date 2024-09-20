<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="flex justify-between items-center">
                    <h1 class="text-center text-xl mx-4">English sub category List</h1>
                    <a href="{{ route('create-subcategory') }}" class="bg-green-500 text-white py-1 px-2 mx-2 my-4 rounded hover:bg-green-600">
                        Create sub category
                    </a>
                </div>
                <livewire:pages.component-subcategory />
            </div>
        </div>
    </div>
</x-app-layout>