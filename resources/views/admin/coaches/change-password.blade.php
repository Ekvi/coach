@extends('layouts.admin')

@section('content')

    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Изменить пароль</h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <br />

                    @include('layouts.partials.admin.errors')

                    <form class="form-horizontal form-label-left"
                          method="post"
                          {{--action="/admin/coaches/change-password"--}}
                          action="{{route('change-password')}}"
                          enctype="multipart/form-data">

                        {!! csrf_field() !!}

                        <div class="form-group {{$errors->has('password') ? 'has-error' : ''}}">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="password">Новый пароль <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="password" name="password" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>

                        <input type="hidden" name="id" class="form-control col-md-7 col-xs-12" value="{{$id}}">

                        <div class="ln_solid"></div>
                        <div class="form-group">
                            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                <button type="submit" class="btn btn-success">Изменить</button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
