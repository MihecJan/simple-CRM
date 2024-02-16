<div class="sm:hidden flex flex-col">
    @foreach ($clients as $client)

        @if (!$loop->first)
            <hr class="border-gray-300">
        @endif

        <div class="m-2">
            <div class="font-bold">Name:</div>
            <div>{{ $client->name }}</div>
            <br>
            <div class="font-bold">Email:</div>
            <div>{{ $client->email }}</div>
            <br>
            <div class="font-bold">Description:</div>
            <div class="block text-gray-600">{{ $client->description }}</div>
            <br>
            <div class="flex gap-2 flex-row justify-end">
                @include('clients.partials.client-list-options')
            </div>
        </div>
    @endforeach
</div>