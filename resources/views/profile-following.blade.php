<x-profile :sharedData="$sharedData" doctitle="Who {{$sharedData[0]['username']}} Follows">
  @include('profile-following-only')
</x-profile>