<?php

namespace App\Notifications;

use App\Models\Truck;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class TruckMaintenance extends Notification
{
    use Queueable;

    public $truck;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Truck $truck)
    {
        $this->truck = $truck;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param mixed $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database', 'mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param mixed $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        $line = "This email is considered a truck maintenance notification for truck with plate number {$this->truck->p_number}";

        return (new MailMessage)
            ->line($line)
            ->action('Preview Truck', route('provider.trucks.show', $this->truck->id))
            ->line('Thank you for using our application!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param mixed $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            'text' => __('trucks.m_notification'),
            'provider_id' => $this->truck->id,
            'show_url' => route('provider.trucks.show', $this->truck->id)
        ];

    }//end of to array

}//end of to array
