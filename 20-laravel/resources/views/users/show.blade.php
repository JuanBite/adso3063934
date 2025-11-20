@extends('layouts.dashboard')

@section('title', 'Show User: LaraPets 🐒')

@section('content')
<h1 class="text-4xl text-white flex gap-2 items-center justify-center pb-4 border-b-2 border-white">Show User
    <svg xmlns="http://www.w3.org/2000/svg" class="size-12" fill="currentColor" viewBox="0 0 256 256"><path d="M247.31,124.76c-.35-.79-8.82-19.58-27.65-38.41C194.57,61.26,162.88,48,128,48S61.43,61.26,36.34,86.35C17.51,105.18,9,124,8.69,124.76a8,8,0,0,0,0,6.5c.35.79,8.82,19.57,27.65,38.4C61.43,194.74,93.12,208,128,208s66.57-13.26,91.66-38.34c18.83-18.83,27.3-37.61,27.65-38.4A8,8,0,0,0,247.31,124.76ZM128,192c-30.78,0-57.67-11.19-79.93-33.25A133.47,133.47,0,0,1,25,128,133.33,133.33,0,0,1,48.07,97.25C70.33,75.19,97.22,64,128,64s57.67,11.19,79.93,33.25A133.46,133.46,0,0,1,231.05,128C223.84,141.46,192.43,192,128,192Zm0-112a48,48,0,1,0,48,48A48.05,48.05,0,0,0,128,80Zm0,80a32,32,0,1,1,32-32A32,32,0,0,1,128,160Z"></path></svg>
</h1>

{{-- breadcrums --}}
<div class="breadcrumbs text-sm flex justify-center text-white">
  <ul>
    <li>
      <a href="{{ url('dashboard') }}">
    <svg xmlns="http://www.w3.org/2000/svg" class="size-5" fill="white" viewBox="0 0 256 256"><path d="M227.31,73.37,182.63,28.68a16,16,0,0,0-22.63,0L36.69,152A15.86,15.86,0,0,0,32,163.31V208a16,16,0,0,0,16,16H92.69A15.86,15.86,0,0,0,104,219.31L227.31,96a16,16,0,0,0,0-22.63ZM92.69,208H48V163.31l88-88L180.69,120ZM192,108.68,147.31,64l24-24L216,84.68Z"></path></svg>
        Dashboard
      </a>
    </li>
    <li>
      <a href="{{ url('users') }}">
        <svg xmlns="http://www.w3.org/2000/svg" class="size-5" fill="white" viewBox="0 0 256 256"><path d="M230.92,212c-15.23-26.33-38.7-45.21-66.09-54.16a72,72,0,1,0-73.66,0C63.78,166.78,40.31,185.66,25.08,212a8,8,0,1,0,13.85,8c18.84-32.56,52.14-52,89.07-52s70.23,19.44,89.07,52a8,8,0,1,0,13.85-8ZM72,96a56,56,0,1,1,56,56A56.06,56.06,0,0,1,72,96Z"></path></svg>
        Module User
      </a>
    </li>
    <li>
      <span class="inline-flex items-center gap-2">
              <svg xmlns="http://www.w3.org/2000/svg" class="size-5" fill="currentColor" viewBox="0 0 256 256"><path d="M247.31,124.76c-.35-.79-8.82-19.58-27.65-38.41C194.57,61.26,162.88,48,128,48S61.43,61.26,36.34,86.35C17.51,105.18,9,124,8.69,124.76a8,8,0,0,0,0,6.5c.35.79,8.82,19.57,27.65,38.4C61.43,194.74,93.12,208,128,208s66.57-13.26,91.66-38.34c18.83-18.83,27.3-37.61,27.65-38.4A8,8,0,0,0,247.31,124.76ZM128,192c-30.78,0-57.67-11.19-79.93-33.25A133.47,133.47,0,0,1,25,128,133.33,133.33,0,0,1,48.07,97.25C70.33,75.19,97.22,64,128,64s57.67,11.19,79.93,33.25A133.46,133.46,0,0,1,231.05,128C223.84,141.46,192.43,192,128,192Zm0-112a48,48,0,1,0,48,48A48.05,48.05,0,0,0,128,80Zm0,80a32,32,0,1,1,32-32A32,32,0,0,1,128,160Z"></path></svg>
        Show User
      </span>
    </li>
  </ul>
</div>

{{-- Card --}}

<div class="bg-[#99a1af66] p-10 rounded-sm">
    <div class="avatar flex flex-col gap-2 justify-center items-center hover:scale-110 transition ease-in">
                 <div class="mask mask-squircle w-48">
            <img src="{{ asset ('images/'.$user->photo)}}" />
         </div>
    </div>
    <div class="flex gap-2 flex flex-col md:flex-row">
    <ul class="list bg-[#99a1af99] mt-4 text-white text-center rounded-box shadow-md w-64">
    <li class="list-row">
        <span class="text-[#fff9] font-semibold">Document:</span> <span>{{ $user->document }}</span>
        </li>
        <li class="list-row">
        <span class="text-[#fff9] font-semibold">FullName:</span> <span>{{ $user->fullname }}</span>
        </li>
        <li class="list-row">
        <span class="text-[#fff9] font-semibold">Gender:</span> <span>{{ $user->gender }}</span>
        </li>
        <li class="list-row">
        <span class="text-[#fff9] font-semibold">Birthdate:</span> <span>{{ $user->birthdate }}</span>
        </li>
        <li class="list-row">
        <span class="text-[#fff9] font-semibold">Phone:</span> <span>{{ $user->phone }}</span>
        </li>
    </ul>
    <ul class="list bg-[#99a1af99] mt-4 text-white text-center rounded-box shadow-md w-64">
        <li class="list-row">
        <span class="text-[#fff9] font-semibold">Email:</span> <span>{{ $user->email }}</span>
        </li>
        <li class="list-row">
        <span class="text-[#fff9] font-semibold">Status:</span> <span>@if($user->active == 1)
          <div class="badge badge-soft badge-accent w-full">Active</div>
          @else
          <div class="badge badge-soft badge-error w-full">Inactive</div>
          @endif</span>
        </li>
        <li class="list-row">
        <span class="text-[#fff9] font-semibold">Role:</span> <span>@if($user->role == 'Administrator')
          <div class="badge badge-soft badge-warning w-full">Admin</div>
          @else
          <div class="badge badge-soft badge-primary w-full">User</div>
          @endif</span>
        </li>
        <li class="list-row">
        <span class="text-[#fff9] font-semibold">Created At:</span> <span>{{ $user->created_at->diffForHumans()}}</span>
        </li>
        <li class="list-row">
        <span class="text-[#fff9] font-semibold">Updated At:</span> <span>{{ $user->updated_at->diffForHumans()}}</span>
        </li>
        </ul>
    </div>
</div>
@endsection