@extends('layouts.home.master')

@section('content')
<header class="banner" id="banner">
    <div class="container">
        <h1>Courier Service Company</h1>
        <h2>Now you can safely say goodbyes to the lengthy delivery processes as you welcome timely delivery with zemix. Have a fast delivery and reap the rewards of loyal customers.</h2>
    </div>
</header>
<section class="contact-us">
    <div class="container">
        <h2 class="text-center">Contact Us</h2>
        <div class="row">
            <div class="col-md-5">
                <div class="card">
                    <div class="icon">
                        <i class="fa fa-phone"></i>
                    </div>
                    <a href="tel:+201152053448">+201152053448</a>
                </div>
                <div class="card">
                    <div class="icon">
                        <i class="fa fa-envelope"></i>
                    </div>
                    <a href="mailto:jojomak@gmail.com">support@zemix.org</a>
                </div>
                <div class="card">
                    <div class="icon">
                        <i class="fa fa-map-marker"></i>
                    </div>
                    <a href="javascript:void(0)">Amaadi, Cairo, Egypt</a>
                </div>
            </div>
            <div class="col-md-7">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d110502.60379664459!2d31.328332021262092!3d30.05961855887829!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x14583fa60b21beeb%3A0x79dfb296e8423bba!2z2KfZhNmC2KfZh9ix2KnYjCDZhdit2KfZgdi42Kkg2KfZhNmC2KfZh9ix2KnigKw!5e0!3m2!1sar!2seg!4v1612098477180!5m2!1sar!2seg" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
            </div>
        </div>
    </div>
</section>
<footer>
    <div>
    </div>
    <div class="copyright text-center">
        <span>
            <i class="fa fa-code text-success"></i> with <i class="text-danger fa fa-heart"></i> by <a href="https://www.linkedin.com/in/joseph-makram/" target="_blank">Joseph Makram</a>
        </span>
    </div>  
</footer>
@endsection

@section('js')
<script src="{{ asset('js/particles.min.js') }}"></script>
<script>
particlesJS('banner',
  {
    "particles": {
      "number": {
        "value": 80,
        "density": {
          "enable": true,
          "value_area": 800
        }
      },
      "color": {
        "value": "#ffffff"
      },
      "shape": {
        "type": "circle",
        "stroke": {
          "width": 0,
          "color": "#000000"
        },
        "polygon": {
          "nb_sides": 5
        }
      },
      "opacity": {
        "value": 0.5,
        "random": false,
        "anim": {
          "enable": false,
          "speed": 1,
          "opacity_min": 0.1,
          "sync": false
        }
      },
      "size": {
        "value": 5,
        "random": true,
        "anim": {
          "enable": false,
          "speed": 40,
          "size_min": 0.1,
          "sync": false
        }
      },
      "line_linked": {
        "enable": true,
        "distance": 150,
        "color": "#ffffff",
        "opacity": 0.4,
        "width": 1
      },
      "move": {
        "enable": true,
        "speed": 6,
        "direction": "none",
        "random": false,
        "straight": false,
        "out_mode": "out",
        "attract": {
          "enable": false,
          "rotateX": 600,
          "rotateY": 1200
        }
      }
    },
    "interactivity": {
      "detect_on": "canvas",
      "events": {
        "onhover": {
          "enable": true,
          "mode": "repulse"
        },
        "onclick": {
          "enable": true,
          "mode": "push"
        },
        "resize": true
      },
      "modes": {
        "grab": {
          "distance": 400,
          "line_linked": {
            "opacity": 1
          }
        },
        "bubble": {
          "distance": 400,
          "size": 40,
          "duration": 2,
          "opacity": 8,
          "speed": 3
        },
        "repulse": {
          "distance": 200
        },
        "push": {
          "particles_nb": 4
        },
        "remove": {
          "particles_nb": 2
        }
      }
    },
    "retina_detect": true,
    "config_demo": {
      "hide_card": false,
      "background_color": "#b61924",
      "background_image": "",
      "background_position": "50% 50%",
      "background_repeat": "no-repeat",
      "background_size": "cover"
    }
  }
);
</script>
@endsection