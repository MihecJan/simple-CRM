<div>
    <div class="flex flex-row justify-between gap-x-2 transition" id="pipeline_root">
        @foreach ($stages as $id => $stage)
            <div
                class="rounded border border-gray-300 w-0 flex-1 flex flex-col"
                pipeline-stage="{{ $stage }}"
            >
                <h3 class="font-bold px-2 bg-secondary-200 text-gray-900">{{ $stage }}</h3>

                @foreach ($clients as $client)
                    @if ($stage === $client->stage)
                        @include('livewire.partials.draggable-client')
                    @endif
                @endforeach

                <div
                    drop-zone
                    class="rounded border-2 border-dashed border-gray-300 bg-gray-100 m-2 mt-auto h-16"
                ></div>

            </div>
        @endforeach

        <script>
            window.addEventListener('contentChanged', e => {
                setTimeout(() => {
                    initDragHandlers();
                    initDragItems();
                    initDropZones();
                }, 100);
            });

            const initDragHandlers = () => {
                let dragHandles = document.querySelectorAll('[drag-handle]');
                dragHandles.forEach(dragHandle => {
                    dragHandle.addEventListener('mousedown', e => {
                        e.target.parentNode.parentNode.parentNode.parentNode.setAttribute('draggable', 'true');
                    });
                    dragHandle.addEventListener('mouseup', e => {
                        e.target.parentNode.parentNode.parentNode.parentNode.setAttribute('draggable', 'false');
                    });
                });
            }

            const initDragItems = () => {
                let dragItems = document.querySelectorAll('[drag-item]');
                dragItems.forEach(dragItem => {
                    dragItem.addEventListener('dragstart', e => {
                        e.dataTransfer.setData('text/plain', e.currentTarget.getAttribute('client-id'));
                    });
                    dragItem.addEventListener('dragend', e => {
                        e.target.setAttribute('draggable', 'false');
                    });
                });
            }

            const initDropZones = () => {
                let dropZones = document.querySelectorAll('[drop-zone]');
                dropZones.forEach(dropZone => {
                    dropZone.addEventListener('dragenter', e => {
                        e.target.classList.remove('border-gray-300');
                        e.target.classList.add('border-indigo-500');
                    });
                    dropZone.addEventListener('dragover', e => e.preventDefault());
                    dropZone.addEventListener('dragleave', e => {
                        e.target.classList.remove('border-indigo-500');
                        e.target.classList.add('border-gray-300');
                    });
                    dropZone.addEventListener('drop', e => {
                        e.target.classList.remove('border-indigo-500');
                        e.target.classList.add('border-gray-300');

                        const draggingItemClientId = e.dataTransfer.getData("text");
                        const draggingItem = document.querySelector(`[drag-item][client-id="${draggingItemClientId}"]`);

                        const parent = e.target.parentNode;
                        const secondChild = parent.children[1];
                        parent.insertBefore(draggingItem, secondChild);

                        const component = Livewire.find(
                            e.target.closest('[wire\\:id]').getAttribute('wire:id')
                        );

                        const stages = @json($stages);
                        const newStages = {}

                        for (const stage of Object.values(stages)) {
                            newStages[stage] = [];
                        }
                        
                        const draggableItems = pipeline_root.querySelectorAll('[drag-item]');
                        Array.from(draggableItems).forEach(draggableItem => {
                            const stageEl = draggableItem.closest('[pipeline-stage]');
                            const stage = stageEl.getAttribute('pipeline-stage');
                            const clientId = draggableItem.getAttribute('client-id');
                            newStages[stage].push(clientId);
                        });

                        component.call('reorder', newStages);

                        waitingForUpdate();
                    });
                });
            }

            const waitingForUpdate = () => {
                pipeline_root.classList.add('pointer-events-none');
                pipeline_root.style ='filter: blur(1px)';

                show_loading.classList.remove("hidden");
                show_loading.classList.add("opacity-0");
                show_loading.classList.add("left-2");
                setTimeout(() => {
                    show_loading.classList.remove("opacity-0");
                    show_loading.classList.remove("left-2");
                    show_loading.classList.add("opacity-100");
                    show_loading.classList.add("left-0");
                }, 100);
            }
        </script>
    </div>

    <div
        class="text-gray-900 mt-1"
        x-data="{ show: false }"
        x-show="show"
        x-init="
            window.addEventListener('contentChanged', e => {
                show = true;
                setTimeout(() => show = false, 1000);
            });
        "
        x-transition
    >
        saved
    </div>

    <div id="show_loading" class="transition-all duration-150 hidden relative text-gray-900 mt-1">
        loading...
    </div>

</div>