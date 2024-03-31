<x-layouts.layout>
    <x-slot:title> English Word List </x-slot:title>

    <x-slot name="slotcontent">

        <x-content.word :columns="['id', 'Letter', 'Word', 'description', 'Accions' ]" :data="$wordData" />

        <x-ui.pagination :data="$word" />
    </x-slot>
</x-layouts.layout>