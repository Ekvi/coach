@extends('layouts.admin')

@section('content')

    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Упражнения</h2>
                    <div class="clearfix"></div>

                    <a href="{{route('exercises.create')}}" class="btn btn-primary">Добавить упражнение</a>
                </div>
                <div class="x_content">

                    <table id="datatable" class="table table-striped table-bordered">
                        <thead>
                        <tr>
                            <th>Название</th>
                            <th>Описание</th>
                            <th>Видео</th>
                            <th>Дата создания</th>
                            <th>Дата обновление</th>
                            <th>Редактировать</th>
                            <th>Удалить</th>
                        </tr>
                        </thead>

                        <tbody>
                        @foreach($exercises as $exercise)
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
                                    {{--<a href="#" role="button"><i class="fa fa-close fa-2x"></i></a>--}}
                                    <form action="exercises/{{$exercise->id}}" method="POST">
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



{{--
<!-- FastClick -->
<script src="../vendors/fastclick/lib/fastclick.js"></script>
<!-- NProgress -->
<script src="../vendors/nprogress/nprogress.js"></script>

<!-- Datatables -->
<script type="text/javascript" src="{{asset('gentelella/js/datatables/jquery.dataTables.min.js')}}"></script>
<script type="text/javascript" src="{{asset('gentelella/js/datatables/dataTables.bootstrap.min.js')}}"></script>
<script type="text/javascript" src="{{asset('gentelella/js/datatables/dataTables.buttons.min.js')}}"></script>
<script type="text/javascript" src="{{asset('gentelella/js/datatables/buttons.bootstrap.min.js')}}"></script>

<script type="text/javascript" src="{{asset('gentelella/js/datatables/dataTables.fixedHeader.min.js')}}"></script>
<script type="text/javascript" src="{{asset('gentelella/js/datatables/dataTables.keyTable.min.js')}}"></script>
<script type="text/javascript" src="{{asset('gentelella/js/datatables/dataTables.responsive.min.js')}}"></script>
<script type="text/javascript" src="{{asset('gentelella/js/datatables/responsive.bootstrap.js')}}"></script>
<script type="text/javascript" src="{{asset('gentelella/js/datatables/dataTables.scroller.min.js')}}"></script>


<script src="../vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
<script src="../vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
<script src="../vendors/datatables.net-buttons/js/buttons.print.min.js"></script>

<script src="../vendors/jszip/dist/jszip.min.js"></script>
<script src="../vendors/pdfmake/build/pdfmake.min.js"></script>
<script src="../vendors/pdfmake/build/vfs_fonts.js"></script>

        <script>
            $(document).ready(function() {
                var handleDataTableButtons = function() {
                    if ($("#datatable-buttons").length) {
                        $("#datatable-buttons").DataTable({
                            dom: "Bfrtip",
                            buttons: [
                                {
                                    extend: "copy",
                                    className: "btn-sm"
                                },
                                {
                                    extend: "csv",
                                    className: "btn-sm"
                                },
                                {
                                    extend: "excel",
                                    className: "btn-sm"
                                },
                                {
                                    extend: "pdfHtml5",
                                    className: "btn-sm"
                                },
                                {
                                    extend: "print",
                                    className: "btn-sm"
                                },
                            ],
                            responsive: true
                        });
                    }
                };

                TableManageButtons = function() {
                    "use strict";
                    return {
                        init: function() {
                            handleDataTableButtons();
                        }
                    };
                }();

                $('#datatable').dataTable();
                $('#datatable-keytable').DataTable({
                    keys: true
                });

                $('#datatable-responsive').DataTable();

                $('#datatable-scroller').DataTable({
                    ajax: "js/datatables/json/scroller-demo.json",
                    deferRender: true,
                    scrollY: 380,
                    scrollCollapse: true,
                    scroller: true
                });

                var table = $('#datatable-fixed-header').DataTable({
                    fixedHeader: true
                });

                TableManageButtons.init();
            });
        </script>
        <!-- /Datatables -->--}}
