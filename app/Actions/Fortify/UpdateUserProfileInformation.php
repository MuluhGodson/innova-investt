<?php

namespace App\Actions\Fortify;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Laravel\Fortify\Contracts\UpdatesUserProfileInformation;
use Illuminate\Support\Str;
use Carbon\Carbon;

class UpdateUserProfileInformation implements UpdatesUserProfileInformation
{
    /**
     * Validate and update the given user's profile information.
     *
     * @param  mixed  $user
     * @param  array  $input
     * @return void
     */
    public function update($user, array $input)
    {
        //dd($input);
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', Rule::unique('users')->ignore($user->id)],
            'gender' => ['required', 'string', 'max:1'],
            'photo' => ['nullable', 'image', 'max:1024'],
            'tel' => ['nullable'],
            'date_of_birth' => ['nullable'],
            'town' => ['nullable'],
            'region' => ['nullable'],
            'country' => ['nullable'],
        ])->validateWithBag('updateProfileInformation');

        if (isset($input['photo'])) {
            $user->updateProfilePhoto($input['photo']);
        }

        if ($input['email'] !== $user->email &&
            $user instanceof MustVerifyEmail) {
            $this->updateVerifiedUser($user, $input);
        } else {
            $user->forceFill([
                'name' => $input['name'],
                'email' => $input['email'],
                'gender' => $input['gender'],
                'tel' => $input['tel'],
                'date_of_birth' => Carbon::parse($input['date_of_birth'])->toDateString(),
                'town' => $input['town'],
                'region' => $input['region'],
                'country' => $input['country'],
                'api_token' => Str::random(60),
            ])->save();
        }
    }

    /**
     * Update the given verified user's profile information.
     *
     * @param  mixed  $user
     * @param  array  $input
     * @return void
     */
    protected function updateVerifiedUser($user, array $input)
    {
        $user->forceFill([
            'name' => $input['name'],
            'email' => $input['email'],
            'gender' => $input['gender'],
            'tel' => $input['tel'],
            'date_of_birth' => Carbon::parse($input['date_of_birth'])->toDateString(),
            'town' => $input['town'],
            'region' => $input['region'],
            'country' => $input['country'],
            'api_token' => Str::random(60),
            'email_verified_at' => null,
        ])->save();

        $user->sendEmailVerificationNotification();
    }
}
