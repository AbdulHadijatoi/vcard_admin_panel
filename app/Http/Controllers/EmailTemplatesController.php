<?php

namespace App\Http\Controllers;

use App\Mail\AdminNfcOrderMail;
use App\Mail\AppointmentApproveMail;
use App\Mail\AppointmentMail;
use App\Mail\ChangePasswordMail;
use App\Mail\ContactUsMail;
use App\Mail\ForgetPasswordMail;
use App\Mail\LandingContactUsMail;
use App\Mail\ManualPaymentGuideMail;
use App\Mail\NfcOrderStatusMail;
use Laracasts\Flash\Flash;
use App\Mail\PlanExpirationReminder;
use App\Mail\SendinviteMail;
use App\Mail\SendWithdrawalRequestChangedMail;
use App\Mail\SuperAdminManualPaymentMail;
use App\Mail\UserAppointmentMail;
use App\Mail\VerifyMail;
use App\Models\EmailTemplate;
use App\Models\NfcOrderTransaction;
use App\Models\Setting;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;

class EmailTemplatesController extends AppBaseController {

    public function index(Request $request) {
        $email = $request->email;
        if(!$email){
            $email = "abdulhadijatoi@gmail.com";
        }

        $templates = EmailTemplate::get();
        return view('email_templates.index', compact("templates"));
    }
    
    public function edit($id) {
        $template = EmailTemplate::findOrFail($id);
        return view('email_templates.edit', compact('template'));
    }
    
    public function smtpSetting() {
        $settings = Setting::where('key','smtp_settings')->first();
        $smtpSettings = json_decode($settings->value);

        return view('email_templates.smtp_setting',compact('smtpSettings'));
    }
    
    public function smtpSettingUpdate(Request $request) {
        $data['host'] = $request->host;
        $data['port'] = $request->port;
        $data['username'] = $request->username;
        $data['password'] = $request->password;
        $data['encryption'] = $request->encryption;
        $data['from_address'] = $request->from_address;
        $data['from_name'] = $request->from_name;
        
        $jsonData = json_encode($data);
        $smtp_settings = Setting::where('key',"smtp_settings")->first();
        $smtp_settings->value = $jsonData;
        $smtp_settings->save();

        Flash::success(__('messages.updated_successfully'));
        return redirect(route("smtpSetting"));
    }
    
    public function update($id, Request $request) {

        $template_name = $request->template_name;
        $content = $request->content;
        // $subject = $request->subject;
        $template = EmailTemplate::findOrFail($id);

        if($template_name){
            $template->template_name = $template_name;
        }
        
        if($content){
            $template->content = $content;
        }


        // if($subject){
        //     $template->subject = $subject;
        // }

        $template->updated_at = now();
        $template->save();

        Flash::success(__('messages.updated_successfully'));
        // return redirect(route("sadmin.emailTemplates.index"));
    }
    
    public function adminNfcOrderMail(Request $request) {
        $email = $request->email;
        if(!$email){
            $email = "abdulhadijatoi@gmail.com";
        }

        $data = collect([
            'name' => "Abdul Hadi",
            'nfc_order_id' => 2539,
            'type' => 4,
            'transaction_id' => null,
            'amount' => 100,
            'user_id' => 10,
            'status' => 0,
        ]);

        Mail::to( $email )->send(new AdminNfcOrderMail($data));
    }

    public function appointmentApproveMail(Request $request) {
        $email = $request->email;
        if(!$email){
            $email = "abdulhadijatoi@gmail.com";
        }

        $data['name'] = "Abdul Hadi";
        $data['date'] = now()->format("Y-m-d");
        $data['from_time'] = now()->format("H:i:s");
        $data['to_time'] = now()->format("H:i:s");
        Mail::to($email)
            ->send(new AppointmentApproveMail($data));
    }

    public function appointmentMail(Request $request) {
        $email = $request->email;
        if(!$email){
            $email = "abdulhadijatoi@gmail.com";
        }


        $data['name'] = "Abdul Hadi";
        $data['date'] = now()->format("Y-m-d");
        $data['from_time'] = now()->format("H:i:s");
        $data['to_time'] = now()->format("H:i:s");

        Mail::to($email)
            ->send(new AppointmentMail('emails.appointment_mail',
                __('messages.mail.book_appointment'),
                $data));
    }

    public function changePasswordMail(Request $request) {
        $email = $request->email;
        if(!$email){
            $email = "abdulhadijatoi@gmail.com";
        }
      
        $data = [
            'name' => "Abdul Hadi",
            'toName' => "Full Name",
        ];

            Mail::to($email)
                ->send(new ChangePasswordMail('emails.change_password_mail',
                    __('messages.flash.password_update'),
                    $data));
    }

    public function contactUsMail(Request $request) {
        $email = $request->email;
        if(!$email){
            $email = "abdulhadijatoi@gmail.com";
        }

        $input['name'] = "Abdul Hadi";
        $input['email'] = "abdulhadijatoi@gmail.com";
        $input['message'] = "TEST MESSAGE!";
        $input['phone'] = "0232390191";
        $input['vcard_name'] = "Vcard_name";
       
        Mail::to($email)->send(new ContactUsMail($input, $email));
    }

    public function forgetPasswordMail(Request $request) {
        $email = $request->email;
        if(!$email){
            $email = "abdulhadijatoi@gmail.com";
        }

        $user = collect([
                    'first_name'=>"Abdul Hadi",
                    'last_name'=>"Hadi"
                ]);

        $data = [];
        $data['user'] = $user;
        $data['url'] = "TEST_URL.COM";

        Mail::to($email)
            ->send(new ForgetPasswordMail(
                'emails.forget_password', __('messages.email_password_reset_link'),
                $data
            ));
    }

    public function landingContactUsMail(Request $request) {
        $email = $request->email;
        if(!$email){
            $email = "abdulhadijatoi@gmail.com";
        }

        $input['name'] = "Abdul Hadi";
        $input['email'] = "abdulhadijatoi@gmail.com";
        $input['subject'] = "TEST SUBJECT";
        $input['message'] = "TEST MESSAGE TEXT";

        Mail::to($email)
            ->send(new LandingContactUsMail(
                $input,
                __('messages.placeholder.message_sent')
            ));
    }

    public function manualPaymentGuideMail(Request $request) {
        $email = $request->email;
        if(!$email){
            $email = "abdulhadijatoi@gmail.com";
        }

        $manual_payment_guide_step = Setting::where('key', 'manual_payment_guide')->first();
        $user = \Illuminate\Support\Facades\Auth::user();

        Mail::to($email)
            ->send(new ManualPaymentGuideMail($manual_payment_guide_step['value'], $user));

    }

    public function nfcOrderStatusMail(Request $request) {
        $email = $request->email;
        if(!$email){
            $email = "abdulhadijatoi@gmail.com";
        }

        $order = collect(["name"=>"Abdul Hadi"]);
        

        Mail::to($email)->send(new NfcOrderStatusMail($order,3));
    }

    public function planExpirationReminder(Request $request) {
        $email = $request->email;
        if(!$email){
            $email = "abdulhadijatoi@gmail.com";
        }

        $data = [
            'first_name' => "Abdul",
            'last_name' => "Hadi"
        ];

        Mail::to($email)->send(new PlanExpirationReminder($data));
    }

    public function sendinviteMail(Request $request) {
        $email = $request->email;
        if(!$email){
            $email = "abdulhadijatoi@gmail.com";
        }

        $input = [
            'referralUrl' => "TEST_URL.COM",
            'username' => "ABDUL HADI",
        ];
        
        Mail::to($email)
            ->send(new SendinviteMail($input, $email));
    }

    public function sendWithdrawalRequestChangedMail(Request $request) {
        $email = $request->email;
        if(!$email){
            $email = "abdulhadijatoi@gmail.com";
        }

        $data['toName'] = "Abdul Hadi";
        $data['amount'] = 102;
        $data['rejectionNote'] = "NOTE";
        $subject = 'Withdrawal Request Rejected';
        $mailview = 'emails.withdrawal_rejected_mail';
        Mail::to($email)->send(new SendWithdrawalRequestChangedMail($data, $subject, $mailview));
    }

    public function superAdminManualPaymentMail(Request $request) {
        $email = $request->email;
        if(!$email){
            $email = "abdulhadijatoi@gmail.com";
        }

        $super_admin_data = [
            'super_admin_msg' => "TEST ADMIN MESG",
            'attachment' => 'NA',
            'notes' => "TEST NOTES",
            'id' => 100,
        ];

        Mail::to($email)->send(new SuperAdminManualPaymentMail($super_admin_data, $email));
    }

    public function userAppointmentMail(Request $request) {
        $email = $request->email;
        if(!$email){
            $email = "abdulhadijatoi@gmail.com";
        }

        $input = [
            "toName"=>"NAME_TEXT",
            "name"=>"ABDUL HADI",
            "date"=>"2024-02-26",
            "from_time"=>"11:56:00",
            "to_time"=>"12:26:00",
            "vcard_name"=>"VCARD_NAME",
            "phone"=>"30291310293"
        ];

        Mail::to($email)
            ->send(new UserAppointmentMail('emails.user_appointment_mail',
                __('messages.mail.book_appointment'),
                $input));
    }

    public function verifyMail(Request $request) {
        $email = $request->email;
        if(!$email){
            $email = "abdulhadijatoi@gmail.com";
        }

        $user = collect(["first_name"=> "Abdul Hadi", "last_name"=>"Hadi"]);
        $data = [
            'user' => $user,
            'url' => "TESTURL.COM",
        ];

        Mail::to($email)->send(new VerifyMail($data));
    }

}
