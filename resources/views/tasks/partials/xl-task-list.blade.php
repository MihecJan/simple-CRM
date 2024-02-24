<div class="hidden xl:block">
    <x-table>
        <x-tr>
            <x-th>Task</x-th>
            <x-th>Project</x-th>
            <x-th>Deadline</x-th>
            <x-th>Description</x-th>
            <x-th></x-th>
        </x-tr>
        @foreach ($tasks as $task)
            <x-tr>
                <x-td>{{ $task->task }}</x-td>
                <x-td>
                    <a href="{{ route('projects.show', $task->project) }}">
                        <span class="text-gray-900 underline">{{ $task->project->title }}</span>
                    </a>
                </x-td>
                <x-td>
                    @php
                        echo (explode(' ', $task->deadline)[0] === '')
                            ? '/'
                            : explode(' ', $task->deadline)[0];
                    @endphp
                </x-td>
                <x-td
                    class="text-gray-600"
                    x-data="{ text: '{{ $task->description }}' }"
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
                    @include('tasks.partials.task-list-options')
                </x-td>
            </x-tr>
        @endforeach
    </x-table>
</div>