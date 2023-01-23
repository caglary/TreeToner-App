@extends('treetoner.public')
@section('content')

      
            @if(isset($siparisler))
            <table class="table">
                <thead>
                  <tr>
                   
                    <th scope="col">yazici_model</th>
                    <th scope="col">yazici_seri_no</th>
                    <th scope="col">usb_kablo</th>
                    <th scope="col">power_kablo</th>
                    <th scope="col">ariza</th>
                    <th scope="col">aciklama</th>
                    <th scope="col">sonuc</th>
                    <th scope="col">fiyat</th>        

                  </tr>
                </thead>
                <tbody>
                    @foreach ($siparisler as $siparis)
                    <tr>
                   
                        <td>{{$siparis->yazici_model}}</td>
                        <td>{{$siparis->yazici_seri_no}}</td>
                        <td>{{$siparis->usb_kablo}}</td>
                        <td>{{$siparis->power_kablo}}</td>
                        <td>{{$siparis->ariza}}</td>
                        <td>{{$siparis->aciklama}}</td>
                        <td>{{$siparis->sonuc}}</td>
                        <td>{{$siparis->fiyat}}</td>

                      </tr>
                    @endforeach
                 
                  
                </tbody>
              </table>   
                                  
              @else  
                        
              <div class="alert alert-info" role="alert">
               Herhangi bir sipiriş bulunmamaktadır. Sipariş eklemek için --Sipariş Ekle-- butonuna basınız.
                       
              </div>
             
            
              @endif
    
              <div >   
                <a href="{{route('siparis_create',['musteri_id'=>$musteri_id])}}" class="btn btn-warning">Sipariş Ekle</a>
                
                <a class="btn btn-secondary" href="{{route('musteriler')}}" role="button">Geri</a>
              </div>

@endsection