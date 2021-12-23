@extends('template.admin')

@section('title','Admin')

@section('main')

@section('main-heading')

<div class="breadcrumb-area">
    <div class="breadcrumb">
        <li class="breadcrumb-item">Dashboard</li>
    </div>
</div>

@endsection

<div class="main-dashboard">
    <div class="row">
        <div class="col-md-6">
            <div class="card-box">
                <div class="row">
                    <div class="col-md-4">
                        <div class="card">
                        <div class="card-body">
                            <p>Revenue</p>
                            <span>IDR 1.000.000</span>
                        </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card">
                        <div class="card-body">
                            <p>Expenses</p>
                            <span>IDR 1.000.000</span>
                        </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card">
                        <div class="card-body">
                            <p>Profit</p>
                            <span>IDR 1.000.000</span>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card-circle">
                <div class="row">
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body">
                                <p>32</p>
                                <small>New Customers</small>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body">
                                <p>23</p>
                                <small>New Sign Ups</small>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body">
                                <p>75</p>
                                <small>Visitors</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="dashboard-table">
    <div class="row">
        <div class="col-md-6">
           <div class="table-area table-transaction">
               <div class="table-header">
                   Transaction
               </div>
              <div class="table-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Single Pack</th>
                            <th>Family Pack</th>
                            <th>Event Catering</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>975.000</td>
                            <td>898.000</td>
                            <td>1.000.000</td>
                        </tr>
                    </tbody>
                </table>
              </div>
           </div> 
        </div>
        <div class="col-md-6">
           <div class="table-area table-subscription">
               <div class="table-header">
                   Total Subscrition
               </div>
               <div class="table-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Single Pack</th>
                            <th>Family Pack</th>
                            <th>Event Catering</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>15</td>
                            <td>10</td>
                            <td>5</td>
                        </tr>
                    </tbody>
                </table>
               </div>
           </div> 
        </div>
    </div>
</div>

@endsection