@extends('layouts.admin')

@section('content')

    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Тренеры</h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">

                    <table id="datatable" class="table table-striped table-bordered">
                        <thead>
                        <tr>
                            <th>Имя</th>
                            <th>Е-майл</th>
                            <th>Изменить пароль</th>
                            <th>Удалить</th>
                        </tr>
                        </thead>

                        <tbody>
                        @foreach($coaches as $coach)
                            <tr>
                                <td>{{$coach->name}}</td>
                                <td>{{$coach->email}}</td>
                                <td class="table-centred">
                                    <a href="coaches/{{$coach->id}}/password-form" role="button"><i class="fa fa-pencil fa-2x"></i></a>
                                </td>
                                <td class="table-centred">
                                    {{--<a href="coaches/{{$coach->id}}" class="btn btn-danger btn-xs" onclick="event.preventDefault();
                                                     document.getElementById('delete-form').submit();">
                                        <i class="fa fa-trash-o"></i> Delete
                                    </a>
                                    <form id="delete-form" action="coaches/{{$coach->id}}" method="POST" style="display: none;">
                                        <input type="text" placeholder="{{$coach->id}}">
                                        {{ csrf_field() }}
                                        <input type="hidden" name="_method" value="DELETE" />
                                    </form>--}}
                                    <form action="coaches/{{ $coach->id }}" method="POST">
                                        {{ csrf_field() }}
                                        <input type="hidden" name="_method" value="DELETE" />
                                        <button type="submit" class="btn-delete"><i class="fa fa-close fa-2x"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection
