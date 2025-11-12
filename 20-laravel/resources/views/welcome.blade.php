@extends('layouts.home')

@section('title', 'Welcome: larapets 🐒')

@section('content')
 <section class="bg-[#0006] rounded-lg w-96 p-8 flex flex-col gap-4 items-center justify-center">
    <img src="{{ asset('images/logo.avif') }}" width="260px" alt="logo">
    <p class="text-white">
        Lorem ipsum dolor sit amet consectetur, adipisicing elit. Hic quod voluptate a numquam, quidem enim ad officiis quasi repellat quam?
    </p>
    <div class="flex gap-2 mt-8">
    @guest()
        <a class="btn btn-accent w-[140px]" href="{{ url('login') }}">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="#000000" viewBox="0 0 256 256"><path d="M208,80H96V56a32,32,0,0,1,32-32c15.37,0,29.2,11,32.16,25.59a8,8,0,0,0,15.68-3.18C171.32,24.15,151.2,8,128,8A48.05,48.05,0,0,0,80,56V80H48A16,16,0,0,0,32,96V208a16,16,0,0,0,16,16H208a16,16,0,0,0,16-16V96A16,16,0,0,0,208,80Zm0,128H48V96H208V208Zm-80-96a28,28,0,0,0-8,54.83V184a8,8,0,0,0,16,0V166.83A28,28,0,0,0,128,112Zm0,40a12,12,0,1,1,12-12A12,12,0,0,1,128,152Z"></path></svg>
            Login
        </a>
        <a class="btn btn-warning w-[140px]" href="{{ url('register') }}">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="#000000" viewBox="0 0 256 256"><path d="M230.92,212c-15.23-26.33-38.7-45.21-66.09-54.16a72,72,0,1,0-73.66,0C63.78,166.78,40.31,185.66,25.08,212a8,8,0,1,0,13.85,8c18.84-32.56,52.14-52,89.07-52s70.23,19.44,89.07,52a8,8,0,1,0,13.85-8ZM72,96a56,56,0,1,1,56,56A56.06,56.06,0,0,1,72,96Z"></path></svg>
            Register
        </a>
    @endguest
    @auth()
        <a class="btn btn-info w-[140px]" href="{{ url('dashboard') }}">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="#000000" viewBox="0 0 256 256"><path d="M227.31,73.37,182.63,28.68a16,16,0,0,0-22.63,0L36.69,152A15.86,15.86,0,0,0,32,163.31V208a16,16,0,0,0,16,16H92.69A15.86,15.86,0,0,0,104,219.31L227.31,96a16,16,0,0,0,0-22.63ZM92.69,208H48V163.31l88-88L180.69,120ZM192,108.68,147.31,64l24-24L216,84.68Z"></path></svg>
            Dashboard
        </a>
    @endauth
    </div>
    </section>
@endsection
