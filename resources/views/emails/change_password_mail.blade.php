@component('mail::layout')
    {{-- Header --}}
    @slot('header')
        @component('mail::header', ['url' => config('app.url')])
            <img src="{{ asset(getAppLogo()) }}" class="logo" style="height:auto!important;width:auto!important;object-fit:cover" alt="{{ getAppName() }}">
        @endcomponent
    @endslot


    @php
        $templateContent = getEmailTemplateContent(4);
        $compiledContent = Blade::compileString($templateContent);

        eval(' ?>' . $compiledContent . '<?php ');
    @endphp
    {{-- Body --}}
    {{-- <div>
        <h2>{{ __('messages.mail.hello')  }} {{ $name }}</h2>
            <p> {{ __('messages.mail.password_change')}} <b> {{$toName}}.</b> </p>
        <p>{{ __('messages.mail.please_contact_your_admin') }}</p>
        <p>{{ __('messages.mail.thanks_regard') }}</p>
        <p>{{ getAppName() }}</p>
    </div> --}}


    {{-- Footer --}}
    @slot('footer')
        @component('mail::footer')
            <h6>© {{ date('Y') }} {{ getAppName() }}.</h6>
        @endcomponent
    @endslot
@endcomponent
