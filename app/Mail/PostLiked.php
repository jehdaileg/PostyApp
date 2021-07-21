<?php

namespace App\Mail;

use App\Models\Post;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class PostLiked extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $user_who_liked_the_post;
    public $post_liked_by_user;

    public function __construct(User $user_who_liked_the_post, Post $post_liked_by_user)
    {
        //
        $this->user_who_liked_the_post = $user_who_liked_the_post;
        $this->post_liked_by_user = $post_liked_by_user;

    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.posts.post_liked')
                    ->subject("Someone Liked your post");
    }
}
