@extends('layouts.dashboard')

@section('title', 'Module Adoptions: Larapets 🐒')

@section('content')
<h1 class="text-4xl text-black flex gap-2 items-center justify-center pb-4 border-b-2 border-black">Module Adoptions
  <svg xmlns="http://www.w3.org/2000/svg" class="size-12" fill="currentColor" viewBox="0 0 256 256">
    <path
      d="M230.92,212c-15.23-26.33-38.7-45.21-66.09-54.16a72,72,0,1,0-73.66,0C63.78,166.78,40.31,185.66,25.08,212a8,8,0,1,0,13.85,8c18.84-32.56,52.14-52,89.07-52s70.23,19.44,89.07,52a8,8,0,1,0,13.85-8ZM72,96a56,56,0,1,1,56,56A56.06,56.06,0,0,1,72,96Z">
    </path>
  </svg>
</h1>

<div class="join gap-2 mx-auto">
  <a class=" join-item btn btn-info" href="{{ url('export/pets/pdf') }}"><svg xmlns="http://www.w3.org/2000/svg"
      class="size-6" fill="currentColor" viewBox="0 0 256 256">
      <path
        d="M224,152a8,8,0,0,1-8,8H192v16h16a8,8,0,0,1,0,16H192v16a8,8,0,0,1-16,0V152a8,8,0,0,1,8-8h32A8,8,0,0,1,224,152ZM92,172a28,28,0,0,1-28,28H56v8a8,8,0,0,1-16,0V152a8,8,0,0,1,8-8H64A28,28,0,0,1,92,172Zm-16,0a12,12,0,0,0-12-12H56v24h8A12,12,0,0,0,76,172Zm88,8a36,36,0,0,1-36,36H112a8,8,0,0,1-8-8V152a8,8,0,0,1,8-8h16A36,36,0,0,1,164,180Zm-16,0a20,20,0,0,0-20-20h-8v40h8A20,20,0,0,0,148,180ZM40,112V40A16,16,0,0,1,56,24h96a8,8,0,0,1,5.66,2.34l56,56A8,8,0,0,1,216,88v24a8,8,0,0,1-16,0V96H152a8,8,0,0,1-8-8V40H56v72a8,8,0,0,1-16,0ZM160,80h28.69L160,51.31Z">
      </path>
    </svg>
    <span class="hidden md:inline">Export</span>
  </a>
  <a class="join-item btn btn-info" href="{{ url('export/pets/excel') }}"><svg xmlns="http://www.w3.org/2000/svg"
      class="size-6" fill="currentColor" viewBox="0 0 256 256">
      <path
        d="M156,208a8,8,0,0,1-8,8H120a8,8,0,0,1-8-8V152a8,8,0,0,1,16,0v48h20A8,8,0,0,1,156,208ZM92.65,145.49a8,8,0,0,0-11.16,1.86L68,166.24,54.51,147.35a8,8,0,1,0-13,9.3L58.17,180,41.49,203.35a8,8,0,0,0,13,9.3L68,193.76l13.49,18.89a8,8,0,0,0,13-9.3L77.83,180l16.68-23.35A8,8,0,0,0,92.65,145.49Zm98.94,25.82c-4-1.16-8.14-2.35-10.45-3.84-1.25-.82-1.23-1-1.12-1.9a4.54,4.54,0,0,1,2-3.67c4.6-3.12,15.34-1.72,19.82-.56a8,8,0,0,0,4.07-15.48c-2.11-.55-21-5.22-32.83,2.76a20.58,20.58,0,0,0-8.95,14.95c-2,15.88,13.65,20.41,23,23.11,12.06,3.49,13.12,4.92,12.78,7.59-.31,2.41-1.26,3.33-2.15,3.93-4.6,3.06-15.16,1.55-19.54.35A8,8,0,0,0,173.93,214a60.63,60.63,0,0,0,15.19,2c5.82,0,12.3-1,17.49-4.46a20.81,20.81,0,0,0,9.18-15.23C218,179,201.48,174.17,191.59,171.31ZM40,112V40A16,16,0,0,1,56,24h96a8,8,0,0,1,5.66,2.34l56,56A8,8,0,0,1,216,88v24a8,8,0,1,1-16,0V96H152a8,8,0,0,1-8-8V40H56v72a8,8,0,0,1-16,0ZM160,80h28.68L160,51.31Z">
      </path>
    </svg>
    <span class="hidden md:inline">Export</span>
  </a>
</div>

<label class="input text-black">
  <svg class="h-[1em]" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
    <g stroke-linejoin="round" stroke-linecap="round" stroke-width="2.5" fill="none" stroke="currentColor">
      <circle cx="11" cy="11" r="8"></circle>
      <path d="m21 21-4.3-4.3"></path>
    </g>
  </svg>
  <input type="search" required placeholder="Search" name="qsearch" id="qsearch" />
</label>

@csrf
<div class="datalist flex justify-center items-center flex-col gap-4">
  @foreach ($adopts as $adopt )
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
  @endforeach
</div>

@endsection

@section('js')

<script>
  // Modal 
  $(document).ready(function() {
                
// Search
            function debounce(func, wait) {
                let timeout
                return function executedFunction(...args) {
                    const later = () => {
                        clearTimeout(timeout)
                        func(...args)
                    };
                    clearTimeout(timeout)
                    timeout = setTimeout(later, wait)
                }
            }
            const search = debounce(function(query) {
                
                $token = $('input[name=_token]').val()
                
                $.post("search/adoptions", {'q': query, '_token': $token},
                    function (data) {
                        $('.datalist').html(data).hide().fadeIn(1000)
                    }
                )
            }, 500)
            $('body').on('input', '#qsearch', function(event) {
                event.preventDefault()
                const query = $(this).val()
                
                $('.datalist').html(`
                                      <div class="text-center py-18">
                                          <span class="loading loading-spinner loading-xl"></span>
                                      </div>
                                    `)
                
                if(query != '')
                {
                  search(query)
                } else
                {
                  setTimeout(() => {
                  window.location.replace('adoptions')
                }, 500);
                }
            })
            // Import
            $('.btn-import').click(function(){
                $('#file').click()
            })
            $('#file').change(function(){
                $(this).parent().submit()
            })
  })
  
</script>


@endsection