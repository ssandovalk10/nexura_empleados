@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                  <div class="row">
                    
                    <div class="col">
                     Migraciones
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
                            
                            <div class="row">
                              <div class="col-sm-6">
                                <div class="card">
                                  <div class="card-body">
                                    <h5 class="card-title">Importar CSV</h5>
                                    <p class="card-text">Importar archivo solo en formato CSV</p>
                                    <a href="{{url('import/csv')}}" class="btn btn-primary">Continuar</a>
                                  </div>
                                </div>
                              </div>
                              <div class="col-sm-6">
                                <div class="card">
                                  <div class="card-body">
                                    <h5 class="card-title">Importar Lista Negra</h5>
                                    <p class="card-text">Importar lista negra en formato CSV</p>
                                    <a href="{{url('import/blacklist')}}" class="btn btn-primary">Continuar</a>
                                  </div>
                                </div>
                              </div>
                            </div>
                           
                       </div>
                   </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection