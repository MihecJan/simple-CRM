@props(['active' => false])

@php
    $textInactiveClasses = 'text-secondary-300 group-hover:text-secondary-200 transition ease-in-out duration-150';
    $textActiveClasses = 'text-secondary-100';
@endphp

@php
$classes = ($active ?? false)
            ? 'block w-full ps-3 pe-4 py-2 border-l-4 border-indigo-400 text-start text-base font-medium text-indigo-700 bg-indigo-50 focus:outline-none focus:text-indigo-800 focus:bg-indigo-100 focus:border-indigo-700'
            : 'block w-full ps-3 pe-4 py-2 border-l-4 border-transparent text-start text-base font-medium text-gray-600 hover:text-gray-800 hover:bg-gray-50 hover:border-gray-300 focus:outline-none focus:text-gray-800 focus:bg-gray-50 focus:border-gray-300';
@endphp

<a
    {{ $attributes->merge([
        'class' =>
                'group flex h-16 hover:bg-secondary-450 transition ease-in-out duration-150' .
                ' ' . ($active ?
                'bg-secondary-450' :
                '')
    ]) }}
>

    <svg
        class="w-6 ml-4 h-full
                {{ $active ?
                $textActiveClasses :
                $textInactiveClasses }}"
        xmlns="http://www.w3.org/2000/svg"
        fill="currentColor"
        viewBox="0 0 24 24"
    >
        {{ $svgPath }}
    </svg>

    <div
        class="mx-4 inline-flex items-center text-base font-medium leading-5 focus:outline-none
                {{ $active ?
                $textActiveClasses :
                $textInactiveClasses }}"
    >
        {{ $slot }}
    </div>
</a>
