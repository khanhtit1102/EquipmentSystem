@extends('master')

@section('css')
<style>
    .home-tab .chartjs-wrapper.FileTracking {
        height: auto !important;
    }
</style>
@endsection

@section('main')
<div class="row">
    <div class="col-sm-12">
        <div class="home-tab">
            <div class="d-sm-flex align-items-center justify-content-between border-bottom">
                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active ps-0" id="home-tab" data-bs-toggle="tab" href="#overview" role="tab" aria-controls="overview" aria-selected="true">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="profile-tab" data-bs-toggle="tab" href="#audiences" role="tab" aria-selected="false">Audiences</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="contact-tab" data-bs-toggle="tab" href="#demographics" role="tab" aria-selected="false">Demographics</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link border-0" id="more-tab" data-bs-toggle="tab" href="#more" role="tab" aria-selected="false">More</a>
                    </li>
                </ul>
                <div>
                    <div class="btn-wrapper">
                        <a href="#" class="btn btn-otline-dark align-items-center"><i class="icon-share"></i> Share</a>
                        <a href="#" class="btn btn-otline-dark"><i class="icon-printer"></i> Print</a>
                        <a href="#" class="btn btn-primary text-white me-0"><i class="icon-download"></i> Export</a>
                    </div>
                </div>
            </div>
            <div class="tab-content tab-content-basic">
                <div class="tab-pane fade show active" id="overview" role="tabpanel" aria-labelledby="overview">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="statistics-details d-flex align-items-center justify-content-between">
                                <div>
                                    <p class="statistics-title">Total file uploaded</p>
                                    <h3 class="rate-percentage">{{$total_file}}</h3>
                                    <!-- <p class="text-danger d-flex"><i class="mdi mdi-menu-down"></i><span>-0.5%</span></p> -->
                                </div>
                                <div>
                                    <p class="statistics-title">Total file size uploaded</p>
                                    <h3 class="rate-percentage">{{$total_size}} Gb</h3>
                                </div>
                                <div>
                                    <p class="statistics-title">Total equipment</p>
                                    <h3 class="rate-percentage">{{$total_equip}}</h3>
                                </div>
                                <div class="d-none d-md-block">
                                    <p class="statistics-title">Avg. Time on Site</p>
                                    <h3 class="rate-percentage">2m:35s</h3>
                                </div>
                                <div class="d-none d-md-block">
                                    <p class="statistics-title">New Sessions</p>
                                    <h3 class="rate-percentage">68.8</h3>
                                </div>
                                <div class="d-none d-md-block">
                                    <p class="statistics-title">Avg. Time on Site</p>
                                    <h3 class="rate-percentage">2m:35s</h3>
                                    <p class="text-success d-flex"><i class="mdi mdi-menu-down"></i><span>+0.8%</span></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-8 d-flex flex-column">
                            <div class="row flex-grow">
                                <div class="col-12 col-lg-4 col-lg-12 grid-margin stretch-card">
                                    <div class="card card-rounded">
                                        <div class="card-body">
                                            <div class="d-sm-flex justify-content-between align-items-start">
                                                <div>
                                                    <h4 class="card-title card-title-dash">Server Storage Line Chart</h4>
                                                    <h5 class="card-subtitle card-subtitle-dash">Keep monitor and optimize which large size file</h5>
                                                </div>
                                                <div id="performance-line-legend"></div>
                                            </div>
                                            <form action="" method="get">
                                                <div class="row">
                                                    <div class="col-4">
                                                        <div id="datepicker" class="input-group date datepicker navbar-date-picker">
                                                            <input type="datetime-local" name="fromdate" class="form-control fromdate" required value="{{isset($_GET['fromdate']) ? $_GET['fromdate'] : ''}}">
                                                        </div>
                                                    </div>
                                                    <div class="col-4">
                                                        <div id="datepicker" class="input-group date datepicker navbar-date-picker">
                                                            <input type="datetime-local" name="todate" class="form-control todate" required value="{{isset($_GET['todate']) ? $_GET['todate'] : ''}}">
                                                        </div>
                                                    </div>
                                                    <div class="col-4">
                                                        <button type="submit" class="btn btn-info">Filter</button>
                                                        <a href="{{route('Homepage')}}"><button type="button" class="btn btn-danger">Cancel</button></a>
                                                    </div>
                                                </div>
                                            </form>
                                            <div class="chartjs-wrapper mt-1 FileTracking">
                                                <canvas id="FileTrackingChart"></canvas>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- <div class="col-lg-4 d-flex flex-column">
                                                <div class="row flex-grow">
                                                    <div class="col-md-6 col-lg-12 grid-margin stretch-card">
                                                        <div class="card bg-primary card-rounded">
                                                            <div class="card-body pb-0">
                                                                <h4 class="card-title card-title-dash text-white mb-4">Status Summary</h4>
                                                                <div class="row">
                                                                    <div class="col-sm-4">
                                                                        <p class="status-summary-ight-white mb-1">Closed Value</p>
                                                                        <h2 class="text-info">357</h2>
                                                                    </div>
                                                                    <div class="col-sm-8">
                                                                        <div class="status-summary-chart-wrapper pb-4">
                                                                            <canvas id="status-summary"></canvas>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-lg-12 grid-margin stretch-card">
                                                        <div class="card card-rounded">
                                                            <div class="card-body">
                                                                <div class="row">
                                                                    <div class="col-sm-6">
                                                                        <div class="d-flex justify-content-between align-items-center mb-2 mb-sm-0">
                                                                            <div class="circle-progress-width">
                                                                                <div id="totalVisitors" class="progressbar-js-circle pr-2"></div>
                                                                            </div>
                                                                            <div>
                                                                                <p class="text-small mb-2">Total Visitors</p>
                                                                                <h4 class="mb-0 fw-bold">26.80%</h4>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-6">
                                                                        <div class="d-flex justify-content-between align-items-center">
                                                                            <div class="circle-progress-width">
                                                                                <div id="visitperday" class="progressbar-js-circle pr-2"></div>
                                                                            </div>
                                                                            <div>
                                                                                <p class="text-small mb-2">Visits per day</p>
                                                                                <h4 class="mb-0 fw-bold">9065</h4>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-lg-12 grid-margin stretch-card">
                                                        <div class="card card-rounded">
                                                            <div class="card-body">
                                                                <div class="row">
                                                                    <div class="col-sm-6">
                                                                        <div class="d-flex justify-content-between align-items-center mb-2 mb-sm-0">
                                                                            <div class="circle-progress-width">
                                                                                <div id="totalVisitors1" class="progressbar-js-circle pr-2"></div>
                                                                            </div>
                                                                            <div>
                                                                                <p class="text-small mb-2">Total Visitors</p>
                                                                                <h4 class="mb-0 fw-bold">26.80%</h4>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-6">
                                                                        <div class="d-flex justify-content-between align-items-center">
                                                                            <div class="circle-progress-width">
                                                                                <div id="visitperday" class="progressbar-js-circle pr-2"></div>
                                                                            </div>
                                                                            <div>
                                                                                <p class="text-small mb-2">Visits per day</p>
                                                                                <h4 class="mb-0 fw-bold">9065</h4>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div> -->
                        <div class="col-lg-4 d-flex flex-column">
                            <div class="row flex-grow">
                                <div class="col-12 grid-margin stretch-card">
                                    <div class="card card-rounded">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="d-flex justify-content-between align-items-center">
                                                        <h4 class="card-title card-title-dash">Reminder</h4>
                                                    </div>
                                                    <div class="list-wrapper">
                                                        <ul class="todo-list todo-list-rounded">
                                                            @foreach($reminds as $key=>$remind)
                                                            <li class="d-block">
                                                                <div class="form-check w-100">
                                                                    <label class="form-check-label">
                                                                        <input class="checkbox" type="checkbox"> {{$remind->Title}} <i class="input-helper rounded"></i>
                                                                    </label>
                                                                    <div class="d-flex mt-2 mb-2">
                                                                        <div class="ps-4 text-small me-3">Due date: {{$remind->Due_Date}}</div>
                                                                        <div class="badge badge-opacity-success me-3">{{$remind->User->name}}</div>
                                                                    </div>
                                                                </div>
                                                            </li>
                                                            @endforeach
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-8 d-flex flex-column">
                            <div class="row flex-grow">
                                <div class="col-12 grid-margin stretch-card">
                                    <div class="card card-rounded">
                                        <div class="card-body">
                                            <div class="d-sm-flex justify-content-between align-items-start">
                                                <div>
                                                    <h4 class="card-title card-title-dash">Market Overview</h4>
                                                    <p class="card-subtitle card-subtitle-dash">Lorem ipsum dolor sit amet consectetur adipisicing elit</p>
                                                </div>
                                                <div>
                                                    <div class="dropdown">
                                                        <button class="btn btn-secondary dropdown-toggle toggle-dark btn-lg mb-0 me-0" type="button" id="dropdownMenuButton2" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> This month </button>
                                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton2">
                                                            <h6 class="dropdown-header">Settings</h6>
                                                            <a class="dropdown-item" href="#">Action</a>
                                                            <a class="dropdown-item" href="#">Another action</a>
                                                            <a class="dropdown-item" href="#">Something else here</a>
                                                            <div class="dropdown-divider"></div>
                                                            <a class="dropdown-item" href="#">Separated link</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="d-sm-flex align-items-center mt-1 justify-content-between">
                                                <div class="d-sm-flex align-items-center mt-4 justify-content-between">
                                                    <h2 class="me-2 fw-bold">$36,2531.00</h2>
                                                    <h4 class="me-2">USD</h4>
                                                    <h4 class="text-success">(+1.37%)</h4>
                                                </div>
                                                <div class="me-3">
                                                    <div id="marketing-overview-legend"></div>
                                                </div>
                                            </div>
                                            <div class="chartjs-bar-wrapper mt-3">
                                                <canvas id="marketingOverview"></canvas>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row flex-grow">
                                <div class="col-12 grid-margin stretch-card">
                                    <div class="card card-rounded">
                                        <div class="card-body">
                                            <div class="d-sm-flex justify-content-between align-items-start">
                                                <div>
                                                    <h4 class="card-title card-title-dash">Pending Requests</h4>
                                                    <p class="card-subtitle card-subtitle-dash">You have 50+ new requests</p>
                                                </div>
                                                <div>
                                                    <button class="btn btn-primary btn-lg text-white mb-0 me-0" type="button"><i class="mdi mdi-account-plus"></i>Add new member</button>
                                                </div>
                                            </div>
                                            <div class="table-responsive  mt-1">
                                                <table class="table select-table">
                                                    <thead>
                                                        <tr>
                                                            <th>
                                                                <div class="form-check form-check-flat mt-0">
                                                                    <label class="form-check-label">
                                                                        <input type="checkbox" class="form-check-input" aria-checked="false"><i class="input-helper"></i></label>
                                                                </div>
                                                            </th>
                                                            <th>Customer</th>
                                                            <th>Company</th>
                                                            <th>Progress</th>
                                                            <th>Status</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>
                                                                <div class="form-check form-check-flat mt-0">
                                                                    <label class="form-check-label">
                                                                        <input type="checkbox" class="form-check-input" aria-checked="false"><i class="input-helper"></i></label>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="d-flex ">
                                                                    <img src="images/faces/face1.jpg" alt="">
                                                                    <div>
                                                                        <h6>Brandon Washington</h6>
                                                                        <p>Head admin</p>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <h6>Company name 1</h6>
                                                                <p>company type</p>
                                                            </td>
                                                            <td>
                                                                <div>
                                                                    <div class="d-flex justify-content-between align-items-center mb-1 max-width-progress-wrap">
                                                                        <p class="text-success">79%</p>
                                                                        <p>85/162</p>
                                                                    </div>
                                                                    <div class="progress progress-md">
                                                                        <div class="progress-bar bg-success" role="progressbar" style="width: 85%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="badge badge-opacity-warning">In progress</div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <div class="form-check form-check-flat mt-0">
                                                                    <label class="form-check-label">
                                                                        <input type="checkbox" class="form-check-input" aria-checked="false"><i class="input-helper"></i></label>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="d-flex">
                                                                    <img src="images/faces/face2.jpg" alt="">
                                                                    <div>
                                                                        <h6>Laura Brooks</h6>
                                                                        <p>Head admin</p>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <h6>Company name 1</h6>
                                                                <p>company type</p>
                                                            </td>
                                                            <td>
                                                                <div>
                                                                    <div class="d-flex justify-content-between align-items-center mb-1 max-width-progress-wrap">
                                                                        <p class="text-success">65%</p>
                                                                        <p>85/162</p>
                                                                    </div>
                                                                    <div class="progress progress-md">
                                                                        <div class="progress-bar bg-success" role="progressbar" style="width: 65%" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100"></div>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="badge badge-opacity-warning">In progress</div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <div class="form-check form-check-flat mt-0">
                                                                    <label class="form-check-label">
                                                                        <input type="checkbox" class="form-check-input" aria-checked="false"><i class="input-helper"></i></label>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="d-flex">
                                                                    <img src="images/faces/face3.jpg" alt="">
                                                                    <div>
                                                                        <h6>Wayne Murphy</h6>
                                                                        <p>Head admin</p>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <h6>Company name 1</h6>
                                                                <p>company type</p>
                                                            </td>
                                                            <td>
                                                                <div>
                                                                    <div class="d-flex justify-content-between align-items-center mb-1 max-width-progress-wrap">
                                                                        <p class="text-success">65%</p>
                                                                        <p>85/162</p>
                                                                    </div>
                                                                    <div class="progress progress-md">
                                                                        <div class="progress-bar bg-warning" role="progressbar" style="width: 38%" aria-valuenow="38" aria-valuemin="0" aria-valuemax="100"></div>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="badge badge-opacity-warning">In progress</div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <div class="form-check form-check-flat mt-0">
                                                                    <label class="form-check-label">
                                                                        <input type="checkbox" class="form-check-input" aria-checked="false"><i class="input-helper"></i></label>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="d-flex">
                                                                    <img src="images/faces/face4.jpg" alt="">
                                                                    <div>
                                                                        <h6>Matthew Bailey</h6>
                                                                        <p>Head admin</p>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <h6>Company name 1</h6>
                                                                <p>company type</p>
                                                            </td>
                                                            <td>
                                                                <div>
                                                                    <div class="d-flex justify-content-between align-items-center mb-1 max-width-progress-wrap">
                                                                        <p class="text-success">65%</p>
                                                                        <p>85/162</p>
                                                                    </div>
                                                                    <div class="progress progress-md">
                                                                        <div class="progress-bar bg-danger" role="progressbar" style="width: 15%" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100"></div>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="badge badge-opacity-danger">Pending</div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <div class="form-check form-check-flat mt-0">
                                                                    <label class="form-check-label">
                                                                        <input type="checkbox" class="form-check-input" aria-checked="false"><i class="input-helper"></i></label>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="d-flex">
                                                                    <img src="images/faces/face5.jpg" alt="">
                                                                    <div>
                                                                        <h6>Katherine Butler</h6>
                                                                        <p>Head admin</p>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <h6>Company name 1</h6>
                                                                <p>company type</p>
                                                            </td>
                                                            <td>
                                                                <div>
                                                                    <div class="d-flex justify-content-between align-items-center mb-1 max-width-progress-wrap">
                                                                        <p class="text-success">65%</p>
                                                                        <p>85/162</p>
                                                                    </div>
                                                                    <div class="progress progress-md">
                                                                        <div class="progress-bar bg-success" role="progressbar" style="width: 65%" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100"></div>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="badge badge-opacity-success">Completed</div>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row flex-grow">
                                <div class="col-md-6 col-lg-6 grid-margin stretch-card">
                                    <div class="card card-rounded">
                                        <div class="card-body card-rounded">
                                            <h4 class="card-title  card-title-dash">Recent Events</h4>
                                            <div class="list align-items-center border-bottom py-2">
                                                <div class="wrapper w-100">
                                                    <p class="mb-2 font-weight-medium">
                                                        Change in Directors
                                                    </p>
                                                    <div class="d-flex justify-content-between align-items-center">
                                                        <div class="d-flex align-items-center">
                                                            <i class="mdi mdi-calendar text-muted me-1"></i>
                                                            <p class="mb-0 text-small text-muted">Mar 14, 2019</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="list align-items-center border-bottom py-2">
                                                <div class="wrapper w-100">
                                                    <p class="mb-2 font-weight-medium">
                                                        Other Events
                                                    </p>
                                                    <div class="d-flex justify-content-between align-items-center">
                                                        <div class="d-flex align-items-center">
                                                            <i class="mdi mdi-calendar text-muted me-1"></i>
                                                            <p class="mb-0 text-small text-muted">Mar 14, 2019</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="list align-items-center border-bottom py-2">
                                                <div class="wrapper w-100">
                                                    <p class="mb-2 font-weight-medium">
                                                        Quarterly Report
                                                    </p>
                                                    <div class="d-flex justify-content-between align-items-center">
                                                        <div class="d-flex align-items-center">
                                                            <i class="mdi mdi-calendar text-muted me-1"></i>
                                                            <p class="mb-0 text-small text-muted">Mar 14, 2019</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="list align-items-center border-bottom py-2">
                                                <div class="wrapper w-100">
                                                    <p class="mb-2 font-weight-medium">
                                                        Change in Directors
                                                    </p>
                                                    <div class="d-flex justify-content-between align-items-center">
                                                        <div class="d-flex align-items-center">
                                                            <i class="mdi mdi-calendar text-muted me-1"></i>
                                                            <p class="mb-0 text-small text-muted">Mar 14, 2019</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="list align-items-center pt-3">
                                                <div class="wrapper w-100">
                                                    <p class="mb-0">
                                                        <a href="#" class="fw-bold text-primary">Show all <i class="mdi mdi-arrow-right ms-2"></i></a>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-6 grid-margin stretch-card">
                                    <div class="card card-rounded">
                                        <div class="card-body">
                                            <div class="d-flex align-items-center justify-content-between mb-3">
                                                <h4 class="card-title card-title-dash">Activities</h4>
                                                <p class="mb-0">20 finished, 5 remaining</p>
                                            </div>
                                            <ul class="bullet-line-list">
                                                <li>
                                                    <div class="d-flex justify-content-between">
                                                        <div><span class="text-light-green">Ben Tossell</span> assign you a task</div>
                                                        <p>Just now</p>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="d-flex justify-content-between">
                                                        <div><span class="text-light-green">Oliver Noah</span> assign you a task</div>
                                                        <p>1h</p>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="d-flex justify-content-between">
                                                        <div><span class="text-light-green">Jack William</span> assign you a task</div>
                                                        <p>1h</p>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="d-flex justify-content-between">
                                                        <div><span class="text-light-green">Leo Lucas</span> assign you a task</div>
                                                        <p>1h</p>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="d-flex justify-content-between">
                                                        <div><span class="text-light-green">Thomas Henry</span> assign you a task</div>
                                                        <p>1h</p>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="d-flex justify-content-between">
                                                        <div><span class="text-light-green">Ben Tossell</span> assign you a task</div>
                                                        <p>1h</p>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="d-flex justify-content-between">
                                                        <div><span class="text-light-green">Ben Tossell</span> assign you a task</div>
                                                        <p>1h</p>
                                                    </div>
                                                </li>
                                            </ul>
                                            <div class="list align-items-center pt-3">
                                                <div class="wrapper w-100">
                                                    <p class="mb-0">
                                                        <a href="#" class="fw-bold text-primary">Show all <i class="mdi mdi-arrow-right ms-2"></i></a>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 d-flex flex-column">
                            <div class="row flex-grow">
                                <div class="col-12 grid-margin stretch-card">
                                    <div class="card card-rounded">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="d-flex justify-content-between align-items-center mb-3">
                                                        <h4 class="card-title card-title-dash">Group of Equipment</h4>
                                                    </div>
                                                    <canvas class="my-auto" id="factoryChart" height="200"></canvas>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row flex-grow">
                                <div class="col-12 grid-margin stretch-card">
                                    <div class="card card-rounded">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="d-flex justify-content-between align-items-center mb-3">
                                                        <h4 class="card-title card-title-dash">Type By Amount</h4>
                                                    </div>
                                                    <canvas class="my-auto" id="doughnutChart" height="200"></canvas>
                                                    <div id="doughnut-chart-legend" class="mt-5 text-center"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row flex-grow">
                                <div class="col-12 grid-margin stretch-card">
                                    <div class="card card-rounded">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="d-flex justify-content-between align-items-center mb-3">
                                                        <div>
                                                            <h4 class="card-title card-title-dash">Leave Report</h4>
                                                        </div>
                                                        <div>
                                                            <div class="dropdown">
                                                                <button class="btn btn-secondary dropdown-toggle toggle-dark btn-lg mb-0 me-0" type="button" id="dropdownMenuButton3" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Month Wise </button>
                                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton3">
                                                                    <h6 class="dropdown-header">week Wise</h6>
                                                                    <a class="dropdown-item" href="#">Year Wise</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="mt-3">
                                                        <canvas id="leaveReport"></canvas>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row flex-grow">
                                <div class="col-12 grid-margin stretch-card">
                                    <div class="card card-rounded">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="d-flex justify-content-between align-items-center mb-3">
                                                        <div>
                                                            <h4 class="card-title card-title-dash">Top Performer</h4>
                                                        </div>
                                                    </div>
                                                    <div class="mt-3">
                                                        <div class="wrapper d-flex align-items-center justify-content-between py-2 border-bottom">
                                                            <div class="d-flex">
                                                                <img class="img-sm rounded-10" src="images/faces/face1.jpg" alt="profile">
                                                                <div class="wrapper ms-3">
                                                                    <p class="ms-1 mb-1 fw-bold">Brandon Washington</p>
                                                                    <small class="text-muted mb-0">162543</small>
                                                                </div>
                                                            </div>
                                                            <div class="text-muted text-small">
                                                                1h ago
                                                            </div>
                                                        </div>
                                                        <div class="wrapper d-flex align-items-center justify-content-between py-2 border-bottom">
                                                            <div class="d-flex">
                                                                <img class="img-sm rounded-10" src="images/faces/face2.jpg" alt="profile">
                                                                <div class="wrapper ms-3">
                                                                    <p class="ms-1 mb-1 fw-bold">Wayne Murphy</p>
                                                                    <small class="text-muted mb-0">162543</small>
                                                                </div>
                                                            </div>
                                                            <div class="text-muted text-small">
                                                                1h ago
                                                            </div>
                                                        </div>
                                                        <div class="wrapper d-flex align-items-center justify-content-between py-2 border-bottom">
                                                            <div class="d-flex">
                                                                <img class="img-sm rounded-10" src="images/faces/face3.jpg" alt="profile">
                                                                <div class="wrapper ms-3">
                                                                    <p class="ms-1 mb-1 fw-bold">Katherine Butler</p>
                                                                    <small class="text-muted mb-0">162543</small>
                                                                </div>
                                                            </div>
                                                            <div class="text-muted text-small">
                                                                1h ago
                                                            </div>
                                                        </div>
                                                        <div class="wrapper d-flex align-items-center justify-content-between py-2 border-bottom">
                                                            <div class="d-flex">
                                                                <img class="img-sm rounded-10" src="images/faces/face4.jpg" alt="profile">
                                                                <div class="wrapper ms-3">
                                                                    <p class="ms-1 mb-1 fw-bold">Matthew Bailey</p>
                                                                    <small class="text-muted mb-0">162543</small>
                                                                </div>
                                                            </div>
                                                            <div class="text-muted text-small">
                                                                1h ago
                                                            </div>
                                                        </div>
                                                        <div class="wrapper d-flex align-items-center justify-content-between pt-2">
                                                            <div class="d-flex">
                                                                <img class="img-sm rounded-10" src="images/faces/face5.jpg" alt="profile">
                                                                <div class="wrapper ms-3">
                                                                    <p class="ms-1 mb-1 fw-bold">Rafell John</p>
                                                                    <small class="text-muted mb-0">Alaska, USA</small>
                                                                </div>
                                                            </div>
                                                            <div class="text-muted text-small">
                                                                1h ago
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade show" id="audiences" role="tabpanel" aria-labelledby="audiences">
                    a
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
<script>
    <?php
    $arrContextOptions = array(
        "ssl" => array(
            "verify_peer" => false,
            "verify_peer_name" => false,
        ),
    );
    $link = route('trackingfile');
    if (isset($_GET['fromdate']) && isset($_GET['todate'])) {
        $link = route('trackingfile') . '/' . $_GET['fromdate'] . '/' . $_GET['todate'];
    }
    $json = file_get_contents($link, false, stream_context_create($arrContextOptions));
    $obj = json_decode($json);
    ?>
    var ctx = document.getElementById("FileTrackingChart");
    var chart = new Chart(ctx, {
        type: "bar",
        data: {
            labels: [<?php foreach ($obj as $key => $value) {
                            if (strlen($value->model) <= 12 && strlen($value->model) > 10) {
                                echo '\'' . $value->model . '\',';
                            };
                        } ?>],
            datasets: [{
                    type: "bar",
                    backgroundColor: "rgba(54, 162, 235, 0.2)",
                    borderColor: "rgba(54, 162, 235, 1)",
                    borderWidth: 1,
                    label: "Total files",
                    data: [<?php foreach ($obj as $key => $value) {
                                if (strlen($value->model) <= 12 && strlen($value->model) > 10) {
                                    echo $value->total_file . ',';
                                };
                            } ?>]
                },
                {
                    type: "line",
                    label: "Group size (MB)",
                    data: [<?php foreach ($obj as $key => $value) {
                                if (strlen($value->model) <= 12 && strlen($value->model) > 10) {
                                    echo round($value->group_size / 1000) . ',';
                                };
                            } ?>],
                    lineTension: 0,
                    fill: false
                }
            ]
        }
    });
    <?php
    $link = route('factory.index');
    $json = file_get_contents($link, false, stream_context_create($arrContextOptions));
    $obj = json_decode($json);
    ?>
    var ctx = document.getElementById("factoryChart");
    var chart = new Chart(ctx, {
        type: "doughnut",
        data: {
            labels: [<?php foreach ($obj as $key => $value) {
                            echo '\'' . $value->factory_name . '\',';
                        } ?>],
            datasets: [{
                backgroundColor: [
                    'rgb(255, 99, 132)',
                    'rgb(54, 162, 235)'
                ],
                hoverOffset: 20,
                data: [<?php foreach ($obj as $key => $value) {
                            echo count($value->equipment) . ',';
                        } ?>]
            }]
        }
    });
</script>
@endsection