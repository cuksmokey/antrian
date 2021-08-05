<x-app>
    <x-container>
        <div class="grid grid-cols-12 gap-6">
            <div class="col-span-6">
                <div class="space-y-6 border border-gray-300 p-3 rounded">
                    @foreach ($statuses as $status)
                        <div class="flex">
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
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="col-span-6">
                <div class="space-y-6 border border-gray-300 p-3 rounded">
                        <div class="flex">
                            <div class="flex-shrink-0">
                                <img class="w-10 h-10 rounded-full mr-3" src="https://i.pravatar.cc/100" alt="alt">
                            </div>
                            <div>
                                <div class="font-semibold">
                                    Name ..
                                </div>
                                <div class="text-sm text-gray-600">
                                    Time Ago ..
                                </div>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </x-container>
</x-app>
