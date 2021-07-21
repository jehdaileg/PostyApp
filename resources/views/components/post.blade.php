@props(['post'=> $post])

<div>
    <!-- Order your soul. Reduce your wants. - Augustine -->
    <div class="mb-2">
        <a href="{{ route('users.post', $post->user) }}" class="font-bold">{{ $post->user->name }}</a> <span class="text-gray-600">{{ $post->created_at->diffForHumans() }}</span>

        <p class="font-medium p-2">{{ $post->body }}</p>


      <div class="flex items-center">

        @can('delete', $post)

        <div>
            <form action="{{ route('posts.destroy', $post) }}" method="post">
                @csrf
                @method('DELETE')
                <button type="submit" class="text-blue-500"><i class="fa fa-trash-alt"></i> Delete</button>
            </form>
        </div>

        @endcan

        @auth
        @if(!$post->likedByUserAuth(Auth::user()))

        <form action="{{ route('posts.like', $post->id) }}" method="post" class="mr-2 p-2">
            @csrf
             <button type="submit" class="text-blue-500"><i class="fa fa-thumbs-up"></i>Like</button>
        </form>

        @else

        <form action="{{ route('posts.like', $post->id) }}" method="post" class="mr-2 p-2">
            @csrf
            @method('DELETE')
             <button type="submit" class="text-blue-500"><i class="fa fa-thumbs-down"></i>UnLike</button>
        </form>

        @endif
        @endauth

        <span class="text-purple-800">{{ $post->likes->count() }} {{ Str::plural('like', $post->likes->count()) }}</span>

      </div>

    </div>

</div>
