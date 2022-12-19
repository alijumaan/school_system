<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Exams') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <table class="border-separate border-spacing-2 border border-slate-500 ...">
                        <thead>
                        <th class="border border-slate-600 p-2">Student name</th>
                        <th class="border border-slate-600 p-2">Lesson</th>
                        <th class="border border-slate-600 p-2">Score</th>
                        </thead>
                        <tbody>
                        @forelse($exams as $exam)
                            <tr>
                                <td class="border border-slate-700 p-2">{{ $exam->full_name }}</td>
                                <td class="border border-slate-700 p-2">{{ $exam->lesson }}</td>
                                <td class="border border-slate-700 p-2">{{ $exam->score }}</td>
                            </tr>
                        @empty
                            <td>No exams found.</td>
                        @endforelse
                        </tbody>
                    </table>
                    {{ $exams->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
