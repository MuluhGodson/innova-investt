@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'form-input text-gray-300 bg-transparent rounded-md shadow-sm']) !!}>
