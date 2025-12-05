 @forelse ($adopts as $adopt )
  <div class="avatar-group -space-x-6">
    <div class="avatar">
      <div class="w-24">
        <img src="{{ asset ('images/'.$adopt->user->photo) }}" />
      </div>
    </div>
    <div class="avatar">
      <div class="w-24">
        <img src="{{ asset ('images/'.$adopt->pet->image) }}" />
      </div>
    </div>
  </div>
  <h4 class="text-white">
    <span class="underline font-bold">{{ $adopt->pet->name }}</span>
    adopted by
    <span>{{ $adopt->user->fullname }}</span>
    on {{ $adopt->created_at->diffForHumans() }}
  </h4>
  <a href="{{ 'adoptions/' . $adopt->id }}" class="btn btn-info">
    More info
  </a>
  <span class="border b-1 border-white w-8/12"></span>
  @empty
    <div class="alert alert-warning text-center">
      No adoption records found matching your search.
    </div>
  @endforelse