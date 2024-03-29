<div
    class="rounded border mx-2 mt-2 first:mt-0 p-1"
    client-id="{{ $client->id }}"
    drag-item
>
    <a href="{{ route('clients.show', $client) }}" draggable="false">
        <div class="flex flex-row items-center gap-x-1">
            <div drag-handle class="cursor-move">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="w-8 fill-gray-900">
                    <path d="M510.3,252.4l-81.7-64.4c-2-1.6-4.9-1.2-6.5,0.8c-0.6,0.8-1,1.8-1,2.9V233H279.1V90.9h41.5c3.8,0,6-4.5,3.6-7.5L259.7,1.8 c-1.5-2-4.4-2.4-6.4-0.8c-0.3,0.2-0.6,0.5-0.8,0.8l-64.5,81.7c-1.6,2-1.2,4.9,0.8,6.5c0.8,0.6,1.8,1,2.9,1H233V233H90.9v-41.5 c0-3.8-4.5-6-7.5-3.6L1.8,252.4c-2,1.5-2.4,4.4-0.8,6.4c0.2,0.3,0.5,0.6,0.8,0.8l81.6,64.5c3,2.4,7.5,0.3,7.5-3.6v-41.4h142.1 v142.1h-41.5c-3.8,0-6,4.5-3.6,7.5l64.5,81.6c1.9,2.4,5.4,2.4,7.2,0l64.5-81.6c2.4-3,0.3-7.5-3.6-7.5h-41.3V279.1h142.1v41.5 c0,3.8,4.5,6,7.5,3.6l81.6-64.5c2-1.6,2.4-4.5,0.8-6.6C510.8,252.8,510.6,252.6,510.3,252.4z"/>
                </svg>
            </div>
            <span class="text-gray-900 underline">{{ $client->name }}</span>
        </div>
        <x-gender class="mt-2" :gender="$client->gender"></x-gender>
    </a>
</div>