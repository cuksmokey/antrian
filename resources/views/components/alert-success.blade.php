@if (session('success'))
    <div class="bg-green-300 text-green-800 p-3 rounded border border-green-600">
        {{ session('success') }}
        {{ $slot }}
    </div>
@endif
