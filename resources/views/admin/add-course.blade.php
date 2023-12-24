<x-admin-app-layout>
    <div class="add__course__container max-w-7xl mx-auto sm:px-2 md:px-6 lg:px-8">
        <div class="add__course__banner">
            <h1 class="text-left text-3xl font-extrabold py-5">Create New Course</h1>
        </div>
        <div class="form_container bg-white border-2 border-black pb-10">
            <h1 class="text-left text-2xl font-extrabold bg-gray-100 px-5 py-3 border-b-2 border-black">Course Form</h1>
            <div class="mx-5 mt-2">
                <form method="POST" action="{{ route('admin.course.add') }}">
                    @csrf

                    <!-- Plan -->
                    <div class="py-2">
                        <x-input-label for="plan" :value="__('Plan')" />
                        <select id="plan_id" class="block mt-1 w-full rounded-lg" name="plan_id" required autofocus autocomplete="plan">
                            <option value="">Select Plan</option>
                            @foreach ($plans as $plan)
                            <option value="{{ $plan->id }}">{{ $plan->name }}</option>
                            @endforeach
                        </select>
                        <x-input-error :messages="$errors->get('plan_id')" class="mt-2" />
                    </div>

                    <!-- title -->
                    <div class="py-2 ">
                        <x-input-label for="title" :value="__('Title')" />
                        <x-text-input id="title" class="block mt-1 w-full " type="text" name="title" :value="old('title')" required autofocus autocomplete="title" />
                        <x-input-error :messages="$errors->get('title')" class="mt-2" />
                    </div>

                    <!-- Description -->
                    <div class="py-2">
                        <x-input-label for="description" :value="__('Description')" />
                        <x-text-input id="description" class="block mt-1 w-full" type="text" name="description" :value="old('description')" required autofocus autocomplete="description" />
                        <x-input-error :messages="$errors->get('description')" class="mt-2" />
                    </div>

                    <div class="flex items-center justify-end mt-4 gap-2">
                        <a href="{{ route('admin.course.list') }}">
                            <x-secondary-button class="bg-white border border-red-500 hover:bg-red-500 hover:text-white py-2">Cancel</x-secondary-button>
                        </a>
                        <x-primary-button class="bg-white border border-lime-500 hover:bg-lime-500 hover:text-white py-2">
                            {{ __('Create') }}
                        </x-primary-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-admin-app-layout>