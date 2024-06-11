@props(['submit'])

<div class="w-full" {{ $attributes->merge(['class' => 'md:grid md:grid-cols-3 md:gap-6']) }}>


    <div class="mt-5 md:mt-0 md:col-span-2 w-full">
        <form wire:submit="{{ $submit }}" class="w-full">
            <div class="px-4 py-5 bg-[#BFEFFB] sm:p-6 shadow w-full {{ isset($actions) ? 'sm:rounded-tl-md sm:rounded-tr-md' : 'sm:rounded-md' }}">
                <div class="grid grid-cols-1 gap-1  w-full border-gray-400">
                    {{ $form }}
                </div>
            </div>

            @if (isset($actions))
                <div class="flex items-center justify-end px-4 py-3 bg-[#BFEFFB] text-end sm:px-6 shadow sm:rounded-bl-md sm:rounded-br-md">
                    {{ $actions }}
                </div>
            @endif
        </form>
    </div>
</div>
