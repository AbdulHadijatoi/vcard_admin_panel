@extends('layouts.app')
@section('title')
    {{__('messages.admin.edit_admin')}}
@endsection
@section('content')
    <div class="container-fluid">
        <div class="d-flex flex-column">
            <div class="col-12">
                <div class="d-flex justify-content-between align-items-end mb-5">
                    <h1> {{__('messages.edit_email_template')}}</h1>
                    <a class="btn btn-outline-primary float-end"
                       href="{{ route('sadmin.emailTemplates.index') }}">{{ __('messages.common.back') }}</a>
                </div>
                <div class="col-12">
                    @include('layouts.errors')
                </div>
                <div class="card">
                    <div class="card-body">
                        {!! Form::open(['route' => ['sadmin.emailTemplates.update', $template->id], 'method' => 'put',
                                'files' => 'true']) !!}
                        
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="mb-5">
                                    {{ Form::label('template_name', __('messages.template_name') .':', ['class' => 'form-label required']) }}
                                    {{ Form::text('template_name', isset($template) ? $template->template_name : null, ['class' => 'form-control', 'placeholder' => __('messages.template_name'), 'required', 'id' => 'templateName']) }}
                                </div>
                            </div>
                            {{-- <div class="col-lg-12">
                                <div class="mb-5">
                                    {{ Form::label('subject', __('messages.subject') .':', ['class' => 'form-label required']) }}
                                    {{ Form::text('subject', isset($template) ? $template->subject : null, ['class' => 'form-control', 'placeholder' => __('messages.subject'), 'required', 'id' => 'templateSubject']) }}
                                </div>
                            </div> --}}
                            <div class="col-lg-12">
                                <div class="mb-5">
                                    {{ Form::label('content', __('messages.email_content') .':', ['class' => 'form-label required']) }}
                                    <textarea id="editor" name="content">{!! isset($template) ? $template->content : null !!}</textarea>
                                </div>
                            </div>
                        
                            <div>
                                {{ Form::submit(__('messages.common.save'), ['class' => 'btn btn-primary me-3']) }}
                                <a href="{{ route('sadmin.emailTemplates.index') }}" class="btn btn-secondary">{{ __('messages.common.cancel') }}</a>
                            </div>    
                            
                        </div>


                        {{ Form::close() }}

                        <br/>
                        <br/>

                        {!! Form::open(['route' => [$template->route_name], 'method' => 'post']) !!}
                        
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="mb-5">
                                    {{ Form::label('email', __('messages.plan.email_address') .':', ['class' => 'form-label required']) }}
                                    {{ Form::text('email', null, ['class' => 'form-control', 'placeholder' => __('messages.plan.email_address'), 'required', 'id' => 'email']) }}
                                </div>
                            </div>
                            
                            <div>
                                {{ Form::submit(__('messages.plan.sendemail'), ['class' => 'btn btn-primary me-3']) }}
                            </div>    
                            
                        </div>


                        {{ Form::close() }}

                        <script>
                            $(document).ready(function() {
                                $('#editor').summernote();
                            });
                        </script>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


