<?php
// app/Notifications/PostCreatedNotification.php
namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;

class PostCreatedNotification extends Notification
{
    use Queueable;

    public $post;

    public function __construct($post)
    {
        $this->post = $post;
    }

    public function via($notifiable)
    {
        return ['database', 'mail'];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->line('A new post has been published: ' . $this->post->title)
                    ->action('View Post', url('/posts/' . $this->post->id));
    }

    public function toArray($notifiable)
    {
        return [
            'post_title' => $this->post->title,
            'post_url' => url('/posts/' . $this->post->id),
        ];
    }
}
