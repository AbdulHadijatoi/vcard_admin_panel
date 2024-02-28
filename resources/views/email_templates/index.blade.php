@extends('layouts.app')
@section('title')
    {{__('messages.email_templates')}}
@endsection
@section('content')
    <div class="container-fluid">
        <div class="d-flex flex-column table-striped">
            <div class="d-flex justify-content-between align-items-end mb-5">
                <h1> {{__('messages.email_templates')}}</h1>
                <a class="btn btn-outline-primary float-end"
                   href="{{ route('smtpSetting') }}">{{ __('messages.smtp_setting') }}</a>
                   <a class='btn px-4 py-2 bg-gray-800 text-white'>
                       {{ __('messages.user.change_password') }}
                   </a>
            </div>
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>{{__('messages.index')}}</th>
                        <th>{{__('messages.template')}}</th>
                        <th class="text-nowrap">{{__('messages.common.action')}}</th>
                    </tr>
                    </thead>
                    <tbody id="monthlyReport" class="text-gray-600 fw-bold">
                        @if($templates)
                            @foreach ($templates as $index => $template)
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="d-flex flex-column">
                                            <span class="fs-6">{{ ++$index }}</span>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="d-flex flex-column">
                                            <a href="{{ route('emailTemplates.edit', $template->id) }}" class="mb-1 text-decoration-none fs-6">
                                                {{ $template->name }}
                                            </a>
                                            <span class="fs-6">{{ $template->template_name }}</span>
                                        </div>
                                    </div>                                
                                </td>
                                <td>
                                    <div class="action-btn option d-flex align-items-center text-center">
                                        <a href="{{ url('sadmin/email-templates/edit/'.$template->id ) }}" title="{{ __('messages.common.edit') }}"
                                            class="btn p-1 fs-3">
                                            <i class="fa-solid fa-pen-to-square text-primary"></i>
                                        </a>
                                    </div>                            
                                </td>
                            </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
