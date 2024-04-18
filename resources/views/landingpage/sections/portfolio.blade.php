<!DOCTYPE html>
<html lang="en">
    <head> 
        <meta charset="utf-8">
        <meta http-equiv="X-UA-compatible" Content="IE=edge">
        <meta name="Viewport" content= "width=device-width, initial-scale=1.0">

    <Title>Portofio</Title>
    <!-- boostrap CSS link -->
    


  <!-- font awesome link -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" 
    integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" 
    referrerpolicy="no-referrer" />
 <link rel="stylesheet" href="style.css">
<link rel="preconnect" href="https://fonts.gstatic.com">
<link rel="stylesheet" href="npm i bootstrap@5.3.2">
</head>
<script src="js.js"></script>
    <Body>

        <!-- First -->
        <header>
            <a href="Index.html" style=" text-decoration: none;"> <h2 class="logo ">Tatoy<span >Jov.</span></h2></a>
            <div class="humburger">
                <div class="line"></div>
                <div class="line"></div>
                <div class="line"></div>
            </div>
            <nav class="nav-bar">
                <ul>
                    <li>
                        <a href="{{route('home.index')}}" class="active">home</a>
                    </li>
                    
                </ul>
            </nav>
        </header>
        
    




<!-- ABOUT SECTION -->

<div class="hero1" id="about-section">
<div class="about">
  
    <h1>Portfolio</h1>
    <p style="color: white;">
      
    </p>
</div>
    <div class="container">
        <section class="aboutus">
            <div class="about-image">
                <img src="./image/PHOTO1.jpg" alt="">
            </div>
            <div class="about-content">
                <h2>Tilte</h2>
                <p style="color: white;">Lorem ipsum dolor sit amet consectetur adipisicing elit. Laboriosam aperiam sint, repellat exercitationem cupiditate unde earum rem, facilis voluptate numquam sit, explicabo accusantium tenetur ipsam consequatur dolorum eos omnis quidem.</p>
            
            </div>
        </section>
    </div>
</div>

            

    </Body>
    <script>
        humburger = document.querySelector(".humburger");
            humburger.onclick = function(){
                navBar = document.querySelector(".nav-bar");
                navBar.classList.toggle("active");
            }</script>
</html>