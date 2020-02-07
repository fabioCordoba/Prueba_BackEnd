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
                            <input id="comentario" type="text" class="form-control" name="comentario" value=""  autofocus placeholder="¿Que estás pensando, {{ Auth::user()->name }}?">
                            <div class="row">
                                <div class="col-md-2" style="margin-top: 5px;">
                                    <button type="button" class="btn btn-primary btn-sm">Foto</button>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <button type="button" style="margin-top: 5px;" class="btn btn-primary btn-sm btn-block">Publicar</button> 
                                </div>

                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
            <div class="card" style="margin-top: 10px;">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-1">
                            <img style="height: 50px; margin-right: 10px;" src="{{ asset('images/images.jpg') }}" alt="">
                        </div>
                        <div class="col-md-10">
                            <h5>Sofia Ramos</h5><h6>17 min</h6>
                            <div class="card-body" style="padding-top: 0px;">
                                <img style="height: 500px;" src="{{ asset('images/pos.jpg') }}" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-1">
                            <img style="height: 50px; margin-right: 10px;" src="{{ asset('images/images.jpg') }}" alt="">
                        </div>
                        <div class="col-md-10">
                            <h5>YulY Sanchez</h5><h6>17 min</h6>
                            <div class="card-body" style="padding-top: 0px;">
                                <img style="height: 500px;" src="{{ asset('images/pos.jpg') }}" alt="">
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
</div>
@endsection
