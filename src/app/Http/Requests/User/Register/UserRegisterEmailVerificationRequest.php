<?php

namespace App\Http\Requests\User\Register;

use Illuminate\Foundation\Auth\EmailVerificationRequest;

final class UserRegisterEmailVerificationRequest extends EmailVerificationRequest
{
    /**
     * Get the user making the request.
     *
     * @param  string|null  $guard
     * @return mixed
     */
    public function user($guard = 'user')
    {
        return call_user_func($this->getUserResolver(), $guard);
    }
}
