<x-app>
    <x-container>
        <div class="flex justify-center">
            <div class="max-w-md w-full border border-gray-300 shadow-lg p-10 rounded-lg">
                <div class="mb-3">
                    <x-alert-success>
                        <button class="btn-print mt-1 px-2 py-1 bg-green-800 text-white rounded block">Print Bukti Daftar</button>
                    </x-alert-success>
                </div>

                <form action="{{ route('home') }}" method="post" class="mt-3">
                    @csrf

                    <div class="mb-3">
                        <label for="tgl_periksa" class="font-medium text-sm block">Tanggal Periksa</label>
                        <input type="date" name="tgl_periksa" id="tgl_periksa" value="{{ old('tgl_periksa') }}"
                            class="@error('tgl_periksa') border-red-500 @enderror border border-gray-300 shadow focus:outline-none focus:border-gray-500 rounded p-1 w-full">
                        @error('tgl_periksa')
                        <span class="text-red-500 text-xs">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="nama" class="font-medium text-sm block">Nama</label>
                        <input type="text" name="nama" id="nama" value="{{ old('nama') }}" placeholder="Nama"
                            class="@error('nama') border-red-500 @enderror border border-gray-300 shadow focus:outline-none focus:border-gray-500 rounded p-1 w-full">
                        @error('nama')
                        <span class="text-red-500 text-xs">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="alamat" class="font-medium text-sm block">Alamat</label>
                        <input type="text" name="alamat" id="alamat" value="{{ old('alamat') }}" placeholder="Alamat"
                            class="@error('alamat') border-red-500 @enderror border border-gray-300 shadow focus:outline-none focus:border-gray-500 rounded p-1 w-full">
                        @error('alamat')
                        <span class="text-red-500 text-xs">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="tgl_lahir" class="font-medium text-sm block">Tanggal Lahir</label>
                        <input type="date" name="tgl_lahir" id="tgl_lahir" value="{{ old('tgl_lahir') }}"
                            class="@error('tgl_lahir') border-red-500 @enderror border border-gray-300 shadow focus:outline-none focus:border-gray-500 rounded p-1 w-full">
                        @error('tgl_lahir')
                        <span class="text-red-500 text-xs">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="no_telp" class="font-medium text-sm block">No Telpon</label>
                        <input type="number" name="no_telp" id="no_telp" value="{{ old('no_telp') }}"
                            placeholder="No Telpon"
                            class="@error('no_telp') border-red-500 @enderror border border-gray-300 shadow focus:outline-none focus:border-gray-500 rounded p-1 w-full">
                        @error('no_telp')
                        <span class="text-red-500 text-xs">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <select name="poli_id" id="poli_id"
                            class="@error('poli_id') border-red-500 @enderror w-full p-2 border border-gray-300 shadow rounded plh-poli"
                            required>
                            <option value="">Pilih Poli...</option>
                            @foreach ($poli as $item)
                            <option value="{{ $item->id }}">{{ $item->nama_poli }}</option>
                            @endforeach
                        </select>
                        @error('poli_id')
                        <span class="text-red-500 text-xs">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <select name="dokter_id" id="dokter_id"
                            class="@error('dokter_id') border-red-500 @enderror w-full p-2 border border-gray-300 shadow rounded plh-dokter"
                            required>
                            <option value="">Pilih Dokter...</option>
                        </select>
                        @error('dokter_id')
                        <span class="text-red-500 text-xs">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <select name="jadwal_id" id="jadwal_id"
                            class="@error('jadwal_id') border-red-500 @enderror w-full p-2 border border-gray-300 shadow rounded plh-jadwal"
                            required>
                            <option value="">Pilih Jadwal...</option>
                        </select>
                        @error('jadwal_id')
                        <span class="text-red-500 text-xs">{{ $message }}</span>
                        @enderror
                    </div>

                    <input type="hidden" name="idid" class="idid" value="{{ $daftar->id ?? '' }}">

                    <button type="submit" class="w-full py-2 bg-blue-600 text-gray-100 hover:bg-blue-500 hover:text-white font-medium rounded btn-daftar">Daftar</button>
                </form>
            </div>
        </div>

        <div class="modallll fixed z-10 inset-0 overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
            <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
                <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>
                <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
                <div class="inline-block bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all align-middle max-w-xl w-full">
                    <div class="bg-white pt-4 px-2">
                        <div class="flex items-start">
                            <div class="mt-3 text-left">
                                <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-title">
                                    Pendaftaran Berhasil!.
                                </h3>
                                <div class="mt-2 mdl-content">
                                    <table style="max-width: 100%">
                                        <thead>
                                            <th style="max-width: auto"></th>
                                            <th style="max-width: auto"></th>
                                            <th style="max-width: auto"></th>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>No Registrasi</td>
                                                <td>:</td>
                                                <td>{{ $daftar->nomer_daftar ?? '' }}</td>
                                            </tr>
                                            <tr>
                                                <td>Nama</td>
                                                <td>:</td>
                                                <td>{{ $daftar->nama ?? '' }}</td>
                                            </tr>
                                            <tr>
                                                <td>Alamat</td>
                                                <td>:</td>
                                                <td>{{ $daftar->alamat ?? '' }}</td>
                                            </tr>
                                            <tr>
                                                <td>Tgl Lahir</td>
                                                <td>:</td>
                                                @if ($count == 0)
                                                    <td></td>
                                                @else
                                                    <td>{{ $daftar->tgl_lahir->format('d M Y') ?? '' }}</td>
                                                @endif
                                            </tr>
                                            <tr>
                                                <td>Tgl Daftar</td>
                                                <td>:</td>
                                                @if ($count == 0)
                                                    <td></td>
                                                @else
                                                    <td>{{ $daftar->tgl_periksa->format('d M Y') ?? '' }}</td>
                                                @endif
                                            </tr>
                                            <tr>
                                                <td>Poli</td>
                                                <td>:</td>
                                                <td>{{ $daftar->poli->nama_poli ?? '' }}</td>
                                            </tr>
                                            <tr>
                                                <td>Dokter</td>
                                                <td>:</td>
                                                <td>{{ $daftar->dokter->nama_dokter ?? '' }}</td>
                                            </tr>
                                            <tr>
                                                <td>Jadwal</td>
                                                <td>:</td>
                                                <td>{{ $daftar->jadwal->dari ?? '' }} - {{ $daftar->jadwal->sampai ?? '' }} ( {{ $daftar->jadwal->shift ?? '' }} )</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="bg-gray-50 py-4 px-2 flex flex-row-reverse">
                        <button type="button" class="btn-cancel inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none ml-3 sm:text-sm">
                            Tutup
                        </button>
                        <a href="{{ route('pdf') }}" target="_blank" class="inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-blue-600 text-base font-medium text-white hover:bg-blue-700 focus:outline-none ml-3 sm:text-sm">
                            Print
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <script type="text/javascript">
            jQuery(document).ready(function() {
                jQuery('.modallll').hide();

                jQuery('.btn-print').on('click', function() {
                    var idid = jQuery('.idid').val();

                    if (idid) {
                        jQuery.ajax({
                            url: 'http://127.0.0.1:8000/getDaftar/'+idid,
                            type: "GET",
                            dataType: "json",
                            success: function(data) {
                                jQuery('.modallll').show();
                            }
                        });
                    } else {
                        jQuery('.modallll').hide();
                    }
                });

                jQuery('.btn-cancel').on('click', function() {
                    jQuery('.modallll').hide();
                });

                // plh dokter
                jQuery('.plh-poli').on('click', function() {
                    var dokterID = jQuery(this).val();
                    if (dokterID) {
                        jQuery.ajax({
                            url: 'http://127.0.0.1:8000/getDokter/'+dokterID,
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

                // plh jadwal
                jQuery('.plh-dokter').on('click', function() {
                    var jadwalID = jQuery(this).val();
                    if (jadwalID) {
                        jQuery.ajax({
                            url: 'http://127.0.0.1:8000/getJadwal/'+jadwalID,
                            type: "GET",
                            dataType: "json",
                            success: function(data) {
                                // console.log(data);
                                jQuery('.plh-jadwal').empty();
                                $('.plh-jadwal').append('<option value="">Pilih Jadwal...</option>');
                                jQuery.each(data, function(key, value) {
                                    $('.plh-jadwal').append('<option value="'+key+'">'+value+'</option>');
                                });
                            }
                        });
                    } else {
                        $('.plh-jadwal').empty();
                        $('.plh-jadwal').append('<option value="">Pilih Jadwal...</option>');
                    }
                });
            });
        </script>

    </x-container>
</x-app>
