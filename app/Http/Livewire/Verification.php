<?php

namespace App\Http\Livewire;

use App\Models\Agent;
use Illuminate\Http\Request;
use Livewire\Component;
use Livewire\WithFileUploads;

class Verification extends Component
{
    use WithFileUploads;

    public $code = '';

    public $photo = null;

    public $agent = null;

    public $state = [
        'phone_number' => '',
        'first_name' => '',
        'last_name' => '',
        'voting_station' => '',
    ];

    protected $rules = [
        'photo' => ['required', 'image', 'max:1024'],
        'state.phone_number' => ['required', 'min:8'],
        'state.first_name' => ['required', 'min:3'],
        'state.last_name' => ['required', 'min:3'],
        'state.voting_station' => ['required'],
    ];

    protected $queryString = ['code' => ['except' => ''],];

    public function mount(Request $request)
    {
        $this->agent = Agent::query()->whereCode($request->input('code'))->first();

        if ($this->agent) {
            $this->setInformations($this->agent);
        }
    }

    public function render()
    {
        return view('livewire.verification')->layout('layouts.guest');
    }

    public function search()
    {
        $this->agent = Agent::query()->whereCode($this->code)->first();

        if ($this->agent) {
            $this->setInformations($this->agent);
        }
    }

    public function updateProfileInformation()
    {
        $this->resetErrorBag();

        $this->validate();
        $this->agent->updateProfilePhoto($this->photo);
        $this->agent->update($this->state);

        $this->emit('saved');
    }

    private function setInformations(Agent $agent)
    {
        $this->state['phone_number'] = $agent->phone_number;
        $this->state['first_name'] = $agent->first_name;
        $this->state['last_name'] = $agent->last_name;
        $this->state['voting_station'] = $agent->voting_station;
    }
}
