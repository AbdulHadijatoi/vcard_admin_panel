<?php

namespace Database\Seeders;

use App\Models\EmailTemplate;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EmailTemplatesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        EmailTemplate::insert([
            [
                "template_name" => "Admin NFC Order",
                "content" => "<div><h2>{{ __('messages.mail.hello') }}</h2><p>{{ __('messages.mail.new_nfc_order') }} {{____DLRSMBL___nfcOrder['name']}}</p><p>{{ __('messages.mail.thanks_regard') }}</p><p>{{ getAppName() }}</p></div>"
            ],
            [
                "template_name" => "Appointment Approve",
                "content" => "<div><div><h2>{{ __('messages.mail.hello') }} <b>{{ ____DLRSMBL___input['name'] }}</b></h2><p>{{ __('messages.mail.approved_successfully') }} {{ ____DLRSMBL___input['date'] }} {{ __('messages.mail.between') }} {{ ____DLRSMBL___input['from_time'] }} {{ __('messages.common.to') }} {{ ____DLRSMBL___input['to_time'] }}</p><p>{{ __('messages.mail.thanks_regard') }}</p><p>{{ getAppName() }}</p></div></div>"
            ],
            [
                "template_name" => "Appointment Mail",
                "content" => "<div><h2>{{ __('messages.mail.hello') }} <b>{{ ____DLRSMBL___name }}</b></h2><p>{{ __('messages.mail.book_successfully') }} {{____DLRSMBL___date}}  {{ __('messages.mail.between') }} {{ ____DLRSMBL___from_time }} {{ __('messages.common.to') }} {{ ____DLRSMBL___to_time }}</p><p>{{ __('messages.mail.thanks_regard') }}</p><p>{{ getAppName() }}</p></div>"
            ],
            [
                "template_name" => "Change Password Mail",
                "content" => "<div><h2>{{ __('messages.mail.hello')  }} {{ ____DLRSMBL___name }}</h2><p>{{ __('messages.mail.password_change')}} <b> {{____DLRSMBL___toName}}.</b> </p><p>{{ __('messages.mail.please_contact_your_admin') }}</p><p>{{ __('messages.mail.thanks_regard') }}</p><p>{{ getAppName() }}</p></div>"
            ],
            [
                "template_name" => "Contact Us",
                "content" => "<h2>{{ __('messages.mail.here_is_enquiry') }}<br></h2><p><b>{{ __('messages.mail.name') }} </b>{{____DLRSMBL___input['name']}}</p><p><b>{{ __('messages.mail.email') }}  </b>{{____DLRSMBL___input['email']}}</p><p><b>{{ __('messages.mail.messages') }} </b>{{____DLRSMBL___input['message']}}</p><p><b>{{ __('messages.common.phone') }} :</b>{{is_null(____DLRSMBL___input['phone']) ? 'N/A' : ____DLRSMBL___input['phone']}}</p><p><b>{{ __('messages.mail.vcard_name') }}  </b>{{____DLRSMBL___input['vcard_name']}}</p>"
            ],
            [
                "template_name" => "Forget Password",
                "content" => "<div><h2>{{ __('messages.mail.hello') }} <b>{{ ____DLRSMBL___user->first_name . ' ' . ____DLRSMBL___user->last_name }}</b></h2><p>{{ __('You are receiving this email because we received a password reset request for your account.') }}</p>@component('mail::button', ['url' => ____DLRSMBL___url]){{ __('messages.user.change_password') }}@endcomponent<p>{{ __('This password reset link will expire in 60 minutes.') }}</p><p>{{ __('If you did not request a password reset, no further action is required.') }}</p><p>{{ getAppName() }}</p><hr><p>{{ __('If you\'re having trouble clicking the \"Reset Password\" button, copy and paste the URL below into your web browser:') }}: <a href=\"{{ ____DLRSMBL___url }}\">{!! ____DLRSMBL___url !!}</a></p></div>"
            ],
            [
                "template_name" => "Landing Contact Us Mail",
                "content" => "<h2>{{ __('messages.mail.here_is_enquiry') }}<br></h2><p><b>{{ __('messages.mail.name') }} </b>{{____DLRSMBL___input['name']}}</p><p><b>{{ __('messages.mail.email') }}  </b>{{____DLRSMBL___input['email']}}</p><p><b>{{ __('messages.common.subject') }}  </b>{{____DLRSMBL___input['subject']}}</p><p><b>{{ __('messages.mail.messages') }} </b>{{____DLRSMBL___input['message']}}</p>"
            ],
            [
                "template_name" => "Manual Payment Guide",
                "content" => "<h2>Hello, {{ ____DLRSMBL___email['first_name'] }} {{ ____DLRSMBL___email['last_name'] }}</h2><p>{{ __('messages.mail.thank_you_chose') }}</p><p>{{ __('messages.mail.please_follow') }}</p>{!! ____DLRSMBL___input !!}<p>{{ __('messages.mail.thanks_regard') }}</p><p>{{ getAppName() }}</p>"
            ],
            [
                "template_name" => "Manual Payment Request Mail",
                "content" => "<h2>Hello, </h2><p>{{__('messages.mail.new_manual_payment_request')}}</p>{!! ____DLRSMBL___input['super_admin_msg'] !!}<div style='margin-top: 10px; display:inline-block;'>@if(____DLRSMBL___input['notes'])<p>Notes :- {{ ____DLRSMBL___input['notes'] ?? 'N/A' }}</p>@endif@if(____DLRSMBL___input['attachment'])<a href='{{url('download-mail-attachment'.'/' .____DLRSMBL___input['id'])}}' target='_blank' style='padding: 0.563rem 1.563rem;  border: 1px solid transparent; background-color: #6571ff;  color: #fff;'>Download Attachment</a>@endif</div><p style='margin-top: 15px'>{{ __('messages.mail.thanks_regard') }}</p><p>{{ getAppName() }}</p>"
            ],
            [
                "template_name" => "NFC Order Status",
                "content" => "<div><div><h2>{{ __('messages.mail.hello') }} <b>{{ ____DLRSMBL___order['name'] }}</b></h2><p>{{ __('messages.nfc.your_order_status_changed') }}</p><p><b>{{  __('messages.nfc.order_status').': ' }}</b>{{ __('messages.nfc.'.App\Models\NfcOrders::ORDER_STATUS_ARR[____DLRSMBL___status]) }}</p><p>{{ __('messages.mail.thanks_regard') }}</p><p>{{ getAppName() }}</p></div></div>"
            ],
            [
                "template_name" => "Plan Expiration Reminder",
                "content" => "<p>{{ __('messages.mail.hello') }} {{ ____DLRSMBL___data['first_name']}} {{ ____DLRSMBL___data['last_name'] }}</p><p>{{ __('messages.mail.plan_expire') }}</p><p>{{ __('messages.mail.thanks_regard') }}</p>"
            ],
            [
                "template_name" => "Send Invite Mail",
                "content" => "<div><h2>Hello </h2><p>You have received an invite from {{ ____DLRSMBL___input['username'] }}.</p><p>Please click on below link to get register.</p><br><a href='{{ ____DLRSMBL___input['referralUrl'] }}'>{{ ____DLRSMBL___input['referralUrl'] }}</a><p></p><p>Thanks & Regards,</p><p>{{ getAppName() }}</p></div>"
            ],
            [
                "template_name" => "User Appointment Mail",
                "content" => "<div><h2>{{ __('messages.mail.hello') }} <b>{{ ____DLRSMBL___toName }}</b></h2><p><b>{{ ____DLRSMBL___name }}  {{ __('messages.mail.booked_appointment_with_you') }} </b>.</p><p><b>{{ __('messages.mail.appointment_time') }} : </b> {{ ____DLRSMBL___date }} - {{ ____DLRSMBL___from_time }} {{__('messages.common.to')}} {{ ____DLRSMBL___to_time }}</p><p><b>{{ __('messages.mail.vcard_name') }} </b> {{ ____DLRSMBL___vcard_name }}</p><p><b>{{ __('messages.vcard.mobile_number') }} : </b> {{ ____DLRSMBL___phone }}</p><p>{{ getAppName() }}</p></div>"
            ],
            [
                "template_name" => "Verify Email",
                "content" => "<div><h2>{{ __('messages.mail.hello') }} <b>{{ ____DLRSMBL___data['user']['first_name'] . ' ' . ____DLRSMBL___data['user']['last_name'] }}</b></h2><p>{{ __('messages.mail.please_click') }}</p>@component('mail::button', ['url' => ____DLRSMBL___data['url']]){{ __('messages.mail.verify_email') }}@endcomponent<p>{{ __('messages.mail.action_required') }}</p><p>{{ __('messages.mail.thanks_regard') }}</p><p>{{ getAppName() }}</p><hr><p>{{ __('messages.mail.slot_text') }}: <a href='{{ ____DLRSMBL___data['url'] }}'>{!! ____DLRSMBL___data['url'] !!}</a></p></div>"
            ],
            [
                "template_name" => "Withdrawal Approved Mail",
                "content" => "<div><h2>{{ __('messages.mail.hello') }} <b>{{ ____DLRSMBL___toName }}</b></h2><p><b>Your Withdrawal request of amount {{ currencyFormat(____DLRSMBL___amount,2) }} is Approved.</b></p><p>{{ getAppName() }}</p></div>"
            ],
            [
                "template_name" => "Withdrawal Rejected Mail",
                "content" => "<div><h2>{{ __('messages.mail.hello') }} <b>{{ ____DLRSMBL___toName }}</b></h2><p><b>Your Withdrawal Request of amount {{ currencyFormat(____DLRSMBL___amount,2) }} is Rejected.</b></p>@if(!empty(____DLRSMBL___rejectionNote))<p><b>Reason :</b></p><p style='text-align: justify'>{{ ____DLRSMBL___rejectionNote }}</p>@endif<p>Thanks & Regards,</p><p>{{ getAppName() }}</p></div>"
            ]]);
    }
}
