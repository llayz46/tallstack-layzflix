@props(['type' => 'button'])

@if ($type === 'button')
    <button {{ $attributes->merge(['class' => 'inline-flex items-center px-3 py-2 bg-primary-600 rounded-md font-semibold text-sm text-white hover:bg-primary-500 focus:bg-primary-700 active:bg-primary-900 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-primary-600 disabled:opacity-50 transition ease-in-out duration-150']) }}>
        {{ $slot }}
    </button>
@elseif($type === 'link')
    <a {{ $attributes->merge(['class' => 'inline-flex items-center px-3 py-2 bg-primary-600 rounded-md font-semibold text-sm text-white hover:bg-primary-500 focus:bg-primary-700 active:bg-primary-900 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-primary-600 disabled:opacity-50 transition ease-in-out duration-150']) }}>
        {{ $slot }}
    </a>
@endif
