<li {{ $attributes->merge(['class' => 'flex items-center shadow-md rounded p-2 gap-2 min-h-24']) }}>
    <div class="flex flex-col h-full w-full ">
        <h3 class="text-lg font-semibold text-gray-700 mt-5">{{ $title }}</h3>
        <p class="text-gray-500 text-end mt-auto"><i class="fa-solid fa-peso-sign"></i>{{ $amount }}</p>
    </div>
</li>