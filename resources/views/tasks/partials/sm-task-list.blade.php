<div class="hidden xl:hidden sm:flex flex-col">
    @foreach ($tasks as $task)

        @if (!$loop->first)
            <hr class="border-gray-200">
        @endif

        <div class="flex">
            <!-- Col 1 -->
            <div class="m-2 sm:m-4 font-bold">
                <div>Task:</div>
                <div>Project:</div>
                <div>Deadline:</div>
                <br>
                <div>Description:</div>
            </div>

            <!-- Col 2 -->
            <div class="m-2 sm:m-4 w-full">
                <div>{{ $task->task }}</div>
                <div>
                    <a href="{{ route('projects.show', $task->project) }}">
                        <span class="text-gray-900 underline">{{ $task->project->title }}</span>
                    </a>
                </div>
                <div>{{ explode(' ', $task->deadline)[0] }}</div>
                <br>
                <div class="block text-gray-600">{{ $task->description }}</div>
                <br>
                <div class="flex gap-1 flex-row justify-end">
                    @include('tasks.partials.task-list-options')
                </div>
            </div>
        </div>
    @endforeach
</div>