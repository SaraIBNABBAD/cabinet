<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Cabinét Médical</title>
        {{-- lien css --}}
        <link rel="stylesheet" href="{{asset('css/style.css')}}">

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
        
        
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">

        
    </head>

    <body>
      <div id="topbar" class="d-flex align-items-center ">
        <!-- Topbar Start -->
<div class="container-fluid bg-light ps-5 pe-0 d-none d-lg-block">
<div class="row gx-0">
  <div class="col-md-6 text-center text-lg-start mb-2 mb-lg-0">
      <div class="d-inline-flex align-items-center">
          <small class="py-2"><i class="far fa-clock text-primary me-2"></i>Temps d'ouverture: Lundi - Samedi : 08.00 am - 18.00 pm, Fermé le Dimanche </small>
      </div>
  </div>
  <div class="col-md-6 text-center text-lg-end">
      <div class="position-relative d-inline-flex align-items-center  text-white top-shape px-5" id="bgperso">
          <div class="me-3 pe-3 border-end py-2">
              <p class="m-0"><i class="fa fa-envelope-open me-2"></i>iaf@cabinet.com</p>
          </div>
          <div class="py-2">
              <p class="m-0"><i class="fa fa-phone-alt me-2"></i>+212.661.10.10.11</p>
          </div>
      </div>
  </div>
</div>
</div>
<!-- Topbar End -->
  </div>



      <nav>
          
          <div class="container-fluid  ps-5 pe-0 d-none d-lg-block">
            <div class="row gx-0">
              <div class="col-md-6 text-center text-lg-start mb-2 mb-lg-0" id="stick">
                  <div class="d-inline-flex align-items-center">
                    <img src="{{asset('medicall.jpg')}}" id="logo" alt="medical">
                    <a href="#acceuil">Acceuil</a>
                    <a href="#apropos">A&nbsppropos</a>
                    <a href="#departments">Départements</a>
                    <a href="#gallery">Galerie</a>
                    <a href="#team">Docteurs</a>
                    <a href="#contact">Contact</a>
                  </div>
              </div>
              <div class="col-md-6 text-center text-lg-end">
                  <div class="position-relative d-inline-flex align-items-center   top-shape ">
                      <div class="py-0">
                        <div class="dropdown">
                          @if (Route::has('login'))
                        @auth
                         
                          <button class="dropbtn">Bienvenue {{Auth::user() ->name}}</button> 
                          <img class="imageprofile" src="{{ asset(Auth::user()->picture) }}" alt=""> 
                          <div class="dropdown-content">
                            <a  href="{{ url('/dashboard') }}"> Dashboard</a>
                          <a  href="{{ route('logout') }}">Se déconnecter</a>
                            </div>
                          </div>
              
                          <div class="dropdown">
                            @else
                            <button class="dropbtn">En un seul click <i class="fa-regular fa-computer-mouse-scrollwheel"></i></button> 
                            <div class="dropdown-content">
                            <a  href="{{ route('login') }}" ><i class="fa-solid fa-right-to-bracket" id="con"></i> &nbsp Se connecter </a>
                            @if (Route::has('signup'))
                           <a href="{{ route('signup') }}"><i class="fa-solid fa-user-plus" id="con2"></i> &nbsp S'enregistrer</a> 
                            @endif
                         @endauth
                          @endif
                              </div>
                            </div>
                      </div>
                  </div>
              </div>
            </div>
            </div>

       
        </div>
      </nav>
        

        <!-- ======= Departments Section ======= -->
    {{-- <section id="departments" class="departments">
      <div class="container">

        <div class="section-title">
          <h2>Departments</h2>
          <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
        </div>

        <div class="row gy-4">
          <div class="col-lg-3">
            <ul class="nav nav-tabs flex-column">
              <li class="nav-item">
                <a class="nav-link active show" data-bs-toggle="tab" href="#tab1">Cardiology</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-bs-toggle="tab" href="#tab2">Neurology</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-bs-toggle="tab" href="#tab3">Hepatology</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-bs-toggle="tab" href="#tab4">Pediatrics</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-bs-toggle="tab" href="#tab5">Eye Care</a>
              </li>
            </ul>
          </div>
          <div class="col-lg-9">
            <div class="tab-content">
              <div class="tab-pane active show" id="tab1">
                <div class="row gy-4">
                  <div class="col-lg-8 details order-2 order-lg-1">
                    <h3>Cardiology</h3>
                    <p class="fst-italic">Qui laudantium consequatur laborum sit qui ad sapiente dila parde sonata raqer a videna mareta paulona marka</p>
                    <p>Et nobis maiores eius. Voluptatibus ut enim blanditiis atque harum sint. Laborum eos ipsum ipsa odit magni. Incidunt hic ut molestiae aut qui. Est repellat minima eveniet eius et quis magni nihil. Consequatur dolorem quaerat quos qui similique accusamus nostrum rem vero</p>
                  </div>
                  <div class="col-lg-4 text-center order-1 order-lg-2">
                    <img src="{{asset('1.jpg')}}" alt="" class="img-fluid">
                  </div>
                </div>
              </div>
              <div class="tab-pane" id="tab2">
                <div class="row gy-4">
                  <div class="col-lg-8 details order-2 order-lg-1">
                    <h3>Et blanditiis nemo veritatis excepturi</h3>
                    <p class="fst-italic">Qui laudantium consequatur laborum sit qui ad sapiente dila parde sonata raqer a videna mareta paulona marka</p>
                    <p>Ea ipsum voluptatem consequatur quis est. Illum error ullam omnis quia et reiciendis sunt sunt est. Non aliquid repellendus itaque accusamus eius et velit ipsa voluptates. Optio nesciunt eaque beatae accusamus lerode pakto madirna desera vafle de nideran pal</p>
                  </div>
                  <div class="col-lg-4 text-center order-1 order-lg-2">
                    <img src="{{asset('1.jpg')}}" alt="" class="img-fluid">
                  </div>
                </div>
              </div>
              <div class="tab-pane" id="tab3">
                <div class="row gy-4">
                  <div class="col-lg-8 details order-2 order-lg-1">
                    <h3>Impedit facilis occaecati odio neque aperiam sit</h3>
                    <p class="fst-italic">Eos voluptatibus quo. Odio similique illum id quidem non enim fuga. Qui natus non sunt dicta dolor et. In asperiores velit quaerat perferendis aut</p>
                    <p>Iure officiis odit rerum. Harum sequi eum illum corrupti culpa veritatis quisquam. Neque necessitatibus illo rerum eum ut. Commodi ipsam minima molestiae sed laboriosam a iste odio. Earum odit nesciunt fugiat sit ullam. Soluta et harum voluptatem optio quae</p>
                  </div>
                  <div class="col-lg-4 text-center order-1 order-lg-2">
                    <img src="{{asset('1.jpg')}}" alt="" class="img-fluid">
                  </div>
                </div>
              </div>
              <div class="tab-pane" id="tab4">
                <div class="row gy-4">
                  <div class="col-lg-8 details order-2 order-lg-1">
                    <h3>Fuga dolores inventore laboriosam ut est accusamus laboriosam dolore</h3>
                    <p class="fst-italic">Totam aperiam accusamus. Repellat consequuntur iure voluptas iure porro quis delectus</p>
                    <p>Eaque consequuntur consequuntur libero expedita in voluptas. Nostrum ipsam necessitatibus aliquam fugiat debitis quis velit. Eum ex maxime error in consequatur corporis atque. Eligendi asperiores sed qui veritatis aperiam quia a laborum inventore</p>
                  </div>
                  <div class="col-lg-4 text-center order-1 order-lg-2">
                    <img src="{{asset('1.jpg')}}" alt="" class="img-fluid">
                  </div>
                </div>
              </div>
              <div class="tab-pane" id="tab5">
                <div class="row gy-4">
                  <div class="col-lg-8 details order-2 order-lg-1">
                    <h3>Est eveniet ipsam sindera pad rone matrelat sando reda</h3>
                    <p class="fst-italic">Omnis blanditiis saepe eos autem qui sunt debitis porro quia.</p>
                    <p>Exercitationem nostrum omnis. Ut reiciendis repudiandae minus. Omnis recusandae ut non quam ut quod eius qui. Ipsum quia odit vero atque qui quibusdam amet. Occaecati sed est sint aut vitae molestiae voluptate vel</p>
                  </div>
                  <div class="col-lg-4 text-center order-1 order-lg-2">
                    <img src="{{asset('1.jpg')}}" alt="" class="img-fluid">
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>
    </section><!-- End Departments Section --> --}}

      	<!-- Start Gallery -->
	<div id="gallery" class="gallery-box">
		<div class="container-fluid">
			<div class="row">
				<div class="col-lg-12">
					<div class="title-box">
						<h2>Galerie de photos</h2>
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. </p>
					</div>
				</div>
			</div>
			
			<div class="popup-gallery row clearfix">
				<div class="col-md-3 col-sm-6">
					<div class="box-gallery">
						<img src="{{asset('1.jpg')}}" alt="">
						<div class="box-content">	
					
							<ul class="icon">
                <li><a href="{{asset('1.jpg')}}"><i class="fa fa-picture-o" aria-hidden="true"></i></a></li>						
							</ul>
						</div>
					</div>
				</div>
				<div class="col-md-3 col-sm-6">
					<div class="box-gallery">
						<img src="{{asset('4.jpg')}}" alt="">
						<div class="box-content">
						
							<ul class="icon">
								<li><a href="{{asset('4.jpg')}}"><i class="fa fa-picture-o" aria-hidden="true"></i></a></li>								
							</ul>
						</div>
					</div>
				</div>
				<div class="col-md-3 col-sm-6">					
					<div class="box-gallery">
						<img src="{{asset('2.jpg')}}" alt="">
						<div class="box-content">							
							<ul class="icon">
								<li><a href="{{asset('2.jpg')}}"><i class="fa fa-picture-o" aria-hidden="true"></i></a></li>								
							</ul>
						</div>
					</div>
				</div>
				<div class="col-md-3 col-sm-6">
					<div class="box-gallery">
						<img src="{{asset('4.jpg')}}" alt="">
						<div class="box-content">	
							
							<ul class="icon">
								<li><a href="{{asset('4.jpg')}}"><i class="fa fa-picture-o" aria-hidden="true"></i></a></li>								
							</ul>
						</div>
					</div>
				</div>
				<div class="col-md-3 col-sm-6">
					<div class="box-gallery">
						<img src="{{asset('1.jpg')}}" alt="">
						<div class="box-content">	
		
							<ul class="icon">
                <li><a href="{{asset('1.jpg')}}"><i class="fa fa-picture-o" aria-hidden="true"></i></a></li>									
							</ul>
						</div>
					</div>
				</div>
				<div class="col-md-3 col-sm-6">
					<div class="box-gallery">
						<img src="{{asset('4.jpg')}}" alt="">
						<div class="box-content">
					
							<ul class="icon">
								<li><a href="{{asset('4.jpg')}}"><i class="fa fa-picture-o" aria-hidden="true"></i></a></li>								
							</ul>
						</div>
					</div>
				</div>
				<div class="col-md-3 col-sm-6">					
					<div class="box-gallery">
						<img src="{{asset('2.jpg')}}" alt="">
						<div class="box-content">							
							<ul class="icon">
								<li><a href="{{asset('2.jpg')}}"><i class="fa fa-picture-o" aria-hidden="true"></i></a></li>								
							</ul>
						</div>
					</div>
				</div>
				<div class="col-md-3 col-sm-6">
					<div class="box-gallery">
						<img src="{{asset('4.jpg')}}" alt="">
						<div class="box-content">	
					
							<ul class="icon">
								<li><a href="{{asset('4.jpg')}}"><i class="fa fa-picture-o" aria-hidden="true"></i></a></li>								
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- End Gallery -->

	<!-- Start Team -->
	<div id="team" class="team-box">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="title-box">
						<h2>Nos Docteurs</h2>
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. </p>
					</div>
				</div>
			</div>

      
			
			<div class="row">
                <div class="col-md-4 col-sm-6">
                    <div class="our-team">
                        <div class="pic">
                            <img src="{{asset('adn.jpg')}}" alt="">
                        </div>
                        <div class="team-content">
                            <h3 class="title">Sara IBNABBAD</h3>
                            <span class="post">web developer</span>
                            <ul class="social">
                                <li><a href="#"><i class="fa-brands fa-facebook" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fa-brands fa-instagram" aria-hidden="true"></i></i></a></li>
                                <li><a href="#"><i class="fa-brands fa-linkedin" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fa-brands fa-github" aria-hidden="true"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 col-sm-6">
                    <div class="our-team">
                        <div class="pic">
                            <img src="{{asset('adn.jpg')}}" alt="">
                        </div>
                        <div class="team-content">
                            <h3 class="title">Fennir Adnane</h3>
                            <span class="post">Web Designer</span>
                            <ul class="social">
                              <li><a href="#"><i class="fa-brands fa-facebook" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fa-brands fa-instagram" aria-hidden="true"></i></i></a></li>
                                <li><a href="#"><i class="fa-brands fa-linkedin" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fa-brands fa-github" aria-hidden="true"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 col-sm-6">
                    <div class="our-team">
                        <div class="pic">
                            <img src="{{asset('adn.jpg')}}" alt="">
                        </div>
                        <div class="team-content">
                            <h3 class="title">Hypolite EZIAN</h3>
                            <span class="post">web developer</span>
                            <ul class="social">
                              <li><a href="#"><i class="fa-brands fa-facebook" aria-hidden="true"></i></a></li>
                              <li><a href="#"><i class="fa-brands fa-instagram" aria-hidden="true"></i></i></a></li>
                              <li><a href="#"><i class="fa-brands fa-linkedin" aria-hidden="true"></i></a></li>
                              <li><a href="#"><i class="fa-brands fa-github" aria-hidden="true"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
			
		</div>
	</div>
	
	<!-- End Team -->
	

  
    </body>
</html>
