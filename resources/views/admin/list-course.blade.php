<x-admin-app-layout>
    <div class="admin__course__list max-w-7xl mx-auto sm:px-2 md:px-6 lg:px-8">
        <div class="search__bar pb-5 pt-3">
            <form method="GET" action="{{ route('admin.course.list') }}">
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
        <div class="new__course__button">
            <a href="{{ route('admin.course.form-add') }}">
                <x-secondary-button class="border-lime-500 border-2 hover:bg-lime-500 hover:text-white ">New Course</x-secondary-button>
            </a>
        </div>

        <div class="catalog__header border-gray-400 border-b flex flex-col sm:flex-row pt-2 pb-2">
            <div class="course__header flex items-center pr-2 pb-2 pt-2 align-middle">
                <h1 class="catalog__title text-left pr-2 font-bold text-xl">Programming Courses</h1>
                <span class="text-center align-middle pt-0.5">{{ count($courses) }} Result</span>
            </div>
            <!-- drop down: most recent and most popular -->
            <!-- drop down: most recent and most popular -->
            <form method="GET" action="{{ route('admin.course.sort') }}" id="sortForm" class="ml-auto">
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
                    <a href="{{ route('admin.course.list') }}" class="clear-filter-button text-sm text-gray-700">Clear Filters</a>
                </div>
                <form method="GET" action="{{ route('admin.course.filter') }}">
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
                    <a href="{{ route('admin.course.detail', ['id' => $course->id]) }}">
                        <div class="p-2 h-full"> @component('components.course-card', ['plan' => $course->plan->name,'title' => $course->title, 'description' => $course->description,'section_many' => count($course->sections),])@endcomponent</div>
                    </a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    @@include('admin.modal.create')
</x-admin-app-layout>