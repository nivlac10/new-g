<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class DepositApprovedNotification extends Notification
{
    private $transaction;

    public function __construct(Transaction $transaction)
    {
        $this->transaction = $transaction;
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->line('Your deposit request has been approved.')
            ->action('View Transaction', url('/transactions/' . $this->transaction->id))
            ->line('Thank you for using our application!');
    }

    public function toArray($notifiable)
    {
        return [
            'message' => 'Your deposit request has been approved.',
            'transaction_id' => $this->transaction->id,
        ];
    }
}
