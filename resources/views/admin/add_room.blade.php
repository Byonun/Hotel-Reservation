
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
                        <div class="title"><strong>Add Rooms</strong></div>
                        <div class="block-body">
                            @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success')}}
                            </div>
                            @endif
                            <form action="{{ url('add_room') }}" method="Post" enctype="multipart/form-data"
                                class="form-horizontal">
                                @csrf
                                <div class="form-group row">
                                    <label class="col-sm-3 form-control-label">Room Name</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="room" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 form-control-label">Description</label>
                                    <div class="col-sm-9">
                                        <textarea class="form-control" name="desc" id="exampleFormControlTextarea1" rows="3"></textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 form-control-label">Price</label>
                                    <div class="col-sm-9">
                                        <input type="number" name="price" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 form-control-label">Type Room</label>
                                    <div class="col-sm-9">
                                        <select name="type" class="form-control mb-3 mb-3">
                                            <option value="Reguler">Reguler</option>
                                            <option value="Premium">Premium</option>
                                            <option value="Delux">Delux</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 form-control-label">Free Wifi</label>
                                    <div class="col-sm-9">
                                        <select name="wifi" class="form-control mb-3 mb-3">
                                            <option value="yes">Yes</option>
                                            <option value="no">No</option>
                                        </select>
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
                                        <button type="submit" value="" class="btn btn-primary">Add Room</button>
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
