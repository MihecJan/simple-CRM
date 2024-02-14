@props(['active'])

@php
    $classes = 'mx-4 inline-flex items-center text-base font-medium leading-5 focus:outline-none';
    $textInactiveClasses = 'text-secondary-300 group-hover:text-secondary-200 transition ease-in-out duration-150';
    $textActiveClasses = 'text-secondary-100';
    $bgActiveClasses = 'bg-secondary-450';

    if ($active) {
        $classes = $classes . ' ' . $textActiveClasses;
    }
    else {
        $classes = $classes . ' ' . $textInactiveClasses;
    }
@endphp

<a class="group flex h-16 hover:bg-secondary-450 transition ease-in-out duration-150 {{ $active ? 'bg-secondary-450' : '' }}" {{ $attributes }}">
    <svg
        class="w-6 h-6 ml-4 h-full {{ $active ? $textActiveClasses : $textInactiveClasses }}"
        xmlns="http://www.w3.org/2000/svg"
        fill="currentColor"
        viewBox="0 0 24 24"
    >
        <path fill-rule="evenodd" d="M11.3 3.3a1 1 0 0 1 1.4 0l6 6 2 2a1 1 0 0 1-1.4 1.4l-.3-.3V19a2 2 0 0 1-2 2h-3a1 1 0 0 1-1-1v-3h-2v3c0 .6-.4 1-1 1H7a2 2 0 0 1-2-2v-6.6l-.3.3a1 1 0 0 1-1.4-1.4l2-2 6-6Z" clip-rule="evenodd"/>
    </svg>

    <div {{ $attributes->merge(['class' => $classes]) }}>
        {{ $slot }}
    </div>
</a>
