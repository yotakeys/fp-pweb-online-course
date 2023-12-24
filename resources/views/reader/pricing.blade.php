<x-reader-app-layout>
    <div class="pricing__container lg:max-w-7xl mx-auto sm:px-1 md:px-6 lg:px-8">
        <div class="plan__container">
            <h1 class="text-center text-xl sm:text-2xl md:text-3xl lg:text-4xl font-extrabold pt-5">Choose a plan that fits your goals</h1>
            <div class="plan__content flex flex-col sm:flex-row justify-center pt-5 pb-2">
                @foreach($plans as $plan)
                <div class="px-5 py-3"> @component('components.plan-card', ['title' => $plan->name, 'description' => $plan->description, 'price' => $plan->price ]) @endcomponent</div>
                @endforeach
            </div>
        </div>
        <div class="py-10">
            <div class="header__compare grid grid-cols-3 py-1">
                <div class="col-span-1">
                    <h1 class="font-extrabold text-4xl">Features</h1>
                </div>
                <div class="free__feature col-span-1 border-black border bg-[#EAFCC9]">
                    <div class="py-3">
                        <h1 class="text-2xl text-center font-extrabold">Free</h1>
                    </div>
                </div>
                <div class="basic__feature col-span-1 border-black border bg-yellow-500">
                    <div class="py-3">
                        <h1 class="text-2xl text-center font-extrabold">Basic</h1>
                    </div>
                </div>
            </div>
            <div class="feature__container grid grid-cols-3 border-2 border-black">
                <div class="feature__tittle col-span-1 grid grid-rows-2">
                    <div class="py-4 px-4 bg-white">
                        <h1 class="text-xl font-extrabold ">Access to all free courses</h1>
                    </div>
                    <div class="py-4 px-4 bg-gray-100">
                        <h1 class="text-xl font-extrabold ">Access to all paid courses</h1>
                    </div>
                    <div class="py-4 px-4 bg-white">
                        <h1 class="text-xl font-extrabold ">Code challenges</h1>
                    </div>
                    <div class="py-4 px-4 bg-gray-100">
                        <h1 class="text-xl font-extrabold ">Assignments</h1>
                    </div>
                </div>
                <div class="checkbox__plan__free text-center text-3xl col-span-1 border border-black grid grid-rows-2">
                    <div class="py-3 px-3 bg-white">
                        <i class="ri-checkbox-circle-line"></i>
                    </div>
                    <div class="py-3 px-3 bg-gray-100">
                        <i class="ri-subtract-fill"></i>
                    </div>
                    <div class="py-3 px-3 bg-white">
                        <i class="ri-subtract-fill"></i>
                    </div>
                    <div class="py-3 px-3 bg-gray-100">
                        <i class="ri-subtract-fill"></i>
                    </div>
                </div>
                <div class="checkbox__plan__basic text-center text-3xl col-span-1 border border-black grid grid-rows-2">
                    <div class="py-3 px-3 bg-white">
                        <i class="ri-checkbox-circle-line"></i>
                    </div>
                    <div class="py-3 px-3 bg-gray-100">
                        <i class="ri-checkbox-circle-line"></i>
                    </div>
                    <div class="py-3 px-3 bg-white">
                        <div class="inline-block">
                            <span class="text-sm bg-yellow-200 rounded-lg px-1 ">Coming Soon..</span>
                        </div>
                    </div>
                    <div class="py-3 px-3 bg-gray-100">
                        <div class=" inline-block">
                            <span class="text-sm bg-yellow-200 rounded-lg px-1">Coming Soon..</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-reader-app-layout>