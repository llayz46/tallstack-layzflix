@props(['type' => 'button'])

@if ($type === 'button')
    <button {{ $attributes->merge(['class' => 'inline-flex items-center justify-center px-3 py-2 bg-primary-700 rounded-md font-semibold text-sm text-white hover:bg-primary-600 focus:bg-primary-800 active:bg-primary-900 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-primary-600 disabled:opacity-50 transition ease-in-out duration-150']) }}>
        {{ $slot }}
    </button>
@elseif($type === 'link')
    <a {{ $attributes->merge(['class' => 'inline-flex items-center px-3 py-2 bg-primary-700 rounded-md font-semibold text-sm text-white hover:bg-primary-600 focus:bg-primary-800 active:bg-primary-900 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-primary-600 disabled:opacity-50 transition ease-in-out duration-150']) }}>
        {{ $slot }}
    </a>
@elseif($type === 'secondary')
    <a {{ $attributes->merge(['class' => 'inline-flex items-center justify-center rounded-md bg-background-accent hover:bg-background-accent-hover px-3 py-2 text-sm font-semibold text-white ring-1 ring-inset ring-background-accent-hover']) }}>{{ $slot }}</a>
@elseif($type === 'secondary-button')
    <button {{ $attributes->merge(['class' => 'inline-flex items-center justify-center rounded-md bg-background-accent hover:bg-background-accent-hover px-3 py-2 text-sm font-semibold text-white ring-1 ring-inset ring-background-accent-hover']) }}>{{ $slot }}</button>
@endif
