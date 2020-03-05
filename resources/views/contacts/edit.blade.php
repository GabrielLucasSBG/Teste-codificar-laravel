@extends('base') 
@section('main')
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<div class="row">
    <div class="col-sm-8 offset-sm-2">
        <h1 class="display-3">Atualizar Orçamento</h1>

        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        <br /> 
        @endif
        <form method="post" action="{{ route('contacts.update', $contact->id) }}">
            @method('PATCH') 
            @csrf
            <div class="form-group">

                <label for="cliente">Cliente:</label>
                <input type="text" class="form-control" name="cliente" value={{ $contact->cliente }} />
            </div>

            <div class="form-group">
                <label for="vendedor">Vendedor:</label>
                <input type="text" class="form-control" name="vendedor" value={{ $contact->vendedor }} />
            </div>

            <div class="form-group">
                <label for="descricao">Descrição:</label>
                <input type="text" class="form-control" name="descricao" value={{ $contact->descricao }} />
            </div>
            <div class="form-group">
                <label for="valororcado">Valor orçado:</label>
                <input type="float" class="form-control" name="valororcado" value={{ $contact->valororcado }} />
            </div>
            <div class="form-group">
                <label for="datahora">Data:</label>
                <input type="datetime-local" class="form-control" name="datahora" value={{ $contact->datahora }} />
            </div>
            
            <button type="submit" class="btn btn-primary">Atualizar</button>
        </form>
    </div>
</div>
@endsection