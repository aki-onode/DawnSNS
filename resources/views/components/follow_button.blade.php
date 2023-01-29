<div class="follow-button">
    @if (auth()->user()->isFollowing($id))
        <form method="post" action="{{ route('unfollow.user', $id) }}">
            @method('delete')
            @csrf
            <button type="submit" class="follow-button btn-red">フォローをはずす</button>
        </form>
    @else
        <form action="{{ route('follow.user', $id) }}" method="post">
            @csrf
            <button type="submit" class="follow-button btn-blue">フォローする</button>
        </form>
    @endif
</div>
