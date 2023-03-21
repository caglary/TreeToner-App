
<section class="vh-100">
    <div class="container py-5 h-100">
       
      

        @if (isset($tasks))
            <!-- /.card-header -->
            <div class="card-body" style="padding: 2%">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Not</th>
                            <th>Önem</th>
                            <th>İşlem</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($tasks as $task)
                            <tr>
                                <td>
                                    {{ $task->writed_task }}
                                </td>
                                <td>
                                    {{ $task->priority_level }}
                                </td>
                                <td>
                                    <form action="/task.update">

                                        <li class="list-group-item ps-3 pe-0 py-1 rounded-0 border-0 bg-transparent">
                                            <div class="d-flex flex-row justify-content-end mb-1">
                                                @csrf
                                                <select class="select" name="result">
                                                    <option value="not_completed" selected>{{ icon_select('tamamlanmadi') }} Tamamlanmadı</option>
                                                    <option name="completed" value="completed">{{ icon_select('check') }} Tamamla</option>
                                                    <option value="deleted">Sil</option>

                                                </select>
                                                <button class="btn btn-sm btn-success"
                                                    style="margin-left: 3%;margin-right:3%"
                                                    type="submit">{{ icon_select('onayla') }} onayla</button>



                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
        @else
            <div class="alert alert-info" role="alert">
                {{ icon_select('bilgi') }} Herhangi bir not bulunmamaktadır.

            </div>
        @endif
    </div>
  
</section>