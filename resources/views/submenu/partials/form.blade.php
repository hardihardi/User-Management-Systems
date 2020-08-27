<div class="form-group">
  <label for="menu">Menu</label>
  <select name="menu" id="menu" class="form-control">
    @foreach ($menu as $item)
      <option value="{{ $item->id }}"{{ $item->id == $submenu->menu_id ? "selected" : '' }}>{{ $item->menu }}</option>
    @endforeach
  </select>
  @error('menu')
    <div class="text-danger small">
      {{ $message }}
    </div>
  @enderror
</div>

<div class="form-group">
  <label for="judul">Submenu</label>
  <input type="text" name="judul" id="judul" class="form-control" value="{{ old('judul', $submenu->judul) }}" placeholder="Submenu..">
  @error('judul')
    <div class="text-danger small">
      {{ $message }}
    </div>
  @enderror
</div>

<div class="form-group">
  <label for="url">URL</label>
  <input type="text" name="url" id="url" value="{{ old('url', $submenu->url) }}" class="form-control" placeholder="Masukkan url..">
  @error('url')
    <div class="text-danger small">
      {{ $message }}
    </div>
  @enderror
</div>

<div class="form-group">
  <label for="icon">Ikon</label>
  <input type="text" name="icon" id="icon" value="{{ old('icon', $submenu->icon) }}" class="form-control" placeholder="Misal: fas fa-home">
  @error('icon')
    <div class="text-danger small">
      {{ $message }}
    </div>
  @enderror
</div>

<div class="form-group">
  <div class="form-check form-check-inline">
    <input class="form-check-input" type="radio" name="is_active" id="is_active" value="1"{{ $submenu->is_active == '1' ? 'checked' : '' }}>
    <label class="form-check-label" for="is_active">Aktif</label>
  </div>
  <div class="form-check form-check-inline">
    <input class="form-check-input" type="radio" name="is_active" id="is_active0" value="0"{{ $submenu->is_active == '0' ? 'checked' : '' }}>
    <label class="form-check-label" for="is_active0">Tidak Aktif</label>
  </div>
</div>

<div class="form-group d-flex align-content-center justify-content-center">
  <button type="submit" class="btn btn-lg w-25 btn-primary">Submit</button>
  <button type="reset" class="btn btn-lg w-25 ml-2 btn-danger">Reset</button>
</div>