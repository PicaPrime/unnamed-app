{{-- resources/views/components/button-link.blade.php --}}
@props(['href', 'class' => ''])

<a href="{{ $href }}"
   class="inline-block px-6 py-3 rounded-lg font-bold shadow-lg text-white transition bg-gradient-to-r {{ $class }}">
    {{ $slot }}
</a>
