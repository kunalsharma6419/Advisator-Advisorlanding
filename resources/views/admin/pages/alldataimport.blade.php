@extends('admin.layouts.app')

@section('admincontent')
    <div class="container-scroller">
        <!-- partial:partials/_sidebar.html -->
        @include('admin.components.sidebar')
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <!-- partial:partials/_navbar.html -->
            @include('admin.components.navbar')
            <!-- partial -->
            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="col-12 grid-margin">
                        <div class="card">
                            @if (session('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                            @endif

                            <div class="card-body">
                                <h1 align="center">Nomination Data Import</h1>
                                {{-- <h4 class="card-title">Horizontal Two column</h4> --}}
                                <h4 class="card-title" style="margin-top: 30px;">Nomination Data Import</h4>
                                <form class="form-sample" action="{{ route('advisatoradmin.importdata') }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <label class="col-sm-5 col-form-label">Upload Nomination Data Sheet(supported format
                                        .csv, .xlxs)</label>
                                    <input type="file" name="data_file" class="file-upload-default">
                                    <button type="submit" class="btn btn-md btn-primary me-2">Import Data</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- partial:partials/_footer.html -->
                @include('admin.components.footer')
                <!-- partial -->
            </div>
            <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
@endsection
