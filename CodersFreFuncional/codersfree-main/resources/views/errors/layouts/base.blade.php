
  <!-- partial:index.partial.html -->
  <div class="container">
    <div class="row">
      <div class="xs-12 md-6 mx-auto">
        <div id="countUp">
          <div class="number" data-count="@yield('http-request')">0</div>
          <div class="text">@yield('title')</div>
          <div class="text">@yield('message')</div>
          <div class="text">@yield('detail')</div>
        </div>
      </div>
    </div>
  </div>
  <!-- partial -->
  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>
  <script src="{{ asset('/js/in-view@0.6.1.js') }}"></script>
  <script src="{{ asset('/js/script.js') }}"></script>
