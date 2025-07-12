  @extends('Frontend.Master')

  @section('content')
      <section class="projects-section padding">
          <section class="page-header padding">
              <div class="container">
                  <div class="page-content text-center">
                      <h2>Specialized projects</h2>
                      <p>Construction & Building Html Template.</p>
                  </div>
              </div>
          </section>
          <section class="projects-section padding">
              <div class="container">
                  <div class="row">
                      @foreach ($projects as $project)
                          <div class="col-lg-4 col-sm-6 padding-15">
                              <div class="project-item">
                                  @if ($project->image)
                                      <img src="{{ asset('storage/' . $project->image) }}" class="img-thumbnail mt-2"
                                          width="100">
                                  @endif
                                  <div class="overlay"></div>
                                  <a href="#" class="view-icon ajax-popup-link"> <i class="fas fa-expand"></i></a>
                                  <div class="projects-content">
                                      <a href="#" class="category">{{ $project->title }}</a>
                                      <h3><a href="#" class="tittle">{{ $project->description }}</a></h3>
                                  </div>
                              </div>
                          </div>
                      @endforeach
                  </div>
              </div>
          </section>
          <div class="sponsor-section bg-grey">
              <div class="dots"></div>
              <div class="container">
                  <div id="sponsor-carousel" class="sponsor-carousel owl-carousel">
                      <div class="sponsor-item">
                          <img src="img/sponsor1.png" alt="sponsor">
                      </div>
                      <div class="sponsor-item">
                          <img src="img/sponsor2.png" alt="sponsor">
                      </div>
                      <div class="sponsor-item">
                          <img src="img/sponsor3.png" alt="sponsor">
                      </div>
                      <div class="sponsor-item">
                          <img src="img/sponsor4.png" alt="sponsor">
                      </div>
                      <div class="sponsor-item">
                          <img src="img/sponsor5.png" alt="sponsor">
                      </div>
                      <div class="sponsor-item">
                          <img src="img/sponsor6.png" alt="sponsor">
                      </div>
                      <div class="sponsor-item">
                          <img src="img/sponsor7.png" alt="sponsor">
                      </div>
                      <div class="sponsor-item">
                          <img src="img/sponsor8.png" alt="sponsor">
                      </div>
                  </div>
              </div>
          </div>
      @endsection
