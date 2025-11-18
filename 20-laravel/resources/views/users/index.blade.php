@extends('layouts.dashboard')

@section('title', 'Module Users: Larapets 🐒')

@section('content')
<h1 class="text-4xl text-black flex gap-2 items-center justify-center pb-4 border-b-2 border-black">Module Users
              <svg xmlns="http://www.w3.org/2000/svg" class="size-12" fill="currentColor" viewBox="0 0 256 256"><path d="M230.92,212c-15.23-26.33-38.7-45.21-66.09-54.16a72,72,0,1,0-73.66,0C63.78,166.78,40.31,185.66,25.08,212a8,8,0,1,0,13.85,8c18.84-32.56,52.14-52,89.07-52s70.23,19.44,89.07,52a8,8,0,1,0,13.85-8ZM72,96a56,56,0,1,1,56,56A56.06,56.06,0,0,1,72,96Z"></path></svg>
</h1>
<div class="overflow-x-auto rounded-box text-white bg-[#99a1af99]">
  <table class="table">
    <!-- head -->
    <thead>
      <tr class="text-white">
        <th>Id</th>
        <th>Document</th>
        <th>Full Name</th>
        <th>Email</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
@foreach ($users as $user)
    <tr>
        <th>{{$user->id}}</th>
        <td>{{$user->document}}</td>
        <td>{{$user->fullname}}</td>
        <td>{{$user->email}}</td>
        <td>
            <a href="">Show</a>
            <a href="">Edit</a>
            <a href="">Delete</a>
        </td>
      </tr>
@endforeach
<tr>
    <td colspan="5">
        {{ $users->links() }}
    </td>
</tr>
 </tbody>
  </table>
</div>
@endsection