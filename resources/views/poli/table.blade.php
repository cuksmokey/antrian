<x-app>
    <x-container>
        <div class="mb-3">
            <a href="{{ route('poli.create') }}" class="bg-blue-500 px-3 py-2 rounded text-white inline-block">Add</a>
        </div>

        <x-alert-success></x-alert-success>

        <div class="flex flex-col my-3">
            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                    <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-100">
                                <tr>
                                    <th scope="col"
                                        class="px-6 py-3 text-left font-semibold text-gray-800 uppercase tracking-wider">
                                        Nama
                                    </th>
                                    <th scope="col" class="relative px-6 py-3">
                                        <span class="sr-only">Edit</span>
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @if ($polis->count() == 0)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap text-center" colspan="3">Tidak Ada Data..</td>
                                    </tr>
                                @else
                                    @foreach ($polis as $poli)
                                        <tr>
                                            <td class="px-6 py-4 whitespace-nowrap">{{ $poli->nama_poli }}</td>
                                            <div>
                                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                                    <a href="{{ route('poli.edit', $poli->id) }}" class="bg-yellow-500 px-3 py-2 rounded text-white">Edit</a>
                                                    <form action="{{ route('poli.delete', $poli->id) }}" method="post" class="inline">
                                                        @method('delete')
                                                        @csrf
                                                        <button type="submit" class="bg-red-500 px-3 py-2 rounded text-white">Delete</button>
                                                    </form>
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
            {{ $polis->links() }}
        </div>

    </x-container>
</x-app>
