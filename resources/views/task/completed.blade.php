@extends('layouts.app')
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
                                <th>Not</th>

                                <th>İşlem</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($tasks as $task)
                                @if ($task->priority_level == 'high')
                                    <tr style="background-color:rgb(229, 208, 208)">
                                    @elseif($task->priority_level == 'medium')
                                    <tr style="background-color:rgb(240, 230, 218)">
                                    @elseif($task->priority_level == 'medium')
                                    <tr style="background-color:darkgray">
                                @endif
                                <td>
                                    {{ $task->writed_task }}
                                </td>

                                <td>
                                    <form action="/task.update" method="POST">

                                        <li class="list-group-item ps-3 pe-0 py-1 rounded-0 border-0 bg-transparent">
                                            <div class="d-flex flex-row justify-content-end mb-1">
                                                @csrf

                                                <input type="text" name="result" value="deleted" hidden>
                                                <input type="text" name="id" value={{ $task->id }} hidden>

                                                <button class="btn btn-sm btn-warning"
                                                    style="margin-left: 3%;margin-right:3%" type="submit">Çöp Kutusuna
                                                    Taşı</button>



                                    </form>
                                </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            @endif
        </div>

    </section>
@endsection
