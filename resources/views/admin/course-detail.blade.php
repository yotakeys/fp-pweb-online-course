<x-admin-app-layout>
    <div class="course__detail__container max-w-7xl mx-auto sm:px-2 md:px-6">
        <div class="action__button flex justify-between bg-white border border-black py-1 px-1 rounded-xl items-center my-3">
            <h1 class="px-2 font-extrabold text-lg">Tools :</h1>
            <div class="flex gap-3">
                <a href="{{ route('admin.course.list') }}">
                    <x-secondary-button class="border-gray-700 hover:bg-gray-700 hover:text-white border-">Back</x-secondary-button>
                </a>
                <a href="{{ route('admin.course.form-edit', ['id' => $course->id])}}">
                    <x-secondary-button class="border-yellow-500 hover:bg-yellow-500 hover:text-white border">Edit</x-secondary-button>
                </a>
                <x-primary-button class="border-red-500 bg-white hover:bg-red-500 hover:text-white border" x-data="" x-on:click.prevent="$dispatch('open-modal', 'confirm-course-deletion')">Delete</x-primary-button>
                <x-modal name="confirm-course-deletion" :show="$errors->courseDeletion->isNotEmpty()" focusable>
                    <form method="POST" route="{{ route('admin.course.delete', ['id' => $course->id]) }}" class="p-6">
                        @csrf
                        @method('DELETE')
                        <h2 class="text-lg font-medium text-gray-900">
                            {{ __('Are you sure you want to delete this course?') }}
                        </h2>
                        <p class="mt-1 text-sm text-gray-600">
                            {{ __('Once your course is deleted, all of its resources and data will be permanently deleted.') }}
                        </p>
                        <div class="mt-6 flex justify-end">
                            <x-secondary-button x-on:click="$dispatch('close')">
                                {{ __('Cancel') }}
                            </x-secondary-button>

                            <x-danger-button class="ml-3">
                                {{ __('Delete Course') }}
                            </x-danger-button>
                        </div>
                    </form>
                </x-modal>
            </div>
        </div>

        <div class="course__banner rounded-lg border border-black p-8">
            <div class="course__tag ">
                <div class="rounded-xl inline-block font-bold {{ $course->plan->name == 'Free' ? 'bg-[#EAFCC9]' : 'bg-yellow-500' }}">
                    <h3 class="text-left px-2">{{$course->plan->name}}</h3>
                </div>
                <span>Course</span>
            </div>
            <h1 class="course__title font-extrabold text-5xl py-5">{{$course->title}}</h1>
            <h2 class="text-xl font-extrabold pb-2">About this course</h2>
            <p class="text-black">{{$course->description}}</p>
        </div>

        <div class="course__syllabus pt-5">
            <div class="justify-end py-2">
                <a href="{{ route('admin.section.form-add', ['course_id' => $course->id]) }}">
                    <x-secondary-button class="border-lime-500 border hover:bg-lime-500 hover:text-white">New Lesson</x-secondary-button>
                </a>
            </div>
            <div class="bg-white p-5 border border-black">
                <h1 class="font-extrabold text-2xl">Syllabus</h1>
                <div class="syllabus__tag pt-2">
                    <span class="text-left text-black">{{count($course->sections)}} Lessons</span>
                </div>
            </div>
            <div class="course__sections">
                @foreach ($course->sections as $index => $section)
                <div class="accordion__container bg-white p-5 border border-black flex">
                    <div class="section__number bg-black rounded-full self-center">
                        <span class="text-white px-2">{{ $index + 1 }}</span>
                    </div>
                    <div class="pl-5 w-full">
                        <div class="accordion__header flex justify-between">
                            <a href="{{ route('admin.section.detail', ['section_id' => $section->id, 'course_id' => $course->id]) }}">
                                <div class="accordion__title font-extrabold text-xl">{{$section->title}}</div>
                            </a>
                            <a href="{{ route('admin.section.detail', ['section_id' => $section->id, 'course_id' => $course->id]) }}">
                                <div class="accordion__icon">
                                    <i class="ri-arrow-down-s-line text-2xl"></i>
                                </div>
                            </a>
                        </div>
                        <div class="accordion__content" data-accordion='content'>
                            <div class="">
                                <p style="display: -webkit-box; overflow:hidden; -webkit-box-orient:vertical; -webkit-line-clamp:2;">{{$section->text}}</p>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>



</x-admin-app-layout>