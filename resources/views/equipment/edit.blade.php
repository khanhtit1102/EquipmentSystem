@extends('master')

@section('css')

@endsection

@section('main')
<div class="row">
    <div class="col-12 grid-margin">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Horizontal Two column</h4>
                <form class="form" action="{{route('equipment.update', $Equipment->id)}}" method="POST">
                    {{ method_field('PUT') }}
                    {{ csrf_field() }}
                    <p class="card-description">
                        Personal info
                    </p>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Equip Number</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" value="{{$Equipment->Equip_Number}}">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Label Code</label>
                                <div class="col-sm-9">
                                    <input name="Label_Code" type="text" class="form-control" value="{{$Equipment->Label_Code}}" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Name</label>
                                <div class="col-sm-9">
                                    <input name="Name" type="text" class="form-control" value="{{$Equipment->Name}}" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Location</label>
                                <div class="col-sm-9">
                                    <input name="Location" type="text" class="form-control" value="{{$Equipment->Location}}">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Floor</label>
                                <div class="col-sm-9">
                                    <select name="Floor" class="form-control">
                                        @foreach($Floors as $key => $Floor)
                                        <option value="{{$Floor->id}}" @if( $Floor->id == $Equipment->id_floor ) selected @endif>{{$Floor->floor_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Factory</label>
                                <div class="col-sm-9">
                                    <select name="Factory" class="form-control">
                                        @foreach($Factories as $key => $Factory)
                                        <option value="{{$Factory->id}}" @if($Factory->id == $Equipment->id_factory) selected @endif>{{$Factory->factory_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Description</label>
                                <div class="col-sm-9">
                                    <input name="Description" type="text" class="form-control" value="{{$Equipment->Description}}">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Storage Location</label>
                                <div class="col-sm-9">
                                    <input name="Storage_Location" type="text" class="form-control" value="{{$Equipment->Storage_Location}}">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Declaration Number</label>
                                <div class="col-sm-9">
                                    <input name="Declaration_Number" type="text" class="form-control" value="{{$Equipment->Declaration_Number}}">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <button type="submit" class="btn btn-primary mb-2">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')

@endsection