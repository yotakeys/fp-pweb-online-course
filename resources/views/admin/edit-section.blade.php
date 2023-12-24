<x-admin-app-layout>
    <div class="edit__section__container max-w-7xl mx-auto sm:px-2 md:px-6">
        <div class="edit__section__banner">
            <h1 class="text-left text-3xl font-extrabold py-5">Edit Section</h1>
        </div>
        <div class="form__container bg-white border-2 border-black pb-10">
            <h1 class="text-left text-2xl font-extrabold bg-gray-100 px-5 py-3 border-b-2 border-black">Section Form</h1>
            <div class="mx-5 mt-2">
                <form method="POST" action="{{ route('admin.section.edit', ['section_id' => $section->id, 'course_id' => $courseId]) }}">
                    @csrf
                    @method('PATCH')

                    <div>
                        <x-text-input id="course_id" class="block mt-1 w-full" type="hidden" name="course_id" value="{{ $courseId }}" required />
                    </div>

                    <!-- title -->
                    <div>
                        <x-input-label for="title" :value="__('Title')" />
                        <x-text-input id="title" class="block mt-1 w-full" type="text" name="title" value="{{$section->title}}" required autofocus autocomplete="title" />
                        <x-input-error :messages="$errors->get('title')" class="mt-2" />
                    </div>

                    <br>

                    <!-- Text -->
                    <div>
                        <x-input-label for="text" :value="__('Text')" />
                        <x-text-input id="text" class="block mt-1 w-full" type="text" name="text" value="{{$section->text}}" required autofocus autocomplete="text" />
                        <x-input-error :messages="$errors->get('text')" class="mt-2" />
                    </div>

                    <div class="flex items-center justify-end mt-4 gap-2">
                        <a href="{{ route('admin.section.detail', ['section_id' => $section->id, 'course_id' => $courseId]) }}">
                            <x-secondary-button class="bg-white border border-red-500 hover:bg-red-500 hover:text-white py-2">Cancel</x-secondary-button>
                        </a>
                        <x-primary-button class=" bg-white border border-yellow-500 hover:bg-yellow-500 hover:text-white py-2">
                            {{ __('Update') }}
                        </x-primary-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-admin-app-layout>