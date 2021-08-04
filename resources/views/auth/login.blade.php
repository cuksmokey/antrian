<x-app>
    <div class="h-screen flex items-center justify-center">
        <div class="max-w-md w-full border border-gray-300 shadow-lg p-10 rounded-lg">
            @error('email')
                <div class="bg-red-300 p-3 text-md text-red-800 text-center block rounded mb-3">
                    {{ $message }}
                </div>
            @enderror
            <form action="{{ route('login') }}" method="post">
                @csrf

                <div class="mb-3">
                    <label for="email" class="font-medium text-md block">Email</label>
                    <input type="email" name="email" id="email" value="{{ old('email') }}" class="border border-gray-300 shadow focus:outline-none focus:border-gray-500 rounded p-1 w-full">
                </div>

                <div class="mb-3">
                    <label for="password" class="font-medium text-md block">Password</label>
                    <input type="password" name="password" id="password" class="border border-gray-300 shadow focus:outline-none focus:border-gray-500 rounded p-1 w-full">
                </div>

                <button type="submit" class="w-full py-2 bg-gray-800 text-gray-300 hover:bg-gray-700 hover:text-white font-medium rounded">Login</button>
            </form>
        </div>
    </div>
</x-app>
