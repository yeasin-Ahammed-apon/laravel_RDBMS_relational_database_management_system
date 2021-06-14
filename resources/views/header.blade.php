
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
      <a class="navbar-brand" href="{{url('/')}}">HOME</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          @if (session()->has('id') && session()->has('id') )
          
            <li class="nav-item">
              <a class="nav-link " aria-current="page" href="{{url('/post_page')}}">Add a post</a>
            </li> 
            <li class="nav-item">
              <a class="nav-link " aria-current="page" href="{{url('/list')}}">All post posts</a>
            </li> 
            <li class="nav-item ">
              <a class="nav-link " aria-current="page" href="{{url('/all_user_posts')}}">My posts</a>
            </li>               
                                 
          @else              
          <li class="nav-item">
            <a class="nav-link " aria-current="page" href="{{url('/login_page')}}">Login</a>
          </li>
          <li class="nav-item">
            <a class="nav-link " aria-current="page" href="{{url('/registration_page')}}">Registration</a>
          </li>
          @endif        
        </ul>
        @if (session()->has('id') && session()->has('id') )           
        <ul class=" navbar-nav  mb-lg-0">
          <li class="nav-item">
            <a class="nav-link fw-bold fs-2 lh-1 text-primary text-capitalize" aria-current="page" href="#">{{session()->get('name')}}</a>
          </li>
          <li class="nav-item">
            <a class="nav-link fw-light fs-5 lh-lg text-danger" aria-current="page" href="{{url('/logout')}}">Logout</a>
          </li>                       
        </ul>       
        @endif
      </div>
    </div>
  </nav>
  
 