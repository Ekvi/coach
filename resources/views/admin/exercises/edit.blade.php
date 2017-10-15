@extends('layouts.admin')

@section('content')

    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Редактировать упражнение</h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <br />

                    @include('layouts.partials.admin.errors')

                    <form class="form-horizontal form-label-left"
                          method="post"
                          action="/admin/exercises/{{$exercise->id}}"
                          enctype="multipart/form-data">

                        {{ method_field('PUT') }}
                        {!! csrf_field() !!}

                        <div class="form-group {{$errors->has('title') ? 'has-error' : ''}}">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="title">Название <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" name="title" class="form-control col-md-7 col-xs-12" value="{{$exercise->title}}">
                            </div>
                        </div>
                        <div class="form-group {{$errors->has('description') ? 'has-error' : ''}}">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="description">Описание <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <textarea class="form-control" rows="3" name="description">{{$exercise->description}}</textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="image">Видео</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="file" id="video" name="video" value="{{$exercise->video}}">
                            </div>
                        </div>

                        <div class="ln_solid"></div>
                        <div class="form-group">
                            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                <button type="submit" class="btn btn-success">Обновить</button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection


@section('scripts')

@endsection