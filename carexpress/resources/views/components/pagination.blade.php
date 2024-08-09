@if ($varmodele->onFirstPage())
    <button class="pre" disabled>
        << </button>
        @else
            <a href="{{ $varmodele->previousPageUrl() }}"><button class="pre">
                    << </button></a>
@endif

@if ($varmodele->hasMorePages())
    <a href="{{ $varmodele->nextPageUrl() }}"><button class="post"> >> </button></a>
@else

    <button class="post" disabled>>></button>
@endif
