<x-app-web-layout>
    <div class="container">
        <div class="row">
            <div class="col-md-8 mt-5">
                @if (session('status'))
                <div class="alert alert-success">{{ session('status')}}</div>
                @endif
                <div class="card">
                    <div class="card-header">
                        <h4>Import excel data</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ url('customer/import') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="input-group">
                                <input type="file" name="import_file" class="form-control" />
                                <button type="submit" class="btn btn-primary">import</button>
                            </div>
                        </form>

                        <hr>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($customers as $customer)
                                <tr>
                                    <td>{{ $customer->id }}</td>
                                    <td>{{ $customer->name }}</td>
                                    <td>{{ $customer->email }}</td>
                                    <td>{{ $customer->phone }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-web-layout>