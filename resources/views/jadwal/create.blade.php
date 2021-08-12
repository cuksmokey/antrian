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
                            <span class="text-red-500 text-xs">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <select name="dokter_id" id="dokter_id"
                            class="@error('dokter_id') border-red-500 @enderror w-full p-2 border border-gray-300 shadow rounded plh-dokter">
                            <option value="">Pilih Dokter...</option>
                        </select>
                        @error('dokter_id')
                            <span class="text-red-500 text-xs">{{ $message }}</span>
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
                            <span class="text-red-500 text-xs">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="dari" class="font-medium text-xs block">Dari Jam</label>
                        <input type="time" name="dari" id="dari" value="{{ old('dari') }}"
                            class="@error('dari') border-red-500 @enderror border border-gray-300 shadow focus:outline-none focus:border-gray-500 rounded p-1 w-full">
                        @error('dari')
                            <span class="text-red-500 text-xs">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="sampai" class="font-medium text-xs block">Sampai Jam</label>
                        <input type="time" name="sampai" id="sampai" value="{{ old('sampai') }}"
                            class="@error('sampai') border-red-500 @enderror border border-gray-300 shadow focus:outline-none focus:border-gray-500 rounded p-1 w-full">
                        @error('sampai')
                            <span class="text-red-500 text-xs">{{ $message }}</span>
                        @enderror
                    </div>

                    <x-button-blue>Create</x-button-blue>
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
                                // console.log(data);
                                jQuery('.plh-dokter').empty();
                                $('.plh-dokter').append('<option value="">Pilih Dokter...</option>');
                                jQuery.each(data, function(key, value) {
                                    $('.plh-dokter').append('<option value="' + key + '">' + value + '</option>');
                                });
                            }
                        });
                    } else {
                        $('.plh-dokter').empty();
                        $('.plh-dokter').append('<option value="">Pilih Dokter...</option>');
                    }
                });
            });
        </script>

    </x-container>
</x-app>
