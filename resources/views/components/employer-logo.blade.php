@props(['employer', 'width' => 90])

@php
    $imagePath = ! empty($employer->logo) ? asset($employer->logo) : 'https://picsum.photos/seed/' . rand(1, 1000) . '/' . $width;
@endphp

<img src="{{ $imagePath }}" width="{{ $width }}" alt="company logo" class="rounded-xl" />