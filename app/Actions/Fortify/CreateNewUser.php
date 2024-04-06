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
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['accepted', 'required'] : '',
            'phone_number' => ['required'],
        ])->validate();

        $user = User::create([
            'name' => $input['name'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
            'is_ingatlanos'=>$input['user'],
            'phone_number'=>$input['phone_number'],
        ]);

        Agents::create([
            'user_id' => $user->id,
            'salary' => $input['commission'],
            'experience' => $input['experience'],
            'help' => implode(',', $input['help']),
            'language' => $input['known_language'],
            'description' => $input['description'],
        ]);

        return $user;
    }
}
