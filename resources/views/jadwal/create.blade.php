<x-app>
    <x-container>
        <div class="flex justify-center">
            <div class="max-w-md w-full border border-gray-300 shadow-lg p-10 rounded-lg">
                <form action="{{ route('jadwal') }}" method="post">
                    @csrf

                    <div class="mb-4">
                        <select name="poli_id" id="poli_id"
                            class="@error('poli_id') border-red-500 @enderror w-full p-2 border border-gray-300 shadow rounded plh-poli">
                            <option value="">Pilih Poli...</option>
                            @foreach ($poli as $item)
                                <option value="{{ $item->id }}">{{ $item->nama_poli }}</option>
                            @endforeach
                        </select>
                        @error('poli_id')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <select name="dokter_id" id="dokter_id"
                            class="@error('dokter_id') border-red-500 @enderror w-full p-2 border border-gray-300 shadow rounded plh-dokter">
                            <option value="">Pilih Dokter...</option>
                        </select>
                        @error('dokter_id')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <select name="shift" id="shift"
                            class="@error('shift') border-red-500 @enderror w-full p-2 border border-gray-300 shadow rounded">
                            <option value="">Shift...</option>
                            <option value="Pagi">Pagi</option>
                            <option value="Sore">Sore</option>
                        </select>
                        @error('shift')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="dari" class="font-medium text-xs block">Dari Jam</label>
                        <input type="time" name="dari" id="dari" value="{{ old('dari') }}"
                            class="@error('dari') border-red-500 @enderror border border-gray-300 shadow focus:outline-none focus:border-gray-500 rounded p-1 w-full">
                        @error('dari')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="sampai" class="font-medium text-xs block">Sampai Jam</label>
                        <input type="time" name="sampai" id="sampai" value="{{ old('sampai') }}"
                            class="@error('sampai') border-red-500 @enderror border border-gray-300 shadow focus:outline-none focus:border-gray-500 rounded p-1 w-full">
                        @error('sampai')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <button type="submit"
                        class="w-full py-2 bg-blue-600 text-gray-100 hover:bg-blue-500 hover:text-white font-medium rounded">Create</button>
                </form>
            </div>
        </div>

        <script type="text/javascript">
            jQuery(document).ready(function() {
                jQuery('.plh-poli').on('change', function() {
                    var dokterID = jQuery(this).val();
                    if (dokterID) {
                        jQuery.ajax({
                            url: 'getDokter/' + dokterID,
                            type: "GET",
                            dataType: "json",
                            success: function(data) {
                                console.log(data);
                                jQuery('.plh-dokter').empty();
                                jQuery.each(data, function(key, value) {
                                    $('.plh-dokter').append('<option value="' + key + '">' + value + '</option>');
                                });
                            }
                        });
                    } else {
                        $('.plh-dokter').empty();
                    }
                });
            });
        </script>

    </x-container>
</x-app>
