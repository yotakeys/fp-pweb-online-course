@php 
    $transaksi_pending = $transaksi->where('status_id', '1');
    $transaksi_success = $transaksi->where('status_id', '4');
    $transaksi_failed = $transaksi->where('status_id', '2');
    $transaksi_changes = $transaksi->where('status_id', '3');
@endphp

<x-admin-app-layout> 
    <div class="p-24">
         <div class="transaksi__table pt-2">
            <table class="min-w-full bg-white rounded-lg overflow-hidden">
                <thead class="bg-gray-100 text-gray-700">
                    <tr>
                        <th class="py-2 px-4">Status</th>
                        <th class="py-2 px-4">Amount</th>
                        <th class="py-2 px-4">Income</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    <tr>
                        <td class="py-2 px-4 text-center">PENDING</td>
                        <td class="py-2 px-4 text-center">{{ $transaksi_pending->count() }}</td>
                        <td class="py-2 px-4 text-center">{{ $transaksi_pending->sum('total_price') }}</td>
                    </tr>
                    <tr>
                        <td class="py-2 px-4 text-center">REJECTED</td>
                        <td class="py-2 px-4 text-center">{{ $transaksi_failed->count() }}</td>
                        <td class="py-2 px-4 text-center">{{ $transaksi_failed->sum('total_price') }}</td>
                    </tr>
                    <tr>
                        <td class="py-2 px-4 text-center">CHANGES NEEDED</td>
                        <td class="py-2 px-4 text-center">{{ $transaksi_changes->count() }}</td>
                        <td class="py-2 px-4 text-center">{{ $transaksi_changes->sum('total_price') }}</td>
                    </tr>
                    <tr>
                        <td class="py-2 px-4 text-center">SUCCESS</td>
                        <td class="py-2 px-4 text-center">{{ $transaksi_success->count() }}</td>
                        <td class="py-2 px-4 text-center">{{ $transaksi_success->sum('total_price') }}</td>
                    </tr>
                </tbody>
            </table>
        </div>

    </div>

</x-admin-app-layout>