<?php

namespace App\Http\Livewire\Settings;

use App\Models\User;
use Livewire\Component;
use Livewire\WithFileUploads;

class AccountInformation extends Component
{
    use WithFileUploads;
    public $first_name;
    public $last_name;
    //    public $mobile;
    //    public $email;
    public $user_name;

    public $profile;
    public $thumbnail;
    public $location;
    public $relationship;
    /**
     * description
     *
     * @var mixed
     */
    /**
     * description
     *
     * @var mixed
     */
    public $description;


    function mount()
    {
        $this->first_name = auth()->user()->first_name;
        $this->last_name = auth()->user()->last_name;
        $this->user_name = auth()->user()->user_name;
        //        $this->email = auth()->user()->email;
        //        $this->mobile = auth()->user()->mobile;
        $this->profile = auth()->user()->profile;
        $this->thumbnail = auth()->user()->thumbnail;
        $this->location = auth()->user()->location;
        $this->relationship = auth()->user()->relationship;
        $this->description = auth()->user()->description;
    }

    public function updateProfile()
    {
        $this->validate([
            'first_name' => 'required|string|min:3|max:50',
            'last_name' => 'required|string|min:3|max:50',
            'user_name' => 'required|string|min:3|max:20',
            'profile' => 'nullable|image|mimes:jpg, jpeg, png|unique:' . User::class,
            'thumbnail' => 'nullable|image|mimes:jpg, jpeg, png|unique:' . User::class,
            'location' => 'nullable|string',
            'relationship' => 'nullable|string',
            'description' => 'nullable|string',
        ]);

        $user = User::find(auth()->id());
        unlink('storage/' . $user->profile);

        $user->first_name = $this->first_name;
        $user->last_name = $this->last_name;
        $user->user_name = $this->user_name;
        $user->profile = $this->profile;
        $user->thumbnail = $this->thumbnail;
        $user->location = $this->location;
        $user->relationship = $this->relationship;
        $user->description = $this->description;
        $user->save();


        if ($this->profile || $this->thumbnail) {
            $profile = $this->profile->store('users/icon', 'public');
            $thumb = $this->thumbnail ? $this->thumbnail->store('users/thumbnail', 'public')
                : $this->profile->store('users/thumbnail', 'public');
            $user->update([
                'profile' => $profile,
                'thumbnail' => $thumb,
            ]);
        }
        return to_route('settings.account_information');
    }

    public function render()
    {
        return view('livewire.settings.account-information');
    }
}