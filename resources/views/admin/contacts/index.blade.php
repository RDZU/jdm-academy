@inject('request', 'Illuminate\Http\Request')
@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('global.contact.title')</h3>
    @can('contact_create')
    <p>
        
        
    </p>
    @endcan

    

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('global.app_list')
        </div>

        <div class="panel-body table-responsive">
            <table class="table table-bordered table-striped {{ count($contacts) > 0 ? 'datatable' : '' }} @can('contact_delete') dt-select @endcan">
                <thead>
                    <tr>
                        @can('contact_delete')
                            <th style="text-align:center;"><input type="checkbox" id="select-all" /></th>
                        @endcan

                        <th>@lang('global.contact.fields.name')</th>
                        <th>@lang('global.contact.fields.last-name')</th>
                        <th>@lang('global.contact.fields.email')</th>
                        <th>@lang('global.contact.fields.message')</th>
                                                <th>&nbsp;</th>

                    </tr>
                </thead>
                
                <tbody>
                    @if (count($contacts) > 0)
                        @foreach ($contacts as $contact)
                            <tr data-entry-id="{{ $contact->id }}">
                                @can('contact_delete')
                                    <td></td>
                                @endcan

                                <td field-key='name'>{{ $contact->name }}</td>
                                <td field-key='last_name'>{{ $contact->lastname }}</td>
                                <td field-key='email'>{{ $contact->email }}</td>
                                <td field-key='message'>{!! $contact->message !!}</td>
                                                                <td>
                                    @can('contact_view')
                                    <a href="{{ route('admin.contacts.show',[$contact->id]) }}" class="btn btn-xs btn-primary">@lang('global.app_view')</a>
                                    @endcan
                                    @can('contact_delete')
{!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("global.app_are_you_sure")."');",
                                        'route' => ['admin.contacts.destroy', $contact->id])) !!}
                                    {!! Form::submit(trans('global.app_delete'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                    @endcan
                                </td>

                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="9">@lang('global.app_no_entries_in_table')</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
@stop

@section('javascript') 
    <script>
        @can('contact_delete')
            window.route_mass_crud_entries_destroy = '{{ route('admin.contacts.mass_destroy') }}';
        @endcan

    </script>
@endsection