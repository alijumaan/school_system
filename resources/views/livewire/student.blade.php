<div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
    @admin
    <div class="mt-7 text-gray-900 dark:text-gray-100">
        <a href="{{ route('students.create') }}"
           class="py-3 inline-flex items-center px-4 py-2 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest
                   hover:bg-red-500 active:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
            {{ __('global.add_to_classroom') }}
        </a>
    </div>
    @endadmin
    <br>
    <div class="overflow-x-auto relative shadow-md sm:rounded-lg">
        <div class=" flex justify-center items-center pb-4 text-white" wire:loading.delay>loading..</div>
        <div class="flex justify-between items-center pb-4">
            <div>
                <select wire:model="class_year_id" class="dark:focus:ring-gray-700 block px-7 mt-1 w-full inline-flex items-center px-4 py-2 bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-500 rounded-md font-semibold text-xs text-gray-700 dark:text-gray-300 uppercase tracking-widest shadow-sm hover:bg-gray-50 dark:hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 disabled:opacity-25 transition ease-in-out duration-150">
                    <option value="">{{ __('global.all') }}</option>
                    @forelse($classYears as $classYear)
                        <option value="{{ $classYear->id }}">
                            {{ $classYear['title_'. app()->getLocale()] }}
                        </option>
                    @empty
                    @endforelse
                </select>
            </div>

            <div class="relative">
                <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                    <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path></svg>
                </div>
                <x-text-input wire:model="searchQuery" type="text" placeholder="Search for items" class="block p-2 pl-10 w-80 text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />
            </div>
        </div>
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="py-3 px-6">{{ __('global.id') }}</th>
{{--                <th scope="col" class="py-3 px-6">{{ __('global.cne') }}</th>--}}
                <th scope="col" class="py-3 px-6">{{ __('global.student_name') }}</th>
                <th scope="col" class="py-3 px-6">{{ __('global.national_id') }}</th>
                <th scope="col" class="py-3 px-6">{{ __('global.birth_date') }}</th>
                <th scope="col" class="py-3 px-6">{{ __('global.phone') }}</th>
                <th scope="col" class="py-3 px-6">{{ __('global.age') }}</th>
                <th scope="col" class="py-3 px-6">{{ __('global.class') }}</th>
{{--                <th scope="col" class="py-3 px-6">{{ __('global.classroom') }}</th>--}}
{{--                <th scope="col" class="py-3 px-6">{{ __('global.lesson') }}</th>--}}
                <th scope="col" class="py-3 px-6"></th>
            </tr>
            </thead>
            <tbody>
            @forelse($students->unique('full_name') as $student)
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                    <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{ $student->id }}
                    </th>
{{--                    <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">--}}
{{--                        {{ $student->cne }}--}}
{{--                    </th>--}}
                    <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{ $student->full_name }} <br>
                        <small>{{ $student->cne }}</small>
                    </th>
                    <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{ $student->national_id }}
                    </th>
                    <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{ $student->birth_date }}
                    </th>
                    <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{ $student->phone }}
                    </th>
                    <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{ $student->age }}
                    </th>
                    <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{ $student->class_year }}
                    </th>
{{--                    <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">--}}
{{--                        {{ $student->classroom }}--}}
{{--                    </th>--}}
{{--                    <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">--}}
{{--                        {{ $student->lesson }}--}}
{{--                    </th>--}}
                    <td class="py-4 px-6">
                        <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td class="py-4 px-6">
                        <span class="font-medium dark:text-white">حدد الصف الدراسي</span>
                    </td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>
    <div class="mt-7">
        {{ $students->links() }}
    </div>
</div>
