@extends("layouts.dashboardLayout")
@section('title', 'Blogs')

@section('section')
    @can('create', App\Models\Blog::class)
        <div class="pt-10 w-full text-right">
            <a href="{{ route('admin.blog.create') }}">
                <button
                    type="button"
                    class="bg-green-500 hover:bg-green-700 duration-200 text-white font-semibold outline-none min-w-[80px] px-3 py-2 text-[14px] rounded-[0.25rem] border-[1px] border-transparent"
                >
                    Add
                </button>
            </a>
        </div>
    @endcan


    <div class ="w-full bg-[#f0f0fa] pt-10  min-h-[calc(100vh-(6rem+58px))] grid gap-8 grid-cols-[repeat(auto-fill,_minmax(250px,_1fr))]">
        @foreach($blogs  as $blog)

        <div class="flex gap-x-3">
            <div class="text-left h-fit  py-[20px] bg-white px-[15px] rounded-[5px] mb-8 boxfood">
                <div class="ms-card-img">
                    @if ($blog->type === 'image')
                        <img src="{{ asset($blog->file) }}" alt="card_img" />
                    @elseif ($blog->type === 'video')
                        <video src="{{ asset($blog->file) }}" controls></video>
                    @endif

                </div>
                <div class="ms-card-body" class="p-4 text-[14px] font-bold">
                    <div
                        class="new"
                        class="flex justify-between text-[16px] whitespace-nowrap mb-[15px] items-center "
                    >
                        <h6 class="mb-0 ">title:{{$blog->title}} </h6>
                    </div>

                    <p class="text-[#878793] mb-[15px] ">description:{{$blog->description}}</p>
                        <h1>Users</h1>
                        @foreach($blog['users'] as $user)
                            <p class="text-[#878793] mb-[15px] block ">{{$user->name}}</p>

                        @endforeach
                    <div class="flex justify-between items-center">
                        @can('delete', $blog)

                        <form action="{{ route('admin.blog.destroy', $blog->id) }}" method="POST">
                            @csrf
                            @method('DELETE')

                            <button type="submit" class="bg-red-500 center hover:bg-red-700 duration-200 text-white font-semibold outline-none min-w-[80px] px-3 py-2 text-[14px] rounded-[0.25rem] border-[1px] border-transparent">
                                Remove
                            </button>
                        </form>

                        @endcan

                    </div>
                </div>
            </div>
        </div>
            @endforeach
    </div>
@endsection
