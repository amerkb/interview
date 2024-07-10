<aside
    id="sidebar-multi-level-sidebar"
    class="list-none p-0 bg-white z-50 shadow-lg  fixed top-[4.5rem] left-0 duration-300 w-[255px]
     min-h-[calc(100vh-(4.5rem))] overflow-auto font-sans"
>
    <a href="{{route('user.index')}}">
       <span class="pr-0 py-[15px] bg-gray-500 font-bold pl-[25px] flex duration-300  items-center">
users
        </span>
    </a>
    <a href="{{route('admin.blog.index')}}">
       <span class="pr-0 py-[15px] bg-gray-500 font-bold pl-[25px] flex duration-300  items-center">
blogs
        </span>
    </a>
    <a href="{{route('reset.view')}}">
       <span class="pr-0 py-[15px] bg-gray-500 font-bold pl-[25px] flex duration-300  items-center">
reset password
        </span>
    </a>
</aside>
