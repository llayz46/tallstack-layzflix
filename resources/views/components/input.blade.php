@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'text-neutral-300 bg-transparent border-neutral-700 focus:border-primary-600 focus:ring-primary-600 rounded-md shadow-sm']) !!}>
