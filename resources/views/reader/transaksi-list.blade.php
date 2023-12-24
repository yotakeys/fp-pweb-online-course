<x-reader-app-layout>
    <div class="max-w-7xl mx-auto sm:px-2 md:px-6 lg:px-8 p-10">
         <div class="pb-5">
             <form method="GET" action="{{ route('reader.transaksi.list') }}">
                 <div class="flex justify-center">
                     <x-text-input id="search" class="block w-full" type="text" name="search" placeholder="Search Here" value="{{ isset($search) ? $search : null }}" autofocus autocomplete="search" />
                     <div class="flex items-center justify-end">
                             <x-primary-button class="ml-4 py-3 bg-white hover:bg-secondary hover:text-white border border-secondary">
                                 {{ __('Search') }}
                             </x-primary-button>
                         </div>
                 </div>
             </form>
         </div>
        <table class="min-w-full bg-white rounded-lg overflow-hidden">
            <thead class="bg-gray-100 text-gray-700">
                <tr>
                    <th class="py-2 px-4">Name</th>
                    <th class="py-2 px-4">Plan</th>
                    <th class="py-2 px-4">Status</th>
                    <th class="py-2 px-4">Action</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @foreach ($transaksis as $transaksi)
                <tr class="{{ $transaksi->status->name == 'APPROVED' ? 'bg-lime-400' : ($transaksi->status->name == 'REJECTED' ? ' bg-red-400' : ($transaksi->status->name == 'PENDING' ? 'bg-yellow-400' : ($transaksi->status->name == 'CHANGES NEEDED' ? 'bg-blue-400' : ''))) }}">
                    <td class="py-2 px-4 text-center">{{$transaksi->user->name}}</td>
                    <td class="py-2 px-4 text-center">{{$transaksi->plan->name}}</td>
                    <td class="py-2 px-4 text-center">{{$transaksi->status->name}}</td>
                    <td class ="py-2 px-4 text-center">
                        <a href="{{ route('reader.transaksi.form-edit', ['id' => $transaksi->id])}}">
                            <x-secondary-button class="bg-white border border-gray-700 hover:bg-gray-700 hover:text-white">Edit</x-secondary-button>
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-reader-app-layout>