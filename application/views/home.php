<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title ?></title>
    <link rel="stylesheet" href="home.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<style>
    @import url("https://fonts.googleapis.com/css2?family=Arvo:wght@700&family=Poppins:ital,wght@0,200;0,300;0,600;1,400&display=swap");

* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Poppins', sans-serif;
}
body {
    background: #081b29;
    color: #ededed;
}

header {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    padding: 20px 10%;
    background: transparent;
    display: flex;
    justify-content: space-between;
    z-index: 100;
}
.logo {
    position: relative;
    font-size: 25px;
    color: #ededed;
    text-decoration: none;
    font-weight: 600;
}
.logo::before {
    content: '';
    position: absolute;
    top: 0;
    right: 0;
    width: 100%;
    height: 100%;
    animation: showRight 1s ease forwards;
    animation-delay: .4s;
    background: #081b29;
}
.navbar a {
    font-size: 18px;
    color: #ededed;
    text-decoration: none;
    font-weight: 500;
    margin-left: 35px;
    transition: .3s;
}
.navbar a:hover, 
.navbar a.active {
    color: #00abf0;
}
.home {
    background-image: url("file:///C:/xampp/htdocs/codeigniter-3/application/asset/binus.png");
    background-repeat: no-repeat;
    background-size: cover;
    background-position: center;
    display: flex;
    align-items: center;
    height: 100vh;
    padding: 0 10%;
}
.home-content {
    max-width: 600px;
}
.home-content h1 {
    position: relative;
    font-size: 56px;
    font-weight: 700;
    line-height: 1.2;
}
.home-content h1::before {
    content: '';
    position: absolute;
    top: 0;
    right: 0;
    width: 100%;
    height: 100%;
    animation: showRight 1s ease forwards;
    animation-delay: .1s;
    background: #081b29;
}
.home-content h3 {
    font-size: 32px;
    font-weight: 700;
    color: #00abf0;
}
.home-content h3::before {
    content: '';
    position: absolute;
    top: 0;
    right: 0;
    width: 100%;
    height: 100%;
    animation: showRight 1s ease forwards;
    animation-delay: 1.3s;
    background: #081b29;
}
.home-content p {
    font-size: 16px;
    margin: 20px 0 40px;
}
.home-content p::before {
    content: '';
    position: absolute;
    top: 0;
    right: 0;
    width: 100%;
    height: 100%;
    animation: showRight 1s ease forwards;
    animation-delay: 1.6s;
    background: #081b29;
}
.home-content .btn-box {
    position: relative;
    width: 345px;
    height: 50px;
    justify-content: space-around;
    display: flex;
}
.home-content .btn-box ::before {
    content: '';
    position: absolute;
    top: 0;
    right: 0;
    width: 100%;
    height: 100%;
    animation: showRight 1s ease forwards;
    animation-delay: 1.9s;
    background: #081b29;
    z-index: 2;
    background: #081b29;
}
.btn-box a {
    position: relative;
    width: 150px;
    height: 100%;
    background: #00abf0;
    border: 2px solid #00abf0;
    border-radius: 8px;
    display: inline-flex;
    font-size: 19px;
    color: #081b29;
    text-decoration: none;
    font-weight: 600;
    letter-spacing:1px;
    justify-content: center;
    align-items: center;
    /* z-index: -1; */
    overflow: hidden;
    /* transition: .5s; */
}
/* .btn-box a:hover {
    color: #00abf0;
} */
.btn-box a:nth-child(2) {
    background: transparent;
    color: #00abf0;
}
btn-box a:nth-child(2):hover {
    color: #081b29;
}
.btn-box a:nth-child(2)::before {
    background: #00abf0;
}
.btn-box a ::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 0;
    height: 100%;
    z-index: -1;
    transition: .5s;
    background: #081b29;
}
.btn-box a:hover::before {
    width: 100%;
}
.home-sci {
    position: absolute;
    bottom: 40px;
    width: 170px;
    display: flex;
    justify-content: space-around;
}
.home-sci ::before {
    content: '';
    position: absolute;
    top: 0;
    right: 0;
    width: 100%;
    height: 100%;
    animation: showRight 1s ease forwards;
    animation-delay: 2.5s;
    background: #081b29;
    z-index: 2;
    background: #081b29;
}
.home-sci a {
    display: inline-flex;
    justify-content: center;
    align-items: center;
    width: 40px;
    height: 40px;
    background: transparent;
    border: 2px solid #00abf0;
    border-radius: 50%;
    font-size: 20px;
    color: #00abf0;
    text-decoration: none;
    z-index: 110;
    overflow: hidden;
}
.home-sci a::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    z-index: -1;
    transition: .5s;
    /* background: #00abf0; */
}
.home-sci a:hover::before {
    width: 100%;
}
.home-imgHover {
    position: absolute;
    top: 0;
    right: 30px;
    width: 500px;
    height: 100%;
    background: transparent;
    transition: 3s;
    animation: manipActiveHover .1s forwards;
    animation-delay: 4s;
    pointer-events: none;
}

.home-imgeHover:hover {
    background: #081b29;
    opacity: .8;
}
.home-imgeHover ::before {
    content: '';
    position: absolute;
    top: 0;
    right: 0;
    width: 120%;
    height: 100%;
    animation: showRight 1s ease forwards;
    animation-delay: 3s;
    background: #081b29;
    z-index: 100;
    background: #081b29;
}

@keyframes showRight {
    100% {
        width: 0;
    }
}

@keyframes manipActiveHover {
    100% {
        pointer-events: auto;
    }
}
</style>

<body>

    <header class="header">
        <a href="" class="logo">SIS</a>
        <nav class="navbar">
            <a href="">Home</a>
            <a href="">About</a>
            <a href="">Services</a>
            <a href="">Portofolio</a>
            <a href="">Contact</a>
        </nav>
    </header>

    <section class="home">
        <div class="home-content">
            <h1>Sistem Informasi Sekolah</h1>
            <h3>SMK Bina Nusantara Semarang</h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Qui, libero? Omnis velit amet hic aliquid, quisquam nulla cupiditate veniam praesentium quis eum, quae fugit debitis illum. Sapiente sed at deleniti!</p>
            <div class="btn-box">
                <a href="auth">Login</a>
                <a href="">Let's Tals</a>
            </div>
        </div>
        <div class="home-sci">
            <a href=""><i class="fab fa-facebook"></i></a>
            <a href=""><i class="fab fa-twitter"></i></a>
            <a href=""><i class="fab fa-instagram"></i></a>
        </div>
        <span class="home-imgeHover"></span>
    </section>

</body>

</html>