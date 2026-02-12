@if ($paginator->hasPages())
<nav>
  <ul class="pagination">
    {{-- 前へ --}}
    @if ($paginator->onFirstPage())
      <li><span>&laquo;</span></li>
    @else
      <li><a href="{{ $paginator->previousPageUrl() }}">&laquo;</a></li>
    @endif

    {{-- ページ番号 --}}
    @foreach ($elements as $element)
      @if (is_string($element))
        <li><span>{{ $element }}</span></li>
      @endif
      @if (is_array($element))
        @foreach ($element as $page => $url)
          @if ($page == $paginator->currentPage())
            <li class="active"><span>{{ $page }}</span></li>
          @else
            <li><a href="{{ $url }}">{{ $page }}</a></li>
          @endif
        @endforeach
      @endif
    @endforeach

    {{-- 次へ --}}
    @if ($paginator->hasMorePages())
      <li><a href="{{ $paginator->nextPageUrl() }}">&raquo;</a></li>
    @else
      <li><span>&raquo;</span></li>
    @endif
  </ul>
</nav>
@endif