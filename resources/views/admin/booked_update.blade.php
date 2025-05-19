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
                        <div class="title"><strong>Update Booking</strong></div>
                        <div class="block-body">
                            @if (session('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                            @endif
                            <form action="{{ url('update_booked', $data->id) }}" method="POST" enctype="multipart/form-data" class="form-horizontal">
                                @csrf
                                <div class="form-group row">
                                    <label class="col-sm-3 form-control-label">Room ID</label>
                                    <div class="col-sm-9">
                                        <input type="number" name="room" value="{{ $data->id }}" class="form-control" readonly>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 form-control-label">Name</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="name" value="{{ $data->name }}" class="form-control" readonly>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 form-control-label">Email</label>
                                    <div class="col-sm-9">
                                        <input type="email" name="email" value="{{ $data->email }}" class="form-control" readonly>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 form-control-label">Phone</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="phone" value="{{ $data->phone }}" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 form-control-label">Status</label>
                                    <div class="col-sm-9">
                                        <select name="status" class="form-control">
                                            <option value="Approved" {{ $data->status == 'Approved' ? 'selected' : '' }}>Approved</option>
                                            <option value="Waiting" {{ $data->status == 'Waiting' ? 'selected' : '' }}>Waiting</option>
                                            <option value="Rejected" {{ $data->status == 'Rejected' ? 'selected' : '' }}>Rejected</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 form-control-label">Start Date</label>
                                    <div class="col-sm-9">
                                        <input type="date" name="startDate" value="{{ $data->start_date }}" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 form-control-label">End Date</label>
                                    <div class="col-sm-9">
                                        <input type="date" name="endDate" value="{{ $data->end_date }}" class="form-control">
                                    </div>
                                </div>
                                <div class="line"></div>
                                <div class="form-group row">
                                    <div class="col-sm-9 ml-auto">
                                        <button type="submit" value="" class="btn btn-primary">Update Booking</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @include('admin.footer')
    </div>
</body>

</html>