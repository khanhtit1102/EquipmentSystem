@extends('master')

@section('css')
<style>
    .link {
        text-decoration: none;
    }
</style>

@endsection

@section('main')
<div class="row">
    <div class="col-12 grid-margin">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Import Equipment </h4>
                <blockquote class="blockquote blockquote-primary">
                    <p>Make sure your excel is correct format. If not, please download the Example File bellow.</p>
                    <footer class="blockquote-footer"><a href="{{asset('example/Example-Import-File.xlsx')}}" class="link">Example-Import-File.xlsx</a></footer>
                </blockquote>
                <form class="form" action="{{route('importdata.equipmentupload')}}" method="POST" enctype="multipart/form-data">
                    {{ method_field('POST') }}
                    {{ csrf_field() }}
                    @if ($errors->any())
                    <div class="card-body">
                        <ul class="list-arrow">
                            @foreach ($errors->all() as $error)
                            <li class="text-danger">{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    <div class="form-group">
                        <label>File upload</label>
                        <input type="file" name="file" class="file-upload-default">
                        <div class="input-group col-xs-12">
                            <input type="text" class="form-control file-upload-info" disabled="" placeholder="Upload excel file">
                            <span class="input-group-append">
                                <button class="file-upload-browse btn btn-primary" type="button">Choose file</button>
                            </span>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary me-2">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
<script>
    (function($) {
        'use strict';
        $(function() {
            $('.file-upload-browse').on('click', function() {
                var file = $(this).parent().parent().parent().find('.file-upload-default');
                file.trigger('click');
            });
            $('.file-upload-default').on('change', function() {
                $(this).parent().find('.form-control').val($(this).val().replace(/C:\\fakepath\\/i, ''));
            });
        });
    })(jQuery);
</script>
@endsection