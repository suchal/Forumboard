<?php

namespace App\Notifications;

use App\Comment;
use App\Post;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class CommentOnUsersPost extends Notification
{
    private $comment;
    private $post;

    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Comment $comment,Post $post)
    {
        //
        $this->comment = $comment;
        $this->post = $post;
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
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        $slug = $this->post->getSlug();
        return [
            'type' => 'commentownpost',
            'data' => [
                'comment_username'  => $this->comment->user->username,
                'post_slug'         => $slug,
                'post_title'        => $this->post->title
            ]
        ];
    }
}
