<tr {{ $attributes->merge(['class' => 'first:border-b-2 even:bg-gray-200 last:border-b border-t border-gray-300']) }}>
    {{ $slot }}
</tr>