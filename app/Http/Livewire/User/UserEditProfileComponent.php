<?php

namespace App\Http\Livewire\User;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;

class UserEditProfileComponent extends Component
{
    use WithFileUploads;
    public $name;
    public $email;
    public $mobile;
    public $line1;
    public $line2;
    public $city;
    public $province;
    public $country;
    public $zipcode;
    public $image;
    public $newImage;


    public function mount(){
        $user=User::find(Auth::user()->id);
        $this->name=$user->name;
        $this->email=$user->email;
        $this->mobile=$user->mobile;
        $this->image=$user->image;
        $this->line1=$user->line1;
        $this->line2=$user->line2;
        $this->city=$user->city;
        $this->province=$user->province;
        $this->country=$user->country;
        $this->zipcode=$user->zipcode;
    }
    public function updateProfile(){
        $user=User::find(Auth::user()->id);
        $user->name=$this->name;
        $user->save();
        $user->profile->mobile=$this->mobile;
        $user->profile->line1=$this->line1;
        $user->profile->line2=$this->line2;
        $user->profile->city=$this->city;
        $user->profile->province=$this->province;
        $user->profile->country=$this->country;
        $user->profile->zipcode=$this->zipcode;
        if($this->newImage)
        {
            if($this->image)
            {
                unlink('assets/images/profile/',$this->image);
            }
            $imageName=Carbon::now()->timestamp.'.'.$this->newImage->getClientOriginalName();
            $this->newImage->storeAs('profile',$imageName);
            $user->profile->image=$imageName;
         }
        $user->profile->save();

         session()->flash('message','Profile has been updated successfully');




    }
    public function render()
    {
        $user=User::find(Auth::user()->id);

        return view('livewire.user.user-edit-profile-component',['user'=>$user])->layout('layouts.master');
    }
}
