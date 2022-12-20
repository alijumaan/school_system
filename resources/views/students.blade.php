<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Students') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                @admin
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <a href="{{ route('students.create') }}" class="py-3">Add to classroom</a>
                </div>
                @endadmin
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <table class="border-separate border-spacing-2 border border-slate-500 ...">
                        <thead>
                        <th class="border border-slate-600 p-2">ID</th>
                        <th class="border border-slate-600 p-2">Student name</th>
                        <th class="border border-slate-600 p-2">National ID</th>
                        <th class="border border-slate-600 p-2">Birth date</th>
                        <th class="border border-slate-600 p-2">Phone</th>
                        <th class="border border-slate-600 p-2">Age</th>
                        <th class="border border-slate-600 p-2">Classroom</th>
                        <th class="border border-slate-600 p-2">Lesson</th>
                        </thead>
                        <tbody>
                        @forelse($students as $student)
                            <tr>
                                <td class="border border-slate-700 p-2">{{ $student->id }}</td>
                                <td class="border border-slate-700 p-2">{{ $student->full_name }}</td>
                                <td class="border border-slate-700 p-2">{{ $student->national_id }}</td>
                                <td class="border border-slate-700 p-2">{{ $student->birth_date }}</td>
                                <td class="border border-slate-700 p-2">{{ $student->phone }}</td>
                                <td class="border border-slate-700 p-2">{{ $student->age }}</td>
                                <td class="border border-slate-700 p-2">{{ $student->classroom }}</td>
                                <td class="border border-slate-700 p-2">{{ $student->lesson }}</td>
                            </tr>
                        @empty
                            <td>No student found.</td>
                        @endforelse
                        </tbody>
                    </table>
                    {{ $students->links() }}
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
