<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <title>reset password</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>

<body>

    <div class="flex h-screen bg-cover " style="background-image: url('{{ asset('asset/login.jpg') }}')">

        <div class=" flex-1">
            <div class=" flex py-12 px-4  h-screen justify-center items-center">
                <form  class="w-[40%] max-md:w-full" method="POST" action="{{ route('reset.post') }}">
                    @csrf
                    <h3 class="text-[30px] font-semibold mb-2">reset password</h3>
                    <p class="mb-[15px]">Please enter current password  and  new password</p>
                    <div class="mb-4 text-left">
                        <div class="w-full flex relative">
                            <div class="px-[5px] mb-5 text-[rgb(73,80,87)] text-[14px] w-full  grid col-span-full">
                                <label class="mb-2 text-start">current password</label>
                                <input placeholder='enter current password' type="password" value="{{ old('current_password') }}"
                                    name="current_password" required
                                    class="border-[#0000001a]  duration-200 focus:border-[#80bdff] input-box
         border-[1px] h-[calc(1.5em + .75rem + 2px)] rounded-[0.25rem] py-[0.375rem] px-[0.75rem] outline-none" />
                            </div>

                        </div>
                    </div>
                    <div class="mb-4 text-left">
                        <div class="w-full flex relative">
                            <div class="px-[5px] mb-5 text-[rgb(73,80,87)] text-[14px] w-full  grid col-span-full">
                                <label class="mb-2 text-start"> New Password</label>
                                <input placeholder='enter new Password' type="password" name="new_password" required
                                    class=" border-[#0000001a]  duration-200 focus:border-[#80bdff] input-box
         border-[1px] h-[calc(1.5em + .75rem + 2px)] rounded-[0.25rem] py-[0.375rem] px-[0.75rem] outline-none" />
                            </div>

                        </div>
                    </div>
                    <div class="w-full text-center">

                    </div>
                    <div class="form-group mb-0">
                        <button type="submit"
                            class="bg-gray-700 text-center hover:bg-gray-800 duration-200  text-white font-semibold
                                                        outline-none min-w-[120px]  px-4 py-[0.625rem] text-[14px] rounded-[0.25rem] border-[1px] border-transparent">
                            reset
                        </button>
                    @if (Route::has('password.request'))
                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                {{ __('Forgot Your Password?') }}
                            </a>
                        @endif
                    </div>
                </form>

            </div>
        </div>
    </div>

</body>

</html>


