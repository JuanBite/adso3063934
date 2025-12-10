@extends('layouts.dashboard')
@section('title'. 'Dashboard ADMIN: Larapets 🐒')

@section('content')
<h1 class="text-4xl text-black flex gap-2 items-center justify-center pb-4 border-b-2 border-black">Dashboard
  <svg xmlns="http://www.w3.org/2000/svg" class="size-8" fill="currentColor" viewBox="0 0 256 256">
    <path
      d="M227.31,73.37,182.63,28.68a16,16,0,0,0-22.63,0L36.69,152A15.86,15.86,0,0,0,32,163.31V208a16,16,0,0,0,16,16H92.69A15.86,15.86,0,0,0,104,219.31L227.31,96a16,16,0,0,0,0-22.63ZM92.69,208H48V163.31l88-88L180.69,120ZM192,108.68,147.31,64l24-24L216,84.68Z">
    </path>
  </svg>
</h1>
{{-- Cards --}}
<div class="flex flex-wrap gap-4 justify-center">
  @if(Auth::user()->role == 'Administrator')
  {{-- Module Users --}}
  <div class="card bg-[#99a1af66] w-96 shadow-sm">
    <figure>
      <img src="{{ asset('images/moduleUser.png') }}" alt="Info" />
    </figure>
    <div class="card-body text-white">
      <h2 class="card-title ">Module Users</h2>
      <ul class="list bg-[#99a1af99] rounded-box shadow-md">

        <li class="p-4 pb-2 text-xs tracking-wide">Stadistics</li>

        <li class="list-row">
          <div><svg xmlns="http://www.w3.org/2000/svg" class="size-10" fill="currentColor" viewBox="0 0 256 256">
              <path
                d="M27.2,126.4a8,8,0,0,0,11.2-1.6,52,52,0,0,1,83.2,0,8,8,0,0,0,11.2,1.59,7.73,7.73,0,0,0,1.59-1.59h0a52,52,0,0,1,83.2,0,8,8,0,0,0,12.8-9.61A67.85,67.85,0,0,0,203,93.51a40,40,0,1,0-53.94,0,67.27,67.27,0,0,0-21,14.31,67.27,67.27,0,0,0-21-14.31,40,40,0,1,0-53.94,0A67.88,67.88,0,0,0,25.6,115.2,8,8,0,0,0,27.2,126.4ZM176,40a24,24,0,1,1-24,24A24,24,0,0,1,176,40ZM80,40A24,24,0,1,1,56,64,24,24,0,0,1,80,40ZM203,197.51a40,40,0,1,0-53.94,0,67.27,67.27,0,0,0-21,14.31,67.27,67.27,0,0,0-21-14.31,40,40,0,1,0-53.94,0A67.88,67.88,0,0,0,25.6,219.2a8,8,0,1,0,12.8,9.6,52,52,0,0,1,83.2,0,8,8,0,0,0,11.2,1.59,7.73,7.73,0,0,0,1.59-1.59h0a52,52,0,0,1,83.2,0,8,8,0,0,0,12.8-9.61A67.85,67.85,0,0,0,203,197.51ZM80,144a24,24,0,1,1-24,24A24,24,0,0,1,80,144Zm96,0a24,24,0,1,1-24,24A24,24,0,0,1,176,144Z">
              </path>
            </svg></div>
          <div>
            <div class="text-xs uppercase font-semibold mt-3">Total Users</div>
          </div>
          <button class="btn btn-square btn-ghost">
            {{ App\Models\User::Count() }}
          </button>
        </li>
        <li class="list-row">
          <div><svg xmlns="http://www.w3.org/2000/svg" class="size-10" fill="currentColor" viewBox="0 0 256 256">
              <path
                d="M152,80a8,8,0,0,1,8-8h88a8,8,0,0,1,0,16H160A8,8,0,0,1,152,80Zm96,40H160a8,8,0,0,0,0,16h88a8,8,0,0,0,0-16Zm0,48H184a8,8,0,0,0,0,16h64a8,8,0,0,0,0-16Zm-96.25,22a8,8,0,0,1-5.76,9.74,7.55,7.55,0,0,1-2,.26,8,8,0,0,1-7.75-6c-6.16-23.94-30.34-42-56.25-42s-50.09,18.05-56.25,42a8,8,0,0,1-15.5-4c5.59-21.71,21.84-39.29,42.46-48a48,48,0,1,1,58.58,0C129.91,150.71,146.16,168.29,151.75,190ZM80,136a32,32,0,1,0-32-32A32,32,0,0,0,80,136Z">
              </path>
            </svg></div>
          <div>
            <div class="text-xs uppercase font-semibold mt-3">Customers</div>
          </div>
          <button class="btn btn-square btn-ghost">
            {{ App\Models\User::where('role', 'customer')->Count() }}
          </button>
        </li>
        <li class="list-row">
          <div><svg xmlns="http://www.w3.org/2000/svg" class="size-10" fill="currentColor" viewBox="0 0 256 256">
              <path
                d="M144,157.68a68,68,0,1,0-71.9,0c-20.65,6.76-39.23,19.39-54.17,37.17a8,8,0,0,0,12.25,10.3C50.25,181.19,77.91,168,108,168s57.75,13.19,77.87,37.15a8,8,0,0,0,12.25-10.3C183.18,177.07,164.6,164.44,144,157.68ZM56,100a52,52,0,1,1,52,52A52.06,52.06,0,0,1,56,100Zm197.66,33.66-32,32a8,8,0,0,1-11.32,0l-16-16a8,8,0,0,1,11.32-11.32L216,148.69l26.34-26.35a8,8,0,0,1,11.32,11.32Z">
              </path>
            </svg></div>
          <div>
            <div class="text-xs uppercase font-semibold mt-3">Active Users</div>
          </div>
          <button class="btn btn-square btn-ghost">
            {{ App\Models\User::where('active', '1')->Count() }}
          </button>
        </li>

      </ul>
      <div class="card-actions justify-end">
        <a class="btn btn-accent justify-center text-white" href="{{ url('users')  }}"> Enter<svg
            xmlns="http://www.w3.org/2000/svg" class="size-6" fill="currentColor" viewBox="0 0 256 256">
            <path
              d="M128,24A104,104,0,1,0,232,128,104.11,104.11,0,0,0,128,24Zm0,192a88,88,0,1,1,88-88A88.1,88.1,0,0,1,128,216Zm29.66-93.66a8,8,0,0,1,0,11.32l-40,40a8,8,0,0,1-11.32-11.32L140.69,128,106.34,93.66a8,8,0,0,1,11.32-11.32Z">
            </path>
          </svg>
        </a>
      </div>
    </div>
  </div>
  {{-- Cards --}}
  <div class="flex flex-wrap gap-4 justify-center">
    {{-- Module Users --}}
    <div class="card bg-[#99a1af66] w-96 shadow-sm">
      <figure>
        <img src="{{ asset('images/modulePet.png') }}" alt="Shoes" />
      </figure>
      <div class="card-body text-white">
        <h2 class="card-title ">Module Pets</h2>
        <ul class="list bg-[#99a1af99] rounded-box shadow-md">

          <li class="p-4 pb-2 text-xs tracking-wide">Stadistics</li>

          <li class="list-row">
            <div><svg xmlns="http://www.w3.org/2000/svg" class="size-10" fill="currentColor" viewBox="0 0 256 256">
                <path
                  d="M212,80a28,28,0,1,0,28,28A28,28,0,0,0,212,80Zm0,40a12,12,0,1,1,12-12A12,12,0,0,1,212,120ZM72,108a28,28,0,1,0-28,28A28,28,0,0,0,72,108ZM44,120a12,12,0,1,1,12-12A12,12,0,0,1,44,120ZM92,88A28,28,0,1,0,64,60,28,28,0,0,0,92,88Zm0-40A12,12,0,1,1,80,60,12,12,0,0,1,92,48Zm72,40a28,28,0,1,0-28-28A28,28,0,0,0,164,88Zm0-40a12,12,0,1,1-12,12A12,12,0,0,1,164,48Zm23.12,100.86a35.3,35.3,0,0,1-16.87-21.14,44,44,0,0,0-84.5,0A35.25,35.25,0,0,1,69,148.82,40,40,0,0,0,88,224a39.48,39.48,0,0,0,15.52-3.13,64.09,64.09,0,0,1,48.87,0,40,40,0,0,0,34.73-72ZM168,208a24,24,0,0,1-9.45-1.93,80.14,80.14,0,0,0-61.19,0,24,24,0,0,1-20.71-43.26,51.22,51.22,0,0,0,24.46-30.67,28,28,0,0,1,53.78,0,51.27,51.27,0,0,0,24.53,30.71A24,24,0,0,1,168,208Z">
                </path>
              </svg></div>
            <div>
              <div class="text-xs uppercase font-semibold mt-3">Total Pets</div>
            </div>
            <button class="btn btn-square btn-ghost">
              {{ App\Models\Pet::Count() }}
            </button>
          </li>
          <li class="list-row">
            <div><svg xmlns="http://www.w3.org/2000/svg" class="size-10" fill="currentColor" viewBox="0 0 256 256">
                <path
                  d="M239.71,125l-16.42-88a16,16,0,0,0-19.61-12.58l-.31.09L150.85,40h-45.7L52.63,24.56l-.31-.09A16,16,0,0,0,32.71,37.05L16.29,125a15.77,15.77,0,0,0,9.12,17.52A16.26,16.26,0,0,0,32.12,144,15.48,15.48,0,0,0,40,141.84V184a40,40,0,0,0,40,40h96a40,40,0,0,0,40-40V141.85a15.5,15.5,0,0,0,7.87,2.16,16.31,16.31,0,0,0,6.72-1.47A15.77,15.77,0,0,0,239.71,125ZM32,128h0L48.43,40,90.5,52.37Zm144,80H136V195.31l13.66-13.65a8,8,0,0,0-11.32-11.32L128,180.69l-10.34-10.35a8,8,0,0,0-11.32,11.32L120,195.31V208H80a24,24,0,0,1-24-24V123.11L107.92,56h40.15L200,123.11V184A24,24,0,0,1,176,208Zm48-80L165.5,52.37,207.57,40,224,128ZM104,140a12,12,0,1,1-12-12A12,12,0,0,1,104,140Zm72,0a12,12,0,1,1-12-12A12,12,0,0,1,176,140Z">
                </path>
              </svg></div>
            <div>
              <div class="text-xs uppercase font-semibold mt-3">Dogs</div>
            </div>
            <button class="btn btn-square btn-ghost">
              {{ App\Models\Pet::where('kind', 'Dog')->Count() }}
            </button>
          </li>
          <li class="list-row">
            <div><svg xmlns="http://www.w3.org/2000/svg" class="size-10" fill="currentColor" viewBox="0 0 256 256">
                <path
                  d="M96,140a12,12,0,1,1-12-12A12,12,0,0,1,96,140Zm76-12a12,12,0,1,0,12,12A12,12,0,0,0,172,128Zm60-80v88c0,52.93-46.65,96-104,96S24,188.93,24,136V48A16,16,0,0,1,51.31,36.69c.14.14.26.27.38.41L69,57a111.22,111.22,0,0,1,118.1,0L204.31,37.1c.12-.14.24-.27.38-.41A16,16,0,0,1,232,48Zm-16,0-21.56,24.8A8,8,0,0,1,183.63,74,88.86,88.86,0,0,0,168,64.75V88a8,8,0,1,1-16,0V59.05a97.43,97.43,0,0,0-16-2.72V88a8,8,0,1,1-16,0V56.33a97.43,97.43,0,0,0-16,2.72V88a8,8,0,1,1-16,0V64.75A88.86,88.86,0,0,0,72.37,74a8,8,0,0,1-10.81-1.17L40,48v88c0,41.66,35.21,76,80,79.67V195.31l-13.66-13.66a8,8,0,0,1,11.32-11.31L128,180.68l10.34-10.34a8,8,0,0,1,11.32,11.31L136,195.31v20.36c44.79-3.69,80-38,80-79.67Z">
                </path>
              </svg></div>
            <div>
              <div class="text-xs uppercase font-semibold mt-3">Cats</div>
            </div>
            <button class="btn btn-square btn-ghost">
              {{ App\Models\Pet::where('kind', 'Cat')->Count() }}
            </button>
          </li>

        </ul>
        <div class="card-actions justify-end">
          <a class="btn btn-accent justify-center text-white" href="{{ url('pets')  }}"> Enter<svg
              xmlns="http://www.w3.org/2000/svg" class="size-6" fill="currentColor" viewBox="0 0 256 256">
              <path
                d="M128,24A104,104,0,1,0,232,128,104.11,104.11,0,0,0,128,24Zm0,192a88,88,0,1,1,88-88A88.1,88.1,0,0,1,128,216Zm29.66-93.66a8,8,0,0,1,0,11.32l-40,40a8,8,0,0,1-11.32-11.32L140.69,128,106.34,93.66a8,8,0,0,1,11.32-11.32Z">
              </path>
            </svg>
          </a>
        </div>
      </div>
    </div>
    {{-- Cards --}}
    <div class="flex flex-wrap gap-4 justify-center">
      {{-- Module Users --}}
      <div class="card bg-[#99a1af66] w-96 shadow-sm">
        <figure>
          <img src="{{ asset('images/moduleAdoption.png') }}" alt="Shoes" />
        </figure>
        <div class="card-body text-white">
          <h2 class="card-title ">Module Adoptions</h2>
          <ul class="list bg-[#99a1af99] rounded-box shadow-md">

            <li class="p-4 pb-2 text-xs tracking-wide">Stadistics</li>

            <li class="list-row">
              <div><svg xmlns="http://www.w3.org/2000/svg" class="size-10" fill="currentColor" viewBox="0 0 256 256">
                  <path
                    d="M230.33,141.06a24.34,24.34,0,0,0-18.61-4.77C230.5,117.33,240,98.48,240,80c0-26.47-21.29-48-47.46-48A47.58,47.58,0,0,0,156,48.75,47.58,47.58,0,0,0,119.46,32C93.29,32,72,53.53,72,80c0,11,3.24,21.69,10.06,33a31.87,31.87,0,0,0-14.75,8.4L44.69,144H16A16,16,0,0,0,0,160v40a16,16,0,0,0,16,16H120a7.93,7.93,0,0,0,1.94-.24l64-16a6.94,6.94,0,0,0,1.19-.4L226,182.82l.44-.2a24.6,24.6,0,0,0,3.93-41.56ZM119.46,48A31.15,31.15,0,0,1,148.6,67a8,8,0,0,0,14.8,0,31.15,31.15,0,0,1,29.14-19C209.59,48,224,62.65,224,80c0,19.51-15.79,41.58-45.66,63.9l-11.09,2.55A28,28,0,0,0,140,112H100.68C92.05,100.36,88,90.12,88,80,88,62.65,102.41,48,119.46,48ZM16,160H40v40H16Zm203.43,8.21-38,16.18L119,200H56V155.31l22.63-22.62A15.86,15.86,0,0,1,89.94,128H140a12,12,0,0,1,0,24H112a8,8,0,0,0,0,16h32a8.32,8.32,0,0,0,1.79-.2l67-15.41.31-.08a8.6,8.6,0,0,1,6.3,15.9Z">
                  </path>
                </svg></div>
              <div>
                <div class="text-xs uppercase font-semibold mt-3">Total Adoptions</div>
              </div>
              <button class="btn btn-square btn-ghost">
                {{ App\Models\Adoption::Count() }}
              </button>
            </li>
            <li class="list-row">
              <div><svg xmlns="http://www.w3.org/2000/svg" class="size-10" fill="currentColor" viewBox="0 0 256 256">
                  <path
                    d="M239.71,125l-16.42-88a16,16,0,0,0-19.61-12.58l-.31.09L150.85,40h-45.7L52.63,24.56l-.31-.09A16,16,0,0,0,32.71,37.05L16.29,125a15.77,15.77,0,0,0,9.12,17.52A16.26,16.26,0,0,0,32.12,144,15.48,15.48,0,0,0,40,141.84V184a40,40,0,0,0,40,40h96a40,40,0,0,0,40-40V141.85a15.5,15.5,0,0,0,7.87,2.16,16.31,16.31,0,0,0,6.72-1.47A15.77,15.77,0,0,0,239.71,125ZM32,128h0L48.43,40,90.5,52.37Zm144,80H136V195.31l13.66-13.65a8,8,0,0,0-11.32-11.32L128,180.69l-10.34-10.35a8,8,0,0,0-11.32,11.32L120,195.31V208H80a24,24,0,0,1-24-24V123.11L107.92,56h40.15L200,123.11V184A24,24,0,0,1,176,208Zm48-80L165.5,52.37,207.57,40,224,128ZM104,140a12,12,0,1,1-12-12A12,12,0,0,1,104,140Zm72,0a12,12,0,1,1-12-12A12,12,0,0,1,176,140Z">
                  </path>
                </svg></div>
              <div>
                <div class="text-xs uppercase font-semibold mt-3">Dogs Adoptions</div>
              </div>
              <button class="btn btn-square btn-ghost">
                {{ App\Models\Pet::where('status', 1)->where('kind', 'Dog')->count() }}
              </button>
            </li>
            <li class="list-row">
              <div><svg xmlns="http://www.w3.org/2000/svg" class="size-10" fill="currentColor" viewBox="0 0 256 256">
                  <path
                    d="M96,140a12,12,0,1,1-12-12A12,12,0,0,1,96,140Zm76-12a12,12,0,1,0,12,12A12,12,0,0,0,172,128Zm60-80v88c0,52.93-46.65,96-104,96S24,188.93,24,136V48A16,16,0,0,1,51.31,36.69c.14.14.26.27.38.41L69,57a111.22,111.22,0,0,1,118.1,0L204.31,37.1c.12-.14.24-.27.38-.41A16,16,0,0,1,232,48Zm-16,0-21.56,24.8A8,8,0,0,1,183.63,74,88.86,88.86,0,0,0,168,64.75V88a8,8,0,1,1-16,0V59.05a97.43,97.43,0,0,0-16-2.72V88a8,8,0,1,1-16,0V56.33a97.43,97.43,0,0,0-16,2.72V88a8,8,0,1,1-16,0V64.75A88.86,88.86,0,0,0,72.37,74a8,8,0,0,1-10.81-1.17L40,48v88c0,41.66,35.21,76,80,79.67V195.31l-13.66-13.66a8,8,0,0,1,11.32-11.31L128,180.68l10.34-10.34a8,8,0,0,1,11.32,11.31L136,195.31v20.36c44.79-3.69,80-38,80-79.67Z">
                  </path>
                </svg></div>
              <div>
                <div class="text-xs uppercase font-semibold mt-3">Cats Adoptions</div>
              </div>
              <button class="btn btn-square btn-ghost">
                {{ App\Models\Pet::where('status', 1)->where('kind', 'Cat')->count() }}
              </button>
            </li>

          </ul>
          <div class="card-actions justify-end">
            <a class="btn btn-accent justify-center text-white" href="{{ url('adoptions')  }}"> Enter<svg
                xmlns="http://www.w3.org/2000/svg" class="size-6" fill="currentColor" viewBox="0 0 256 256">
                <path
                  d="M128,24A104,104,0,1,0,232,128,104.11,104.11,0,0,0,128,24Zm0,192a88,88,0,1,1,88-88A88.1,88.1,0,0,1,128,216Zm29.66-93.66a8,8,0,0,1,0,11.32l-40,40a8,8,0,0,1-11.32-11.32L140.69,128,106.34,93.66a8,8,0,0,1,11.32-11.32Z">
                </path>
              </svg>
            </a>
          </div>
        </div>
      </div>
      @endif

      {{-- Customer --}}
      @if(Auth::user()->role == 'customer')
      {{-- My Profile --}}
      <div class="card bg-[#99a1af66] w-96 shadow-sm">
        <figure>
          <img src="{{ asset('images/moduleUser.png') }}" alt="Info" />
        </figure>
        <div class="card-body text-white">
          <h2 class="card-title ">My Profile</h2>
          <div class="card-actions justify-end">
            <a class="btn btn-accent justify-center text-white" href="{{ url('myprofile')  }}"> Enter<svg
                xmlns="http://www.w3.org/2000/svg" class="size-6" fill="currentColor" viewBox="0 0 256 256">
                <path
                  d="M128,24A104,104,0,1,0,232,128,104.11,104.11,0,0,0,128,24Zm0,192a88,88,0,1,1,88-88A88.1,88.1,0,0,1,128,216Zm29.66-93.66a8,8,0,0,1,0,11.32l-40,40a8,8,0,0,1-11.32-11.32L140.69,128,106.34,93.66a8,8,0,0,1,11.32-11.32Z">
                </path>
              </svg>
            </a>
          </div>
        </div>
      </div>
      {{-- Cards --}}
      <div class="flex flex-wrap gap-4 justify-center">
        {{-- My Adoptions --}}
        <div class="card bg-[#99a1af66] w-96 shadow-sm">
          <figure>
            <img src="{{ asset('images/modulePet.png') }}" alt="Shoes" />
          </figure>
          <div class="card-body text-white">
            <h2 class="card-title ">My Adoptions<button class="btn btn-info">{{ App\Models\Adoption::Where('user_id', Auth::user()->id)->count()}}</button></h2>
            
            <div class="card-actions justify-end">
              <a class="btn btn-accent justify-center text-white" href="{{ url('myadoptions')  }}"> Enter<svg
                  xmlns="http://www.w3.org/2000/svg" class="size-6" fill="currentColor" viewBox="0 0 256 256">
                  <path
                    d="M128,24A104,104,0,1,0,232,128,104.11,104.11,0,0,0,128,24Zm0,192a88,88,0,1,1,88-88A88.1,88.1,0,0,1,128,216Zm29.66-93.66a8,8,0,0,1,0,11.32l-40,40a8,8,0,0,1-11.32-11.32L140.69,128,106.34,93.66a8,8,0,0,1,11.32-11.32Z">
                  </path>
                </svg>
              </a>
            </div>
          </div>
        </div>
        {{-- Cards --}}
        <div class="flex flex-wrap gap-4 justify-center">
          {{-- Make Adoption --}}
          <div class="card bg-[#99a1af66] w-96 shadow-sm">
            <figure>
              <img src="{{ asset('images/moduleAdoption.png') }}" alt="Shoes" />
            </figure>
            <div class="card-body text-white">
              <h2 class="card-title ">Make Adoption</h2>
              <div class="card-actions justify-end">
                <a class="btn btn-accent justify-center text-white" href="{{ url('makeadoption')  }}"> Enter<svg
                    xmlns="http://www.w3.org/2000/svg" class="size-6" fill="currentColor" viewBox="0 0 256 256">
                    <path
                      d="M128,24A104,104,0,1,0,232,128,104.11,104.11,0,0,0,128,24Zm0,192a88,88,0,1,1,88-88A88.1,88.1,0,0,1,128,216Zm29.66-93.66a8,8,0,0,1,0,11.32l-40,40a8,8,0,0,1-11.32-11.32L140.69,128,106.34,93.66a8,8,0,0,1,11.32-11.32Z">
                    </path>
                  </svg>
                </a>
              </div>
            </div>
          </div>
          @endif

        </div>
        {{-- Modal --}}
        <dialog id="modal_message" class="modal">
          <div class="modal-box bg-sucess">
            <h3 class="text-lg font-bold">Edited Duccessfully!</h3>
            <div role="alert" class="alert alert-success">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 shrink-0 stroke-current" fill="none"
                viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
              </svg>
              <span>{{session('message')}}</span>
            </div>
          </div>
          <form method="dialog" class="modal-backdrop">
            <button>close</button>
          </form>
        </dialog>


        <dialog id="modal_session" class="modal">
          <div class="modal-box bg-sucess">
            <h3 class="text-lg font-bold">Sorry!</h3>
            <div role="alert" class="alert alert-error">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 shrink-0 stroke-current" fill="none"
                viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
              </svg>
              <span>{{session('error')}}</span>
            </div>
          </div>
          <form method="dialog" class="modal-backdrop">
            <button>close</button>
          </form>
        </dialog>
        @endsection

        @section('js')
        <script>
          $(document).ready(function() {
    // Modal session
    const modal_session = document.getElementById('modal_session');
    @if(session('error'))
      modal_session.showModal();
    @endif

    const modal_message = document.getElementById('modal_message');
    @if(session('message'))
      modal_message.showModal();
    @endif
  });
        </script>
        @endsection