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
            'phone_number' => ['required'],
            'notification_state' => ['nullable'],
        ])->validate();

        if($input['user']== 'i'){
            Validator::make($input, [
                'salary' => ['required'],
                'experience' => ['required'],
                'help' => 'nullable',
                'language' => ['required'],
                'description' => ['required'],
            ])->validate();
        }

        if(!isset($input['state'])){
            $input['state'] = array();
        }
        $user = User::create([
            'name' => $input['name'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
            'is_ingatlanos'=>$input['user'],
            'phone_number'=>$input['phone_number'],
            'email_notification' => $input['email_notification'] ?? false,
            'notification_state' => json_encode($input['state'], JSON_UNESCAPED_UNICODE),
        ]);

        if(!isset($input['help'])){
            $input['help'] = array();
        }
        if($input['user'] == 'i'){
            Agents::create([
                'user_id' => $user->id,
                'salary' => $input['commission'],
                'experience' => $input['experience'],
                'help' => json_encode($input['help'], JSON_UNESCAPED_UNICODE),
                'language' => $input['known_language'],
                'description' => $input['description'],
            ]);
        }
        return $user;
    }
}
