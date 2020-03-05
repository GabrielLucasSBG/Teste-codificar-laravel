@extends('base')

@section('main')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<div class="row">
<div class="col-sm-12">
    <h1 class="display-3">Orçamentos</h1>
    <div>
    <a style="margin: 19px;" href="{{ route('contacts.create')}}" class="btn btn-primary">Novo Orçamento</a>
    </div>
    <div class="col-sm-6">
        <div class="input-group mb-2 mr-sm-2">
            <div class="input-group-prepend">
                <div class="input-group-text"><i class="fa fa-search"></i></div>
            </div>
            <input type="text" class="form-control" id="busca" placeholder="Buscar">
        </div>
    </div>
  <table class="table table-striped">
    <thead>
        <tr>
          <th>ID</th>
          <th>Cliente</th>
          <th>Vendedor</th>
          <th>Descrição</th>
          <th>Valor orçado</th>
          <th>Data</th>
          <th colspan = 2>Ações</th>
        </tr>
    </thead>
    <tbody>
        @foreach($contacts as $contact)
        <tr>
            <td>{{$contact->id}}</td>
            <td>{{$contact->cliente}}</td>
            <td>{{$contact->vendedor}}</td>
            <td>{{$contact->descricao}}</td>
            <td>{{$contact->valororcado}}</td>
            <td>{{$contact->datahora}}</td>
            <td>
                <a href="{{ route('contacts.edit',$contact->id)}}" class="btn btn-primary">Editar</a>
            </td>
            <td>
                <form action="{{ route('contacts.destroy', $contact->id)}}" method="post">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-danger" type="submit">Deletar</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
  </table>
<div>
</div>

<div class="col-sm-12">

  @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}
    </div>
  @endif
</div>
<script>
  $('#busca').keyup(function() {
    var nomeFiltro = $(this).val().toLowerCase();
    $('table tbody').find('tr').each(function() {
        var conteudoCelula = $(this).find('td').text();
        var corresponde = conteudoCelula.toLowerCase().indexOf(nomeFiltro) >= 0;
        $(this).css('display', corresponde ? '' : 'none');
    });
});
</script>

@endsection
