<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class NotificationsComponent extends Component
{
    public $showPanel = false;
    public $notifications = [];

    public function mount()
    {
        $this->fetchNotifications();
        $this->togglePanel();
    }

    public function fetchNotifications()
    {
        $user = Auth::user();
        if ($user) {
            // Fetch notifications with additional data
            $notifications = $user->notifications()->whereNull('read_at')->get()->toArray();

            // Assign the modified notifications array to $this->notifications
            $this->notifications = $notifications;
        }
    }



    public function markAsRead($id) {
        $notification = Notification::findOrFail($id);
        $notification->read_at = now();
        $notification->save();
        return redirect()->back();
    }

    public function togglePanel()
    {
        $this->showPanel = !$this->showPanel;
    }


    public function render()
    {
        return view('livewire.notifications-component');
    }
}


