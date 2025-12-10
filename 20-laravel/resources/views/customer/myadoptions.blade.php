@extends('layouts.dashboard')
@section('title', 'My Adoptions: Larapets 🦧')

@section('content')
<h1 class="text-4xl text-white flex gap-2 items-center justify-center pb-4 border-b-2 border-neutral-50 mb-5">
    <svg xmlns="http://www.w3.org/2000/svg" class="size-10" fill="currentColor" viewBox="0 0 256 256">
        <path
            d="M32,64a8,8,0,0,1,8-8H216a8,8,0,0,1,0,16H40A8,8,0,0,1,32,64Zm8,72h64a8,8,0,0,0,0-16H40a8,8,0,0,0,0,16Zm80,48H40a8,8,0,0,0,0,16h80a8,8,0,0,0,0-16Zm128-40c0,36.52-50.28,62.08-52.42,63.16a8,8,0,0,1-7.16,0C186.28,206.08,136,180.52,136,144a32,32,0,0,1,56-21.14A32,32,0,0,1,248,144Zm-16,0a16,16,0,0,0-32,0,8,8,0,0,1-16,0,16,16,0,0,0-32,0c0,20.18,26.21,39.14,40,46.93C205.79,183.15,232,164.19,232,144Z">
        </path>
    </svg>
    My adoptions
</h1>

{{-- breadcrums --}}
<div class="breadcrumbs text-sm flex justify-center text-white">
    <ul>
        <li>
            <a href="{{ url('dashboard') }}">
                <svg xmlns="http://www.w3.org/2000/svg" class="size-5" fill="white" viewBox="0 0 256 256">
                    <path
                        d="M227.31,73.37,182.63,28.68a16,16,0,0,0-22.63,0L36.69,152A15.86,15.86,0,0,0,32,163.31V208a16,16,0,0,0,16,16H92.69A15.86,15.86,0,0,0,104,219.31L227.31,96a16,16,0,0,0,0-22.63ZM92.69,208H48V163.31l88-88L180.69,120ZM192,108.68,147.31,64l24-24L216,84.68Z">
                    </path>
                </svg>
                Dashboard
            </a>
        </li>

        <li>
            <span class="inline-flex items-center gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="size-5" fill="currentColor" viewBox="0 0 256 256">
                    <path
                    d="M32,64a8,8,0,0,1,8-8H216a8,8,0,0,1,0,16H40A8,8,0,0,1,32,64Zm8,72h64a8,8,0,0,0,0-16H40a8,8,0,0,0,0,16Zm80,48H40a8,8,0,0,0,0,16h80a8,8,0,0,0,0-16Zm128-40c0,36.52-50.28,62.08-52.42,63.16a8,8,0,0,1-7.16,0C186.28,206.08,136,180.52,136,144a32,32,0,0,1,56-21.14A32,32,0,0,1,248,144Zm-16,0a16,16,0,0,0-32,0,8,8,0,0,1-16,0,16,16,0,0,0-32,0c0,20.18,26.21,39.14,40,46.93C205.79,183.15,232,164.19,232,144Z">
                </path>
                </svg>
                My adoptions
            </span>
            
        </li>
    </ul>
</div>

@csrf
<div class="datalist flex justify-center items-center flex-col gap-4">
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
  <a href="{{ 'myadoptions/' . $adopt->id }}" class="btn btn-info">
    More info
  </a>
  <span class="border b-1 border-white w-8/12"></span>
  @empty
    <div class="card bg-[#99a1af99] mb-5 p-5 text-center my-10 font-bold">
        <h4 class="mb-4">
            You have not made any adoptions yet.
        </h4>
  @endforelse
</div>
{{-- Modal --}}

<dialog id="modal_message" class="modal">
  <div class="modal-box bg-sucess">
    <h3 class="text-lg font-bold">Congrats!</h3>
    <div role="alert" class="alert alert-success">
      <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 shrink-0 stroke-current" fill="none" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
          d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
      </svg>
      <span>{{session('success')}}</span>
    </div>
  </div>
  <form method="dialog" class="modal-backdrop">
    <button>close</button>
  </form>
</dialog>

@section('js')
<script>
    @if (session('success'))
    document.getElementById('modal_message').showModal();
    @endif
</script>
@endsection

@endsection