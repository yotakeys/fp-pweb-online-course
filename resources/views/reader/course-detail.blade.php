<x-reader-app-layout>
    <div class="course__detail__container max-w-7xl mx-auto sm:px-2 md:px-6 lg:px-8 pt-5">
        <div class="course__banner rounded-lg border border-black p-8">
            <div class="course__tag ">
                <div class="rounded-xl inline-block font-bold {{ $course->plan->name == 'Free' ? 'bg-[#EAFCC9]' : 'bg-yellow-500' }}"><h3 class="text-left px-2">{{$course->plan->name}}</h3></div>
                <span>Course</span>
            </div>
            <h1 class="course__title font-extrabold text-5xl py-5">{{$course->title}}</h1>
            <h2 class="text-xl font-extrabold pb-2">About this course</h2>
            <p class="text-black">{{$course->description}}</p>
        </div>     
        
        <div class="course__syllabus pt-5">
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
                            <a href="{{ route('reader.section.detail', ['section_id' => $section->id, 'course_id' => $course->id]) }}">
                                <div class="accordion__title font-extrabold text-xl">{{$section->title}}</div>
                            </a>
                            <a href="{{ route('reader.section.detail', ['section_id' => $section->id, 'course_id' => $course->id]) }}">
                                <div class="accordion__icon">
                                    <i class="ri-arrow-down-s-line text-2xl"></i>
                                </div>
                            </a>
                        </div>
                        <div class="accordion__content " data-accordion='content' >
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
</x-reader-app-layout>