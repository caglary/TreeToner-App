<select class="custom-select">
    <option value="" selected>All Companies</option>
    @foreach ($companies as $name)
        <option value=""> {{$name}}</option>
    @endforeach
  </select>