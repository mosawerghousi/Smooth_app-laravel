<x-profile :sharedData="$sharedData" doctitle="{{$sharedData[0]['username']}}'s Followers">
  @include('profile-followers-only')
</x-profile>