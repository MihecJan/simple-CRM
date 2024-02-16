<div class="sm:hidden flex flex-col">
    @foreach ($projects as $project)

        @if (!$loop->first)
            <hr class="border-gray-300">
        @endif

        <div class="m-2">
            <div class="font-bold">Title:</div>
            <div>{{ $project->title }}</div>
            <br>
            <div class="font-bold">Client:</div>
            <div>
                @if ($project->client)
                    <a href="{{ route('clients.show', $project->client) }}">
                        <span class="text-gray-900 underline">{{ $project->client->name }}</span>
                    </a>
                @else
                    <span class="text-gray-600">Client missing</span>
                @endif
            </div>
            <br>
            <div class="font-bold">Deadline:</div>
            <div>{{ explode(' ', $project->deadline)[0] }}</div>
            <br>
            <div class="font-bold">Description:</div>
            <div class="block text-gray-600">{{ $project->description }}</div>
            <br>
            <div class="flex gap-2 flex-row justify-end">
                @include('projects.partials.project-list-options')
            </div>
        </div>
    @endforeach
</div>