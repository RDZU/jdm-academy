@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('global.books.title')</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('global.app_view')
        </div>

        <div class="panel-body table-responsive">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>@lang('global.books.fields.titulo')</th>
                            <td field-key='titulo'>{{ $book->titulo }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.books.fields.slug')</th>
                            <td field-key='slug'>{{ $book->slug }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.books.fields.authors')</th>
                            <td field-key='authors'>{{ $book->authors }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.books.fields.description')</th>
                            <td field-key='description'>{{ $book->description }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.books.fields.full-text')</th>
                            <td field-key='full_text'>{!! $book->full_text !!}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.books.fields.subject')</th>
                            <td field-key='subject'>{{ $book->subject }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.books.fields.editorial')</th>
                            <td field-key='editorial'>{{ $book->editorial }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.books.fields.edition')</th>
                            <td field-key='edition'>{{ $book->edition }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.books.fields.file')</th>
                            <td field-key='file'>@if($book->file)<a href="{{ asset(env('UPLOAD_PATH').'/uploads/' . $book->file) }}" target="_blank">Download file</a>@endif</td>
                        </tr>
                         <tr>
                            <th>@lang('global.books.fields.picture')</th>
                            <td field-key='file'>@if($book->picture)<a href="{{ asset(env('UPLOAD_PATH').'/uploads/' . $book->picture) }}" target="_blank">Download picture</a>@endif</td>
                        </tr>
                    </table>
                </div>
            </div>

            <p>&nbsp;</p>

            <a href="{{ route('admin.books.index') }}" class="btn btn-default">@lang('global.app_back_to_list')</a>
        </div>
    </div>
@stop


