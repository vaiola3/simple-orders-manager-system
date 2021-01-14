<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">{{ $args['title'] ?? '' }}</h1>
    <div class="btn-toolbar mb-2 mb-md-0">

        @if ($args['tools']['show'] ?? false)
        <div class="btn-group mr-2">

            @foreach ($args['tools']['tool'] as $tool)
            <a 
                href="{{ $tool['link'] ?? ''}}"
                class="btn btn-sm shadow-none {{ $tool['tone'] }}">
                {{ $tool['name'] ?? ''}}
            </a>
            @endforeach

            {{-- <button type="button" class="btn btn-sm btn-outline-secondary">Share</button> --}}
            {{-- <button type="button" class="btn btn-sm btn-outline-secondary">Export</button> --}}
        </div>
        {{-- <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle">
            <span data-feather="calendar"></span>
            This week
        </button> --}}
        @endif

    </div>
</div>