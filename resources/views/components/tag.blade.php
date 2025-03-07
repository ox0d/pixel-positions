@props(['tag' => null, 'size' => 'base'])

@php
    $classes = 'bg-white/10 hover:bg-white/20 rounded-xl transition-colors duration-300 mb-2 inline-block';

    if ($size == 'base') {
        $classes .= ' px-5 py-1 text-sm';
    }
    
    if ($size == 'small') {
        $classes .= ' px-3 py-1 text-2xs';
    }
@endphp

<a href="{{ route('tag', $tag->name) }}" class="{{ $classes }}">{{ $tag->name }}</a>