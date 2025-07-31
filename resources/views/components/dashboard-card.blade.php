{{-- resources/views/components/dashboard-card.blade.php --}}
@props(['label', 'value'])

<div class="bg-gray-900 bg-opacity-70 rounded-xl p-6 shadow-lg flex-1 min-w-[220px] border border-blue-800">
    <div class="text-gray-400 text-xs mb-1">{{ $label }}</div>
    <div class="text-lg font-semibold text-white">{{ $value }}</div>
</div>
