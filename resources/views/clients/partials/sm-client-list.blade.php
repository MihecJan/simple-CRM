<div class="hidden xl:hidden sm:flex flex-col">
    @foreach ($clients as $client)

        @if (!$loop->first)
            <hr class="border-gray-200">
        @endif

        <div class="flex">
            <!-- Col 1 -->
            <div class="m-2 sm:m-4 font-bold">
                <x-gender :gender="$client->gender"></x-gender>
                <div>Name:</div>
                <div>Email:</div>
                <br>
                <div>Description:</div>
            </div>

            <!-- Col 2 -->
            <div class="m-2 sm:m-4 w-full">
                <div class="mt-8"></div>
                <div>{{ $client->name }}</div>
                <div>{{ $client->email }}</div>
                <br>
                <div class="block text-gray-600">{{ $client->description }}</div>
                <br>
                <div class="flex gap-1 flex-row justify-end">
                    @include('clients.partials.client-list-options')
                </div>
            </div>
        </div>
    @endforeach
</div>