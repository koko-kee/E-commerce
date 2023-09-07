@php

    $type = $type ?? 'text';
    $class = $class ?? null;
    $name = $name ?? '';
    $value = $value ?? '';
    $label = $label ?? ucfirst($name);
    $message = $message ?? '';

@endphp

<div class="{{ $class }}">

    @if ($type == 'textarea')
        <label for="{{ $name }}" class="block text-gray-700 text-sm font-bold mb-2">{{ $label }}</label>
        <textarea name="{{ $name }}" id="{{ $name }}"  cols="10" rows="3" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">{{old($name,$value)}}</textarea>
        @error($name)
        <div class="text-danger">{{ $message }}</div>
        @enderror

    @else
        <label for="{{ $name }}" class="block text-gray-700 text-sm font-bold mb-2">{{ $label }}</label>
        <input type="{{ $type }}" name="{{ $name }}" id="{{ $name }}"  value="{{ old($name, $value) }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
        @error($name)
            <div class="text-danger">{{ $message }}</div>
        @enderror

    @endif
    
</div>
