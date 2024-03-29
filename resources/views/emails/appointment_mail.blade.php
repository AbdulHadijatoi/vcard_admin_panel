@component('mail::layout')
    {{-- Header --}}
    @slot('header')
        @component('mail::header', ['url' => config('app.url')])
            <img src="{{ asset(getAppLogo()) }}" class="logo" style="height:auto!important;width:auto!important;object-fit:cover" alt="{{ getAppName() }}">
        @endcomponent
    @endslot


    @php
        $templateContent = getEmailTemplateContent(3);
        $compiledContent = Blade::compileString($templateContent);

        eval(' ?>' . $compiledContent . '<?php ');
    @endphp
    {{-- Body --}}
    {{-- <div>
        <h2>{{ __('messages.mail.hello') }} <b>{{ $name }}</b></h2>
        <p> {{ __('messages.mail.book_successfully') }} {{$date}}  {{ __('messages.mail.between') }} {{ $from_time }}
            {{ __('messages.common.to') }} {{ $to_time }}</p>
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
