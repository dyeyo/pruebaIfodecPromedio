@extends('layouts.app')

@section('content')
<div class="container">

    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                @if (Session::has('message'))
                <div class="alert alert-success">{{ Session::get('message') }}</div>
                @endif
                <div class="card-header" style="display: flex;justify-content: flex-end;">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                        Agregar nota
                    </button>
                </div>
                <ul>
                    @foreach ($errors->all() as $error)
                    <li class="alert alert-warning">{{ $error }}</li>
                    @endforeach
                </ul>
                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">Nombre</th>
                                <th scope="col">Parcial 1</th>
                                <th scope="col">Parcial 2</th>
                                <th scope="col">Parcial 3</th>
                                <th scope="col">Final</th>
                                <th scope="col">Acción</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($students as $item)
                            <tr>
                                <th scope="row">{{$item->full_name}}</th>
                                <td>{{$item->note1}}</td>
                                <td>{{$item->note2}}</td>
                                <td>{{$item->note2}}</td>
                                <td>{{$item->average}}</td>
                                <td>
                                    <form method="POST" id="deleteTipoDoc" action="{{route('eliminar',$item->id)}}">
                                        {{method_field('DELETE')}}
                                        {{csrf_field()}}
                                        <button type="submit" class="btn btn-danger">Eliminar</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Agregar nota de estudiante</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" name="frmAdd" id="frmAdd" action="{{ route('crear') }}">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label for="nombre">Nombre completo</label>
                        <input type="text" class="form-control" id="nombre" value="{{old('full_name')}}"
                            name="full_name" aria-describedby="nombre" placeholder="Nombre completo">

                    </div>
                    <div class="form-group">
                        <label for="note1">Parcial 1</label>
                        <input type="text" class="form-control" id="note1" value="{{old('note1')}}" name="note1"
                            placeholder="Parcial 1">
                    </div>
                    <div class="form-group">
                        <label for="note2">Parcial 2</label>
                        <input type="text" class="form-control" id="note2" value="{{old('note2')}}" name="note2"
                            placeholder="Parcial 2">
                    </div>
                    <div class="form-group">
                        <label for="note3">Parcial 3</label>
                        <input type="text" class="form-control" id="note3" value="{{old('note3')}}" name="note3"
                            placeholder="Parcial 3">
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn btn-primary">Guardar cambios</button>
            </div>
            </form>
        </div>
    </div>
</div>
@endsection