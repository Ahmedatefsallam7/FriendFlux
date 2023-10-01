<?php

namespace App\Http\Livewire\Settings;

use App\Models\Socials as ModelsSocials;
use Livewire\Component;

class Socials extends Component
{
    public $Facebook;
    public $Twitter;
    public $Linkedin;
    public $Github;

    function mount()
    {
        $data = ModelsSocials::where('user_id', auth()->id())->first();
        if ($data) {
            $this->Facebook = $data->facebook;
            $this->Twitter = $data->twitter;
            $this->Linkedin = $data->linkedin;
            $this->Github = $data->github;
        }
    }

    function save()
    {
        $this->validate([
            'Facebook' => ['sometimes', 'url'],
            'Twitter' => ['sometimes', 'url'],
            'Linkedin' => ['sometimes', 'url'],
            'Github' => ['sometimes', 'url'],
        ]);

        ModelsSocials::create([
            'user_id' => auth()->id(),
            'facebook' => $this->Facebook,
            'twitter' => $this->Twitter,
            'linkedin' => $this->Linkedin,
            'github' => $this->Github,
        ]);

        return back();
    }
    public function render()
    {
        $userAccounts = ModelsSocials::where('user_id', auth()->id())->first();
        return view('livewire.settings.socials', compact('userAccounts'));
    }
}
