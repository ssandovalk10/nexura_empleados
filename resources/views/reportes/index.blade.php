@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                  <div class="row">
                    
                    <div class="col">
                     Reportes
                    </div>

                    <div class="col-6">
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
                          <h3>Listado de elementos en lista negra</h3>

                           <table class="table table-striped">
                              <thead>
                                <tr>
                                  <th>No</th>
                                  <th>Nombre completo</th>
                                  <th>Teléfono</th>

                                </tr>
                              </thead>

                              <tbody>
                              @foreach($blacklist as $value)
                                  <tr>
                                    <td>{{$value->id}}</td>
                                    <td>{{$value->fullname}}</td>
                                    <td>{{$value->phone}}
                                  </tr>
                              @endforeach
                              </tbody>

                           </table>
                           
                       </div>
                   </div>


                  <!--     -->

                  <div class="row">
                    <div class="col-md-12">
                      <h3>Listado de teléfonos que no pasaron validación</h3>
                         <table class="table table-striped">
                              <thead>
                                <tr>
                                  <th>No</th>                                 
                                  <th>Teléfono</th>

                                </tr>
                              </thead>

                              <tbody>
                              @foreach($validation as $value)
                                  <tr>
                                    <td>{{$value->id}}</td>           
                                    <td>{{$value->phone}}
                                  </tr>
                              @endforeach
                              </tbody>

                           </table>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-3">
                      <a href="{{url('export/csv')}}" class="btn btn-md btn-success"><i class="fa fa-download"></i> Descargar CSV</a>


                    </div>

                    <div class="col-md-3">

                      {!!Form::open(['url'=> ['limpiar'], 'method' => 'GET']) !!}
                          <td>
                          
                          <button onClick="return confirm('Esta seguro que desea continuar ?')" class="btn-danger btn">
                          <i class="fa fa-trash"></i> Limpiar Registros </button>

                      {!!Form::close()!!}


                     
                    </div>
                  </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection