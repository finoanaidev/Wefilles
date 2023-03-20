@extends('layouts.blank')

@section('content')
    @if(!is_null($entreprises))
    <section id="hero-slider" class="hero-slider">
        <div class="container-md" data-aos="fade-in">
          <div class="row">
            <div class="col-12">
              <div class="swiper sliderFeaturedPosts">
                <div class="swiper-wrapper">
                @foreach ($entreprises as $entreprise)
                    
                  <div class="swiper-slide">
                    <a href="#" class="img-bg d-flex align-items-end" style="background-image: url('{{asset('storage/'.$entreprise->image)}}');">
                      <div class="img-bg-inner">
                        <h2>{{$entreprise->user->name}}</h2>
                        <p>{{$entreprise->apropos}}</p>
                      </div>
                    </a>
                  </div>

                @endforeach
                </div>
              </div>
            </div>
          </div>
        </div>
    </section>
    @endif
@endsection
</body>
</html>
