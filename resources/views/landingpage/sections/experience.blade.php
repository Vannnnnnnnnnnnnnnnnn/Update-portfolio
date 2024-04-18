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
            </ul>
        </nav>
    </header>

    <div class="bg-gradient_solid" id="Education">
        <div class="container">
          <div class="section-header">
            <div class="about"> <h2 style="font-size: 50px;">Education</h2>
            <hr >
          </div>
          <div class="steps">
            <div class="steps-container">
              @foreach ( $experience as $item)

              <div class="content">
                <h2>{{$item->company}}</h2>
                <p>{{$item->role}}</p>
                <p>{{$item->description}}</p>
              </div>
              <i class="step-line"></i>
              <div class="date">{{$item->start}}-{{$item->end}}</div>
            </div>
            @endforeach
          </div>
        </div>
      </div>
    

</div>
    </Body>
    @include('landingpage.components.footer')
  