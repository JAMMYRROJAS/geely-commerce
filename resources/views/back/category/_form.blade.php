<div class="form-group" >
    <div id="icon_div">
        <label for="name">Nombre</label>
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon3"><i class="fa fa-info-circle"></i></span>
            </div>
            <input id="name" type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Nombre de la categoría" required>

            @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
</div>

<div class="form-group" >
    <div id="icon_div">
        <label for="description">Descripción (opcional)</label>
        <textarea name="description" id="description" rows="3" class="form-control"></textarea>

        @error('description')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>