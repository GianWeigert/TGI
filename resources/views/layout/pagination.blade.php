</div>
  <nav>
    <ul class="pagination justify-content-center">

      <li class="page-item @if($pagination['paginaAtual'] == 1) disabled @endif">
        <a class="page-link" href="{{ Request::fullUrlWithQuery(['pagina' => 1]) }}">Primeira</a>
      </li>

      @if($pagination['paginaAtual'] == 1)
        @php ($leftNumber = 0)
      @elseif($pagination['paginaAtual'] == 2)
        @php ($leftNumber = 1)
      @else
        @php ($leftNumber = 2)
      @endIf

      @if($pagination['paginaAtual'] == $pagination['totalPaginas'])
        @php ($rightNumber = 0)
      @elseif($pagination['paginaAtual'] == ($pagination['totalPaginas'] - 1))
        @php ($rightNumber = 1)
      @else
        @php ($rightNumber = 2)
      @endIf

      @for ($i = $pagination['paginaAtual'] - $leftNumber; $i <= $pagination['paginaAtual'] + $rightNumber ; $i++)
        <li class="page-item @if($i == $pagination['paginaAtual']) active @endif">
          <a class="page-link" href="{{ Request::fullUrlWithQuery(['pagina' => $i]) }}">{{ $i }}</a>
        </li>
      @endfor

      <li class="page-item @if($pagination['paginaAtual'] == $pagination['totalPaginas']) disabled @endif">
        <a class="page-link" href="{{ Request::fullUrlWithQuery(['pagina' => ($pagination['totalPaginas'])]) }}">Ultima</a>
      </li>
    </ul>
  </nav>
</div>