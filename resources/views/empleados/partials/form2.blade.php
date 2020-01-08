
                                                           
        <div class="form-group row">

          <label for="nombre" class="col-md-3">Nombre completo *</label>
            <div class="col-md-7">
                  
                  {{ Form::text('nombre', null, ['class' => 'form-control', 'id' => 'nombre', 'placeholder' => 'Nombre completo', 'required'=>'required']) }}
            </div>
        </div>
        
        <div class="form-group row ">

          <label for="email" class="col-md-3">Correo electrónico *</label>
            <div class="col-md-7">
              {{ Form::email('email', null, ['class' => 'form-control', 'id' => 'email', 'placeholder' => 'Correo electrónico', 'required'=>'required']) }}
            </div>
        </div>
        
        <div class="form-group row">
          
           <label for="sexo" class="col-md-3">Sexo *</label>
            
             <div class="col-md-7">
              <div class="form-check">
                 
                   {{ Form::radio('sexo', 'm') }}
                  <label class="form-check-label" for="sexo">
                    Masculino
                  </label>
              </div>
              
              <div class="form-check">
                
                  {{ Form::radio('sexo', 'f') }}
                  <label class="form-check-label" for="sexo">
                    Femenino
                  </label>
              </div>
              
             
            </div>
        </div>

        <div class="form-group row">
            <label for="area" class="col-md-3"> Area*</label>
              
              <div class="col-md-7">
                  {!! Form::select('area_id',
               [ null => '--Seleccione ---']+ $areas,
                null, 
                ['class' => 'form-control', 'required' => 'required']) !!}
              </div>
        </div>


        <div class="form-group row">

          <label for="description" class="col-md-3">Descripcion *</label>
            <div class="col-md-7">
           
               {{ Form::textarea('description', null, ['class' => 'form-control', 'id' => 'description', 'placeholder' => 'Descripcion de la experincia del empleado', 'required'=>'required']) }}
            </div>
        </div>
        
        <div class="form-group row">
              
            <div class="col-md-3">
              
            </div>

            <div class="col-md-7">
         
                {{ Form::checkbox('boletin', '1') }}
                
                 <label class="form-check-label" for="boletin">Deseo recibir boletin informativo</label>
                
            </div>
              

        </div>

         <div class="form-group form-check">

          <label for="role" class="col-md-3">Roles *</label>  
            <div class="col-md-7">
               <div class="form-check">
                
                @foreach($roles as $rol)
                 
               
                  <?php $checked = ""; 
                      
                    if(in_array($rol->id, $roles_empleado))
                    {
                      $checked = "checked"; 
                    }

                    ?>
                   <div class="form-check">

                    <input type="checkbox" class="form-check-input" id="rol" value="{{$rol->id}}" name="role[]" <?php echo $checked ?>>
               
                    <label class="form-check-label" for="exampleCheck1">{{$rol->nombre}}</label>
                   </div>
                                         
                @endforeach
                 </div>
                         
                       

                     <hr>
              
                    @error('role')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
             
            </div>         
        </div>

          
        
        <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Actualizar</button>


    </form>