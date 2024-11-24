<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('styles/style.css')}}" />
    <link
      href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;700&display=swap"
      rel="stylesheet"
    />
    <title>Tugas 8</title>
</head>
<body>
    <div>
        <nav class="navbar">
          <div class="navbar-menu">
            <a href="https://iz-one.fandom.com/wiki/IZ*ONE" target="_blank"><img
              src="image/IZONE_logo.webp"
              alt="IZONE Logo"
              width="100px"
              style="padding-left: 50px"
            /></a>
            <ul class="menu-list">
              <li><a href="{{url('/')}}">Home</a></li>
              <li><a href="{{url('/about')}}">About</a></li>
              <li><a href="{{url('/contact')}}">Contact</a></li>
            </ul>
          </div>
        </nav>
    </div>

    @yield('section')

</body>
</html>