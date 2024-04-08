<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="flex justify-between items-center">
                    <h1 class="text-start text-xl mx-4">{{ $title }}</h1>
                    <button onclick="openButton()" class="bg-green-400 hover:bg-green-600 py-2 px-4 mx-3 rounded hover:text-white">create</button>
                </div>
                {{ $slotcontent }}
            </div>
        </div>
    </div>
</x-app-layout>