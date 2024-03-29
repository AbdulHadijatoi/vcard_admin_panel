@component('mail::layout')
    {{-- Header --}}
    @slot('header')
        @component('mail::header', ['url' => config('app.url')])
            <img src="{{ asset(getAppLogo()) }}" class="logo" style="height:auto!important;width:auto!important;object-fit:cover" alt="{{ getAppName() }}">
        @endcomponent
    @endslot
    
    @php
        $templateContent = getEmailTemplateContent(7);
        $compiledContent = Blade::compileString($templateContent);

        eval(' ?>' . $compiledContent . '<?php ');
    @endphp
    {{-- <h2>{{ __('messages.mail.here_is_enquiry') }}<br>
    </h2>
    <p><b>{{ __('messages.mail.name') }} </b>{{$input['name']}}</p>
    <p><b>{{ __('messages.mail.email') }}  </b>{{$input['email']}}</p>
    <p><b>{{ __('messages.common.subject') }}  </b>{{$input['subject']}}</p>
    <p><b>{{ __('messages.mail.messages') }} </b>{{$input['message']}}</p> --}}
    
    {{-- Footer --}}
    @slot('footer')
        @component('mail::footer')
            <h6>© {{ date('Y') }} {{ getAppName() }}.</h6>
        @endcomponent
    @endslot
@endcomponent
