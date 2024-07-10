@extends("layouts.dashboardLayout")
@section('title', 'users')


@section('section')

    <div class ="w-full bg-[#f0f0fa] pt-10  min-h-[calc(100vh-(6rem+58px))] grid gap-8 grid-cols-[repeat(auto-fill,_minmax(250px,_1fr))]">
        @foreach($users  as $user)

        <div class="flex gap-x-3">
            <div class="text-left h-fit  py-[20px] bg-white px-[15px] rounded-[5px] mb-8 boxfood">
                <div class="ms-card-img">


                </div>
                <div class="ms-card-body" class="p-4 text-[14px] font-bold">
                    <div
                        class="new"
                        class="flex justify-between text-[16px] whitespace-nowrap mb-[15px] items-center "
                    >
                        <h6 class="mb-0 ">{{$user->name}} </h6>
                    </div>

                    <p class="text-[#878793] mb-[15px] ">{{$user->email}}</p>
                    <div class="flex justify-between items-center">

                        </a>
                        <form action="{{ route('user.destroy', $user->id) }}" method="POST">
                            @csrf
                            @method('DELETE')

                            <button type="submit" class="bg-red-500 center hover:bg-red-700 duration-200 text-white font-semibold outline-none min-w-[80px] px-3 py-2 text-[14px] rounded-[0.25rem] border-[1px] border-transparent">
                                Remove
                            </button>
                        </form>



                    </div>
                </div>
            </div>
        </div>
            @endforeach
    </div>
@endsection
