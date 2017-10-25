@extends('layouts.admin')

@section('content')

    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Редактировать еду</h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <br />

                    @include('layouts.partials.admin.errors')

                    <form class="form-horizontal form-label-left"
                          method="post"
                          action="/admin/clients/{{$clientId}}/food/{{$food->day}}">

                        {{ method_field('PUT') }}
                        {!! csrf_field() !!}

                        <div class="form-group {{$errors->has('content') ? 'has-error' : ''}}">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="content">Описание <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <textarea class="form-control" rows="3" name="content">{{$food->content}}</textarea>
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