<x-app>
    <x-container>
        <div class="flex justify-center">
            <div class="max-w-md w-full border border-gray-300 shadow-lg p-10 rounded-lg">
                <form action="{{ route('dokter.update', $data->id) }}" method="post">
                    @method('put')
                    @csrf

                    <div class="mb-4">
                        <label for="nama_dokter" class="font-medium text-md block mb-3">Add Nama Dokter</label>
                        <input type="text" name="nama_dokter" id="nama_dokter" value="{{ $data->nama_dokter ?? old('nama_dokter') }}" class="@error('nama_dokter') border-red-500 @enderror border border-gray-300 shadow focus:outline-none focus:border-gray-500 rounded p-1 w-full">
                        @error('nama_dokter')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <select disabled name="poli_id" id="poli_id" class="@error('poli_id') border-red-500 @enderror w-full p-2 border border-gray-300 shadow rounded">
                            <option value="{{ $data->poli->id }}">{{ $data->poli->nama_poli }}</option>
                        </select>
                        @error('poli_id')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <x-button-blue>Edit</x-button-blue>
                </form>
            </div>
        </div>
    </x-container>
</x-app>
