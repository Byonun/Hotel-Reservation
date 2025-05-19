<!DOCTYPE html>

<head>
    @include('admin.css')
    <style>
        th {
            color: rgb(255, 255, 255);
        }

        .description-container {
            position: relative;
        }

        .description-summary {
            display: block;
        }

        .description-text {
            display: none;
            /* Sembunyikan teks lengkap secara default */
        }

        .read-more {
            display: block;
            color: rgb(205, 205, 216);
            cursor: pointer;
            text-decoration: underline;
        }

        .read-more.active {
            color: red;
        }
    </style>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var readMoreLinks = document.querySelectorAll('.read-more');

            readMoreLinks.forEach(function (link) {
                link.addEventListener('click', function (e) {
                    e.preventDefault();
                    var container = this.parentElement;
                    var text = container.querySelector('.description-text');
                    var summary = container.querySelector('.description-summary');

                    if (text.style.display === 'none') {
                        text.style.display = 'block';
                        summary.style.display = 'none';
                        this.textContent = 'Read Less';
                    } else {
                        text.style.display = 'none';
                        summary.style.display = 'block';
                        this.textContent = 'Read More';
                    }
                });
            });
        });
    </script>
</head>

<body>
    @include('admin.header')
    @include('admin.sidebar')
    <div class="page-content">
        <div class="page-header">
            <div class="container-fluid">
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                <a class="btn btn-success" href={{ url('add_room') }}>+ Add Rooms</a>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Room Name</th>
                            <th scope="col">Description</th>
                            <th scope="col">Price</th>
                            <th scope="col">Free Wifi</th>
                            <th scope="col">Room Type</th>
                            <th scope="col">Images</th>
                            <th scope="col">Update</th>
                            <th scope="col">Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $data)
                            <tr>
                                <td>{{ $data->room_name }}</td>
                                <td>
                                    <div class="description-container">
                                        <p class="description-text">{{ $data->description }}</p>
                                        <p class="description-summary">{{ Str::limit($data->description, 25) }}</p>
                                        <a href="#" class="read-more">Read More</a>
                                    </div>
                                </td>
                                <td>{{ $data->price }}</td>
                                <td>{{ $data->free_wifi }}</td>
                                <td>{{ $data->room_type }}</td>
                                <td>
                                    <img width="75" src="room/{{ $data->image }}" alt="">
                                </td>
                                <td>
                                    <a class="btn btn-outline-warning" href="{{ url('room_update', $data->id) }}">Update</a>
                                </td>
                                <td>
                                    <a onclick="return confirm('Do you want to delete the room?')"
                                        class="btn btn-outline-danger" href="{{ url('room_delete', $data->id) }}">Delete</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @include('admin.footer')
</body>

</html>