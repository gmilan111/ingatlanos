<?php

namespace App\Actions\Fortify;

use App\Models\Agents;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array<string, string>  $input
     */
    public function create(array $input): User
    {
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => $this->passwordRules(),
            /*'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['accepted', 'required'] : '',*/
            'phone_number' => ['required'],
            'salary' => ['nullable', 'string'],
            'experience' => ['nullable', 'integer'],
            'help' => 'nullable',
            'language' => ['nullable', 'string'],
            'descritpion' => ['nullable', 'string'],
        ])->validate();

        $user = User::create([
            'name' => $input['name'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
            'is_ingatlanos'=>$input['user'],
            'phone_number'=>$input['phone_number'],
            'email_notification' => $input['email_notification'] ?? false,
            'notification_state' => json_encode($input['state'], JSON_UNESCAPED_UNICODE),
        ]);

        if($input['user'] == 'i'){
            Agents::create([
                'user_id' => $user->id,
                'salary' => $input['commission'],
                'experience' => $input['experience'],
                'language' => $input['known_language'],
                'description' => $input['description'],
            ]);

            if(isset($input['help'])){
                Agents::created([
                    'help' => implode(',', $input['help']),
                ]);
            }
        }
        return $user;
    }
}
