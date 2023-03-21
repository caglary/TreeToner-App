@extends('layouts.app')
@include('common.icons')

@section('content')
    @include('task._navbar')
    <section class="vh-100">
        <div class="container py-5 h-100">



            @if (isset($tasks))
                <!-- /.card-header -->
                <div class="card-body" style="padding: 2%">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>{{ icon_select('not') }} Not</th>
                                <th>{{ icon_select('tarih') }} Kalan Süre</th>
                                <th>{{ icon_select('islem') }} İşlem</th>

                            </tr>
                        </thead>
                        <tbody>
                            <div>
                                @include('common.alert')
                                
                            </div>
                            @foreach ($tasks as $task)
                                @if ($task->priority_level == 'high')
                                    <tr style="background-color:rgb(229, 208, 208)">
                                    @elseif($task->priority_level == 'medium')
                                    <tr style="background-color:rgb(240, 230, 218)">
                                    @elseif($task->priority_level == 'medium')
                                    <tr style="background-color:darkgray">
                                @endif

                                <td>
                                    <form action="/task.update" method="POST">

                                        @csrf

                                        <input type="text" name="buton" value="guncelle" hidden>

                                        <input type="text" name="id" value={{ $task->id }} hidden>
                                    <div>
                                        <textarea name="writed_task" class="form-control" id="" cols="10" rows="5">{{ $task->writed_task }}</textarea>

                                    </div>
                                    <div>
                                        <div>
                                            <label>{{ icon_select('tarih') }} Yapılması gereken tarih </label>
                                            <input class="small form-control w-auto mb-3" name="last_date"
                                                type="date" value={{$task->last_date}} />
    
                                        </div>
                                       
                                        <div>
                                            <button class="btn btn-sm btn-secondary ml-1 mt-1" type="submit">{{ icon_select('check') }} Güncelle</button>
                                    </div>
                                   
                                       



                                    </form>
                                </td>
                                <td>
                                    @php
                                        $secondDay = new DateTime($task->last_date);
                                        $today = new DateTime(date('Y-m-d'));
                                        $difference = $secondDay->diff($today);
                                        if ($secondDay > $today) {
                                            echo $difference->format('%a gün kaldı');
                                        } elseif ($secondDay < $today) {
                                            echo $difference->format('%a gün geçti');
                                        } elseif ($secondDay = $today) {
                                            echo 'Son gün';
                                        }
                                    @endphp
                                </td>

                                <td>
                                    <form action="/task.update" method="POST">

                                        <li class="list-group-item ps-3 pe-0 py-1 rounded-0 border-0 bg-transparent">
                                            <div class="d-flex flex-row justify-content-end mb-1">
                                                @csrf

                                                <input type="text" name="result" value="completed" hidden>
                                                <input type="text" name="buton" value="tamamlandi" hidden>

                                                <input type="text" name="id" value={{ $task->id }} hidden>

                                                <button class="btn btn-sm btn-success"
                                                    style="margin-left: 3%;margin-right:3%"
                                                    type="submit">{{ icon_select('check') }} Tamamlandı</button>



                                    </form>
                                </td>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            @endif
        </div>

    </section>
@endsection
