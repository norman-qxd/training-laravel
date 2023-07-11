@props(['$trigger'])

<div x-data="{show: false}" @click.away="show = false">
{{--    Trigger--}}
    <div @click="show = !show">
        {{$trigger}}
    </div>
{{--    Dropdown links--}}
    <div x-show="show" class="overflow-auto max-h-52 z-50 py-2 absolute bg-gray-100  mt-2 rounded-xd w-full" style="display: none">
        {{$slot}}
    </div>
</div>
