@extends("layouts.master")
@section('title', ' Add Blog')


@section('section')
    <form  style="width: 600px;margin: auto" method="POST" action="{{ route('blog.store') }}" enctype="multipart/form-data">
        @csrf
    <div
        class="px-[5px] mb-5 text-[rgb(73,80,87)] text-[14px]   grid col-span-full "
    >
    <label class="mb-2 text-center ">title</label>
    <input
        placeholder="title"
        type="text"
        name="title"
        autoComplete="off"
        required
        class="border-[#0000001a]  duration-200 focus:border-[#80bdff] input-box
         border-[1px] h-[calc(1.5em + .75rem + 2px)] rounded-[0.25rem] py-[0.375rem] px-[0.75rem] outline-none"
    />
    </div>

        <div
            class="px-[5px] mb-5 text-[rgb(73,80,87)] text-[14px]   grid col-span-full "
        >
            <label class="mb-2 text-center ">Description</label>
            <textarea
                placeholder="Description"
                name="description"
                autoComplete="off"
                required
                class="border-[#0000001a]  duration-200 focus:border-[#80bdff] input-box
         border-[1px] h-[200px] rounded-[0.25rem] py-[0.375rem] px-[0.75rem] outline-none"
            >

            </textarea>
        </div>
        <div
            class="px-[5px] mb-5 text-[rgb(73,80,87)] text-[14px]   grid col-span-full "
        >
            <label class="mb-2 text-center ">image or video</label>
            <input
                type="file"
                name="file"
                class="border-[#0000001a]  duration-200 focus:border-[#80bdff] input-box
         border-[1px] h-[calc(1.5em + .75rem + 2px)] rounded-[0.25rem] py-[0.375rem] px-[0.75rem] outline-none"
            />
        </div>
        <button
            type="submit"
            class="bg-green-500 w-full text-center hover:bg-green-700 duration-200  text-white font-semibold outline-none min-w-[80px]  px-3 py-2 text-[14px] rounded-[0.25rem] border-[1px] border-transparent"
        >
            Submit
        </button>

    </form>
@endsection
