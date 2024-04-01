<?php

namespace App\Notifications;

use App\Models\User;
use App\Models\Token;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class QuitTokenRequestNotification extends Notification/*  implements ShouldQueue */
{
    use Queueable;

    protected $token, $user, $message;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Token $token, User $user, $message)
    {
        $this->token = $token;
        $this->user = $user;
        $this->message = $message;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->subject('Quit token request ('.$this->token->name.')')
                    ->line('Someone is requesting to quit a token from blacklist')
                    ->line(' ')
                    ->line('<strong>CONTACT INFO</strong>' .
                           '<br><strong>ID:</strong> ' . $this->user->id .
                           '<br><strong>Wallet:</strong> ' . $this->user->wallet .
                           '<br><strong>Telegram:</strong> ' . $this->user->meta['rrss']['telegram'] .
                           '<br><strong>Message:</strong><br>' . nl2br($this->message))
                    ->line(' ')
                    ->line('<strong>TOKEN INFO</strong>' .
                           '<br><strong>ID:</strong> ' . $this->token->id .
                           '<br><strong>Name:</strong> ' . $this->token->name .
                           '<br><strong>Symbol:</strong> ' . $this->token->symbol .
                           '<br><strong>Address:</strong> ' . $this->token->address)
                    ->line(' ')
                    ->action('SCAN TOKEN', url('scanner/token/' . $this->token->address));
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
