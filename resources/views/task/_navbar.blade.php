
{{-- navbar --}}

   

    <ul class="nav ">
           
        <li class="nav-item" style="margin:3px;">
            <a class="btn btn-sm btn-outline-secondary"  href="/task/add_task">{{ icon_select('ekle') }} Not Ekle</a>
        </li>
        
        <li class="nav-item" style="margin:3px;">
            <a class="btn btn-sm btn-outline-info"  href="/task/not_completed">{{ icon_select('not') }} Notlar</a>
        </li>
        <li class="nav-item" style="margin:3px;">
            <a class="btn btn-sm btn-outline-success"  href="/task/completed">{{ icon_select('check') }} Tamamlananlar</a>
        </li>
        <li class="nav-item" style="margin:3px;">
            <a class="btn btn-sm btn-outline-dark"  href="/task/deleted">{{ icon_select('cop-kutusu') }} Çöp Kutusu</a>
        </li>
        <li class="nav-item" style="margin:3px;">
            <a class="btn btn-sm btn-outline-danger"  href="/task.last_day"> <strong>{{ icon_select('gunu-gelenler') }} Günü Gelenler</strong></a>
        </li>
        
    </ul>
   

       


{{-- End navbar --}}