<!DOCTYPE html>
<html>
    <head>
       <title>Fun With HTMX - {{ $title ?? "" }}</title>
       <script src="https://unpkg.com/htmx.org@1.9.2"></script>
       <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
         integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY="
         crossorigin=""/>
       <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
         integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo="
         crossorigin=""></script> 
    </head>
    <body>
       {{ $slot }}
       
       <script>
         document.body.addEventListener('htmx:configRequest', (event) => {
            event.detail.headers['X-CSRF-Token'] = '{{ csrf_token() }}';
         })
      </script>
    </body>
</html>