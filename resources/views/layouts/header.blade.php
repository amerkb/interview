<!-- resources/views/layouts/header.blade.php -->
<nav class="bg-[#fff] px-[30px] flex items-center justify-end h-[4.5rem] duration-500">
    <div class="relative links">
        <img class="w-[50px] h-[50px] rounded-full cursor-pointer" src="{{ asset('profile.png') }}" id="profile-image" />

        <ul class="ul hidden" id="profile-menu">
            <li class="hover:text-[#ff6877] duration-300 cursor-pointer" id="logout-link">
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="bg-red-500 center hover:bg-red-700 duration-200 text-white font-semibold outline-none min-w-[80px] px-3 py-2 text-[14px] rounded-[0.25rem] border-[1px] border-transparent">
                        Logout
                    </button>
                </form>
            </li>
        </ul>
    </div>
</nav>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        var profileImage = document.getElementById('profile-image');
        var profileMenu = document.getElementById('profile-menu');
        var logoutLink = document.getElementById('logout-link');

        profileImage.addEventListener('click', function () {
            profileMenu.classList.toggle('hidden');
            profileMenu.classList.toggle('block');
        });

        logoutLink.addEventListener('click', function () {
        });
    });
</script>
