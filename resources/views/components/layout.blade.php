<!DOCTYPE html>
<html>
    <head>
       <title>Fun With HTMX - {{ $title ?? "" }}</title>
       <script src="https://unpkg.com/htmx.org@1.9.2"></script>
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