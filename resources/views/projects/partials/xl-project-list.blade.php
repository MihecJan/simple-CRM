<div class="hidden xl:block">
    <x-table>
        <x-tr>
            <x-th>Title</x-th>
            <x-th>Client</x-th>
            <x-th>Deadline</x-th>
            <x-th>Description</x-th>
            <x-th></x-th>
        </x-tr>
        @foreach ($projects as $project)
            <x-tr>
                <x-td>{{ $project->title }}</x-td>
                <x-td>
                    @if ($project->client)
                        <a href="{{ route('clients.show', $project->client) }}">
                            <span class="text-gray-900 underline">{{ $project->client->name }}</span>
                        </a>
                    @else
                        <span class="text-gray-600">Client missing</span>
                    @endif
                </x-td>
                <x-td>
                    @php
                        echo (explode(' ', $project->deadline)[0] === '')
                            ? '/'
                            : explode(' ', $project->deadline)[0];
                    @endphp
                </x-td>
                <x-td
                    class="text-gray-600"
                    x-data="{ text: '{{ $project->description }}' }"
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
                    @include('projects.partials.project-list-options')
                </x-td>
            </x-tr>
        @endforeach
    </x-table>
</div>