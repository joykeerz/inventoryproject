@extends('layouts.dashboard')

@section('title')
Admin Dashboard | Products
@endsection

@section('user')
{{ Auth::user()->name }}
@endsection

@section('customcss')
<link
    href="{{ asset('/dist/assets/extra-libs/datatables.net-bs4/css/dataTables.bootstrap4.css') }}"
    rel="stylesheet">
@endsection

@section('content')
<h4 class="card-title mt-5">Edit Banking Product</h4>
<div class="row">
    <div class="col-sm-12 col-md-6 col-lg-6">
        <div class="card">
            <form action="
            @if ($type == '3')
            {{ route('UpdateBanking',['id'=>$products->id]) }}
            @else
            {{ route('CreateElectronic') }}
            @endif
            " method="post">
                <div class="card-body">
                    <h4 class="card-title">Product Number</h4>
                    <div class="form-group">
                        <input type="hidden" class="form-control" name="product_id" value="{{$products->id}}">
                        <input type="text" class="form-control" name="number" value="{{$products->productNumber}}">
                    </div>

                    <h4 class="card-title">Serial Number</h4>
                    <div class="form-group">
                        <input type="text" class="form-control" name="serial" value="{{$products->serialNumber}}">
                    </div>

                    <h4 class="card-title">Location</h4>
                    <div class="form-group">
                        <input type="text" class="form-control" name="location" value="{{$products->location}}">
                    </div>

                    <h4 class="card-title">Status</h4>
                    <div class="form-group mb-4">
                        <label for="exampleFormControlSelect1">Select Product Satus</label>
                        <select class="form-control" id="exampleFormControlSelect1" name="status">
                            <option disabled>--{{$products->status}}--</option>
                            <option>New</option>
                            <option>Used</option>
                        </select>
                    </div>

                    <h4 class="card-title">Category</h4>
                    <div class="form-group mb-4">
                        <label for="exampleFormControlSelect1">Select Product Category</label>
                        <select class="form-control" id="exampleFormControlSelect1" name="category">
                            <option disabled >--{{$products->status}}--</option>
                            @foreach($value as $item)
                                <option value="{{ $item->id }}" label="">{{ $item->Categoryname }}</option>
                            @endforeach
                        </select>
                    </div>
                    <button class="btn btn-labeled btn-primary float-right mt-3" type="submit">
                        <input type="hidden" name="_method" value="PUT">
                        <span class="btn-label">
                            <i class="fa fa-check"></i>
                        </span>
                        Done
                        @csrf
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('plugins')
<script src="{{ asset('/dist/assets/libs/jquery/dist/jquery.min.js') }}"></script>
<!-- Bootstrap tether Core JavaScript -->
<script src="{{ asset('/dist/assets/libs/popper.js/dist/umd/popper.min.js') }}">
</script>
<script src="{{ asset('/dist/assets/libs/bootstrap/dist/js/bootstrap.min.js') }}">
</script>
<!-- apps -->
<!-- apps -->
<script src="{{ asset('/dist/dist/js/app-style-switcher.js') }}"></script>
<script src="{{ asset('/dist/dist/js/feather.min.js') }}"></script>
<!-- slimscrollbar scrollbar JavaScript -->
<script
    src="{{ asset('/dist/assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js') }}">
</script>
<script src="{{ asset('/dist/assets/extra-libs/sparkline/sparkline.js') }}"></script>
<!--Wave Effects -->
<!-- themejs -->
<!--Menu sidebar -->
<script src="{{ asset('/dist/dist/js/sidebarmenu.js') }}"></script>
<!--Custom JavaScript -->
<script src="{{ asset('/dist/dist/js/custom.min.js') }}"></script>
<!--This page plugins -->
<script
    src="{{ asset('/dist/assets/extra-libs/datatables.net/js/jquery.dataTables.min.js') }}">
</script>
<script src="{{ asset('/dist/dist/js/pages/datatable/datatable-basic.init.js') }}">
</script>
@endsection
