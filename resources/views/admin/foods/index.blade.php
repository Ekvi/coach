@extends('layouts.admin')

@section('content')

    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Программа питания</h2>
                    <div class="clearfix"></div>

                    {{--<a href="{{route('foods.create')}}" class="btn btn-primary">Добавить питание</a>--}}
                </div>
                <div class="x_content">

                    <table id="datatable" class="table table-striped table-bordered">
                        <thead>
                        <tr>
                            <th>День недели</th>
                            <th>Описание</th>
                            <th>Редактировать</th>
                        </tr>
                        </thead>

                        <tbody>

                        <tr>
                            <td>Понедельник</td>
                            <td>{{!empty($foods['monday']) ? $foods['monday']['content'] : ''}}</td>
                            <td class="table-centred">
                                @php
                                    $editUrl = route('edit.food', ['clientId' => $clientId, 'day' => 'monday'])
                                @endphp
                                <a href="{{$editUrl}}" role="button"><i class="fa fa-wrench fa-2x"></i></a>
                            </td>
                        </tr>
                        <tr>
                            <td>Вторник</td>
                            <td>{{!empty($foods['tuesday']) ? $foods['tuesday']['content'] : ''}}</td>
                            <td class="table-centred">
                                @php
                                    $editUrl = route('edit.food', ['clientId' => $clientId, 'day' => 'tuesday'])
                                @endphp
                                <a href="{{$editUrl}}" role="button"><i class="fa fa-wrench fa-2x"></i></a>
                            </td>
                        </tr>
                        <tr>
                            <td>Среда</td>
                            <td>{{!empty($foods['wednesday']) ? $foods['wednesday']['content'] : ''}}</td>
                            <td class="table-centred">
                                @php
                                    $editUrl = route('edit.food', ['clientId' => $clientId, 'day' => 'wednesday'])
                                @endphp
                                <a href="{{$editUrl}}" role="button"><i class="fa fa-wrench fa-2x"></i></a>
                            </td>
                        </tr>
                        <tr>
                            <td>Четверг</td>
                            <td>{{!empty($foods['thursday']) ? $foods['thursday']['content'] : ''}}</td>
                            <td class="table-centred">
                                @php
                                    $editUrl = route('edit.food', ['clientId' => $clientId, 'day' => 'thursday'])
                                @endphp
                                <a href="{{$editUrl}}" role="button"><i class="fa fa-wrench fa-2x"></i></a>
                            </td>
                        </tr>
                        <tr>
                            <td>Пятница</td>
                            <td>{{!empty($foods['friday']) ? $foods['friday']['content'] : ''}}</td>
                            <td class="table-centred">
                                @php
                                    $editUrl = route('edit.food', ['clientId' => $clientId, 'day' => 'friday'])
                                @endphp
                                <a href="{{$editUrl}}" role="button"><i class="fa fa-wrench fa-2x"></i></a>
                            </td>
                        </tr>
                        <tr>
                            <td>Субота</td>
                            <td>{{!empty($foods['saturday']) ? $foods['saturday']['content'] : ''}}</td>
                            <td class="table-centred">
                                @php
                                    $editUrl = route('edit.food', ['clientId' => $clientId, 'day' => 'saturday'])
                                @endphp
                                <a href="{{$editUrl}}" role="button"><i class="fa fa-wrench fa-2x"></i></a>
                            </td>
                        </tr>
                        <tr>
                            <td>Воскресенье</td>
                            <td>{{!empty($foods['sunday']) ? $foods['sunday']['content'] : ''}}</td>
                            <td class="table-centred">
                                @php
                                    $editUrl = route('edit.food', ['clientId' => $clientId, 'day' => 'sunday'])
                                @endphp
                                <a href="{{$editUrl}}" role="button"><i class="fa fa-wrench fa-2x"></i></a>
                            </td>
                        </tr>


                        {{--@foreach($exercises as $exercise)
                            <tr>
                                <td>{{$exercise->title}}</td>
                                <td>{{$exercise->description}}</td>
                                <td>
                                    <video width="180" height="120" controls>
                                        <source src="{{$exercise->video}}" type="video/mp4">
                                        <source src="{{$exercise->video}}" type="video/ogg">
                                        Your browser does not support the video tag.
                                    </video>
                                </td>
                                <td>{{$exercise->created_at}}</td>
                                <td>{{$exercise->updated_at}}</td>
                                <td class="table-centred">
                                    <a href="exercises/{{$exercise->id}}/edit" role="button"><i class="fa fa-wrench fa-2x"></i></a>
                                </td>
                                <td class="table-centred">
                                    --}}{{--<a href="#" role="button"><i class="fa fa-close fa-2x"></i></a>--}}{{--
                                    <form action="exercises/{{$exercise->id}}" method="POST">
                                        {{ csrf_field() }}
                                        <input type="hidden" name="_method" value="DELETE" />
                                        <button type="submit" class="btn-delete"><i class="fa fa-close fa-2x"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach--}}

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection
