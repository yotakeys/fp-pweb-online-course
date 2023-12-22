<div class="relative group h-full w-full flex flex-col">
    <div class="relative p-3 z-10 w-full h-full rounded-xl border border-black bg-white transition-transform duration-200 ease-in-out transform group-hover:translate-x-2 group-hover:-translate-y-2 flex flex-col">
        <div class="rounded-xl p-2 {{ $plan == 'Free' ? 'bg-[#EAFCC9]' : 'bg-yellow-500' }} text-center">{{$plan}}</div>
        <div class="text-left pt-4 pb-4">
            <h1 class="text-left pb-2 text-2xl font-semibold ">{{$title}}</h1>
            <div class="w-full">{{$description}}</div>
        </div>
        <div class="rounded-xl p-2 border-2 border-dotted flex justify-between mt-auto">
            <div class="text-black"><span class="font-bold">{{$section_many}}</span> Lessons</div>
        </div>
    </div>
    <div class="absolute z-0 top-0 w-full h-full rounded-xl bg-black border border-black transition-transform duration-200 ease-in-out transform group-hover:-translate-x-1 group-hover:translate-y-1"></div>
</div>