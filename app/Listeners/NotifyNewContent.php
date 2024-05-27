<?php

namespace App\Listeners;

use App\Events\NewContentCreated;
use App\Models\User;
use App\Models\Notification;

class NotifyNewContent
{
    /**
     * Handle the event.
     *
     * @param  \App\Events\NewContentCreated  $event
     * @return void
     */
    public function handle(NewContentCreated $event)
    {
        $content = $event->content;
        $users = User::all(); // Or fetch users based on your logic

        foreach ($users as $user) {
            Notification::create([
                'user_id' => $user->id,
                'type' => get_class($content), // Assuming class name is the type
                'notifiable_id' => $content->id,
                'notifiable_type' => get_class($content),
            ]);
        }
    }
}
