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
                    <a href="{{route('home.index')}}" class="active">home</a>
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

    <div class="bg-gradient_solid" id="Education">
        <div class="container">
          <div class="section-header">
            <div class="about"> <h2 style="font-size: 50px;">Skill</h2>
            <hr >
          </div>
          <div class="steps">
            <div class="steps-container">
              @foreach ($skill as $item )
              <div class="content">
                <h2>{{$item->title}}</h2>
                <p>{{$item->percent}}</p>
              </div>
              <i class="step-line"></i>
              <div class="date"></div>
            </div>
            @endforeach
          </div>
        </div>
      </div>
      
@include('landingpage.components.footer')
  