@forelse ($users as $user)
<tr @if($user->id % 2 == 0) class="bg-[#0003]" @endif>
  <th class="hidden md:table-cell">{{$user->id}}</th>
  <th>
    <div class="avatar">
      <div class="mask mask-squircle w-16">
        <img src="{{ asset('images/' . $user->photo) }}" />
      </div>
  </th>
  <td class="hidden md:table-cell">{{$user->document}}</td>
  <td>{{$user->fullname}}</td>
  <td class="hidden md:table-cell">@if($user->role == 'Administrator')
    <div class="badge badge-soft badge-warning w-full">Admin</div>
    @else
    <div class="badge badge-soft badge-primary w-full">User</div>
    @endif
  </td>
  <td class="hidden md:table-cell">@if($user->active == 1)
    <div class="badge badge-soft badge-accent w-full">Active</div>
    @else
    <div class="badge badge-soft badge-error w-full">Inactive</div>
    @endif
  </td>
  <td>
    <div class="flex items-center justify-center gap-4 h-full">
      <a href="{{ url('users/'.$user->id) }}" class="group badge badge-outline border-white">
        <svg xmlns="http://www.w3.org/2000/svg" class="size-6 group-hover:text-green-500 hover:scale-120 transition"
          fill="currentColor" viewBox="0 0 256 256">
          <path
            d="M247.31,124.76c-.35-.79-8.82-19.58-27.65-38.41C194.57,61.26,162.88,48,128,48S61.43,61.26,36.34,86.35C17.51,105.18,9,124,8.69,124.76a8,8,0,0,0,0,6.5c.35.79,8.82,19.57,27.65,38.4C61.43,194.74,93.12,208,128,208s66.57-13.26,91.66-38.34c18.83-18.83,27.3-37.61,27.65-38.4A8,8,0,0,0,247.31,124.76ZM128,192c-30.78,0-57.67-11.19-79.93-33.25A133.47,133.47,0,0,1,25,128,133.33,133.33,0,0,1,48.07,97.25C70.33,75.19,97.22,64,128,64s57.67,11.19,79.93,33.25A133.46,133.46,0,0,1,231.05,128C223.84,141.46,192.43,192,128,192Zm0-112a48,48,0,1,0,48,48A48.05,48.05,0,0,0,128,80Zm0,80a32,32,0,1,1,32-32A32,32,0,0,1,128,160Z">
          </path>
        </svg>
      </a>
      <a href="{{ url('users/'.$user->id.'/edit') }}" class="group badge badge-outline border-white">
        <svg xmlns="http://www.w3.org/2000/svg" class="size-6 group-hover:text-blue-500 hover:scale-120 transition"
          fill="currentColor" viewBox="0 0 256 256">
          <path
            d="M227.31,73.37,182.63,28.68a16,16,0,0,0-22.63,0L36.69,152A15.86,15.86,0,0,0,32,163.31V208a16,16,0,0,0,16,16H92.69A15.86,15.86,0,0,0,104,219.31L227.31,96a16,16,0,0,0,0-22.63ZM51.31,160,136,75.31,152.69,92,68,176.68ZM48,179.31,76.69,208H48Zm48,25.38L79.31,188,164,103.31,180.69,120Zm96-96L147.31,64l24-24L216,84.68Z">
          </path>
        </svg>
      </a>
      <a href="javascript:;" data-fullname="{{ $user->fullname }}"
        class="group badge badge-outline border-white btn-delete">
        <svg xmlns="http://www.w3.org/2000/svg" class="size-6 group-hover:text-red-500 hover:scale-120 transition"
          fill="currentColor" viewBox="0 0 256 256">
          <path
            d="M216,48H176V40a24,24,0,0,0-24-24H104A24,24,0,0,0,80,40v8H40a8,8,0,0,0,0,16h8V208a16,16,0,0,0,16,16H192a16,16,0,0,0,16-16V64h8a8,8,0,0,0,0-16ZM96,40a8,8,0,0,1,8-8h48a8,8,0,0,1,8,8v8H96Zm96,168H64V64H192ZM112,104v64a8,8,0,0,1-16,0V104a8,8,0,0,1,16,0Zm48,0v64a8,8,0,0,1-16,0V104a8,8,0,0,1,16,0Z">
          </path>
        </svg>
      </a>
      <form class="hidden" method="POST" action="{{ url('users/'.$user->id) }}">
        @csrf
        @method('delete')
      </form>
    </div>
  </td>
</tr>
@empty
<tr>
  <td colspan="7" class="text-center py-10 font-bold text-white">
    No users found matching your search criteria.
  </td>
@endforelse
<tr class="bg-[#fff9]">
  <td colspan="7">
    {{ $users->links('layouts.pagination') }}
  </td>
</tr>