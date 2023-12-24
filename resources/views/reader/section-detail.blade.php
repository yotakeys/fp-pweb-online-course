<x-reader-app-layout>
    <div class="section__detail__container max-w-7xl mx-auto sm:px-2 md:px-6 lg:px-8 pt-5">
        <div class="action__button flex justify-end">
            <a href="{{ route('reader.course.detail', ['id' => $courseId]) }}">
                <x-secondary-button class="border-gray-700 hover:bg-gray-700 hover:text-white border">Back</x-secondary-button>
            </a>
        </div>
        <div class="pb-5 ">
            <h1 class="text-center pt-6 pb-3 text-4xl font-semibold text-black">{{$section->title}}</h1>
            <p class="text-justify text-xl text-black">{{$section->text}}</p>
        </div>
    </div>
</x-reader-app-layout>