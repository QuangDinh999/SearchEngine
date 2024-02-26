<div class="sidebar-right" id="sidebar-right">
    <button class="toggle-btn2" onclick="toggleSidebarRight()">
        <i class="mdi mdi-arrow-left-bold"></i>
    </button><br>

    <ul class="nav" style="margin-top: auto;">
{{--        <li><a href="{{ route('history.destroy') }}" id="clear-history">Clear History</a></li> <!-- Thêm nút Xóa lịch sử -->--}}
        <li class="nav-item settings-link">
            <a class="nav-link" href="#">
                <span class="menu-title" style="color: white;"><i class="mdi mdi-settings"></i>Settings</span>
            </a>
        </li>
        <li class="nav-item highlight-link">
            <a class="nav-link" href="#">
                <span class="menu-title" style="color: white;"><i class="mdi mdi-star"></i>Highlight</span>
            </a>
        </li>
        <li class="nav-item note-link">
            <a class="nav-link" href="#">
                <span class="menu-title" style="color: white;"><i class="mdi mdi-note"></i>Note</span>
            </a>
        </li>
{{--        <li class="nav-item logout-link">--}}
{{--            <a class="nav-link" href="{{ route('account.logout') }}">--}}
{{--                <span  class="menu-title" style="color: white;"><i class="mdi mdi-logout"></i>Logout</span>--}}
{{--            </a>--}}
{{--        </li>--}}
    </ul>
</div>

<script>
    function toggleSidebarRight() {
        var sidebarRight = document.getElementById("sidebar-right");
        var toggleBtn = document.querySelector(".toggle-btn2");
        var settingsLink = document.querySelector(".settings-link");
        var highlightLink = document.querySelector(".highlight-link");
        var noteLink = document.querySelector(".note-link");

        if (sidebarRight.style.width === "200px") {
            sidebarRight.style.width = "50px";
            toggleBtn.innerHTML = '<i class="mdi mdi-arrow-left-bold-bold"></i>';
            settingsLink.innerHTML = '<a class="nav-link" href="#"><span class="menu-title" style="color: white;"><i class="mdi mdi-settings"></i></span></a>'; // Chỉ hiển thị icon settings khi thu gọn sidebar
            highlightLink.innerHTML = '<a class="nav-link" href="#"><span class="menu-title" style="color: white;"><i class="mdi mdi-star"></i></span></a>'; // Chỉ hiển thị icon highlight khi thu gọn sidebar
            noteLink.innerHTML = '<a class="nav-link" href="#"><span class="menu-title" style="color: white;"><i class="mdi mdi-note"></i></span></a>';
        } else {
            sidebarRight.style.width = "200px";
            toggleBtn.innerHTML = '<i class="mdi mdi-arrow-right-bold"></i>';
            settingsLink.innerHTML = '<a class="nav-link" href="#"><span class="menu-title" style="color: white;"><i class="mdi mdi-settings"></i>Settings</span></a>'; // Hiển thị cả icon và text của settings khi mở rộng sidebar
            highlightLink.innerHTML = '<a class="nav-link" href="#"><span class="menu-title" style="color: white;"><i class="mdi mdi-star"></i>Highlight</span></a>'; // Hiển thị cả icon và text của highlight khi mở rộng sidebar
            noteLink.innerHTML = '<a class="nav-link" href="#"><span class="menu-title" style="color: white;"><i class="mdi mdi-note"></i>Note</span></a>';
        }
    }
</script>

<style>
    .sidebar-right {
        position: fixed;
        top: 0;
        right: 0;
        height: 100%;
        width: 50px;
        background-color: #333; /* Màu nền của sidebar */
        overflow-x: hidden;
        padding-top: 20px; /* Khoảng cách từ trên xuống cho phần nội dung của sidebar */
        z-index: 999; /* Đảm bảo sidebar hiển thị trên các phần tử khác */
        transition: 0.5s; /* Hiệu ứng chuyển động khi mở/rút gọn sidebar */
    }

    .nav {
        display: flex; /* Sử dụng flexbox để sắp xếp các mục trong danh sách theo chiều ngang */
        flex-direction: row; /* Sắp xếp các mục theo chiều ngang */
        list-style: none; /* Loại bỏ dấu đầu dòng của danh sách */
        padding: 0; /* Xóa padding mặc định */
        margin: 0; /* Xóa margin mặc định */
    }

    .nav-item {
        margin-right: 10px; /* Khoảng cách giữa các mục */
    }

    /* Thêm CSS để điều chỉnh kiểu dáng và vị trí của các phần tử trong sidebar */
</style>
