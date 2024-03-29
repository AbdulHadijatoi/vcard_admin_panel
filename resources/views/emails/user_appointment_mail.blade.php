@component('mail::layout')
    {{-- Header --}}
    @slot('header')
        @component('mail::header', ['url' => config('app.url')])
            <img src="{{ asset(getAppLogo()) }}" class="logo" style="height:auto!important;width:auto!important;object-fit:cover" alt="{{ getAppName() }}">
        @endcomponent
    @endslot


    {{-- Body --}}
    @php
        $templateContent = getEmailTemplateContent(13);
        $compiledContent = Blade::compileString($templateContent);

        eval(' ?>' . $compiledContent . '<?php ');
    @endphp
    {{-- <div>
        <h2>{{ __('messages.mail.hello') }} <b>{{ $toName }}</b></h2>
        <p><b>{{ $name }}  {{ __('messages.mail.booked_appointment_with_you') }} </b>.</p>
        <p><b>{{ __('messages.mail.appointment_time') }} : </b> {{ $date }} - {{ $from_time }} {{__('messages.common.to')}} {{ $to_time }}</p>
        <p><b>{{ __('messages.mail.vcard_name') }} </b> {{ $vcard_name }}</p>
        <p><b>{{ __('messages.vcard.mobile_number') }} : </b> {{ $phone }}</p>
        <p>{{ getAppName() }}</p>
    </div> --}}


    {{-- Footer --}}
    @slot('footer')
        @component('mail::footer')
            <h6>© {{ date('Y') }} {{ getAppName() }}.</h6>
        @endcomponent
    @endslot
@endcomponent
