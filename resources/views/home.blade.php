@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Crear Publicacion</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="row">
                        <div class="col-md-1">
                            <img style="height: 50px; margin-right: 10px;" src="{{ asset('images/unnamed.png') }}" alt="">
                        </div>
                        <div class="col-md-10">
                            <form id="FormPublicar" enctype="multipart/form-data" action="">
                                {{ csrf_field() }}
                                <div class="row">
                                    <div class="col-md-12">
                                        <input type="hidden" name="idPost" id="idPost" value="">
                                        <input type="hidden" name="iduser" id="iduser" value="{{Auth::user()->id}}">
                                        <input id="comentario" type="text" class="form-control" name="comentario" value=""  autofocus placeholder="¿Que estás pensando, {{ Auth::user()->name }}?">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-5" style="margin-top: 5px;">
                                        <input id="Foto" type="file"  name="Foto"  value=""  autofocus >
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <button type="button" style="margin-top: 5px;" onclick="publicar()" class="btn btn-primary btn-sm btn-block">Publicar</button> 
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card" style="margin-top: 10px;">
                <div class="card-body">
                    <!---->
                    @foreach ($reversed as $item)
                        <div class="row">
                            <div class="col-md-1">
                                <img style="height: 50px; margin-right: 10px;" src="{{ asset('images/images.jpg') }}" alt="">
                            </div>
                            <div class="col-md-10">
                                <h5>{{$item->nomUser}}</h5><h6>{{$item->fecha}}</h6>
                            </div>
                        </div>
                        <div class="row">
                            <div class="card-body" style="padding-top: 0px;">
                                <h5>{{$item->comentario}}</h5>
                                <img style="height: 500px; width: 500px;" src="{{ asset($item->foto) }}" alt="">
                            </div>
                        </div>
                        <hr>
                    @endforeach
                    
                    <!---->
                    <!--<div class="row">
                        <div class="col-md-1">
                            <img style="height: 50px; margin-right: 10px;" src="{{ asset('images/images.jpg') }}" alt="">
                        </div>
                        <div class="col-md-10">
                            <h5>YulY Sanchez</h5><h6>17 min</h6>
                            <div class="card-body" style="padding-top: 0px;">
                                <img style="height: 500px;" src="{{ asset('images/pos.jpg') }}" alt="">
                            </div>
                        </div>
                    </div>-->
                </div>
                
            </div>
        </div>
    </div>
</div>
@endsection



