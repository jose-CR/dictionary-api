<x-layouts.layout>
    <x-slot:title> English category List </x-slot:title>

    <x-slot name="slotcontent">

        <x-content.category :columns="['Id', 'Category', 'Accions' ]" :data="$categoryData" />

        <x-ui.pagination :data="$category" />
    </x-slot>
</x-layouts.layout>