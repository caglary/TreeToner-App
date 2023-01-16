<div class="center">
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
      <div class="container-fluid">
        
        <div class="collapse navbar-collapse" id="navbarSupportedContent">               
            <form class="d-flex" role="search">
              <input class="form-control me-2" type="search" placeholder="Ara" aria-label="Search">
              <button class="btn btn-outline-success" type="submit">Ara</button>
            </form>
        </div>
      </div>
    </nav>

  
  <table class="table" >
    <thead>
      <tr>
        <th scope="col">Kurum Adı</th>
        <th scope="col">Adı Soyadı</th>
        <th scope="col">Telefon-1</th>
        <th scope="col">Telefon-2</th>
        <th scope="col">   <a href="{{ route('musteri_add_get')}}" class="btn btn-outline-secondary">musteri ekle</a> </th>
        
        
      </tr>
    </thead>
    <tbody>
  
      @foreach ($musteries as $musteri)
      @csrf
          <tr >
           
            <td>{{$musteri->kurum_adi}}</td>
            <td>{{$musteri->adi_soyadi}}</td>
            <td>{{$musteri->telefon_1}}</td>
            <td>{{$musteri->telefon_2}}</td>    
            

            <td width="150">
                <a href="{{route('musteri_show',$musteri->id)}}" class="btn btn-sm btn-circle btn-outline-info" title="Show"><i class="fa fa-eye"></i></a>
                              
            </td>
          </tr>
      @endforeach
        
      
    </tbody>
  </table> 
</div>

