<div>
    @if ($agent->verified)
        <span class="inline-block rounded-full text-white bg-green-500 px-2 py-1 text-xs font-bold">
            Vérifié
        </span>
    @else
        <span class="inline-block rounded-full text-white bg-red-500 px-2 py-1 text-xs font-bold">
            Non Vérifié
        </span>
    @endif
</div>
