<x-reader-app-layout>
    <div class="edit__transaction__container max-w-7xl mx-auto sm:px-2 md:px-6 lg:px-8">
        <div class="edit__transaction__banner pt-3 pb-5">
            <h1 class="text-left text-3xl font-extrabold py-5">Edit Transaction</h1>
            <div class="warning__contaienr flex items-center bg-red-600 py-2 px-3 rounded-xl">
                <i class="ri-error-warning-fill pr-2 text-white"></i>
                <p class="text-sm text-white">Please check your transaction status and notes!</p>
            </div>
        </div>
        <div class="transaction__container grid grid-cols-3 pt-2">
            <div class="left__contaienr col-span-2">
                <div class="payment__report_container bg-white border-2 border-black pb-10">
                    <h1 class="text-left text-2xl font-extrabold bg-gray-100 px-5 py-3 border-b-2 border-black">Payment Report</h1>
                    <div class="mx-5 mt-2">
                        <div class="payment__status flex text-center items-center">
                            <span class="text-xl font-extrabold">Status</span><span class="pl-10 text-xl font-extrabold">:</span>
                            <div class="pl-3">
                                <x-input-label for="status" :value="__('Status')" class="hidden" />
                                <x-text-input id="status" class="block mt-1 border-none shadow-none outline-none" disabled="true" name="status" value="{{$transaksi->status->name}}" required />
                                <x-input-error :messages="$errors->get('status')" class="mt-2" />
                            </div>
                        </div>
                        <div class="payment__report flex text-center items-center">
                            <span class="text-xl font-extrabold">Messages</span><span class="pl-2 text-xl font-extrabold">:</span>
                            <div class="pl-3">
                                <x-input-label for="report" :value="__('report')" class="hidden" />
                                <x-text-input id="report" class="block mt-1 border-none shadow-none" disabled="true" name="report" value="{{$transaksi->report}}" required />
                                <x-input-error :messages="$errors->get('report')" class="mt-2" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="right__container col-span-1 bg-white border-2 border-black ml-5 p-4">
                <div class="form__container">
                    <form method="POST" action="{{ route('reader.transaksi.edit', ['id' => $transaksi->id]) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')

                        <!-- Plan -->
                        <div class="plan__name mb-2">
                            <x-text-input disabled="true" id="plan" class="block mt-1 w-full border-none outline-none shadow-none text-xl font-extrabold" type="text" name="plan" value="{{ $transaksi->plan->name }}" required />
                        </div>


                        <!-- price -->
                        <div class="text-lg pl-3 flex items-center mb-2">
                            <div class="flex"><span class="font-extrabold pr-1">Total</span><span>charged</span></div>
                            <div class="flex pl-28 items-center font-extrabold">
                                <span class="">Rp</span>
                                <x-input-label for="total_price" :value="__('Price')" class="hidden" />
                                <x-text-input id="total_price" disabled="true" class="block mt-1 w-full border-none outline-none shadow-none" type="text" name="total_price" value="{{ number_format($transaksi->total_price, 0, '.', ',') }}" required />
                            </div>
                            <x-input-error :messages="$errors->get('price')" class="mt-2" />
                        </div>

                        <!-- Bukti Pembayaran -->
                        <div class="proof__payment pl-3 text-sm">
                            <x-input-label for="image" :value="__('Bukti Pembayaran')" class="" />
                            <x-text-input id="image" class="block mt-1 w-full" type="file" name="image" :value="old('image')" required autofocus autocomplete="image" />
                            <x-input-error :messages="$errors->get('image')" class="mt-2" />
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <x-primary-button class="border border-yellow-500 bg-white hover:text-white hover:bg-yellow-500 ml-4">
                                {{ __('Update') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-reader-app-layout>