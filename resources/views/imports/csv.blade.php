@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">


      <div class="col-md-12">
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


        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                  <div class="row">
                    
                    <div class="col-6">
                     Subir Archivo CSV
                    </div>

                    <div class="col-3"></div>

                    <div class="col-3">
                      <a href="{{url('imports')}}" class="btn btn-md btn-info">Cancelar</a>
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
                            
                            <div class="box">
                            
                              <form action="{{url('upload')}}" method="post" enctype="multipart/form-data">
                                

                            {{ csrf_field() }}

                              <input type="hidden" name="_token" value="{{csrf_token()}}">

                            
                                <div class="row">
                                  <div class="col-md-6">
                                    <input type="file" name="file" required> 
                                  </div>

                                  <div class="col-md-6">
                                    <button type="submit" class="btn btn-primary btn-md"><i class="fa fa-upload"></i> Cargar</button>
                                  </div>
                                </div>
                                
                            {{ Form::close()}}
                            </div>
                       </div>
                   </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection