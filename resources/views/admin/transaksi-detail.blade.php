<x-admin-app-layout>
    <div class="detail__transaction__container max-w-7xl mx-auto sm:px-2 md:px-6 lg:px-8">
        <div class="detail__trasaction__banner">
            <h1 class="text-left text-3xl font-extrabold py-5">Transaction Details</h1>
        </div>
        <div class="transaction__container grid grid-cols-3 pt-2">
            <div class="left__contaienr col-span-2">
                <div class="payment__report_container bg-white border-2 border-black pb-10">
                    <h1 class="text-left text-2xl font-extrabold bg-gray-100 px-5 py-3 border-b-2 border-black">Payment Report</h1>
                    <div class="mx-5 mt-2">
                        <table class="min-w-full bg-white rounded-lg overflow-hidden">
                            <colgroup>
                                <col style="width: 30%;">
                                <col style="width: 70%;">
                            </colgroup>
                            <thead class="bg-gray-100 text-gray-700">
                                <tr>
                                    <th class="py-2 px-4">Detail</th>
                                    <th class="py-2 px-4">Value</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200">
                                <tr>
                                    <td class="py-2 px-4 flex justify-between">
                                        Name
                                        <span>:</span>
                                    </td>
                                    <td class="py-2 px-4">{{$transaksi->user->name}}</td>
                                </tr>
                                <tr>
                                    <td class="py-2 px-4 flex justify-between">
                                        Email
                                        <span>:</span>
                                    </td>
                                    <td class="py-2 px-4">{{$transaksi->user->email}}</td>
                                </tr>
                                <tr>
                                    <td class="py-2 px-4 flex justify-between">
                                        Plan
                                        <span>:</span>
                                    </td>
                                    <td class="py-2 px-4">{{$transaksi->plan->name}}</td>
                                </tr>
                                <tr>
                                    <td class="py-2 px-4 flex justify-between">
                                        Total Price
                                        <span>:</span>
                                    </td>
                                    <td class="py-2 px-4">{{ 'Rp ' . number_format($transaksi->total_price, 0, '.', ',') }}</td>
                                </tr>
                                <tr>
                                    <td class="py-2 px-4 flex justify-between">
                                        Status
                                        <span>:</span>
                                    </td>
                                    <td class="py-2 px-4">{{$transaksi->status->name}}</td>
                                </tr>
                                <tr>
                                    <td class="py-2 px-4 flex justify-between">
                                        Created At
                                        <span>:</span>
                                    </td>
                                    <td class="py-2 px-4">{{$transaksi->created_at}}</td>
                                </tr>
                                <tr>
                                    <td class="py-2 px-4 flex justify-between">
                                        Updated At
                                        <span>:</span>
                                    </td>
                                    <td class="py-2 px-4">{{$transaksi->updated_at}}</td>
                                </tr>
                                <tr>
                                    <td class="py-2 px-4 flex justify-between">
                                        Bukti Pembayaran
                                        <span>:</span>
                                    </td>
                                    <td class="py-2 px-4">
                                        <img src="{{ asset($transaksi->image_url) }}" class="max-w-full h-auto" style="max-height: 200px;">
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="right__container col-span-1 bg-white border-2 border-black ml-5 p-4">
                <div class="form__container">
                    <form method="POST" action="{{ route('admin.transaksi.change-status', ['id' => $transaksi->id]) }}">
                        @csrf
                        @method('PATCH')

                        <!-- status -->
                        <div class="">
                            <x-input-label for="status" :value="__('Status')" class="" />
                            <select id="status_id" class="block mt-1 w-full rounded-lg" name="status_id" required autofocus autocomplete="status">
                                @foreach ($statuses as $status)
                                <option @if ($status->id == $transaksi->status_id) selected @endif value="{{ $status->id }}">{{ $status->name }}</option>
                                @endforeach
                            </select>
                            <x-input-error :messages="$errors->get('status_id')" class="mt-2" />
                        </div>

                        <br>

                        <!-- report -->
                        <div>
                            <x-input-label for="report" :value="__('Report')" />
                            <x-text-input id="report" class="block mt-1 w-full border-gray-700" type="text" name="report" value="{{$transaksi->report}}" required autofocus autocomplete="report" />
                            <x-input-error :messages="$errors->get('report')" class="mt-2" />
                        </div>

                        <br>

                        <div class="flex items-center justify-end mt-4">
                            <x-primary-button class=" bg-white border border-yellow-500 hover:bg-yellow-500 hover:text-white py-2">
                                {{ __('Update') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</x-admin-app-layout>