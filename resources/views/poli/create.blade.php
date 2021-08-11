<x-app>
    <x-container>
        <div class="flex justify-center">
            <div class="max-w-md w-full border border-gray-300 shadow-lg p-10 rounded-lg">

                <div class="mb-3">
                    <x-alert-success></x-alert-success>
                </div>

                <form action="{{ route('poli') }}" method="post">
                    @csrf

                    <div class="mb-4">
                        <label for="nama_poli" class="font-medium text-md block mb-3">Add Nama Poli</label>
                        <input type="text" name="nama_poli" id="nama_poli" value="{{ old('nama_poli') }}" class="@error('nama_poli') border-red-500 @enderror border border-gray-300 shadow focus:outline-none focus:border-gray-500 rounded p-1 w-full">
                        @error('nama_poli')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <x-button-blue>Create</x-button-blue>
                </form>
            </div>
        </div>
    </x-container>
</x-app>
