<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('global.students') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                @admin
                <div class="mx-7 mt-7 text-gray-900 dark:text-gray-100">
                    <a href="{{ route('students.create') }}" class="py-3 inline-flex items-center px-4 py-2 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-500 active:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                        {{ __('global.add_to_classroom') }}
                    </a>
                </div>
                @endadmin
                <div class="mx-7 mt-5 text-gray-900 dark:text-gray-100">
                    <table class="border-separate border-spacing-2 border border-slate-500 ...">
                        <thead>
                        <th class="border border-slate-600 p-2">{{ __('global.id') }}</th>
                        <th class="border border-slate-600 p-2">{{ __('global.student_name') }}</th>
                        <th class="border border-slate-600 p-2">{{ __('global.national_id') }}</th>
                        <th class="border border-slate-600 p-2">{{ __('global.birth_date') }}</th>
                        <th class="border border-slate-600 p-2">{{ __('global.phone') }}</th>
                        <th class="border border-slate-600 p-2">{{ __('global.age') }}</th>
                        <th class="border border-slate-600 p-2">{{ __('global.classroom') }}</th>
                        <th class="border border-slate-600 p-2">{{ __('global.lesson') }}</th>
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
