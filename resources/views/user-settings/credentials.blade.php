    @extends('layouts.app')
    @section('title')
        {{ __('messages.setting.credentials') }}
    @endsection
    @section('content')
        <div class="container-fluid">
            <div class="d-flex flex-column">
                <div class="col-12">
                    @include('layouts.errors')
                    @include('flash::message')
                    @include('user-settings.setting_menu')
                    <div class="card">
                        <div class="card-body">
                            {{ Form::open(['route' => 'user.setting.update', 'id' => 'UserCredentialsSettings', 'class' => 'form']) }}
                            {{ Form::hidden('sectionName', $sectionName) }}
                            <div class="row ">
                                <div class="form-group col-sm-3 col-md-3 mb-3">
                                    <label for="time_format"
                                        class="form-label required fs-6 fw-bolder text-gray-700 mb-3">{{ __('messages.placeholder.time_format') }}
                                        :</label>
                                    <div class="radio-button-group">
                                        <div class="btn-group btn-group-toggle m-0" data-toggle="buttons">
                                            <input type="radio" name="time_format" id="time_format-0" value="0"
                                                checked=""
                                                {{ !empty($setting['time_format']) == \App\Models\UserSetting::HOUR_12 ? 'checked' : '' }}>
                                            <label for="time_format-0" class="me-2"
                                                role="button">{{ __('messages.placeholder.12_hour') }}</label>
                                            <input type="radio" name="time_format" id="time_format-1" value="1"
                                                {{ !empty($setting['time_format']) == \App\Models\UserSetting::HOUR_24 ? 'checked' : '' }}>
                                            <label for="time_format-1"
                                                role="button">{{ __('messages.placeholder.24_hour') }}</label>
                                        </div>
                                    </div>
                                </div>
                                @if (checkFeature('affiliation'))
                                    <div class="col-sm-3 col-md-3 mb-3">
                                        <div class="form-group mb-3">
                                            <label for="enable_affiliation"
                                                class="form-label fs-6 fw-bolder text-gray-700 mb-3">{{ __('messages.setting.enable_affiliation') }}

                                            </label> <span data-bs-toggle="tooltip" class="mb-3" data-placement="top"
                                                data-bs-original-title="{{ __('messages.tooltip.enable_affiliation') }}">
                                                <i class="fas fa-question-circle ml-1 general-question-mark"></i> :
                                            </span>
                                            <label
                                                class="form-check form-switch form-check-solid form-switch-sm d-flex cursor-pointer">
                                                <input type="checkbox" name="enable_affiliation" class="form-check-input"
                                                    value="1"
                                                    {{ !empty($setting['enable_affiliation']) ? 'checked' : '' }}>
                                                <span class="custom-switch-indicator"></span>
                                            </label>
                                        </div>
                                    </div>
                                    @endif
                                    <div class="col-sm-3 col-md-3 mb-3">
                                        <div class="form-group mb-3">
                                            <label for="enable_contact"
                                                class="form-label fs-6 fw-bolder text-gray-700 mb-3">{{ __('messages.setting.enable_addcontact') }}

                                            </label> <span data-bs-toggle="tooltip" class="mb-3" data-placement="top"
                                                data-bs-original-title="{{ __('messages.tooltip.enable_contact') }}">
                                                <i class="fas fa-question-circle ml-1 general-question-mark"></i> :
                                            </span>
                                            <label
                                                class="form-check form-switch form-check-solid form-switch-sm d-flex cursor-pointer">
                                                <input type="checkbox" name="enable_contact" class="form-check-input"
                                                    value="1"
                                                    {{(!isset($setting['enable_contact']) || (!$setting['enable_contact'] && $setting['enable_contact'] != 0) || $setting['enable_contact'] == 1) ? 'checked' : '' }} >
                                                <span class="custom-switch-indicator"></span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-sm-3 col-md-3 mb-3">
                                        <div class="form-group mb-3">
                                            <label for="hide_stickybar"
                                                class="form-label fs-6 fw-bolder text-gray-700 mb-3">{{ __('messages.setting.hide_stickybar') }}

                                            </label> <span data-bs-toggle="tooltip" class="mb-3" data-placement="top"
                                                data-bs-original-title="{{ __('messages.tooltip.hide_stickybar') }}">
                                                <i class="fas fa-question-circle ml-1 general-question-mark"></i> :
                                            </span>
                                            <label
                                                class="form-check form-switch form-check-solid form-switch-sm d-flex cursor-pointer">
                                                <input type="checkbox" name="hide_stickybar" class="form-check-input"
                                                    value="1"
                                                    {{ !empty($setting['hide_stickybar']) ? 'checked' : '' }}>
                                                <span class="custom-switch-indicator"></span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-sm-3 col-md-3 mb-3">
                                        <div class="form-group mb-3">
                                            <label for="whatsapp_share"
                                                class="form-label fs-6 fw-bolder text-gray-700 mb-3">{{ __('messages.setting.whatsapp_share') }}
                                            </label> <span data-bs-toggle="tooltip" class="mb-3" data-placement="top"
                                                data-bs-original-title="{{ __('messages.tooltip.whatsapp_share') }}">
                                                <i class="fas fa-question-circle ml-1 general-question-mark"></i> :
                                            </span>
                                            <label
                                                class="form-check form-switch form-check-solid form-switch-sm d-flex cursor-pointer">
                                                <input type="checkbox" name="whatsapp_share" class="form-check-input"
                                                    value="1"
                                                    {{ !empty($setting['whatsapp_share']) ? 'checked' : '' }}>
                                                <span class="custom-switch-indicator"></span>
                                            </label>
                                        </div>
                                    </div>
                            </div>
                            <button type="submit" class="btn btn-primary"
                                id="userCredentialSettingBtn">{{ __('messages.common.save') }}</button>

                            {{ Form::close() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
