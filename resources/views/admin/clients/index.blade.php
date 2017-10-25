@extends('layouts.admin')

@section('content')

    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Клиенты</h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">

                    <table id="datatable" class="table table-striped table-bordered">
                        <thead>
                        <tr>
                            <th>Имя</th>
                            <th>Пол</th>
                            <th>Возраст</th>
                            <th>Тренер</th>
                            <th>Программа тренировок</th>
                            <th>Программа питания</th>
                        </tr>
                        </thead>

                        <tbody>
                        @foreach($clients as $client)
                            <tr class="table-center">
                                <td>{{$client->profile->name ?? ''}}</td>
                                <td>{{$client->profile->gender ?? ''}}</td>
                                <td>{{$client->profile->age ?? ''}}</td>
                                <td></td>
                                <td class="table-centred">
                                    <a href="" role="button"><i class="fa fa-futbol-o fa-2x"></i></a>
                                </td>
                                <td class="table-centred">
                                    <a href="/admin/clients/{{$client->id}}/food" role="button"><i class="fa fa-glass fa-2x"></i></a>
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
