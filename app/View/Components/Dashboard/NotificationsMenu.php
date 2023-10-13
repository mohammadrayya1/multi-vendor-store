<?php

namespace App\View\Components\Dashboard;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\Component;

class NotificationsMenu extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public  $notifications;
    public  $newcount;
    public function __construct( $count =10)
    {
        $user=Auth::user();
        $this->notifications=$user->notifications()->take($count)->get();
        $this->newcount=$user->unreadNotifications()->count();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.dashboard.notifications-menu');
    }
}
