@extends('layouts.app')

@section('content')
<!-- MAIN -->
<div class="main">
            <!-- MAIN CONTENT -->
            <div class="main-content">
                <div class="container-fluid">
                    <!-- OVERVIEW -->
                    <div class="panel panel-headline">
                        <div class="panel-heading">
                            <h3 class="panel-title"><i class="fa fa-users"></i> Employee</h3>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                        <div class="col-md-12">
                            <!-- TABLE HOVER -->
                            <div class="panel">
                                <div class="table-responsive">
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                            <th>Employee</th>
                                            <th>Counter</th>
                                            <th>Ratings</th>
                                            <th>Average Serving Time</th>
                                            <th>Average Customer Count</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if($employeesReference > 0)
                                                @foreach ($employeesReference as $key => $employeeData) 
                                                    @php
                                                    $i = 0;
                                                    $customerList = [];
                                                    $servingList = [];
                                                    @endphp
                                                    @if(!empty($employeeData['history']))
                                                        @foreach($employeeData['history'] as $userData => $historyData)
                                                            @php
                                                            array_push($customerList, $historyData['customerCount']);
                                                            array_push($servingList, $historyData['servingTime']);
                                                            @endphp
                                                        @endforeach
                                                    @endif
                                                    @php
                                                    if(count($customerList) > 0 && count($servingList) > 0){
                                                        $averageCustomer = array_sum($customerList)/count($customerList);
                                                        $averageServingTime = date('H:i:s', array_sum(array_map('strtotime', $servingList)) / count($servingList));
                                                    }
                                                    else{
                                                        $averageCustomer = 0;
                                                        $averageServingTime = '00:00:00';
                                                    }
                                                    @endphp
                                                
                                                <tr>
                                                    <td>{{ $employeeData['fullname']; }}</td>
                                                    <td>{{ $employeeData['counter']; }}</td>
                                                    @if(!isset($employeeData['ratings']))
                                                        <td>0</td>
                                                    @else
                                                        <td>{{ $employeeData['ratings']; }}</td>
                                                    @endif
                                                    <td>{{ $averageServingTime; }}</td>
                                                    <td>{{ round($averageCustomer,0); }}</td>
                                                </tr>
                                                @endforeach 
                                            @else
                                                <tr class="text-center">
                                                    <td colspan="6">No Employee Stats yet</td>
                                                </tr>
                                            @endif
                                        </tbody>
                                    </table>
                                    </div>
                            </div>
                            <!-- END TABLE HOVER -->
                        </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END MAIN CONTENT -->
        </div>
        <!-- END MAIN -->
@endsection
