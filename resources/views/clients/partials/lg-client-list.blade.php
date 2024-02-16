<div class="hidden xl:block">
    <x-table>
        <x-tr>
            <x-th>Name</x-th>
            <x-th>Email</x-th>
            <x-th>Description</x-th>
            <x-th></x-th>
        </x-tr>
        @foreach ($clients as $client)
            <x-tr>
                <x-td>{{ $client->name }}</x-td>
                <x-td>{{ $client->email }}</x-td>
                <x-td
                    class="text-gray-500"
                    x-data="{ text: '{{ $client->description }}' }"
                    x-text="text.substring(0, (screenWidth - 500) / 20) + '...'"
                ></x-td>
                <x-td class="flex flex-col gap-1 md:flex-row">
                    @include('clients.partials.client-list-options')
                </x-td>
            </x-tr>
        @endforeach
    </x-table>
</div>