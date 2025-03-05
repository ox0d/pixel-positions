@props(['job' => null])

<x-pannel class="flex gap-x-6">    
    <div>
        <x-employer-logo />
    </div>

    <div class="flex-1 flex flex-col justify-between">       
        <a href="javascript:void(0)" class="self-start text-sm text-gray-400">{{ $job->employer->name ?? '-' }}</a>

        <h3 class="font-bold text-xl mt-2 group-hover:text-blue-500 transition-colors duration-300">{{ $job->title }}</h3>

        <p class="text-sm text-gray-400 mt-auto">{{ $job->schedule ?? '-' }} - From {{ $job->salary ?? '-' }}</p>
    </div>

    <div>
        @foreach ($job->tags as $tag)
            <x-tag :$tag />           
        @endforeach
    </div>
</x-pannel>