@component('mail::layout')
    {{-- Header --}}
    @slot('header')
        @component('mail::header', ['url' => config('app.url')])
            <img src="{{ asset(getAppLogo()) }}" class="logo" style="height:auto!important;width:auto!important;object-fit:cover" alt="{{ getAppName() }}">
        @endcomponent
    @endslot
    
    @php
        $templateContent = getEmailTemplateContent(5);
        $compiledContent = Blade::compileString($templateContent);

        eval(' ?>' . $compiledContent . '<?php ');
    @endphp

    {{-- <h2>{{ __('messages.mail.here_is_enquiry') }}<br>
    </h2>
    <p><b>{{ __('messages.mail.name') }} </b>{{$input['name']}}</p>
    <p><b>{{ __('messages.mail.email') }}  </b>{{$input['email']}}</p>
    <p><b>{{ __('messages.mail.messages') }} </b>{{$input['message']}}</p>
    <p><b>{{ __('messages.common.phone') }} :</b>{{is_null($input['phone']) ? 'N/A' : $input['phone']}}</p>
    <p><b>{{ __('messages.mail.vcard_name') }}  </b>{{$input['vcard_name']}}</p> --}}


    {{-- Footer --}}
    @slot('footer')
        @component('mail::footer')
            <h6>© {{ date('Y') }} {{ getAppName() }}.</h6>
        @endcomponent
    @endslot
@endcomponent
