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