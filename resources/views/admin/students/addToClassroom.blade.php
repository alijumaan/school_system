<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('global.add_student_in_classroom') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <livewire:add-student-to-class />
    </div>
</x-app-layout>
