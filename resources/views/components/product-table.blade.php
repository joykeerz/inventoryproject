<div>
    <div class="table-responsive">
        <table id="zero_config" class="table table-striped table-bordered no-wrap">
            <thead>
                <tr>
                    <th>id</th>
                    <th>type</th>
                    <th>Product Number</th>
                    <th>Serial</th>
                    <th>Location</th>
                    <th>Status</th>
                    <th>Date</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $item)
                <tr>
                    <td>{{$item->id}}</td>
                    <td>{{$item->typename}}</td>
                    <td>{{$item->productNumber}}</td>
                    <td>{{$item->serialNumber}}</td>
                    <td>{{$item->location}}</td>
                    <td>{{$item->status}}</td>
                    <td>{{$item->created-at}}</td>
                </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <th>id</th>
                    <th>type</th>
                    <th>Product Number</th>
                    <th>Serial</th>
                    <th>Location</th>
                    <th>Status</th>
                    <th>Date</th>
                </tr>
            </tfoot>
        </table>
    </div>
</div>
