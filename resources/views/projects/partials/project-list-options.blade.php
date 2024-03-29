<a href="{{ route('projects.show', $project) }}">
    <x-primary-button>Show</x-primary-button>
</a>
<a href="{{ route('projects.edit', $project) }}">
    <x-secondary-button>Edit</x-secondary-button>
</a>
<x-danger-button
    x-on:click.prevent="$dispatch('open-modal', 'confirm-project{{ $project->id }}-deletion')"
>Delete</x-danger-button>

<x-modal :name="'confirm-project' . $project->id . '-deletion'" focusable class="mt-32">
    <form method="POST" action="{{ route('projects.destroy', $project) }}">
        @csrf
        @method('delete')

        <header class="p-4 sm:px-6">
            <h2 class="text-lg font-medium text-gray-900">
                {{ __('Are you sure you want to delete this project?') }}
            </h2>
            <p class="mt-1 text-sm text-gray-600">
                {{ __('This will also delete all associated tasks to this project.') }}
            </p>
        </header>

        <hr class="border-gray-300">

        <div class="p-4 sm:px-6 flex justify-end">
            <x-secondary-button x-on:click="$dispatch('close')">
                {{ __('Cancel') }}
            </x-secondary-button>

            <x-danger-button class="ms-3">
                {{ __('Delete project') }}
            </x-danger-button>
        </div>
    </form>
</x-modal>