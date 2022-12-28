<div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
    <div class="dark:bg-gray-800 overflow-hidden sm:rounded-lg">
        <div class="p-6 text-gray-900 dark:text-gray-100">
            <div class="flex flex-col sm:justify-center items-center">

                <x-input-error :messages="session('error_msg')" class="mt-2" />
                <div class="w-full sm:max-w-md bg-white dark:bg-gray-800 overflow-hidden sm:rounded-lg">
                    <form wire:submit.prevent="store">

                        <div>
                            <x-input-label for="class_year_id" :value="__('global.class_year')" />
                            <select wire:model="class_year_id" name="class_year_id" id="class_year_id" class="block mt-1 w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">
                                <option value="">-- {{ __('global.class_year') }} --</option>
                                @forelse($classYears as $classYear)
                                    <option value="{{ $classYear->id }}">{{ $classYear['title_'. app()->getLocale()] }}</option>
                                @empty
                                @endforelse
                            </select>
                            <x-input-error :messages="$errors->get('class_year_id')" class="mt-2" />
                        </div>

                        <div class="mt-4">
                            <x-input-label for="student_id" :value="__('global.students')" />
                            <select wire:model="student_id" id="student_id" class="block mt-1 w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">
                                @if ($students->count() == 0)
                                    <option value="">-- {{ __('global.choose_class_year_first') }} --</option>
                                @else
                                <option value="">-- {{ __('global.select_student') }} --</option>
                                @foreach ($students as $key => $student)
                                    <option value="{{ $key }}">{{ $student }}</option>
                                @endforeach
                                @endif
                            </select>
                            <x-input-error :messages="$errors->get('student_id')" class="mt-2" />
                        </div>

                        <div class="mt-4">
                            <x-input-label for="classroom_id" :value="__('global.classroom')" />
                            <select wire:model="classroom_id" name="classroom_id" id="classroom_id" class="block mt-1 w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">
                                <option value="">-- {{ __('global.select_classroom') }} --</option>
                                @forelse($classrooms as $key => $classroom)
                                    <option value="{{ $classroom->id }}">
                                        {{ $classroom['name_'. app()->getLocale()] }} ( {{ $classroom->lesson['title_'. app()->getLocale()] }} )
                                    </option>
                                @empty
                                @endforelse
                            </select>
                            <x-input-error :messages="$errors->get('classroom_id')" class="mt-2" />
                        </div>

                        <div class="flex items-center sm:justify-start mt-4">
                            <x-primary-button class="ml-3">
                                {{ __('global.save') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
