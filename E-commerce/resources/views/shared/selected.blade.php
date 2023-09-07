@php

    $class = $class ?? null;
    $name = $name ?? '';
    $value = $value ?? '';
    $label = $label ?? ucfirst($name);
    $message = $message ?? '';
    $array  = $array ;
    $valueArray = $value->pluck('id')->toArray();
@endphp

<div class="{{$class}}">
    
<label  for="{{ $name }}" class="block text-gray-700 text-sm font-bold mb-2">{{$label}}</label>
<select name="{{ $name }}" id="{{ $name }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" multiple>
    @foreach ($array as $item)
        <option value="{{ $item->id }}" @if (in_array($item->id, $valueArray)) selected @endif>{{ $item->name }}</option>
    @endforeach
</select>

    @error($name)
        <div class="text-danger">{{ $message }}</div>
    @enderror
</div>