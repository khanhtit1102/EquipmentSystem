@extends('master')

@section('css')
<style>
    .dataTables_filter input {
        border: 1px solid #dee2e6;
        font-weight: 400;
        font-size: 0.875rem;
        border-radius: 4px;
        height: 2rem;
        margin-left: 10px;
    }
</style>
@endsection

@section('main')
<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Equipment Table</h4>
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Label Code</th>
                                <th>Name</th>
                                <th>Location</th>
                                <th>Floor</th>
                                <th>Factory</th>
                                <th>Option</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($equipments as $key => $equipment)
                            <tr>
                                <td class="text-success fw-bold">{{$equipment->Label_Code}}</td>
                                <td>{{$equipment->Name}}</td>
                                <td>{{$equipment->Location}}</td>
                                <td>{{$equipment->Floor->floor_name}}</td>
                                <td>{{$equipment->Factory->factory_name}}</td>
                                <td>
                                    <a href="{{route('equipment.edit', $equipment->id)}}">
                                        <button type="button" class="btn btn-outline-info btn-rounded btn-icon btn-sm">
                                            <i class="mdi mdi-grease-pencil text-info"></i>
                                        </button>
                                    </a>
                                    <form action="{{route('equipment.destroy', $equipment->id)}}" method="POST">
                                        {{ method_field('delete') }}
                                        {{ csrf_field() }}
                                        <button type="submit" class="btn btn-outline-danger btn-rounded btn-icon btn-sm" onclick="return confirm(' Are you sure to delete them?');">
                                            <i class="mdi mdi-delete text-danger"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
<script src="//cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready(function() {
        $('.table').DataTable({
            "ordering": false,
            "info": false,
            "paging": false,
        });
    });
</script>
@endsection