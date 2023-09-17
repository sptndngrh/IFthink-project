<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet" href="/assets/css/style.css" />
    <link rel="shortcut icon" href="/assets/picture/IFLogoBackground.png" type="image/x-icon" />
    <title>Home | IFthink</title>
</head>

<body>
    <header>
        <a href="#" class="logo">IFthink</a>
        <ul>
            <li><a href="./home.php">Home</a></li>
            <li><a href="./about.php">About</a></li>
            <li><a href="./menu.php">Menu</a></li>
        </ul>
    </header>
    <div class="container">
        <div class="search-box">
            <div class="search-icon">
                <span class="material-symbols-outlined">search</span>
            </div>
            <div class="search-input">
                <input type="text" class="input" placeholder="Type to search..." />
            </div>
            <div class="cancel-icon">
                <span class="material-symbols-outlined">close</span>
            </div>
            <div>
                <h1></h1>
            </div>
        </div>
    </div>
    <div class="main-content">
        <h2>Trending YouTube Videos</h2>
        <div id="video-container"></div>
    </div>
    <script>
    var searchTerm = "searchInput"; //
    var paragraphs = document.getElementsByTagName("p");

    for (var i = 0; i < paragraphs.length; i++) {
        var paragraph = paragraphs[i];
        var text = paragraph.innerText;
        var index = text.indexOf(searchTerm);

        if (index >= 0) {
            var highlightedText = text.substring(index, index + searchTerm.length);
            var beforeText = text.substring(0, index);
            var afterText = text.substring(index + searchTerm.length);

            paragraph.innerHTML = beforeText + "<span class='highlight'>" + highlightedText + "</span>" + afterText;
        }
    }

    window.addEventListener("scroll", function() {
        var header = document.querySelector("header");
        header.classList.toggle("sticky", window.scrollY > 0);
    });

    const searchBtn = document.querySelector(".search-icon");
    const cancelBtn = document.querySelector(".cancel-icon");
    const searchBox = document.querySelector(".search-box");
    const searchInput = document.querySelector(".search-input input");

    cancelBtn.onclick = () => {
        searchBox.classList.remove("active");
        cancelBtn.classList.remove("active");
        searchInput.classList.remove("active");
        searchInput.value = "";
    };

    searchInput.addEventListener("keypress", function(event) {
        if (event.key === "Enter") {
            const searchQuery = searchInput.value;
            const website = "google";
            let url = "";

            if (website === "google") {
                url = "https://www.google.com/search?q=" + searchQuery;
            } else if (searchQuery === "") {
                window.location.href = "index.html";
                return;
            }
            window.open(url);
        }
    });

    searchBtn.addEventListener("click", function() {
        const searchQuery = searchInput.value;
        const website = "google";
        let url = "";

        if (website === "google") {
            url = "https://www.google.com/search?q=" + searchQuery;
        } else if (searchQuery === "") {
            window.location.href = "index.html";
            return;
        }
        window.open(url);

        searchBox.classList.add("active");
        cancelBtn.classList.add("active");
        searchInput.classList.add("active");
    });
    </script>
</body>

</html>