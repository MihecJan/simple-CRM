<div class="sm:hidden flex flex-col">
    @foreach ($tasks as $task)

        @if (!$loop->first)
            <hr class="border-gray-300">
        @endif

        <div class="m-2">
            <div class="font-bold">Task:</div>
            <div>{{ $task->task }}</div>
            <br>
            <div class="font-bold">Project:</div>
            <div>
                <a href="{{ route('projects.show', $task->project) }}">
                    <span class="text-gray-900 underline">{{ $task->project->title }}</span>
                </a>
            </div>
            <br>
            <div class="font-bold">Deadline:</div>
            <div>{{ explode(' ', $task->deadline)[0] }}</div>
            <br>
            <div class="font-bold">Description:</div>
            <div class="block text-gray-600">{{ $task->description }}</div>
            <br>
            <div class="flex gap-2 flex-row justify-end">
                @include('tasks.partials.task-list-options')
            </div>
        </div>
    @endforeach
</div>