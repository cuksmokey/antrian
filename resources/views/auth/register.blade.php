<x-app>
    <div class="h-screen flex items-center justify-center">
        <div class="max-w-md w-full border border-gray-300 shadow-lg p-10 rounded-lg">
            @if (session()->has('success'))
                <div class="bg-green-300 p-3 text-md text-green-800 text-center block rounded mb-3">
                    {{ session()->get('success') }}
                </div>
            @endif
            <form action="{{ route('register') }}" method="post">
                @csrf
                <div class="mb-3">
                    <label for="name" class="font-medium text-md block">Name</label>
                    <input type="text" name="name" id="name" value="{{ old('name') }}" class="@error('name') border-red-400 @enderror border border-gray-300 shadow focus:outline-none focus:border-gray-500 rounded p-1 w-full">
                    @error('name')
                        <span class="text-red-400 text-xs">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="email" class="font-medium text-md block">Email</label>
                    <input type="email" name="email" id="email" value="{{ old('email') }}" class="@error('email') border-red-400 @enderror border border-gray-300 shadow focus:outline-none focus:border-gray-500 rounded p-1 w-full">
                    @error('email')
                        <span class="text-red-400 text-xs">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="password" class="font-medium text-md block">Password</label>
                    <input type="password" name="password" id="password" class="@error('password') border-red-400 @enderror border border-gray-300 shadow focus:outline-none focus:border-gray-500 rounded p-1 w-full">
                    @error('password')
                        <span class="text-red-400 text-xs">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="password_confirmation" class="font-medium text-md block">Confirm Password</label>
                    <input type="password" name="password_confirmation" id="password_confirmation" class="border border-gray-300 shadow focus:outline-none focus:border-gray-500 rounded p-1 w-full">
                </div>

                <button type="submit" class="w-full py-2 bg-gray-800 text-gray-300 hover:bg-gray-700 hover:text-white font-medium rounded">Register</button>
            </form>
        </div>
    </div>
</x-app>
