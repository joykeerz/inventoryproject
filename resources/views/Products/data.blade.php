@extends('layouts.dashboard')

@section('title')
Admin Dashboard | Products
@endsection

@section('user')
{{ Auth::user()->name }}
@endsection

@section('customcss')
<link href="{{ asset('/dist/assets/extra-libs/datatables.net-bs4/css/dataTables.bootstrap4.css')}}" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="{{ asset('/dist/assets/extra-libs/prism/prism.css')}}">
@endsection

@section('content')
@if (session()->has('success'))
    <div class="alert alert-success alert-dismissible bg-success text-white border-0 fade show"
        role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        <strong>Success - </strong> {{ session()->get('success') }}
    </div>
@endif

<div class="card col-md-3 bg-dark text-white">



        @if ($type == '3')
            <a href="{{ route('AddBanking') }}">
        @endif

        @if ($type == '4')
            <a href="{{ route('AddElectronic') }}">
        @endif

    <div class="card-body">
        <div class="d-flex d-lg-flex d-md-block align-items-center">
            <div>
                <h4 class="mt-lg-2 mt-2 font-weight-medium text-white">Add Product</h4>
            </div>
            <div class="ml-auto mt-md-3 mt-lg-0">
                    <span class="opacity-7 text-muted"><i data-feather="plus" class="feather-icon"></i></span>
                </div>
            </div>
        </div>
    </a>
</div>

<div class="card text-dark bg-white">
    <div class="card-header">
        <h4 class="mb-0 text-dark">{{$type == 3 ? 'Banking Data' : 'Electronic Data'}}</h4>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table id="zero_config" class="table table-striped table-bordered no-wrap">
                <thead>
                    <tr>
                        <th>id</th>
                        <th>Category</th>
                        <th>P.Number</th>
                        <th>Serial</th>
                        <th>Location</th>
                        <th>Status</th>
                        <th>Date</th>
                        <th>Option</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $item)
                    <tr>
                        <td>{{$item->id}}</td>
                        <td>{{$item->Categoryname}}</td>
                        <td>{{$item->productNumber}}</td>
                        <td>{{$item->serialNumber}}</td>
                        <td>{{$item->location}}</td>
                        <td>{{$item->status}}</td>
                        <td>{{$item->created_at}}</td>
                        <td class="d-flex flex-row">
                            <a href="
                            @if ($type == '3')
                            {{ route('EditBanking', ['id'=>$item->id]) }}
                            @endif
                            "class="mr-2">
                                <span class="btn btn-cyan btn-circle icon-pencil"></span>
                            </a>
                            <form action="
                            @if ($type == '3')
                            {{ route('DeleteBanking', ['id'=>$item->id]) }}
                            @else
                            {{ route('DeleteElectronic', ['id'=>$item->id]) }}
                            @endif
                            " method="POST">
                                <input type="submit" name="submit" value="" class="btn btn-danger btn-circle">
                            @csrf
                                <input type="hidden" name="_method" value="DELETE">
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th>id</th>
                        <th>Category</th>
                        <th>P.Number</th>
                        <th>Serial</th>
                        <th>Location</th>
                        <th>Status</th>
                        <th>Date</th>
                        <th>Date</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>
@endsection

@section('plugins')
    <script src="{{ asset('/dist/assets/libs/jquery/dist/jquery.min.js')}}"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="{{ asset('/dist/assets/libs/popper.js/dist/umd/popper.min.js')}}"></script>
    <script src="{{ asset('/dist/assets/libs/bootstrap/dist/js/bootstrap.min.js')}}"></script>
    <!-- apps -->
    <!-- apps -->
    <script src="{{ asset('/dist/dist/js/app-style-switcher.js')}}"></script>
    <script src="{{ asset('/dist/dist/js/feather.min.js')}}"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="{{ asset('/dist/assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js')}}"></script>
    <script src="{{ asset('/dist/assets/extra-libs/sparkline/sparkline.js')}}"></script>
    <!--Wave Effects -->
    <!-- themejs -->
    <!--Menu sidebar -->
    <script src="{{ asset('/dist/dist/js/sidebarmenu.js')}}"></script>
    <!--Custom JavaScript -->
    <script src="{{ asset('/dist/dist/js/custom.min.js')}}"></script>
    <!--This page plugins -->
    <script src="{{ asset('/dist/assets/extra-libs/datatables.net/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{ asset('/dist/dist/js/pages/datatable/datatable-basic.init.js')}}"></script>
    <script src="{{ asset('/dist/assets/extra-libs/prism/prism.js')}}"></script>
@endsection
