
<div class="sidebar" id="sidebar">
    <button class="toggle-btn" onclick="toggleSidebar()">
        <i class="mdi mdi-arrow-left-bold"></i>
    </button><br>
    <!-- Chuyển mục "New Search" lên trước mũi tên đóng/mở sidebar -->
    <a class="nav-link new-chat name" href="#" onclick="redirectToWelcome()">
        <span class="new-chat-icon-button"><i class="mdi mdi-message-plus" style="color: white;"></i></span>
        <span class="menu-title" style="color: white;">New Search</span>
    </a>


    <div class="search-history">
        <h4 style="color: white; margin-top: 20px;">History</h4>
        <div class="search-history-container">
            <ul class="search-list">
                @if(session()->has('history'))
                    @foreach(session('history') as $item)
                        @if(isset($item['search_word']))
                            <li><a href="#">{{ $item['search_word'] }}</a></li>
                        @endif
                    @endforeach

                @else
                    none
                @endif
                <!-- Các mục khác trong lịch sử tìm kiếm có thể được thêm vào đây -->
            </ul>
        </div>
    </div>


{{--        <ul class="nav">--}}
{{--        @foreach($topicNames as $topicName)--}}
{{--            <li class="nav-item">--}}
{{--                <a class="nav-link" href="#" onclick="redirectToTopic({{ $topicName->id }})">--}}
{{--                    <span class="menu-title" style="color: white;">{{ $topicName->topic_name }}</span>--}}
{{--                </a>--}}
{{--            </li>--}}
{{--        @endforeach--}}
{{--    </ul>--}}
    <!-- Nội dung của sidebar -->
    <!-- Thêm các mục mới vào dưới cùng của sidebar -->
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
        <li class="nav-item logout-link">
            <a class="nav-link" href="{{ route('account.logout') }}">
                <span  class="menu-title" style="color: white;"><i class="mdi mdi-logout"></i>Logout</span>
            </a>
        </li>
    </ul>
</div>

<script>
    function toggleSidebar() {
        var sidebar = document.getElementById("sidebar");
        // var content = document.querySelector(".content");
        var toggleBtn = document.querySelector(".toggle-btn");
        var newChatLink = document.querySelector(".new-chat");
        var settingsLink = document.querySelector(".settings-link");
        var highlightLink = document.querySelector(".highlight-link");
        var noteLink = document.querySelector(".note-link");
        var logoutLink = document.querySelector(".logout-link");
        var searchHistory = document.querySelector(".search-history");

        if (sidebar.style.width === "200px") {
            sidebar.style.width = "50px";
            // content.style.marginLeft = "250px";
            toggleBtn.innerHTML = '<i class="mdi mdi-arrow-right-bold"></i>'; // Biểu tượng mũi tên phải khi thu gọn sidebar
            newChatLink.innerHTML = '<span class="new-chat-icon-button"><i class="mdi mdi-message-plus" onclick="redirectToWelcome() style="color: white;"></i></span>'; // Chỉ hiển thị button icon khi thu gọn sidebar
            settingsLink.innerHTML = '<a class="nav-link" href="#"><span class="menu-title" style="color: white;"><i class="mdi mdi-settings"></i></span></a>'; // Chỉ hiển thị icon settings khi thu gọn sidebar
            highlightLink.innerHTML = '<a class="nav-link" href="#"><span class="menu-title" style="color: white;"><i class="mdi mdi-star"></i></span></a>'; // Chỉ hiển thị icon highlight khi thu gọn sidebar
            noteLink.innerHTML = '<a class="nav-link" href="#"><span class="menu-title" style="color: white;"><i class="mdi mdi-note"></i></span></a>'; // Chỉ hiển thị icon note khi thu gọn sidebar
            logoutLink.innerHTML = '<a class="nav-link" href="{{ route('account.logout') }}"><span class="menu-title" style="color: white;"><i class="mdi mdi-logout"></i></span></a>'; // Chỉ hiển thị icon logout khi thu gọn sidebar
            searchHistory.style.display = "none"; // Ẩn phần lịch sử tìm kiếm khi thu gọn sidebar
        } else {
            sidebar.style.width = "200px";
            // content.style.marginLeft = "250px";
            toggleBtn.innerHTML = '<i class="mdi mdi-arrow-left-bold"></i>'; // Biểu tượng mũi tên trái khi mở rộng sidebar
            newChatLink.innerHTML = '<span class="new-chat-icon-button" ><i class="mdi mdi-message-plus" onclick="redirectToWelcome() style="color: white;"></i></span><span class="menu-title" style="color: white;">New Search</span>'; // Hiển thị cả button icon và text khi mở rộng sidebar
            settingsLink.innerHTML = '<a class="nav-link" href="#"><span class="menu-title" style="color: white;"><i class="mdi mdi-settings"></i>Settings</span></a>'; // Hiển thị cả icon và text của settings khi mở rộng sidebar
            highlightLink.innerHTML = '<a class="nav-link" href="#"><span class="menu-title" style="color: white;"><i class="mdi mdi-star"></i>Highlight</span></a>'; // Hiển thị cả icon và text của highlight khi mở rộng sidebar
            noteLink.innerHTML = '<a class="nav-link" href="#"><span class="menu-title" style="color: white;"><i class="mdi mdi-note"></i>Note</span></a>'; // Hiển thị cả icon và text của note khi mở rộng sidebar
            logoutLink.innerHTML = '<a class="nav-link" href="{{ route('account.logout') }}"><span class="menu-title" style="color: white;"><i class="mdi mdi-logout"></i>Logout</span></a>'; // Hiển thị cả icon và text của logout khi mở rộng sidebar
            searchHistory.style.display = "block"; // Hiển thị phần lịch sử tìm kiếm khi mở rộng sidebar
        }
    }
</script>

<!-- Tùy chỉnh CSS -->

