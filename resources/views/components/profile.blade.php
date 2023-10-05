<x-layout :doctitle="$doctitle">
    <div class="container py-md-5 container--narrow">
        <h2>
          <img class="avatar-small" src="{{$sharedData[0]['avatar']}}" /> {{$sharedData[0]['username']}}
          @auth
          @if (!$sharedData[0]['currentlyFollowing'] AND auth()->user()->username != $sharedData[0]['username'])     
          <form class="ml-2 d-inline" action="/create-follow/{{$sharedData[0]['username']}}" method="POST">
            @csrf
            <button class="btn btn-primary btn-sm">Follow <i class="fas fa-user-plus"></i></button>
        </form>
         @endif
          @if ($sharedData[0]['currentlyFollowing'])
          <form class="ml-2 d-inline" action="/remove-follow/{{$sharedData[0]['username']}}" method="POST">
                @csrf
                <button class="btn btn-danger btn-sm">Stop Following <i class="fas fa-user-times"></i></button> 
        </form>  
          @endif
          @if (auth()->user()->username == $sharedData[0]['username'])
          <a href="/manage-avatar" class="btn btn-secondary btn-sm">Manage Avatar</a>
          @endif
          @endauth

        </h2>
  
        <div class="profile-nav nav nav-tabs pt-2 mb-4">
          <a href="/profile/{{$sharedData[0]['username']}}" class="profile-nav-link nav-item nav-link {{ Request::segment(3) == "" ? "active" : ""}}">Posts: {{$sharedData[0]['postCount']}}</a>
          <a href="/profile/{{$sharedData[0]['username']}}/followers" class="profile-nav-link nav-item nav-link {{ Request::segment(3) == "followers" ? "active" : ""}}">Followers: {{$sharedData[0]['followerCount']}} </a>
          <a href="/profile/{{$sharedData[0]['username']}}/following" class="profile-nav-link nav-item nav-link {{ Request::segment(3) == "following" ? "active" : ""}}">Following: {{$sharedData[0]['followingCount']}}</a>
          <a href="/profile/{{$sharedData[0]['username']}}/mutual" class="profile-nav-link nav-item nav-link {{ Request::segment(3) == "mutual" ? "active" : ""}}">Mutual: 2</a>
        </div>
        <div class="profile-slot-content">
            {{$slot}}
         </div>
      </div>
</x-layout>    