<?php

namespace App\Repositories;

use App\Models\UserSetting;
use Illuminate\Support\Arr;

/**
 * Class UserRepository
 */
class UserSettingRepository extends BaseRepository
{
    /**
     * {@inheritDoc}
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * {@inheritDoc}
     */
    public function model()
    {
        return UserSetting::class;
    }

    public function update($input, $id)
    {
        $inputArr = Arr::except($input, ['_token', 'sectionName']);

        $inputArr['stripe_enable'] = isset($inputArr['stripe_enable']) ? '1' : '0';
        $inputArr['paytack_enable'] = isset($inputArr['paytack_enable']) ? '1' : '0';
        $inputArr['paypal_enable'] = isset($inputArr['paypal_enable']) ? '1' : '0';
        $inputArr['enable_affiliation'] = isset($inputArr['enable_affiliation']) ? '1' : '0';
        $inputArr['enable_contact'] = isset($inputArr['enable_contact']) ? '1' : '0';
        $inputArr['hide_stickybar'] = isset($inputArr['hide_stickybar']) ? '1' : '0';
        $inputArr['whatsapp_share'] = isset($inputArr['whatsapp_share']) ? '1' : '0';
        $inputArr['subscription_model_time'] = isset($inputArr['subscription_model_time']) ? $inputArr['subscription_model_time'] : '5';

        foreach ($inputArr as $key => $value) {
            /** @var UserSetting $setting */
            $setting = UserSetting::where('key', $key)->where('user_id', $id)->first();
            if (! $setting) {
                UserSetting::create([
                    'user_id' => $id,
                    'key' => $key,
                    'value' => $value,
                ]);
            } else {
                $setting->update(['value' => $value]);
            }
        }

        return $setting;

    }
}
