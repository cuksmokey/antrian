<x-app>
    <x-container>

        <x-alert-success></x-alert-success>

        <div class="flex flex-col my-3">
            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                    <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-100">
                                <tr>
                                    <th scope="col" class="px-6 py-3 text-left font-semibold text-gray-800 uppercase tracking-wider">
                                        Nomer Antrian
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-left font-semibold text-gray-800 uppercase tracking-wider">
                                        Nomer Pendaftaran
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-left font-semibold text-gray-800 uppercase tracking-wider">
                                        Tanggal Periksa
                                    </th>
                                    <th scope="col" class="relative px-6 py-3">
                                        <span class="sr-only">Edit</span>
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @if ($dashboard->count() == 0)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap text-center" colspan="4">Tidak Ada Data..</td>
                                    </tr>
                                @else
                                    @foreach ($dashboard as $item)
                                        <tr>
                                            <td class="px-6 py-4 whitespace-nowrap">{{ $item->nomer_antrian ?? '-' }}</td>
                                            <td class="px-6 py-4 whitespace-nowrap">{{ $item->nomer_daftar }}</td>
                                            <td class="px-6 py-4 whitespace-nowrap">{{ $item->tgl_periksa->format('d-m-Y') }}</td>
                                            <div>
                                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                                    <a href="{{ route('pdf.data', $item->id) }}" target="_blank" class="bg-blue-500 px-3 py-2 rounded text-white">View</a>

                                                    @if (!$item->nomer_antrian)
                                                        <form action="{{ route('dashboard.update', $item->id) }}" method="post" class="inline">
                                                            @method('put')
                                                            @csrf
                                                            <button type="submit" class="bg-green-500 px-3 py-2 rounded text-white">Accept</button>
                                                        </form>

                                                        <form action="{{ route('jadwal.delete', $item->id) }}" method="post" class="inline">
                                                            @method('delete')
                                                            @csrf
                                                            <button type="submit" class="bg-red-500 px-3 py-2 rounded text-white">Delete</button>
                                                        </form>
                                                    @else
                                                        <a href="{{ route('dashboard.antrian', $item->id) }}" target="_blank" class="bg-yellow-500 px-3 py-2 rounded text-white">No Antrian</a>
                                                    @endif
                                                </td>
                                            </div>
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div>
            {{ $dashboard->links() }}
        </div>

    </x-container>
</x-app>
