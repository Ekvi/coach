@extends('layouts.admin')

@section('content')

    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Создать упражнение</h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <br />

                    @if (count($errors) > 0)
                        <div class="row">
                            <div class="alert alert-danger col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    @endif

                    <form class="form-horizontal form-label-left"
                          method="post"
                          action="{{route('exercises.store')}}"
                          enctype="multipart/form-data">

                        {!! csrf_field() !!}

                        <div class="form-group {{$errors->has('title') ? 'has-error' : ''}}">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="title">Название <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" name="title" class="form-control col-md-7 col-xs-12" value="{{old('title')}}">
                            </div>
                            {{--<span class="help-block">{{$errors->has('title') ? $errors->title[0] : ''}}"</span>--}}
                        </div>
                        <div class="form-group {{$errors->has('description') ? 'has-error' : ''}}">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="description">Описание <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <textarea class="form-control" rows="3" name="description">{{old('description')}}</textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="image">Видео</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="file" id="video" name="video">
                            </div>
                        </div>

                        <div class="ln_solid"></div>
                        <div class="form-group">
                            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                <button type="submit" class="btn btn-success">Сохранить</button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection


@section('scripts')

    {{--<script type="text/javascript">

        $(document).ready(function() {
            $.listen('parsley:field:validate', function() {
                validateFront();
            });
            $('#create-exercise-form .btn').on('click', function() {
                $('#create-exercise-form').parsley().validate();
                validateFront();
            });
            var validateFront = function() {
                if (true === $('#create-exercise-form').parsley().isValid()) {
                    $('.bs-callout-info').removeClass('hidden');
                    $('.bs-callout-warning').addClass('hidden');
                } else {
                    $('.bs-callout-info').addClass('hidden');
                    $('.bs-callout-warning').removeClass('hidden');
                }
            };
        });
        try {
            hljs.initHighlightingOnLoad();
        } catch (err) {}
    </script>--}}

@endsection