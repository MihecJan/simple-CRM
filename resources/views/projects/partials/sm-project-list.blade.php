<div class="hidden xl:hidden sm:flex flex-col">
    @foreach ($projects as $project)

        @if (!$loop->first)
            <hr class="border-gray-200">
        @endif

        <div class="flex">
            <!-- Col 1 -->
            <div class="m-2 sm:m-4 font-bold">
                <div>Title:</div>
                <div>Client:</div>
                <div>Deadline:</div>
                <br>
                <div>Description:</div>
            </div>

            <!-- Col 2 -->
            <div class="m-2 sm:m-4 w-full">
                <div>{{ $project->title }}</div>
                <div>
                    @if ($project->client)
                        <a href="{{ route('clients.show', $project->client) }}">
                            <span class="text-gray-900 underline">{{ $project->client->name }}</span>
                        </a>
                    @else
                        <span class="text-gray-600">Client missing</span>
                    @endif
                </div>
                <div>{{ explode(' ', $project->deadline)[0] }}</div>
                <br>
                <div class="block text-gray-600">{{ $project->description }}</div>
                <br>
                <div class="flex gap-1 flex-row justify-end">
                    @include('projects.partials.project-list-options')
                </div>
            </div>
        </div>
    @endforeach
</div>