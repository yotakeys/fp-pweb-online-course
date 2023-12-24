<x-reader-app-layout>
    <div class="checkout__container max-w-7xl mx-auto sm:px-2 md:px-6 lg:px-8">
        <div class="checkout__banner pt-3 pb-5">
            <h1 class="text-left text-3xl font-extrabold py-5">Checkout</h1>
            <div class="warning__contaienr flex items-center bg-gray-300 py-2 px-3 rounded-xl">
                <i class="ri-error-warning-fill pr-2"></i>
                <p class="text-sm text-black">Please complete your payment before 2 days</p>
            </div>
        </div>
        <div class="grid grid-cols-3 pt-2">
            <div class="left__contaienr col-span-2">
                <div class="plan__container bg-white border-2 border-black pb-10">
                    <h1 class="text-left text-2xl font-extrabold bg-gray-100 px-5 py-3 border-b-2 border-black">Plan and subscription</h1>
                    <div class="plan__content w-full h-full py-5 px-5">
                        <div class="relative group flex flex-col">
                            <div class="relative z-10 w-full h-full rounded-lg border border-black bg-white flex flex-col transform translate-x-2 translate-y-0">
                                <div class="rounded-lg p-2 text-left flex bg-yellow-500 justify-between">
                                    <span class="font-extrabold">Basic</span>
                                    <div class="border border-gray-700 rounded-xl px-2 text-gray-700"><span class="text-sm">Learn a skill</span></div>
                                </div>
                                <div class="py-4 flex text-center justify-center border-b-2 border-dotted">
                                    <span class="font-extrabold">Rp</span>
                                    <h1 class="text-left pb-2 font-semibold text-5xl">100,000</h1>
                                </div>
                                <div class="py-2 px-5 ">
                                    <div class="items-center">
                                        <i class="ri-checkbox-circle-fill text-green-500 text-xl"></i>
                                        <span class="pl-1">Access to all courses</span>

                                    </div>
                                    <div class="flex items-center">
                                        <i class="ri-checkbox-circle-fill text-green-500 text-xl"></i>
                                        <span class="pl-2">Code challenges</span>
                                        <div class="bg-yellow-200 rounded-lg px-1 ml-2">
                                            <span class="text-sm">Coming soon..</span>
                                        </div>
                                    </div>
                                    <div class="flex items-center">
                                        <i class="ri-checkbox-circle-fill text-green-500 text-xl"></i>
                                        <span class="pl-2">Assignments</span>
                                        <div class="bg-yellow-200 rounded-lg px-1 ml-2">
                                            <span class="text-sm">Coming soon..</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="absolute z-0 top-0 w-full h-full rounded-lg border-dotted border-black border-[1.6px] transform translate-x-0 translate-y-2"></div>
                        </div>
                    </div>
                </div>
                <div class="payment__container bg-white border-2 border-black">
                    <h1 class="text-left text-2xl font-extrabold bg-gray-100 px-5 py-3 border-b-2 border-black">Payment method</h1>
                    <div class="payment__jago px-5 py-3">
                        <div class="payment__tittle flex items-center">
                            <span class="font-bold ">Transfer bank Jago</span>
                            <img class="object-cover md:w-[200px] lg:w-[90px] h-auto px-3 py-2" src="{{ asset('images/jago-logo.svg') }}" alt="image">
                        </div>
                        <div class="payment__procedure">
                            <div class="copy__text border-2 my-5 border-black inline-block rounded-lg bg-white cursor-pointer">
                                <input type="text" value="106882982360" class="border-none outline-none rounded-lg w-[150px]">
                                <button class="px-2 bg-yellow-500 rounded-md mr-2 active:bg-yellow-300"><i class="ri-clipboard-line"></i></button>
                            </div>
                            <div class="first__step items-center py-1">
                                <div class="rounded-full bg-black inline-block"><span class="text-white px-2">1</span></div>
                                <span class="px-3 items-center">Insert Jago pocket number</span>
                            </div>
                            <div class="second__step items-center py-1">
                                <div class="rounded-full bg-black inline-block"><span class="text-white px-2">2</span></div>
                                <span class="px-2 items-center">Enter the amount of money</span>
                            </div>
                            <div class="third__step items-center py-1">
                                <div class="rounded-full bg-black inline-block"><span class="text-white px-2">3</span></div>
                                <span class="px-2 items-center">Take a screenshot at your successful payment</span>
                            </div>
                            <div class="fourth__step items-center py-1">
                                <div class="rounded-full bg-black inline-block"><span class="text-white px-2">4</span></div>
                                <span class="px-2 items-center">Complete the steps as instructed and you're done!</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="right__container bg-white border-2 border-black ml-5 p-4">
                <div class="form__container">
                    <form method="POST" action="{{ route('reader.transaksi.add') }}" enctype="multipart/form-data">
                        @csrf

                        <!-- Plan -->
                        <div class="plan__name mb-2">
                            <x-text-input id="plan_id" class="block mt-1 w-full" type="hidden" name="plan_id" value="{{ $plan->id }}" required />
                            <x-text-input disabled="true" id="plan" class="block mt-1 w-full border-none outline-none shadow-none text-xl font-extrabold" type="text" name="plan" value="{{ $plan->name }}" required />
                        </div>


                        <!-- price -->
                        <div class="text-lg pl-3 flex items-center mb-2">
                            <div class="flex"><span class="font-extrabold pr-1">Total</span><span>charged</span></div>
                            <div class="flex pl-28 items-center font-extrabold">
                                <span class="">Rp</span>
                                <x-input-label for="total_price" :value="__('Price')" class="hidden"/>
                                <x-text-input id="total_price" disabled="true" class="block mt-1 w-full border-none outline-none shadow-none" type="text" name="total_price" value="{{ number_format($plan->price, 0, '.', ',') }}" required />
                                <x-text-input id="total_price" class="block mt-1 w-full" type="hidden" name="total_price" value="{{$plan->price}}" required />
                            </div>
                            <x-input-error :messages="$errors->get('price')" class="mt-2" />
                        </div>

                        <!-- Bukti Pembayaran -->
                        <div class="proof__payment pl-3 text-sm">
                            <x-input-label for="image" :value="__('Bukti Pembayaran')" class="" />
                            <x-text-input id="image" class="block mt-1 w-full" type="file" name="image" :value="old('image')" required autofocus autocomplete="image" />
                            <x-input-error :messages="$errors->get('image')" class="mt-2" />
                        </div>

                        <div class="term__and__condition pl-3 pt-5">
                            <!-- input check box and link to term and condition -->
                            <input type="checkbox" class="rounded-md"> 
                            <span class="text-sm">I agree to the <a href="#" class="text-yellow-500">Terms and Conditions</a></span>
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <x-primary-button class="bg-white border border-yellow-500 hover:text-white hover:bg-yellow-500 ml-4">
                                {{ __('Buy') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-reader-app-layout>