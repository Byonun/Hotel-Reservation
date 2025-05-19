<!DOCTYPE html>
<html>

<head>
    @include('admin.css')
</head>

<body>
    @include('admin.header')
    @include('admin.sidebar')
    <div class="page-content">
        <div class="page-header">
            <div class="container-fluid">
                <div class="col-lg-12">
                    <div class="block">
                        <div class="title"><strong>Update Rooms</strong></div>
                        <div class="block-body">
                            @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success')}}
                            </div>
                            @endif
                            <form action="{{ url('update_room', $data->id) }}" method="Post" enctype="multipart/form-data"
                                class="form-horizontal">
                                @csrf
                                <div class="form-group row">
                                    <label class="col-sm-3 form-control-label">Room Name</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="room" value="{{ $data->room_name }}" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 form-control-label">Description</label>
                                    <div class="col-sm-9">
                                        <textarea class="form-control" name="desc" id="exampleFormControlTextarea1" rows="3">{{ $data->description }}</textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 form-control-label">Price</label>
                                    <div class="col-sm-9">
                                        <input type="number" name="price" value="{{ $data->price }}" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 form-control-label">Type Room</label>
                                    <div class="col-sm-9">
                                        <select name="type" class="form-control">
                                            <option value="Reguler" {{ $data->type_room == 'Reguler' ? 'selected' : '' }}>Reguler</option>
                                            <option value="Premium" {{ $data->type_room == 'Premium' ? 'selected' : '' }}>Premium</option>
                                            <option value="Delux" {{ $data->type_room == 'Delux' ? 'selected' : '' }}>Delux</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 form-control-label">Free Wifi</label>
                                    <div class="col-sm-9">
                                        <select name="wifi" class="form-control">
                                            <option value="yes" {{ $data->free_wifi == 'yes' ? 'selected' : '' }}>Yes</option>
                                            <option value="no" {{ $data->free_wifi == 'no' ? 'selected' : '' }}>No</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 form-control-label">Previous Image</label>
                                    <div class="col-sm-9">
                                        <img width="100" src="{{ asset('room/' . $data->image) }}" alt="">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 form-control-label">Upload Image</label>
                                    <div class="col-sm-9">
                                        <input type="file" name="image" class="form-control">
                                    </div>
                                </div>
                                <div class="line"></div>
                                <div class="form-group row">
                                    <div class="col-sm-9 ml-auto">
                                        <button type="submit" value="" class="btn btn-primary">Update Room</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @include('admin.footer')
</body>

</html>