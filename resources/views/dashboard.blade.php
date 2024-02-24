<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-10">
        <div class="max-w-7xl mx-auto sm:px-4 lg:px-6 xl:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

                <div id="board_wrapper" class="fixed overflow-scroll w-full h-full">
                    <div
                        id="board"
                        class="relative bg-size cursor-grab w-full h-full"
                        style="background-size: 30px 30px; background-image: radial-gradient(circle, #b8b8b8bf 1px, rgba(0, 0, 0, 0) 1px);"
                    ></div>
                    <script>
                        const board = document.getElementById('board');
                        let scale = 1;
                        let clickedPosition = { x: -1, y: -1 }

                        board.addEventListener('wheel', e => {
                            const deltaY = event.deltaY;

                            // Update scale
                            scale = scale + e.deltaY * -0.005;

                            // Restrict scale
                            scale = Math.min(Math.max(1, scale), 2);

                            board.style.transform = `scale(${scale})`;
                            board.style.marginTop = `${(scale - 1) * 50}vh`;
                            board.style.marginLeft = `${(scale - 1) * 50}vw`;

                        });

                        board.addEventListener('mousedown', e => {
                            // Start grabbing board
                            board.classList.add('cursor-grabbing');
                            clickedPosition = {x: e.x, y: e.y };
                        });

                        board.addEventListener('mouseup', e => {
                            clickedPosition = {x: -1, y: -1 };

                            // Stop grabbing board
                            board.classList.remove('cursor-grabbing');
                        });

                        board.addEventListener('mousemove', e => {
                            // User clicked somewhere
                            if (clickedPosition.x >= 0 && clickedPosition.y >= 0) {
                                const deltaX = e.x - clickedPosition.x;
                                const deltaY = e.y - clickedPosition.y;

                                const boardWrapper = document.getElementById("board_wrapper");
                                boardWrapper.scrollBy(-deltaX, -deltaY);
                                clickedPosition = {x: e.x, y: e.y };
                            }
                        });
                    </script>
                </div>

                <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
