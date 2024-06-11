@props(['disabled' => false])

<div class="">
    <input
        type="text"
    {{ $disabled? 'disabled' : '' }}
    {!! $attributes->merge([
        'class' => 'w-full', // Combina las clases de Tailwind para el estilo y efectos de foco
    ])!!}
    />
</div>
