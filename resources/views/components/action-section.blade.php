<div class="w-full" {{ $attributes->merge(['class' => 'md:grid md:grid-cols-3 md:gap-6 w-full']) }}>


    <div class="mt-5 md:mt-0 md:col-span-2 w-full">
        <div class="px-4 py-5 sm:p-6 bg-[#BFEFFB] shadow sm:rounded-lg w-full">
            {{ $content }}
        </div>
    </div>
</div>
