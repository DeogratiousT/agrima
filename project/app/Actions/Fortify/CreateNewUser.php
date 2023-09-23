<?php

namespace App\Actions\Fortify;

use App\Models\Role;
use App\Models\User;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array  $input
     * @return \App\Models\User
     */
    public function create(array $input)
    {
        $messages = [
            'toc.required' => 'You have to agree to our Terms and Conditions to proceed',
        ];

        $data = [
            'role' => ['required', 'string', 'in:farmer,vendor'],
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'toc' => ['required'],
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique(User::class),
            ],
            'password' => $this->passwordRules(),
        ];

        Validator::make($input, $data, $messages)->validate();

        $role_id = Role::where('slug','buyer')->pluck('id')->first();

        if (isset($input['role']) && $input['role'] == 'farmer') {
            $role_id = Role::where('slug','seller')->pluck('id')->first();
        }
        

        return User::create([
            'name' => $input['first_name'] . ' ' . $input['last_name'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
            'role_id' => $role_id,
        ]);
    }
}
