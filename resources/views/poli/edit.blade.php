<x-app>
    <x-container>
        <div class="flex justify-center">
            <div class="max-w-md w-full border border-gray-300 shadow-lg p-10 rounded-lg">
                <form action="{{ route('poli.update', $data->id) }}" method="post">
                    @method('put')
                    @csrf

                    <div class="mb-4">
                        <label for="nama_poli" class="font-medium text-md block mb-3">Edit Nama Poli</label>
                        <input type="text" name="nama_poli" id="nama_poli" value="{{ $data->nama_poli ?? old('nama_poli') }}" class="@error('nama_poli') border-red-500 @enderror border border-gray-300 shadow focus:outline-none focus:border-gray-500 rounded p-3 w-full">
                        @error('nama_poli')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <button type="submit" class="w-full py-2 bg-blue-600 text-gray-100 hover:bg-blue-500 hover:text-white font-medium rounded">Edit</button>
                </form>
            </div>
        </div>
    </x-container>
</x-app>
