<x-admin-app-layout>
    <div class="add__section__container max-w-7xl mx-auto sm:px-2 md:px-6">
        <div class="add__section__banner">
            <h1 class="text-left text-3xl font-extrabold py-5">New Lesson</h1>
        </div>
        <div class="form__container bg-white border-2 border-black pb-10">
            <h1 class="text-left text-2xl font-extrabold bg-gray-100 px-5 py-3 border-b-2 border-black">Lesson Form</h1>
            <div class="mx-5 mt-2">
                <form method="POST" action="{{ route('admin.section.add', ['course_id' => $courseId]) }}">
                    @csrf
    
                    <div>
                        <x-text-input id="course_id" class="block mt-1 w-full" type="hidden" name="course_id" value="{{ $courseId }}" required />
                    </div>
    
                    <!-- title -->
                    <div>
                        <x-input-label for="title" :value="__('Title')" />
                        <x-text-input id="title" class="block mt-1 w-full" type="text" name="title" :value="old('title')" required autofocus autocomplete="title" />
                        <x-input-error :messages="$errors->get('title')" class="mt-2" />
                    </div>
    
                    <br>
    
                    <!-- text -->
                    <div>
                        <x-input-label for="text" :value="__('Text')" />
                        <x-text-input id="text" class="block mt-1 w-full" type="text" name="text" :value="old('text')" required autofocus autocomplete="text" />
                        <x-input-error :messages="$errors->get('text')" class="mt-2" />
                    </div>
    
                    <div class="flex items-center justify-end mt-4">
                        <a href="{{ route('admin.course.detail', ['id' => $courseId]) }}">
                            <x-secondary-button class="bg-white border border-red-500 hover:bg-red-500 hover:text-white py-2">Cancel</x-secondary-button>
                        </a>
                        <x-primary-button class="ml-4 bg-white border border-lime-500 hover:bg-lime-500 hover:text-white py-2">
                            {{ __('Create') }}
                        </x-primary-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-admin-app-layout>