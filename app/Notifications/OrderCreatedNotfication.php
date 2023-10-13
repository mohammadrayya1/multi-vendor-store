<?php

namespace App\Notifications;

use App\Models\Order;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class OrderCreatedNotfication extends Notification
{
    use Queueable;

        public $order;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Order $order)
    {
        $this->order=$order;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database'];
            $chanel=["database"];
            if ($notifiable->notification_prerefernce["order_created"]['sms']?? false){
                $chanel[]=["vodafon"];
            }
        if ($notifiable->notification_prerefernce["order_created"]['mail']?? false){
            $chanel[]=["mail"];
        }
        if ($notifiable->notification_prerefernce["order_created"]['broadcast']?? false){
            $chanel[]=["broadcast"];
        }
        return $chanel;
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        $addr =$this->order->billingAddress;
        return (new MailMessage)
                    ->subject("New Order #{$this->order->number}")
                    ->from("notification@ajyal-store.com","Ajyal Stroe")
                    ->greeting("Hi {$notifiable->name}")
                    ->line("a New Order (#{$this->order->number}. created by {$addr->name}")
                    ->action('view Order', url('/home'))
                    ->line('Thank you for using our application!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */

    public  function  toDatabase($notifiable){
        $addr =$this->order->billingAddress;
        return [
            'body'=>"a New Order (#{$this->order->number}. created by {$addr->name}",
            'icon'=>'fas fa-file',
            'url'=>url("/dashboard"),
            "order_id"=>$this->order->id

        ];

    }
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
