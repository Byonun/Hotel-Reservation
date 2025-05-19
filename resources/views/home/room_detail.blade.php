<!DOCTYPE html>
<html>

<head>
    @include('home.css')
</head>

<!-- body -->

<body class="main-layout">
    @include('home.header')
    <!-- loader -->
    <!-- <div class="loader_bg">
        <div class="loader"><img src="images/loading.gif" alt="#" /></div>
    </div> -->
    <!-- end loader -->
    <div class="our_room">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="titlepage">
                        <h2>Our Room</h2>
                        <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-8">
                    <div id="serv_hover" class="room">
                        <div style="padding:20px" class="room_img">
                            <img style="height: 300px; width: 800px;" src="{{ asset('room/' . $room->image) }}" alt="#" />
                        </div>
                        <div class="bed_room">
                            <h2>{{ $room->room_name }}</h2>
                            <p style="padding: 12px">{{ Str::limit($room->description, 75) }}</p>
                            <h4 style="padding: 12px">Free Wifi : {{ $room->free_wifi }}</h4>
                            <h4 style="padding: 12px">Type Room : {{ $room->room_type }}</h4>
                            <h3 style="padding: 10px">Price : {{ $room->price }}</h3>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <h1 style="font-size: 40px!important;">Room Booking</h1>
                    @if (session()->has('error'))
                    <div class="alert alert-danger">
                        <button type="button" class="close" data-bs-dismiss="alert">x</button>
                        {{ session()->get('error')}}
                    </div>
                    @endif

                    @if (session()->has('message'))
                    <div class="alert alert-success">
                        <button type="button" class="close" data-bs-dismiss="alert">x</button>
                        {{ session()->get('message')}}
                    </div>
                    @endif

                    @auth
                    <form action="{{ url('add_booking', $room->id) }}" method="Post">
                        @csrf
                        <div class="mb-3">
                            <label for="floatingInput">Full Name</label>
                            <input type="text" name="name" class="form-control" id="floatingInput" placeholder="Name" @if(Auth::id()) value="{{ Auth::user()->name }}"@endif readonly>
                        </div>

                        <div class="mb-3">
                            <label for="floatingInput">Email</label>
                            <input type="email" name="email" class="form-control" id="floatingInput" placeholder="name@example.com" @if(Auth::id()) value="{{ Auth::user()->email }}"@endif readonly>
                        </div>

                        <div class="mb-3">
                            <label for="floatingInput">Phone Number</label>
                            <input type="number" name="phone" class="form-control" id="floatingInput" placeholder="Enter phone number" @if(Auth::id()) value="{{ Auth::user()->phone }}"@endif readonly>
                        </div>

                        <div class="mb-3">
                            <label for="floatingInput">Check In</label>
                            <input type="date" name="startDate" class="form-control" id="floatingInput" required>
                        </div>

                        <div class="mb-3">
                            <label for="floatingInput">Check Out</label>
                            <input type="date" name="endDate" class="form-control" id="floatingInput" required>
                        </div>

                        <div style="width: 200px; padding: 20px;">
                            <input type="submit" class="btn btn-primary" value="Room Booking">
                        </div>
                    </form>

                    @else
                    <div class="alert alert-warning">
                        <p>You are not logged in! Please <a href="{{ url('login') }}" style="color: blue; text-decoration: underline;">
                            Login</a> 
                        or <a href="{{ url('register') }}" style="color: blue; text-decoration: underline;">Register</a> 
                        to make a booking.</p>
                    </div>
                    @endauth

                </div>

            </div>
        </div>
    </div>

    <script type="text/javascript">
        $(document).ready(function() {
            var dtToday = new Date();
            var month = dtToday.getMonth() + 1;
            var day = dtToday.getDate();
            var year = dtToday.getFullYear();

            if (month < 10)
                month = '0' + month.toString();
            if (day < 10)
                day = '0' + day.toString();

            var maxDate = year + '-' + month + '-' + day;

            $('#startDate').attr('min', maxDate);
            $('#endDate').attr('min', maxDate);
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>