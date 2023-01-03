<div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
    <div class="overflow-x-auto relative shadow-md sm:rounded-lg">
        <div wire:loading.delay class=" flex justify-center items-center pb-4 text-white">loading..</div>
        <div class="flex justify-between items-center pb-4">

            <div class="relative">
                <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                    <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path></svg>
                </div>
                <x-text-input wire:model="searchQuery" type="text" placeholder="Search for teacher" class="block p-2 pl-10 w-80 text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />
            </div>

        </div>
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="py-3 px-6">{{ __('global.teacher') }}</th>
                <th scope="col" class="py-3 px-6">{{ __('global.lesson') }}</th>
                <th scope="col" class="py-3 px-6">{{ __('global.classroom') }}</th>
                <th scope="col" class="py-3 px-6">{{ __('global.students_count') }}</th>
            </tr>
            </thead>
            <tbody>
            @forelse($classrooms as $classroom)
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                    <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">{{ $classroom->teacher->full_name }}</th>
                    <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">{{ $classroom->lesson['title_'. app()->getLocale()] }}</th>
                    <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">{{ $classroom->name }}</th>
                    <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">{{ $classroom->students_count }}</th>
                </tr>
            @empty
                <tr>
                    <td class="py-4 px-6">
                        <span class="font-medium dark:text-white">{{ __('global.no_result') }}</span>
                    </td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>
    <div class="mt-7">
        {{ $classrooms->links() }}
    </div>
</div>

