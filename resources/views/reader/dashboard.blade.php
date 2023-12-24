<x-reader-app-layout>
    <div class="dashboard__container max-w-7xl mx-auto sm:px-2 md:px-6 lg:px-8 lg:py-10 grid grid-cols-3">
        <div class="dashboard__banner col-span-2 w-full h-full group flex bg-tertiary rounded-2xl" id="dashboard-banner">
            <div class="justify-end md:pr-5 lg:pr-2 hidden sm:block p-5">
                <img class="md:w-[150px] lg:w-[300px] h-auto" src="{{ asset('images/dashboard-img.png') }}" alt="image">
            </div>
            <div class="pt-7 pb-5 pl-5 lg:pr-10 sm:pr-5 text-white self-center">
                <h1 class="text-3xl font-extrabold pt-2 pb-2">Welcome to your dashboard</h1>
                <div>We've added some recommendations based on your goals and interests. Try out a course or path now - you can always start a new one later.</div>
            </div>
            <div class="p-2">
                <button onclick="document.getElementById('dashboard-banner').style.display='none'" class="text-white border border-white hover:bg-white hover:text-tertiary px-2 rounded-lg h-7">
                    &times;
                </button>
            </div>
        </div>
        <div class="dashboard__todo col-span-1 ">
            <div class="clock__container pl-10">
                <div class="clock w-full bg-primary">
                    <div class="clock__circle w-full h-auto">
                        <div class="clock__rounder"></div>
                        <div class="clock__hour" id="clock-hour"></div>
                        <div class="clock__minutes" id="clock-minutes"></div>
                    </div>

                    <div class="py-5 pl-2">
                        <div class="clock__date">
                            <span class="clock__day-week" id="date-day-week"></span>
                            <div>
                                <span class="clock__month" id="date-month"></span>
                                <span class="clock__day" id="date-day"></span>
                                <span class="clock__year" id="date-year"></span>
                            </div>
                        </div>

                        <div class="clock__text">
                            <span class="clock__text-hour" id="text-hour"></span>
                            <span class="clock__text-minutes" id="text-minutes"></span>
                            <span class="clock__text-ampm" id="text-ampm"></span>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- <div class="todo__container pl-10 pt-5 w-full h-full">
                <h1 class="text-2xl font-extrabold pt-2 pb-2">To do list</h1>
                <div class="w-full h-fulrounded-2xl">
                    <div class="container bg-tertiary">
                        <div class="input-field">
                            <textarea placeholder="Drop your todo here!"></textarea>
                            <i class="uil uil-notes note-icon"></i>
                        </div>

                        <ul class="todoLists"></ul>

                        <div class="pending-tasks">
                            <span>You have <span class="pending-num"> no </span> tasks pending.</span>
                            <button class="clear-button">Clear All</button>
                        </div>
                    </div>
                </div>
            </div> -->
        </div>
    </div>
</x-reader-app-layout>