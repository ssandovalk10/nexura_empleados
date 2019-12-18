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
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

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