
@include('landingpage.components.header')
    <Body>

     <!-- NavBar -->
   
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
                    <a href="#home" class="active">home</a>
                </li>
                <li>
                    <a href="#about-section" class="active">aboutus</a>
                </li>
                <li>
                    <a href="#portofio-section" class="active">portfolio</a>
                </li>
                <li>
                    <a href="#contact" class="active">contact</a>
                </li>
            </ul>
        </nav>
    </header>
    


<div class="heromain animate-on-scroll" id="home">
<div class="hero animate-on-scroll" style=" background-image: url({{ asset('image/code.jpg')}});">
<div class="section-containers ">
   @foreach ($home as  $item )
       

        <div class=" section-detail "  >
            <P style="color: red; font-size: 40px;"> Hello world!</P> 
            <br>
            <h1>
                <a href="" class="typewrite" data-period="2000" data-type='[ "I`m {{$item->name}}.", "This is my personal Portofio.", "Hope you like it ^^." ]' style="text-decoration: none;">
                    <span class="wrap"></span>
                </a>
            </h1>
            <br>
        </div>   
      
    </div>
    </div>
</div>
</div>
</div>
<!-- ABOUT SECTION -->

<div class="hero1 hero animate-on-scroll" id="about-section">
<div class="about animate-on-scroll">
    <br>
    <h1>About Me</h1>
    <p style="color: white;">
      
    </p>
</div>
    <div class="container">
        <section class="aboutus">
            <div class="about-image">
                <img src="{{asset('image/PHOTO1.jpg')}}" alt="">
            </div>
            <div class="about-content">
                <h2>{{$item->name}}</h2>
                <br>
                <p style="color: white;">I am a {{$item->role}} </p>
                <p>{{$item->description}}</p>
                <a href="{{ route('home.skill')}}" class="hire-me">Skills</a>
                 <a href="{{ route('home.experience')}}" class="hire-me">Experience</a>
            </div>
        </section>
    </div>
</div>
@endforeach
<!-- EDUCACTION  -->

    <div class="bg-gradient_solid animate-on-scroll" id="Education">
        <div class="container">
          <div class="section-header">
            <div class="about"> <h2 style="font-size: 50px;">Education</h2>
            <hr >
          </div>
          <div class="steps">
            @foreach ( $education as $id )
            <div class="steps-container">
              <div class="content">
                <h2>{{$id->level}}</h2>
                <p>{{$id->school}}</p>
              </div>
              <i class="step-line"></i>
              <div class="date">{{$id->start}}-{{$id->end}}</div>
            </div>
            @endforeach  

          </div>
          </div>
        </div>
      </div>

      {{-- portfolio --}}
<div class="hero2 animate-on-scroll" id="portofio-section">
    <div class="about">
        <br>
        <h1>Portfolio</h1>
    
        </div>
<div class="card-area">   
    <div class="wrapper">
        <div class="box-area">
            @foreach ($work as $work )
            <div class="box" style="display: flex; justify-content: center; align-items: center;">
                <img style="width: 500px; height: 500px;" src="{{ asset('upload/'.$work->image)}}" alt="">
                <div class="overlay">
                    <h3>{{$work->name}}</h3>
                    <p style="font-size: 12px">{{$work->description}}</p>
                    <a style="margin-bottom: 50px" href="{{$work->site}}" target="">{{$work->site}}</a>
                </div>   
            </div>  
            @endforeach
        </div>
    </div>
   
</div>
</div>

<!-- Contact us  -->
<div class="body1 animate-on-scroll" >
 <section class="contact" id="contact">
    <h2>Contact me!</h2>

    <form action="#">
        <div class="input-box">
            <div class="input-field field">
                <input type="text" placeholder="Full Name" id="name" class="item" autocomplete="off">
                <div class="error-text">Full name can't be blank</div>
            </div>
            <div class="input-field field">
                <input type="text" placeholder="Email address" id="email" class="item" autocomplete="off">
                <div class="error-text">Email can't be blank</div>
            </div>
        </div>

        <div class="input-box">
            <div class="input-field field">
                <input type="text" placeholder="Phone number" id="phone" class="item" autocomplete="off">
                <div class="error-text">Phone number can't be blank</div>
            </div>
            <div class="input-field field">
                <input type="text" placeholder="Subject" id="subject" class="item" autocomplete="off">
                <div class="error-text">Subject can't be blank</div>
            </div>
        </div>
        <div class="textarea-field field">
            <textarea name="" id="message" cols="30" rows="10" id="message" placeholder="Your Message" class="item" autocomplete="off">
            </textarea>
            <div class="error-text">Message can't be blank</div>
        </div>

        <button type="button" onclick="sendMail()">Send Message</button>
    </form>
 
    
 </section>
</div>

{{-- animation --}}
<script>
 // Function to check if an element is in the viewport
function isInViewport(element) {
  const rect = element.getBoundingClientRect();
  return (
    rect.top >= 0 &&
    rect.left >= 0 &&
    rect.bottom <= (window.innerHeight || document.documentElement.clientHeight) &&
    rect.right <= (window.innerWidth || document.documentElement.clientWidth)
  );
}

// Function to add animation classes when element is in viewport
function animateOnScroll() {
  const elements = document.querySelectorAll('.animate-on-scroll');
  elements.forEach(element => {
    if (isInViewport(element)) {
      element.classList.add('animated');
    }
  });
}

// Initial check for animations when the page loads
animateOnScroll();

// Event listener for scroll
window.addEventListener('scroll', animateOnScroll);


</script>
    </Body>

    @include('landingpage.components.footer')
    