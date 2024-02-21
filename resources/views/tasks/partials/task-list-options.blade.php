<a href="{{ route('tasks.show', $task) }}">
    <x-primary-button>Show</x-primary-button>
</a>
<a href="{{ route('tasks.edit', $task) }}">
    <x-secondary-button>Edit</x-secondary-button>
</a>
<x-danger-button
    x-on:click.prevent="$dispatch('open-modal', 'confirm-task{{ $task->id }}-deletion')"
>Delete</x-danger-button>

<x-modal :name="'confirm-task' . $task->id . '-deletion'" focusable class="mt-32">
    <form method="POST" action="{{ route('tasks.destroy', $task) }}">
        @csrf
        @method('delete')

        <header class="p-4 sm:px-6">
            <h2 class="text-lg font-medium text-gray-900">
                {{ __('Are you sure you want to delete this task?') }}
            </h2>
        </header>

        <hr class="border-gray-300">

        <div class="p-4 sm:px-6 flex justify-end">
            <x-secondary-button x-on:click="$dispatch('close')">
                {{ __('Cancel') }}
            </x-secondary-button>

            <x-danger-button class="ms-3">
                {{ __('Delete task') }}
            </x-danger-button>
        </div>
    </form>
</x-modal>