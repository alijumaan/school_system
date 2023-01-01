<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('global.classrooms') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <livewire:classroom />
    </div>
</x-app-layout>
