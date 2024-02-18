@props([
    'gender' => null
])

@if ($gender === 'm')
    <div
        {{ $attributes->merge(['class' => 'w-8 h-8 rounded-full bg-secondary-500']) }}
    >
        <svg
            width='24'
            height='24'
            viewBox='0 0 24 24'
            xmlns='http://www.w3.org/2000/svg'
            class="relative left-1/2 top-1/2 -translate-x-1/2 -translate-y-1/2"
        >
            <g transform="matrix(0.87 0 0 0.87 12 12)" >
                <path style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-dashoffset: 0; stroke-linejoin: miter; stroke-miterlimit: 4; fill: rgb(240,240,240); fill-rule: nonzero; opacity: 1;" transform=" translate(-12, -11.51)" d="M 10 0 C 6.24 -0.02 2.97 3.1 3 7 L 3 8 L 3 11.748047 C 2.4701855 12.225307 2.0097656 13.000361 2.0097656 14.011719 C 2.0097656 15.27649 2.7280504 16.191398 3.4042969 16.585938 C 3.7657984 16.796847 3.8681582 16.757564 4.125 16.810547 C 5.6269646 19.927424 8.5402409 22.551214 11.867188 22.994141 L 12 23.011719 L 12.132812 22.994141 C 15.459499 22.550139 18.373013 19.926518 19.875 16.810547 C 20.131842 16.757567 20.234202 16.796847 20.595703 16.585938 C 21.27195 16.191398 21.990234 15.27649 21.990234 14.011719 C 21.990234 12.746948 21.27195 11.830087 20.595703 11.435547 C 20.297075 11.261319 20.232618 11.304211 20 11.248047 L 20 6 C 20 3.791 18.209 2 16 2 L 15 2 L 15 2.0097656 C 15 2.0097656 13.98 0 10 0 z M 12.445312 8 L 13 8 L 15 8 C 16.630274 8 17.949827 9.3018298 17.992188 10.921875 L 17.992188 13.013672 L 19.142578 13.013672 C 19.148378 13.014264 19.368026 13.035792 19.587891 13.164062 C 19.810644 13.294023 19.990234 13.37849 19.990234 14.011719 C 19.990234 14.644948 19.810644 14.727462 19.587891 14.857422 C 19.365137 14.987382 19.136719 15.009766 19.136719 15.009766 L 18.519531 15.044922 L 18.275391 15.611328 C 17.128688 18.256067 14.48056 20.569091 12 20.96875 C 9.5197032 20.569931 6.8713505 18.257043 5.7246094 15.611328 L 5.4804688 15.044922 L 4.8632812 15.009766 C 4.8632812 15.009766 4.6348629 14.987386 4.4121094 14.857422 C 4.1893558 14.727462 4.0097656 14.644948 4.0097656 14.011719 C 4.0097656 13.37849 4.1893558 13.294023 4.4121094 13.164062 C 4.6319738 13.035789 4.8516269 13.014264 4.8574219 13.013672 L 6.0078125 13.013672 L 6.0078125 10 L 9 10 C 10.477 10 11.752312 9.191 12.445312 8 z" stroke-linecap="round" />
            </g>
        </svg>
    </div>
@elseif ($gender === 'f')
    <div
        {{ $attributes->merge(['class' => 'w-8 h-8 rounded-full bg-rose-500']) }}
    >
        <svg
            width='24'
            height='24'
            viewBox='0 0 24 24'
            xmlns='http://www.w3.org/2000/svg'
            class="relative left-1/2 top-1/2 -translate-x-1/2 -translate-y-1/2"
        >
            <g transform="matrix(1 0 0 1 12 12)" >
                <path style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-dashoffset: 0; stroke-linejoin: miter; stroke-miterlimit: 4; fill: rgb(240,240,240); fill-rule: nonzero; opacity: 1;" transform=" translate(-12, -12)" d="M 12 2 C 8.193 2 2.5740156 4.7171094 2.0410156 17.912109 C 1.9950156 19.047109 2.9079687 20 4.0429688 20 L 6.7285156 20 C 8.1385798 21.240809 9.9815281 22 12 22 C 14.018472 22 15.86142 21.240809 17.271484 20 L 19.957031 20 C 21.092031 20 22.005938 19.047109 21.960938 17.912109 C 21.426937 4.7171094 15.807 2 12 2 z M 8 11 L 16 11 C 17.105 11 18 11.895 18 13 L 18 14 C 18 17.325562 15.325562 20 12 20 C 8.674438 20 6 17.325562 6 14 L 6 13 C 6 11.895 6.895 11 8 11 z" stroke-linecap="round" />
            </g>
        </svg>
    </div>
@else
    <div
        {{ $attributes->merge(['class' => 'w-8 h-8 rounded-full bg-gray-500']) }}
    >
        <svg
            width='24'
            height='24'
            xmlns="http://www.w3.org/2000/svg"
            viewBox="0 0 24 24"
            stroke-width="2"
            fill="rgb(240,240,240)"
            class="relative left-1/2 top-1/2 -translate-x-1/2 -translate-y-1/2"
        >
            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
        </svg>
    </div>
@endif