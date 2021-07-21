@component('mail::message')
Your post was liked

{{ $user_who_liked_the_post->name }} liked your post

@component('mail::button', ['url' => route('posts.show', $post_liked_by_user)])
View the post
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
