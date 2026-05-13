<div class="modal show in" id="forzarCambio" tabindex="-1" role="dialog" aria-labelledby="forzaCambio"
    aria-hidden="true" style="display: block; background-color:rgba(0,0,0,0.5)">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Cambiar contraseña</h5>
                
            </div>
            <form action="{{ route('forzar', Auth::user()->id) }}" method="post">
                <div class="modal-body">
                    <p>Estimado usuario, su contraseña ha sido reseteada por un administrador. Por su seguridad debes crear una nueva.</p>
                    @csrf
                    <div class="md-form">
                        <label>Nueva contraseña</label>
                        <div class="row">
                            <div class="col-md-8">
                                <input class="form-control @error('contrasena') is-invalid @enderror" type="password" id="password" name="contrasena">
                                @error('contrasena')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            
                            <div class="col-md-4">
                                <button class="btn btn-primary " type="button" onclick="mostrarContrasena()"><i id="ver" class="far fa-eye-slash"></i></button>                              
                            </div>
                        </div>
                    </div>
                    <br>
                </div>
                <div class="modal-footer">
                    
                    <button type="submit" class="btn btn-success">Guardar cambios</button>
                </div>
            </form>
        </div>
    </div>
</div>
