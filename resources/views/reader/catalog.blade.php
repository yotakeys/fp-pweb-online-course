<x-reader-app-layout>
    <div class="catalog__container max-w-7xl mx-auto sm:px-2 md:px-6 lg:px-8">
        <div class="catalog__banner pt-10 pb-3">
            <h1 class="text-left text-3xl font-extrabold">Explore the catalog</h1>
            <div class="pt-8 pb-8 pr-6">
                <div class="banner_recently relative group">
                    <div class="relative w-full h-full z-10 bg-primary border-black border rounded-3xl transform translate-x-5 translate-y-0 pb-5 pt-5 flex">
                        <div class="pt-7 pb-5 pl-10 lg:pr-10 sm:pr-5">
                            <div class="rounded-xl bg-black inline-block">
                                <span class="text-white pl-2 pr-2">Recently added</span>
                            </div>
                            <h1 class="text-3xl font-extrabold pt-2 pb-2">Explore New Programming Courses</h1>
                            <div>
                                <span class="font-extrabold">{{ count($courses) }}</span>
                                <span>Courses</span>
                            </div>
                            <div>Unlock skills that will help you succeed in our rapidly changing world with courses on machine learning, ChatGPT, and more.</div>
                        </div>
                        <div class="justify-end md:pr-5 lg:pr-10 hidden sm:block">
                            <img class="object-cover md:w-[200px] lg:w-[300px] h-auto" src="{{ asset('images/catalog-img.png') }}" alt="image">
                        </div>
                    </div>
                    <div class="absolute z-0 top-0 w-full h-full rounded-3xl border-black border transform translate-x-0 translate-y-5"></div>
                </div>
            </div>
        </div>

        <div class="search__bar pb-5 pt-3">
            <form method="GET" action="{{ route('reader.catalog') }}">
                <div class="flex justify-center">
                    <x-text-input id="search" class="block w-full " type="text" name="search" placeholder="Search Here" value="{{ isset($search) ? $search : null }}" autofocus autocomplete="search" />
                    <div class="flex items-center justify-end ">
                        <x-primary-button class="ml-4 py-3 bg-white border border-secondary hover:bg-secondary hover:text-white">
                            {{ __('Search') }}
                        </x-primary-button>
                    </div>
                </div>
            </form>
        </div>

        <div class="catalog__header border-gray-400 border-b flex flex-col sm:flex-row pt-2 pb-2">
            <div class="course__header flex items-center pr-2 pb-2 pt-2 align-middle">
                <h1 class="catalog__title text-left pr-2 font-bold text-xl">Programming Courses</h1>
                <span class="text-center align-middle pt-0.5">{{ count($courses) }} Result</span>
            </div>
            <!-- drop down: most recent and most popular -->
            <!-- drop down: most recent and most popular -->
            <form method="GET" action="{{ route('reader.catalog.sort') }}" id="sortForm" class="ml-auto">
                <select name="sort" class="ml-auto text-sm h-9 mt-2 sm:mt-0" onchange="document.getElementById('sortForm').submit();">
                    <option value="recent" {{ request('sort') == 'recent' ? 'selected' : '' }}>Most Recent</option>
                    <option value="popular" {{ request('sort') == 'popular' ? 'selected' : '' }}>Most Popular</option>
                </select>
            </form>
        </div>
        <div class="catalog__content bg-primary overflow-hidden grid lg:grid-cols-5 sm:grid-cols-1">
            <div class="side__content lg:col-span-1">
                <div class="filter__tools pt-3">
                    <i class="ri-filter-3-line"></i>
                    <span><b>Filters</b></span>
                    <a href="{{ route('reader.catalog') }}" class="clear-filter-button text-sm text-gray-700">Clear Filters</a>
                </div>
                <form method="GET" action="{{ route('reader.catalog.filter') }}">
                    <div class="filter__price border-gray-400 border-b pb-4">
                        <div class="pt-2 pb-2 ">
                            <span>
                                <b>Price</b>
                            </span>
                            <button type="submit" class="text-sm text-secondary">Apply Filters</button>
                        </div>
                        <div class="price__range">
                            <div>
                                <input type="checkbox" name="price[]" value="free" {{ in_array('free', request('price', [])) ? 'checked' : '' }} class="free__input bg-primary">
                                <span class="text-sm pl-1">Free</span>
                            </div>
                            <div>
                                <input type="checkbox" name="price[]" value="paid" {{ in_array('paid', request('price', [])) ? 'checked' : '' }} class="free__input bg-primary">
                                <span class="text-sm pl-1">Paid</span>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="main__content lg:col-span-4 grid pt-3">
                <div class="listing__course pl-2 grid sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-x-1">
                    @foreach ($courses as $course)
                    <a href="{{ route('reader.course.detail', ['id' => $course->id]) }}">
                        <div class="p-2 h-full"> @component('components.course-card', ['plan' => $course->plan->name,'title' => $course->title, 'description' => $course->description,'section_many' => count($course->sections),])@endcomponent</div>
                    </a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-reader-app-layout>