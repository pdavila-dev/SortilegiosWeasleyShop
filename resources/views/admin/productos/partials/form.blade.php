@php
    $producto = $producto ?? null;
    $tiposSeleccionados = $tiposSeleccionados ?? old('tipo_productos', []);
@endphp

<div class="form-row">
    <div class="form-group col-md-4">
        <label for="precio_actual">Precio actual</label>
        <input type="number" step="0.01" min="0" name="precio_actual" id="precio_actual"
               class="form-control @error('precio_actual') is-invalid @enderror"
               value="{{ old('precio_actual', optional($producto)->precio_actual) }}" required>
        @error('precio_actual')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group col-md-4">
        <label for="stock_inicial">Stock inicial</label>
        <input type="number" min="0" name="stock_inicial" id="stock_inicial"
               class="form-control @error('stock_inicial') is-invalid @enderror"
               value="{{ old('stock_inicial', optional($producto)->stock_inicial) }}" required>
        @error('stock_inicial')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group col-md-4">
        <label for="stock_actual">Stock actual</label>
        <input type="number" min="0" name="stock_actual" id="stock_actual"
               class="form-control @error('stock_actual') is-invalid @enderror"
               value="{{ old('stock_actual', optional($producto)->stock_actual) }}" required>
        @error('stock_actual')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
</div>

<div class="form-row">
    <div class="form-group col-md-4">
        <label for="stock_notificacion">Stock para notificar</label>
        <input type="number" min="0" name="stock_notificacion" id="stock_notificacion"
               class="form-control @error('stock_notificacion') is-invalid @enderror"
               value="{{ old('stock_notificacion', optional($producto)->stock_notificacion) }}" required>
        @error('stock_notificacion')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group col-md-4">
        <label class="d-block">Oferta</label>
        <div class="custom-control custom-switch">
            <input type="checkbox" class="custom-control-input" id="oferta" name="oferta"
                   value="1" {{ old('oferta', optional($producto)->oferta) ? 'checked' : '' }}>
            <label class="custom-control-label" for="oferta">¿Producto en oferta?</label>
        </div>
        @error('oferta')
            <div class="text-danger small">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group col-md-4">
        <label for="preu_oferta">Precio oferta</label>
        <input type="number" step="0.01" min="0" name="preu_oferta" id="preu_oferta"
               class="form-control @error('preu_oferta') is-invalid @enderror"
               value="{{ old('preu_oferta', optional($producto)->preu_oferta) }}"
               placeholder="Solo si está en oferta">
        @error('preu_oferta')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
</div>

<div class="form-group">
    <label for="descripcion_producto">Descripción</label>
    <textarea name="descripcion_producto" id="descripcion_producto" rows="3"
              class="form-control @error('descripcion_producto') is-invalid @enderror" required>{{ old('descripcion_producto', optional(optional($producto)->descripcion)->descripcion_producto) }}</textarea>
    @error('descripcion_producto')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="form-group">
    <label for="tipo_productos">Tipos asociados</label>
    <select name="tipo_productos[]" id="tipo_productos"
            class="form-control @error('tipo_productos') is-invalid @enderror"
            multiple size="5">
        @foreach ($tipos as $tipo)
            <option value="{{ $tipo->id_tipo_producto }}"
                {{ in_array($tipo->id_tipo_producto, (array) $tiposSeleccionados, true) ? 'selected' : '' }}>
                {{ $tipo->etiqueta }}
            </option>
        @endforeach
    </select>
    <small class="form-text text-muted">Mantén presionada la tecla Ctrl (Cmd en Mac) para seleccionar varios.</small>
    @error('tipo_productos')
        <div class="invalid-feedback d-block">{{ $message }}</div>
    @enderror
</div>

<div class="d-flex justify-content-between">
    <a href="{{ route('admin.productos.index') }}" class="btn btn-outline-secondary">
        Cancelar
    </a>
    <button type="submit" class="btn btn-primary">
        Guardar
    </button>
</div>

