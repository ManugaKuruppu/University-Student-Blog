<?php

// app/Http/Livewire/NotificationsComponent.php
namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Event;

class NotificationsComponent extends Component
{
    public $newEvents;

    public function mount()
    {
        $this->loadNotifications();
    }

    public function loadNotifications()
    {
        // Fetch new events
        $this->newEvents = Event::where('published_at', '>=', now()->subDays(7))->get();
    }

    public function render()
    {
        return view('livewire.notifications-component');
    }
}

