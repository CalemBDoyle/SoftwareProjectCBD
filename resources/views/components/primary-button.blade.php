<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center px-4 py-2 bg-[#0277BD] border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-[#01579B] focus:bg-[#01579B] active:bg-[#01579B] focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>

