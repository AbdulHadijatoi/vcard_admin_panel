<?php

namespace App\Providers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\ServiceProvider;

class CustomMailServiceProvider extends ServiceProvider
{

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register() {

        $settings = DB::table('settings')->where('key', 'smtp_settings')->first();
        
        if ($settings) {
            $smtpSettings = json_decode($settings->value, true);
            // dd($smtpSettings);
            $config = array(
                'mail.mailers.smtp.transport'  => 'smtp',
                'mail.mailers.smtp.url'        => env('MAIL_URL'),
                'mail.mailers.smtp.host'       => $smtpSettings['host'],
                'mail.mailers.smtp.port'       => $smtpSettings['port'],
                'mail.mailers.smtp.encryption' => $smtpSettings['encryption'],
                'mail.mailers.smtp.username'   => $smtpSettings['username'],
                'mail.mailers.smtp.password'   => $smtpSettings['password'],
                'mail.mailers.smtp.from'       => array('address' => $smtpSettings['from_address'], 'name' => $smtpSettings['from_name']),
            );
            config($config);
        }
    }

}
