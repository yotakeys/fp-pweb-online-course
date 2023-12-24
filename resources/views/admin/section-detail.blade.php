<x-admin-app-layout>
    <div class="section__detail__container max-w-7xl mx-auto sm:px-2 md:px-6 lg:px-8 pt-5">
        <div class="action__button flex justify-between bg-white border border-black py-1 px-1 rounded-xl items-center">
            <h1 class="px-2 font-extrabold text-lg">Tools :</h1>
            <div class="flex gap-3">
                <a href="{{ route('admin.course.detail', ['id' => $courseId]) }}">
                    <x-secondary-button class="border-gray-700 hover:bg-gray-700 hover:text-white border">Back</x-secondary-button>
                </a>
                <a href="{{ route('admin.section.form-edit', ['section_id' => $section->id, 'course_id' => $courseId]) }}">
                    <x-secondary-button class="hover:bg-yellow-500 hover:text-white border-yellow-500 border">Edit</x-secondary-button>
                </a>
                <x-primary-button class="border-red-500 border bg-white hover:bg-red-500 hover:text-white" x-data="" x-on:click.prevent="$dispatch('open-modal', 'confirm-lesson-deletion')">Delete</x-primary-button>
                <x-modal name="confirm-lesson-deletion" :show="$errors->courseDeletion->isNotEmpty()" focusable>
                    <form method="POST" action="{{ route('admin.section.delete',  ['section_id' => $section->id, 'course_id' => $courseId]) }}" class="p-6">
                        @csrf
                        @method('DELETE')
                        <h2 class="text-lg font-medium text-gray-900">
                            {{ __('Are you sure you want to delete this lesson?') }}
                        </h2>
                        <p class="mt-1 text-sm text-gray-600">
                            {{ __('Once your lesson is deleted, all of its resources and data will be permanently deleted.') }}
                        </p>
                        <div class="mt-6 flex justify-end">
                            <x-secondary-button x-on:click="$dispatch('close')">
                                {{ __('Cancel') }}
                            </x-secondary-button>

                            <x-danger-button class="ml-3">
                                {{ __('Delete Lesson') }}
                            </x-danger-button>
                        </div>
                    </form>
                </x-modal>
            </div>
        </div>
        <div class="pb-5">
            <h1 class="text-center pt-6 pb-3 text-3xl font-semibold text-black">{{$section->title}}</h1>
            <p class="text-justify text-lg text-black">{{$section->text}}</p>
        </div>
    </div>
</x-admin-app-layout>