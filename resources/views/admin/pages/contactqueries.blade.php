@extends('admin.layouts.app')

@section('admincontent')
    <div class="container-scroller">
        @include('admin.components.sidebar')
        <div class="container-fluid page-body-wrapper">
            @include('admin.components.navbar')
            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="col-lg-12 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Contact Queries</h4>
                                <p class="card-description"> Advisator Enquiries<code>.table-striped</code></p>
                                <div class="row mb-4">
                                    <div class="col-md-6 d-flex align-items-center">
                                        <form action="{{ url()->current() }}" method="GET"
                                            class="w-100 d-flex align-items-center">
                                            <label for="entries" class="mr-2 mb-0">Show</label>
                                            <select name="entries" id="entries" class="form-control mr-2 w-auto"
                                                onchange="this.form.submit()">
                                                <option value="10" {{ request('entries', 10) == 10 ? 'selected' : '' }}>
                                                    10</option>
                                                <option value="25" {{ request('entries') == 25 ? 'selected' : '' }}>25
                                                </option>
                                                <option value="50" {{ request('entries') == 50 ? 'selected' : '' }}>50
                                                </option>
                                                <option value="100" {{ request('entries') == 100 ? 'selected' : '' }}>
                                                    100</option>
                                            </select>
                                            <span>entries</span>
                                        </form>
                                    </div>
                                    <div class="col-md-6 text-right">
                                        <form action="{{ url()->current() }}" method="GET"
                                            class="w-100 d-flex justify-content-end align-items-center">
                                            <input type="text" class="form-control mr-2" name="search"
                                                placeholder="Search Queries" value="{{ $search }}">
                                            <button class="btn btn-primary" type="submit"><i
                                                    class="fa fa-search"></i></button>
                                        </form>
                                    </div>
                                </div>

                                <div class="table-responsive">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th> Submission Date </th>
                                                <th> Name </th>
                                                <th> Email </th>
                                                <th> Message </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($contacts as $contact)
                                                <tr>
                                                    <td>{{ \Carbon\Carbon::parse($contact->created_at)->isoFormat('Do MMMM YYYY') }}
                                                    </td>
                                                    <td>{{ $contact->name }}</td>
                                                    <td>{{ $contact->email }}</td>
                                                    <td>{{ $contact->message }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>

                                <div class="row mt-4">
                                    <div class="col-md-6">
                                        <p class="mb-0">Showing {{ $contacts->firstItem() }} to
                                            {{ $contacts->lastItem() }} of {{ $contacts->total() }} entries</p>
                                    </div>
                                    <div class="col-md-6 text-right">
                                        {{ $contacts->appends(request()->input())->links('pagination::bootstrap-4') }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @include('admin.components.footer')
            </div>
        </div>
    </div>
@endsection
