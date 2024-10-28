@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'border-gray-300 focus:border-[#993333] focus:ring-[#993333] rounded-md shadow-sm']) !!}>
