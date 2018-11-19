</div>
  <nav>
    <ul class="pagination justify-content-center">

      <li class="page-item @if($data['pagination']['paginaAtual'] == 1) disabled @endif">
        <a class="page-link" href="">Anterior</a>
      </li>
      
      @if($data['pagination']['paginaAtual'] == 1) 
        @php ($leftNumber = 0)
      @elseif($data['pagination']['paginaAtual'] == 2)
        @php ($leftNumber = 1)
      @else
        @php ($leftNumber = 2)
      @endIf

      @if($data['pagination']['paginaAtual'] == $data['pagination']['totalPaginas']) 
        @php ($rightNumber = 0)
      @elseif($data['pagination']['paginaAtual'] == ($data['pagination']['totalPaginas'] - 1))
        @php ($rightNumber = 1)
      @else
        @php ($rightNumber = 2)
      @endIf

      @for ($i = $data['pagination']['paginaAtual'] - $leftNumber; $i <= $data['pagination']['paginaAtual'] + $rightNumber ; $i++)
        <li class="page-item @if($i == $data['pagination']['paginaAtual']) active @endif">
          <a class="page-link" href="">{{ $i }}</a>
        </li>
      @endfor

      <li class="page-item @if($data['pagination']['paginaAtual'] == $data['pagination']['totalPaginas']) disabled @endif">
        <a class="page-link" href="{{ route('perfil.parlamentar', ['id' => $data['parlamentar']['id'], 'pagina' => ($data['pagination']['paginaAtual'] + 1)]) }}">Próximo</a>
      </li>
    </ul>
  </nav>
</div>