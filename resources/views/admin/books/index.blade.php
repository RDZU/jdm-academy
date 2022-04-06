@inject('request', 'Illuminate\Http\Request')
@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('global.books.title')</h3>
    @can('book_create')
    <p>
        <a href="{{ route('admin.books.create') }}" class="btn btn-success">@lang('global.app_add_new')</a>
        
    </p>
    @endcan

    @can('book_delete')
    <p>
        <ul class="list-inline">
            <li><a href="{{ route('admin.books.index') }}" style="{{ request('show_deleted') == 1 ? '' : 'font-weight: 700' }}">@lang('global.app_all')</a></li> |
            <li><a href="{{ route('admin.books.index') }}?show_deleted=1" style="{{ request('show_deleted') == 1 ? 'font-weight: 700' : '' }}">@lang('global.app_trash')</a></li>
        </ul>
    </p>
    @endcan


    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('global.app_list')
        </div>

        <div class="panel-body table-responsive">
            <table class="table table-bordered table-striped {{ count($books) > 0 ? 'datatable' : '' }} @can('book_delete') @if ( request('show_deleted') != 1 ) dt-select @endif @endcan">
                <thead>
                    <tr>
                        @can('book_delete')
                            @if ( request('show_deleted') != 1 )<th style="text-align:center;"><input type="checkbox" id="select-all" /></th>@endif
                        @endcan

                        <th>@lang('global.books.fields.titulo')</th>
                        <th>@lang('global.books.fields.slug')</th>
                        <th>@lang('global.books.fields.authors')</th>
                        <th>@lang('global.books.fields.description')</th>
                        <th>@lang('global.books.fields.full-text')</th>
                        <th>@lang('global.books.fields.subject')</th>
                        <th>@lang('global.books.fields.editorial')</th>
                        <th>@lang('global.books.fields.edition')</th>
                        <th>@lang('global.books.fields.file')</th>
                        @if( request('show_deleted') == 1 )
                        <th>&nbsp;</th>
                        @else
                        <th>&nbsp;</th>
                        @endif
                    </tr>
                </thead>
                
                <tbody>
                    @if (count($books) > 0)
                        @foreach ($books as $book)
                            <tr data-entry-id="{{ $book->id }}">
                                @can('book_delete')
                                    @if ( request('show_deleted') != 1 )<td></td>@endif
                                @endcan

                                <td field-key='titulo'>{{ $book->titulo }}</td>
                                <td field-key='slug'>{{ $book->slug }}</td>
                                <td field-key='authors'>{{ $book->authors }}</td>
                                <td field-key='description'>{{ $book->description }}</td>
                                <td field-key='full_text'>{!! $book->full_text !!}</td>
                                <td field-key='subject'>{{ $book->subject }}</td>
                                <td field-key='editorial'>{{ $book->editorial }}</td>
                                <td field-key='edition'>{{ $book->edition }}</td>
                                <td field-key='file'>@if($book->file)<a href="{{ asset(env('UPLOAD_PATH').'/uploads/' . $book->file) }}" target="_blank">Download file</a>@endif</td>
                                 <td field-key='file'>@if($book->picture)<a href="{{ asset(env('UPLOAD_PATH').'/uploads/' . $book->picture) }}" target="_blank">Download picture</a>@endif</td>
                                @if( request('show_deleted') == 1 )
                                <td>
                                    @can('book_delete')
                                                                        {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'POST',
                                        'onsubmit' => "return confirm('".trans("global.app_are_you_sure")."');",
                                        'route' => ['admin.books.restore', $book->id])) !!}
                                    {!! Form::submit(trans('global.app_restore'), array('class' => 'btn btn-xs btn-success')) !!}
                                    {!! Form::close() !!}
                                @endcan
                                    @can('book_delete')
                                                                        {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("global.app_are_you_sure")."');",
                                        'route' => ['admin.books.perma_del', $book->id])) !!}
                                    {!! Form::submit(trans('global.app_permadel'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                @endcan
                                </td>
                                @else
                                <td>
                                    @can('book_view')
                                    <a href="{{ route('admin.books.show',[$book->id]) }}" class="btn btn-xs btn-primary">@lang('global.app_view')</a>
                                    @endcan
                                    @can('book_edit')
                                    <a href="{{ route('admin.books.edit',[$book->id]) }}" class="btn btn-xs btn-info">@lang('global.app_edit')</a>
                                    @endcan
                                    @can('book_delete')
{!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("global.app_are_you_sure")."');",
                                        'route' => ['admin.books.destroy', $book->id])) !!}
                                    {!! Form::submit(trans('global.app_delete'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                    @endcan
                                </td>
                                @endif
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="14">@lang('global.app_no_entries_in_table')</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
@stop

@section('javascript') 
    <script>
        @can('book_delete')
            @if ( request('show_deleted') != 1 ) window.route_mass_crud_entries_destroy = '{{ route('admin.books.mass_destroy') }}'; @endif
        @endcan

    </script>
@endsection