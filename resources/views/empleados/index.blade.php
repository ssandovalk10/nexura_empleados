@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                  <div class="row">
                    
                    <div class="col">
                      Lista de Empleados
                    </div>

                    <div class="col-6">
                    </div>


                    <div class="col">
                      <a href="{{route('empleados.create')}}" class="btn btn-md btn-primary">Crear</a>
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
                           <table class="table table-striped">
                               <thead>
                                    <tr>
                                      <th scope="col">Nombre</th>
                                      <th scope="col">Email</th>
                                      <th scope="col">Sexo</th>
                                      <th scope="col">Area</th>
                                      <th scope="col">Boletin</th>
                                      <th scope="col">Modificar</th>
                                      <th scope="col">Eliminar</th>
                                    </tr>
                                  </thead>

                                  <tbody>

                                    @foreach($empleados as $empleado)
                                    <tr>
                                        <td>{{ $empleado->nombre}}</td>
                                        <td>{{ $empleado->email}}</td>
                                        <td>

                                         @if( $empleado->sexo == 'm' )
                                              Masculino
                                            @elseif( $empleado->sexo == 'f')
                                              Femenino
                                          @endif

                                        </td>
                                        <td>{{ $empleado->area->nombre}}</td>
                                        <td>
                                          @if( $empleado->boletin == 1 )
                                                Si
                                            @else
                                              No
                                          @endif
                                        </td>
                                        <td><a href="{{route('empleados.edit', $empleado->id)}}" class="btn btn-md btn-primary"><i class="fa fa-edit"></i></a></td>
                                        <td>
                                           {{  Form::open(['route' => ['empleados.destroy', $empleado->id ], 'method' => 'DELETE']) }} 
                                                <button type="submit" class="btn btn-md btn-danger">
                                                  <i class="fa fa-trash"></i>

                                                </button>


                                          {{ Form::close() }}
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
    </div>
</div>
@endsection