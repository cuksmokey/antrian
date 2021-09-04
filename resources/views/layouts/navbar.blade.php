<div class="fixed bg-gray-800 px-3 w-full">
    <div class="flex items-center justify-between h-16 shadow-xl">
        <div class="flex items-center">
            <div class="flex-shrink-0">
                <img src="{{ asset('logo.png') }}" alt="logo" width="45" height="45" class="mr-3">
            </div>
            <div>
                @guest
                    <div class="text-white text-sm font-extrabold tracking-widest">PENDAFTARAN ONLINE PUSKESMAS JATEN 1</div>
                @else
                    <a href="{{ route('dashboard') }}" class="text-white text-sm font-extrabold tracking-widest">PENDAFTARAN ONLINE PUSKESMAS JATEN 1</a>
                    <a href="{{ route('dashboard') }}" class="{{ request()->routeIs('dashboard') ? 'bg-gray-700 text-white' : 'text-gray-300' }} px-3 py-2 hover:bg-gray-700 hover:text-white text-sm font-medium rounded">Dashboard</a>
                    <a href="{{ route('poli') }}" class="{{ request()->routeIs('poli') ? 'bg-gray-700 text-white' : 'text-gray-300' }} px-3 py-2 hover:bg-gray-700 hover:text-white text-sm font-medium rounded">Poli</a>
                    <a href="{{ route('dokter') }}" class="{{ request()->routeIs('dokter') ? 'bg-gray-700 text-white' : 'text-gray-300' }} px-3 py-2 hover:bg-gray-700 hover:text-white text-sm font-medium rounded">Dokter</a>
                    <a href="{{ route('jadwal') }}" class="{{ request()->routeIs('jadwal') ? 'bg-gray-700 text-white' : 'text-gray-300' }} px-3 py-2 hover:bg-gray-700 hover:text-white text-sm font-medium rounded">Jadwal</a>
                @endguest
            </div>
        </div>
        <div class="flex">
            @guest
                <a href="{{ route('register') }}" class="{{ request()->routeIs('register') ? 'bg-gray-700 text-white' : 'text-gray-300' }} px-3 py-2 hover:bg-gray-700 hover:text-white text-sm font-medium rounded">Register</a>
                <a href="{{ route('login') }}" class="{{ request()->routeIs('login') ? 'bg-gray-700 text-white' : 'text-gray-300' }} px-3 py-2 hover:bg-gray-700 hover:text-white text-sm font-medium rounded">Login</a>
            @else
                <a href="{{ route('dashboard') }}" class="text-gray-300 px-3 py-2 hover:bg-gray-700 hover:text-white text-sm font-medium rounded">{{ Auth::user()->name }}</a>
                <form action="{{ route('logout') }}" method="post">
                    @csrf
                    <button type="submit" class="text-gray-300 px-3 py-2 hover:bg-gray-700 hover:text-white text-sm font-medium rounded">Logout</button>
                </form>
            @endguest
        </div>
    </div>
</div>
