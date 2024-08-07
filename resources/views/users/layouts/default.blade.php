<!DOCTYPE html>
<html lang="en">
  
<!-- Mirrored from daovietanh79.github.io/VanhStore/ by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 19 Jul 2024 17:51:10 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!--=============== FLATICON ===============-->
    <link rel='stylesheet' href='../../cdn-uicons.flaticon.com/uicons-regular-straight/css/uicons-regular-straight.css'>
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-regular-straight/css/uicons-regular-straight.css'>

    <!--=============== SWIPER CSS ===============-->
    <link rel="stylesheet" href="../../cdn.jsdelivr.net/npm/swiper%409/swiper-bundle.min.css"/>

    <!--=============== CSS ===============-->
    <link rel="stylesheet" href="{{ asset('assets/css/styles.css') }}" />

    <title>Nguyễn Quang Anh PH36538</title>
  </head>
  <body>
    <!--=============== HEADER ===============-->
    @include('users.layouts.header')

    <!--=============== MAIN ===============-->
    <main class="main">
      <!--=============== HOME ===============-->

      <!--=============== PRODUCTS ===============-->
      
      @yield("content")




    </main>

    <!--=============== FOOTER ===============-->
    @include('users.layouts.footer')

    <!--=============== SWIPER JS ===============-->
    <script src="../../cdn.jsdelivr.net/npm/swiper%409/swiper-bundle.min.js"></script>

    <!--=============== MAIN JS ===============-->
    <script src="{{ asset('assets/js/main.js') }}"></script>
    <script>
      document.querySelectorAll('.btn-remove').forEach(button => {
          button.addEventListener('click', function(event) {
              event.preventDefault();
              let itemId = this.getAttribute('data-item-id');

              fetch(`/cart/remove/${itemId}`, {
                  method: 'POST',
                  headers: {
                      'Content-Type': 'application/json',
                      'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                  },
              }).then(response => {
                  if (response.ok) {
                      window.location.reload();
                  }
              });
          });
      });

      document.querySelectorAll('.cart-item-quantity').forEach(input => {
          input.addEventListener('change', function() {
              let itemId = this.getAttribute('data-item-id');
              let quantity = this.value;

              fetch(`/cart/update/${itemId}`, {
                  method: 'POST',
                  headers: {
                      'Content-Type': 'application/json',
                      'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                  },
                  body: JSON.stringify({ quantity: quantity })
              }).then(response => {
                  if (response.ok) {
                      window.location.reload();
                  }
              });
          });
      });
  </script>
  </body>

<!-- Mirrored from daovietanh79.github.io/VanhStore/ by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 19 Jul 2024 17:51:31 GMT -->
</html>
