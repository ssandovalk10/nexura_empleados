@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                  <div class="row">
                    
                    <div class="col">
                      Los campos con asteriscos (*) son obligatorios
                    </div>

                    <div class="col">
                    </div>


                    <div class="col">
                      <a href="{{route('empleados.index')}}" class="btn btn-md btn-info">Cancelar</a>
                    </div>

                </div>
              </div>

                <div class="card-body">
                  <div class="row">
                        @foreach ($errors->all() as $error)
                          <div class="container">
                            <div class="row">
                                <div class="col-md-8 col-md-offset-2">
                                    
                                        <div class="alert alert-danger alert-dismissible" role="alert">
                                         <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span></button>

                                           {{ $error }}

                                        </div>
                                   
                                </div>
                            </div>
                        </div>
                      @endforeach
                  </div>

                   <div class="row">
                       <div class="col-md-12">
                           
                           {{ Form::model($empleado,  ['route'=>['empleados.update', $empleado->id ], 'method'=>'PUT', 'files'=>true ])}}
               


                              @include('empleados.partials.form')


                          {!! Form::close() !!}
                       </div>
                   </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection