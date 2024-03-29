<div class="hidden xl:block">
    <x-table>
        <x-tr>
            <x-th></x-th>
            <x-th>Name</x-th>
            <x-th>Email</x-th>
            <x-th>Description</x-th>
            <x-th></x-th>
        </x-tr>
        @foreach ($clients as $client)
            <x-tr>
                <x-td>
                    <x-gender :gender="$client->gender"></x-gender>
                </x-td>
                <x-td>{{ $client->name }}</x-td>
                <x-td>{{ $client->email }}</x-td>
                <x-td
                    class="text-gray-600"
                    x-data="{ text: '{{ $client->description }}' }"
                    x-text="
                        if (text.length > ((screenWidth - 500) / 20)) {
                            return text.substring(0, (screenWidth - 500) / 20) + '...';
                        }
                        else if (text.length === 0) {
                            return '/';
                        }
                        else {
                            return text;
                        }
                    "
                ></x-td>
                <x-td class="flex flex-col gap-1 md:flex-row">
                    @include('clients.partials.client-list-options')
                </x-td>
            </x-tr>
        @endforeach
    </x-table>
</div>