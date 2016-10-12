<?php

namespace App\Http\Requests;

use App\User;
use Illuminate\Foundation\Http\FormRequest;

class ProfileUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
        'bio' => 'required|min:20|max:250',
        'username' => 'required|min:5|max:20',
        'email' => 'required|email',
        'phone_number' => 'numeric|digits_between:9,16',
        'password' => 'min:8|max:20|confirmed'
        ];
    }

    public function persist($user = null){
        if(! isset($user) )
            $user = $this->user();
        $data=[];
        $data['bio'] = $this->bio;
        if(isset($this->username)) $data['username'] = $this->username;
        if(isset($this->email)) $data['email'] = $this->email;
        if(isset($this->phone_number)) $data['phone_number'] = $this->phone_number;
        if(isset($this->password)&& strlen(trim($this->password))>7 ) $data['password'] = bcrypt($this->password);
        if(isset($this->show_phone_number)) $data['show_phone_number'] = true;
        else $data['show_phone_number'] = false;
        $user->update($data);
    }

    public function check($user = null){
        
        $errors=[];
        if(! isset($user) )
            $user = $this->user();

        if(
            $user->username != $this->username
            &&
            User::where('username',$this->username)->exists()
        ){
            return "error";
            $errors['username']="This username is not available!";
        }
        if(
            $user->email != $this->email
            &&
            User::where('email',$this->email)->exists()
        ){
            $errors['email'] = "The email you entered is already used!";
        }
        return $errors;
    }
}
