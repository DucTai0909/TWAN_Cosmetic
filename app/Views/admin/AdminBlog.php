<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Thống kê - Bài viết </title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="../Css/AdminBlog.css" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300&family=Pacifico&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
</head>

<body>
    <header data-spy="affix">
        <img src="../Images_Web/Logo/Logo_Admin.svg" class="logo">
        <div class="icon2">
            <button class="material-symbols-outlined" id="icon">
                notifications
            </button>
            <button class="material-symbols-outlined" id="icon">
                account_circle
            </button>
        </div>
    </header>
    <section data-spy="affix" id="nav">
        <nav>
            <ul>
                <li><a href="#"> <span class="material-symbols-outlined" id="icon-thongke"> monitoring </span>
                    </a></li>
                <li>
                    <a href="#"><span class="material-symbols-outlined" id="icon-thongke">
                            person
                        </span> </a>
                </li>
                <li>
                    <a href="#" > <span class="material-symbols-outlined" id="icon-thongke">
                            reviews
                        </span></a>
                </li>
                <li><a href="#"><span class="material-symbols-outlined" id="icon-thongke">
                            inventory_2
                        </span></a></li>
                <li><a href="#"> <span class="material-symbols-outlined" id="icon-thongke">
                            sell
                        </span></a></li>
                <li><a href="#" class="active"> <span class="material-symbols-outlined" id="icon-thongke">
                            newspaper
                        </span></a></li>
                <li><a href="#"><span class="material-symbols-outlined" id="icon-thongke">
                            badge
                        </span></a></li>
            </ul>
        </nav>
    </section>
    <div class="main">
        <div class="thanhtimkiem">
            <input type="text" id="mySearch" onkeyup="myFunction()" placeholder="Bài viết" title="Type in a category" />
            <button type="button" class="material-symbols-outlined" id="icon-search">
                search
            </button>
            <button type="button" class="material-symbols-outlined" id="icon-add">
                add_circle
            </button>

        </div>
        <div class="grid-container">
            <div>
                <img src="../Images_Web/Posters/Bài viết/255851207_4488384907923767_5021908811223513261_n_d1d0829cfb.jpg" />
                <div> Tên bài viết </div>
                <div id="icon-thongke2">
                    <button class="material-symbols-outlined" id="icon">
                        autorenew
                    </button>
                    <button class="material-symbols-outlined" id="icon">
                        delete
                    </button>
                </div>
            </div>
            <div>
                <img src="../Images_Web/Posters/Bài viết/dewy-skin-insta-jin-4.jpg" />
                <div> Tên bài viết </div>
                <div id="icon-thongke2">
                    <button class="material-symbols-outlined" id="icon">
                        autorenew
                    </button>
                    <button class="material-symbols-outlined" id="icon">
                        delete
                    </button>
                </div>
            </div>
            <div>
                <img src="" />
                <div> Tên bài viết</div>
                <div id="icon-thongke2">
                    <button class="material-symbols-outlined" id="icon">
                        autorenew
                    </button>
                    <button class="material-symbols-outlined" id="icon">
                        delete
                    </button>
                </div>
            </div>
            <div>
                <img src="" />
                <div> Tên bài viết </div>
                <div id="icon-thongke2">
                    <button class="material-symbols-outlined" id="icon">
                        autorenew
                    </button>
                    <button class="material-symbols-outlined" id="icon">
                        delete
                    </button>
                </div>
            </div>


        </div>
    </div>
    <button onclick="topFunction()" id="myBtn" title="Go to top">
        <span class="material-symbols-outlined">
            arrow_upward
        </span>
    </button>

    <script>
        // Get the button
        let mybutton = document.getElementById("myBtn");

        // When the user scrolls down 40px from the top of the document, show the button
        window.onscroll = function() {
            scrollFunction()
        };

        function scrollFunction() {
            if (document.body.scrollTop > 40 || document.documentElement.scrollTop > 40) {
                mybutton.style.display = "block";
            } else {
                mybutton.style.display = "none";
            }
        }

        // When the user clicks on the button, scroll to the top of the document
        function topFunction() {
            document.body.scrollTop = 0;
            document.documentElement.scrollTop = 0;
        }
    </script>
</body>

</html>