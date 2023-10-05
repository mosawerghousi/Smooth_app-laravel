<x-profile :sharedData="$sharedData" doctitle="{{ $sharedData[0]['username']}}'s Profile">
  @include('profile-posts-only')
</x-profile>