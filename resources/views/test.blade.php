<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="{{ asset('js/test/test.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('css/test.css') }}">
</head>
<body>
    <div class="container">
        <!-- main images -->
        <div class="holder">
          <div class="slides">
            <img src="https://images.unsplash.com/photo-1505438157249-00e1b44ee34f?ixlib=rb-0.3.5&q=85&fm=jpg&crop=entropy&cs=srgb&ixid=eyJhcHBfaWQiOjE0NTg5fQ&s=dfc554074f522ec42818a052152dac21g" alt="" />
          </div>
      
          <div class="slides">
            <img src="https://images.unsplash.com/photo-1515870672913-a4c298575776?ixlib=rb-0.3.5&q=85&fm=jpg&crop=entropy&cs=srgb&ixid=eyJhcHBfaWQiOjE0NTg5fQ&s=aa80486fd3343134706e785c034b339d">
          </div>
      
          <div class="slides">
            <img src="https://images.unsplash.com/photo-1521651201144-634f700b36ef?ixlib=rb-0.3.5&q=85&fm=jpg&crop=entropy&cs=srgb&ixid=eyJhcHBfaWQiOjE0NTg5fQ&s=e26ec8c74dc99aff53a60741538cad5f">
          </div>
            
          <div class="slides">
            <img src="https://images.unsplash.com/photo-1504618223053-559bdef9dd5a?ixlib=rb-0.3.5&q=85&fm=jpg&crop=entropy&cs=srgb&ixid=eyJhcHBfaWQiOjE0NTg5fQ&s=583c2bf56c8006e507e2a9905fc1e54c">
          </div>
      
          <div class="slides">
            <img src="https://images.unsplash.com/photo-1504208434309-cb69f4fe52b0?ixlib=rb-0.3.5&q=85&fm=jpg&crop=entropy&cs=srgb&ixid=eyJhcHBfaWQiOjE0NTg5fQ&s=69093505f999d8170e9a1aab3771c07e">
          </div>
            
          <div class="slides">
            <img src="https://images.unsplash.com/photo-1485199433301-8b7102e86995?ixlib=rb-0.3.5&q=85&fm=jpg&crop=entropy&cs=srgb&ixid=eyJhcHBfaWQiOjE0NTg5fQ&s=c7783fe3a697b1a2248450120435cbc3">
          </div>
        </div>
      
        <div class="prevContainer"><a class="prev" onclick="plusSlides(-1)">
          <svg viewBox="0 0 24 24">
          <path d="M20,11V13H8L13.5,18.5L12.08,19.92L4.16,12L12.08,4.08L13.5,5.5L8,11H20Z"></path>
          </svg>
          </a>
        </div>
        <div class="nextContainer"><a class="next" onclick="plusSlides(1)">
          <svg viewBox="0 0 24 24">
          <path d="M4,11V13H16L10.5,18.5L11.92,19.92L19.84,12L11.92,4.08L10.5,5.5L16,11H4Z"></path>
          </svg>
          </a>
        </div>
      
        {{-- <div class="caption-container">
          <p id="caption"></p>
        </div> --}}
      
        <!-- thumnails in a row -->
        <div class="row">
          <div class="column">
            <img class="slide-thumbnail" src="https://images.unsplash.com/photo-1505438157249-00e1b44ee34f?ixlib=rb-0.3.5&q=85&fm=jpg&crop=entropy&cs=srgb&ixid=eyJhcHBfaWQiOjE0NTg5fQ&s=dfc554074f522ec42818a052152dac21g" onclick="currentSlide(1)" >
          </div>
          <div class="column">
            <img class="slide-thumbnail" src="https://images.unsplash.com/photo-1515870672913-a4c298575776?ixlib=rb-0.3.5&q=85&fm=jpg&crop=entropy&cs=srgb&ixid=eyJhcHBfaWQiOjE0NTg5fQ&s=aa80486fd3343134706e785c034b339d" onclick="currentSlide(2)" >
          </div>
          <div class="column">
            <img class="slide-thumbnail" src="https://images.unsplash.com/photo-1521651201144-634f700b36ef?ixlib=rb-0.3.5&q=85&fm=jpg&crop=entropy&cs=srgb&ixid=eyJhcHBfaWQiOjE0NTg5fQ&s=e26ec8c74dc99aff53a60741538cad5f" onclick="currentSlide(3)">
          </div>
          <div class="column">
            <img class="slide-thumbnail" src="https://images.unsplash.com/photo-1504618223053-559bdef9dd5a?ixlib=rb-0.3.5&q=85&fm=jpg&crop=entropy&cs=srgb&ixid=eyJhcHBfaWQiOjE0NTg5fQ&s=583c2bf56c8006e507e2a9905fc1e54c" onclick="currentSlide(4)">
          </div>
          <div class="column">
            <img class="slide-thumbnail" src="https://images.unsplash.com/photo-1504208434309-cb69f4fe52b0?ixlib=rb-0.3.5&q=85&fm=jpg&crop=entropy&cs=srgb&ixid=eyJhcHBfaWQiOjE0NTg5fQ&s=69093505f999d8170e9a1aab3771c07e" onclick="currentSlide(5)">
          </div>    
          <div class="column">
            <img class="slide-thumbnail" src="https://images.unsplash.com/photo-1485199433301-8b7102e86995?ixlib=rb-0.3.5&q=85&fm=jpg&crop=entropy&cs=srgb&ixid=eyJhcHBfaWQiOjE0NTg5fQ&s=c7783fe3a697b1a2248450120435cbc3" onclick="currentSlide(6)">
          </div>
        </div>
      </div>
</body>
</html>