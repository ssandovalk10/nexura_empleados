 @if(session('info'))
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                     <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>

                        {{ session('info')}}

                    </div>
               
            </div>
        </div>
    </div>
@endif
