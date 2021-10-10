<!doctype html>
<html lang="en">
    <head>
        @include('backend.components.meta')
        @include('backend.components.css')
    </head>
    <body>
        <!-- Loading starts -->
        <!-- <div id="loading-wrapper">
        <div class="spinner-border" role="status">
        <span class="sr-only">Loading...</span>
      </div>
      </div> -->
        <div class="page-wrapper">
            @include('backend.components.leftbar')
            <div class="page-content">
                @include('backend.components.topbar')
                @yield('content')
            </div>
        </div>
        @include('backend.components.js')
    </body>
</html>
