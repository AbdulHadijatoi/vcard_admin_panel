@extends('layouts.app')
@section('title')
    {{__('smtp_setting')}}
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
                        <form method="POST" action="{{ route('smtpSettingUpdate') }}">
                            @csrf
                            @method('PUT')
                        
                            <div class="form-group">
                                <label for="host">{{ __('messages.host') }}</label>
                                <input id="host" type="text" class="form-control" name="host" value="{{ $smtpSettings->host }}" required>
                            </div>
                        
                            <div class="form-group">
                                <label for="port">{{ __('messages.port') }}</label>
                                <input id="port" type="number" class="form-control" name="port" value="{{ $smtpSettings->port }}" required>
                            </div>
                        
                            <div class="form-group">
                                <label for="username">{{ __('messages.username') }}</label>
                                <input id="username" type="text" class="form-control" name="username" value="{{ $smtpSettings->username }}" required>
                            </div>
                        
                            <div class="form-group">
                                <label for="password">{{ __('messages.password') }}</label>
                                <input id="password" type="password" class="form-control" name="password" value="{{ $smtpSettings->password }}" required>
                            </div>
                        
                            <div class="form-group">
                                <label for="encryption">{{ __('messages.encryption') }}</label>
                                <select id="encryption" class="form-control" name="encryption" required>
                                    <option value="tls" {{ ($smtpSettings->encryption ?? '') == 'tls' ? 'selected' : '' }}>TLS</option>
                                    <option value="ssl" {{ ($smtpSettings->encryption ?? '') == 'ssl' ? 'selected' : '' }}>SSL</option>
                                </select>
                            </div>
                        
                            <div class="form-group">
                                <label for="from_address">{{ __('messages.from_address') }}</label>
                                <input id="from_address" type="email" class="form-control" name="from_address" value="{{ $smtpSettings->from_address }}" required>
                            </div>
                            
                            <div class="form-group">
                                <label for="from_name">{{ __('messages.from_name') }}</label>
                                <input id="from_name" type="text" class="form-control" name="from_name" value="{{ $smtpSettings->from_name }}" required>
                            </div>
                            <div class="mt-4">
                                <button type="submit" class="btn btn-primary me-3">{{ __('messages.common.save') }}</button>
                                <a href="{{ route('sadmin.emailTemplates.index') }}" class="btn btn-secondary">{{ __('messages.common.cancel') }}</a>
                            </div>
                        </form>

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


