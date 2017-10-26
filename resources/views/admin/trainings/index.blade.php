@extends('layouts.admin')

@section('content')

    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Программа тренировок</h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">

                    <table id="datatable" class="table table-striped table-bordered">
                        <thead>
                        <tr>
                            <th>День недели</th>
                            <th>Редактировать</th>
                        </tr>
                        </thead>

                        <tbody>

                        <tr>
                            <td>Понедельник</td>
                            <td class="table-centred">
                                @php
                                    $editUrl = route('edit.trainings', ['clientId' => $clientId, 'day' => 'monday'])
                                @endphp
                                <a href="{{$editUrl}}" role="button"><i class="fa fa-wrench fa-2x"></i></a>
                            </td>
                        </tr>
                        <tr>
                            <td>Вторник</td>
                            <td class="table-centred">
                                @php
                                    $editUrl = route('edit.trainings', ['clientId' => $clientId, 'day' => 'tuesday'])
                                @endphp
                                <a href="{{$editUrl}}" role="button"><i class="fa fa-wrench fa-2x"></i></a>
                            </td>
                        </tr>
                        <tr>
                            <td>Среда</td>
                            <td class="table-centred">
                                @php
                                    $editUrl = route('edit.trainings', ['clientId' => $clientId, 'day' => 'wednesday'])
                                @endphp
                                <a href="{{$editUrl}}" role="button"><i class="fa fa-wrench fa-2x"></i></a>
                            </td>
                        </tr>
                        <tr>
                            <td>Четверг</td>
                            <td class="table-centred">
                                @php
                                    $editUrl = route('edit.trainings', ['clientId' => $clientId, 'day' => 'thursday'])
                                @endphp
                                <a href="{{$editUrl}}" role="button"><i class="fa fa-wrench fa-2x"></i></a>
                            </td>
                        </tr>
                        <tr>
                            <td>Пятница</td>
                            <td class="table-centred">
                                @php
                                    $editUrl = route('edit.trainings', ['clientId' => $clientId, 'day' => 'friday'])
                                @endphp
                                <a href="{{$editUrl}}" role="button"><i class="fa fa-wrench fa-2x"></i></a>
                            </td>
                        </tr>
                        <tr>
                            <td>Субота</td>
                            <td class="table-centred">
                                @php
                                    $editUrl = route('edit.trainings', ['clientId' => $clientId, 'day' => 'saturday'])
                                @endphp
                                <a href="{{$editUrl}}" role="button"><i class="fa fa-wrench fa-2x"></i></a>
                            </td>
                        </tr>
                        <tr>
                            <td>Воскресенье</td>
                            <td class="table-centred">
                                @php
                                    $editUrl = route('edit.trainings', ['clientId' => $clientId, 'day' => 'sunday'])
                                @endphp
                                <a href="{{$editUrl}}" role="button"><i class="fa fa-wrench fa-2x"></i></a>
                            </td>
                        </tr>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection
