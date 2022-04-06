@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('global.contact.title')</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('global.app_view')
        </div>

        <div class="panel-body table-responsive">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>@lang('global.contact.fields.name')</th>
                            <td field-key='name'>{{ $contact->name }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.contact.fields.last-name')</th>
                            <td field-key='last_name'>{{ $contact->lastname }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.contact.fields.email')</th>
                            <td field-key='email'>{{ $contact->email }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.contact.fields.message')</th>
                            <td field-key='message'>{!! $contact->message !!}</td>
                        </tr>
                    </table>
                </div>
            </div>

            <p>&nbsp;</p>

            <a href="{{ route('admin.contacts.index') }}" class="btn btn-default">@lang('global.app_back_to_list')</a>
        </div>
    </div>
@stop


