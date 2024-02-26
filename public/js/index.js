
function openForm() {
    document.getElementById("myForm").style.display = "block";
    document.getElementById("overlay").style.display = "block";
}
function closeForm() {
    document.getElementById("myForm").style.display = "none";
    document.getElementById("overlay").style.display = "none";
}
function openForm2() {
    document.getElementById("myForm2").style.display = "block";
    document.getElementById("overlay").style.display = "block";
}
function closeForm2() {
    document.getElementById("myForm2").style.display = "none";
    document.getElementById("overlay").style.display = "none";
}

document.addEventListener('DOMContentLoaded', function () {
    const searchForm = document.querySelector('.search-form');
    const chatContainer = document.querySelector('.chat-container');
    const gridContainer = document.querySelector('.grid-container');

    searchForm.addEventListener('submit', function (event) {
        event.preventDefault();

        const searchInput = searchForm.querySelector('input[type="text"]');
        const searchTerm = searchInput.value.trim(); // Loại bỏ khoảng trắng ở đầu và cuối chuỗi

        if (searchTerm !== '') { // Kiểm tra xem người dùng đã nhập từ khóa tìm kiếm hay chưa
            // Tạo tin nhắn của người dùng
            const userMessage = document.createElement('div');
            userMessage.classList.add('chat-bubble', 'user-chat');
            userMessage.innerHTML = `<span class="message">${searchTerm}</span>`;

            // Thêm tin nhắn vào khung chat container
            chatContainer.appendChild(userMessage);

            // Ẩn grid-container
            gridContainer.classList.add('hidden');

            // Xóa nội dung trong ô tìm kiếm sau khi đã xử lý
            searchInput.value = '';
        }
    });

    $('#search_word').keypress(function (event) {
        if (event.keyCode === 13) {
            var search_word = document.getElementById('search_word').value.trim(); // Loại bỏ khoảng trắng ở đầu và cuối chuỗi
            console.log(search_word);

            if (search_word !== '') { // Kiểm tra xem người dùng đã nhập từ khóa tìm kiếm hay chưa
                if (search_word.includes('video')) {
                    var words = search_word.split(' ');
                    var keywordFound = false;
                    var keyword = "";

                    for (var i = 0; i < words.length; i++) {
                        if (keywordFound === true) {
                            keyword += words[i] + " ";
                        }
                        if (words[i] === "video") {
                            keywordFound = true;
                        }
                    }

                    var newKW = keyword.trim();
                    var apiKey = 'AIzaSyBELE6SWuSINH24B-g-kwDkc5LwaoXwexk'; // Thay YOUR_YOUTUBE_API_KEY bằng API key của bạn
                    var apiUrl = 'https://www.googleapis.com/youtube/v3/search?q=' + newKW + '&part=snippet&type=video&maxResults=1&key=' + apiKey;

                    $.ajax({
                        url: apiUrl,
                        type: "GET",
                        data: newKW,
                        success: function (response) {
                            // Lấy link video đầu tiên từ kết quả tìm kiếm
                            var videoId = response.items[0].id.videoId;
                            var videoLink = 'https://www.youtube.com/embed/' + videoId;

                            // Nhúng video vào trang web của bạn
                            var videoContainer = document.createElement('div');
                            videoContainer.classList.add('video-container');
                            videoContainer.innerHTML = '<iframe src="' + videoLink + '" allowfullscreen></iframe>';

                            const systemMessage = document.createElement('div');
                            systemMessage.classList.add('chat-bubble', 'system-chat');
                            systemMessage.innerHTML = '<span class="message">System response:</span>';
                            systemMessage.appendChild(videoContainer);

                            // Hiển thị hệ thống tin nhắn một cách từ từ
                            animateSystemMessage(systemMessage);

                            // Thêm hệ thống tin nhắn vào khung chat
                            chatContainer.appendChild(systemMessage);
                        },
                        error: function (xhr) {
                            console.error(xhr.responseText);
                        }
                    });
                } else {
                    $.ajax({
                        url: "http://localhost/SearchEngine/public/api/person",
                        type: "GET",
                        data: { data: search_word },
                        success: function (response) {
                            response.forEach(function (current) {
                                const personProfile = document.createElement('div');
                                personProfile.classList.add('chat-bubble', 'system-chat');
                                const profilePicture = document.createElement('img');
                                profilePicture.classList.add('profile-picture');
                                profilePicture.src = current.image;
                                const profileInfo = document.createElement('div');
                                profileInfo.classList.add('profile-info');
                                const profileDetails = `
                                    Name: ${current.name}
                                    Gender: ${current.gender}
                                    Age: ${current.age}
                                    Passport: ${current.passport}
                                    Phone: ${current.phone}
                                    Email: ${current.email}
                                    Address: ${current.address}
                                    Biography: ${current.Biography}
                                `;
                                profileInfo.innerHTML = profileDetails;
                                personProfile.appendChild(profilePicture);
                                personProfile.appendChild(profileInfo);
                                animateProfile(personProfile);
                                chatContainer.appendChild(personProfile);
                            });
                        },
                        error: function (xhr) {
                            // Xử lý lỗi nếu có
                            console.error(xhr.responseText);
                        }
                    });
                }
            }
        }
    });

    // Hàm thực hiện hiệu ứng animate từ trái sang phải cho hệ thống tin nhắn
    function animateSystemMessage(messageElement) {
        const messageText = messageElement.querySelector('.message');
        const messageTextContent = messageText.textContent;
        messageText.textContent = '';

        for (let i = 0; i < messageTextContent.length; i++) {
            setTimeout(function() {
                messageText.textContent += messageTextContent[i];
            }, 100 * i);
        }
    }
    // Hàm thực hiện hiệu ứng animate từ trái sang phải cho hồ sơ cá nhân
    function animateProfile(profileElement) {
        const profileInfo = profileElement.querySelector('.profile-info');
        const profileDetails = profileInfo.textContent; // Sử dụng textContent để lấy nội dung văn bản
        profileInfo.innerHTML = ''; // Xóa nội dung hiện tại

        const detailsArray = profileDetails.split('\n'); // Chia chuỗi thành mảng các mục

        const delayPerCharacter = 100; // Thời gian trễ cho mỗi ký tự
        const delayPerLine = 1000; // Thời gian trễ cho mỗi dòng

        detailsArray.forEach((detail, index) => {
            setTimeout(function() {
                const detailParagraph = document.createElement('p'); // Tạo một đoạn văn bản mới cho mỗi mục
                profileInfo.appendChild(detailParagraph); // Thêm đoạn văn bản vào profileInfo

                // Thêm hiệu ứng in từ từ từ trái sang phải
                animateText(detail, detailParagraph, delayPerCharacter);
            }, delayPerLine * index);
        });
    }
    function animateText(text, element) {
        const totalCharacters = text.length;
        const totalTimeInMilliseconds = 1500; // Tổng thời gian trong 1.5 giây
        const delay = totalTimeInMilliseconds / totalCharacters;

        for (let i = 0; i < text.length; i++) {
            setTimeout(function() {
                element.textContent += text[i]; // Thêm từng ký tự vào đoạn văn bản
            }, delay * i);
        }
    }
});

function displaySelectedImage(event) {
    var selectedImage = document.getElementById('selected-image');
    var input = event.target;

    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            selectedImage.src = e.target.result;
            selectedImage.style.display = 'block'; // Hiển thị hình ảnh được chọn
        };

        reader.readAsDataURL(input.files[0]);
    }
}

function removePicture() {
    var selectedImage = document.getElementById('selected-image');
    selectedImage.src = '#'; // Đặt lại đường dẫn hình ảnh
    selectedImage.style.display = 'none'; // Ẩn hình ảnh
}

function redirectToWelcome() {
    window.location.href = "http://localhost/SearchEngine/public"; // Chuyển hướng về trang chính
}

function redirectToTopic(topicId) {
    window.location.href = "http://localhost/SearchEngine/public/search/" + topicId;
}
function displayDemoMedia(event) {
    const file = event.target.files[0];
    const fileType = file.type.split('/')[0]; // Lấy loại file

    if (fileType === 'image') {
        const img = document.getElementById('demo-image');
        const video = document.getElementById('demo-video');
        img.style.display = 'block';
        video.style.display = 'none';
        img.src = URL.createObjectURL(file);
    } else if (fileType === 'video') {
        const img = document.getElementById('demo-image');
        const video = document.getElementById('demo-video');
        img.style.display = 'none';
        video.style.display = 'block';
        video.src = URL.createObjectURL(file);
    }
}

function SearchImage() {
    closeForm2();
    const chatContainer = document.querySelector('.chat-container');
    const gridContainer = document.querySelector('.grid-container');
    const imageInput = document.getElementById('image');
    var imgPath = document.getElementById('image').value;
    var imgName = imgPath.split('\\').pop();
    console.log(imgName)
    const search_word = document.getElementById('message').value;
    const userMessage = document.createElement('div');
    userMessage.classList.add('chat-bubble', 'user-chat');
    userMessage.innerHTML = `<span class="message">${search_word}</span>`;
    if (imageInput.files.length > 0) {
        const imgFile = imageInput.files[0];
        const imgPath = URL.createObjectURL(imgFile);
        const imageBubble = document.createElement('div');
        imageBubble.classList.add('chat-bubble', 'user-chat');
        const imgElement = document.createElement('img');
        imgElement.style.width = '200px';
        imgElement.style.height = 'auto';
        imgElement.src = imgPath;
        imageBubble.appendChild(imgElement);
        chatContainer.insertBefore(imageBubble, chatContainer.firstChild);
    }
    chatContainer.appendChild(userMessage);
    // Ẩn grid-container
    gridContainer.classList.add('hidden');
    $.ajax({
        url: "http://localhost/SearchEngine/public/api/image_search",
        type: "GET",
        data: { imgName: imgName },
        success: function (response){
            var answer = response.map(function(current, index) {
                return `<p style="width: 550px">${current.description}</p>
                <div class="related-images">
                    <img src="${current.imgNameRelate1}" class="related-image">
                    <img src="${current.imgNameRelate2}" class="related-image">
                </div>`;
            })
            console.log(response.description, response)
            const result = document.createElement('div');
            result.classList.add('chat-bubble', 'system-chat');
            result.classList.add('profile-info');
            const description = document.createElement('div');
            description.classList.add('chat-bubble', 'system-chat');
            description.classList.add('profile-info');
            description.innerHTML = answer.join('');
            result.appendChild(description);
            chatContainer.appendChild(result);
        },
        error: function (xhr) {
            console.error(xhr.responseText);
        }
    });
}














//AIzaSyBxNYAx3OIrvbcwdOlCmpHhUxS6ZU8-wdM _GG CUSTOM SEARCH


