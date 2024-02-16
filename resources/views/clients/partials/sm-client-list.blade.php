<div class="hidden xl:hidden sm:flex flex-col">
    @foreach ($clients as $client)

        @if (!$loop->first)
            <hr class="border-gray-200">
        @endif

        <div class="flex">
            <!-- Col 1 -->
            <div class="m-2 sm:m-4 font-bold">
                <div>Name:</div>
                <div>Email:</div>
                <br>
                <div>Description:</div>
            </div>

            <!-- Col 2 -->
            <div class="m-2 sm:m-4 w-full">
                <div>{{ $client->name }}</div>
                <div>{{ $client->email }}</div>
                <br>
                <div class="block text-gray-500">{{ $client->description }}</div>
                <br>
                <div class="flex gap-1 flex-row justify-end">
                    @include('clients.partials.client-list-options')
                </div>
            </div>
        </div>
    @endforeach
</div>