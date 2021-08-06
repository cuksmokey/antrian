<x-app>
    <x-container>
        <div class="grid grid-cols-12 gap-6">
            <div class="col-span-6 space-y-3">
                <x-card>
                    <form action="{{ route('status') }}" method="post">
                        @csrf
                        <div class="flex-shrink-0">
                            <img class="w-10 h-10 rounded-full mr-3" src="https://i.pravatar.cc/100" alt="{{ Auth::user()->name }}">
                        </div>
                        <div class="w-full">
                            <div class="font-semibold">
                                {{ Auth::user()->name }}
                            </div>
                            <div class="mt-2">
                                <textarea name="body" id="body" placeholder="Apa yang Anda Pikirkan?" class="p-2 w-full border border-gray-400 rounded-xl resize-none focus:outline-none" ></textarea>
                            </div>
                            <div class="text-right">
                                <button type="submit" class="bg-blue-500 text-white py-1 px-3 rounded-md text-right">Post</button>
                            </div>
                        </div>
                    </form>
                </x-card>

                @foreach ($statuses as $status)
                    <x-card>
                        <div class="flex-shrink-0">
                            <img class="w-10 h-10 rounded-full mr-3" src="https://i.pravatar.cc/100" alt="{{ $status->author->name }}">
                        </div>
                        <div>
                            <div class="font-semibold">
                                {{ $status->author->name }}
                            </div>
                            <div class="leading-relaxed">
                                {{ $status->body }}
                            </div>
                            <div class="text-sm text-gray-600">
                                {{ $status->created_at->format("d F, Y") }} - {{ $status->created_at->diffForHumans() }}
                            </div>
                        </div>
                    </x-card>
                @endforeach
            </div>
            <div class="col-span-6">
                <div class="space-y-6 border border-gray-300 p-3 rounded">
                    <h1 class="font-semibold">Recently Follows</h1>
                    @foreach (Auth::user()->follows as $user)
                        <div class="flex">
                            <div class="flex-shrink-0 items-center">
                                <img class="w-10 h-10 rounded-full mr-3" src="https://i.pravatar.cc/100" alt="alt">
                            </div>
                            <div>
                                <div class="font-semibold">
                                    {{ $user->name }}
                                </div>
                                <div class="text-sm text-gray-600">
                                    {{ $user->pivot->created_at->diffForHumans() }}
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </x-container>
</x-app>
