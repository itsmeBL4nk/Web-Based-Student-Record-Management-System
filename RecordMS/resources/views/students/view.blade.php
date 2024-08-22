@extends('admin.layout')

@section('styles')

<link rel="stylesheet" href="{{asset('assets/layout/vendors/simple-datatables/style.css')}}">

@endsection

@section('content')

<div class="main-content container-fluid">
    <div class="main-content container-fluid">

        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6">
                </div>
                
                <div class="col-12 col-md-6">
                    <nav aria-label="breadcrumb" class='breadcrumb-header text-right'>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/admin/dashboard">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page"><b>All Student Table</b> </li>
                        </ol>
                    </nav>
                </div>
            </div>
           
        </div>

    <section class="section">
        <div class="card">
            <div style="background-color: #9bc6fd;font-size: 16px; color:black" class="card-header">
                <b>Students</b>
            </div>
            <div class="card-body">
                <table class='table table-striped' id="table1">
                    <thead>
                        <tr style="color: blue">
                                
                                    <th>LRN</th>
                                    <th>Name</th>
                                    {{-- <th>Strand</th>
                                    <th>Grade& Section</th>
                                    <th>Action</th> --}}
                        </tr>
                    </thead>
                    <tbody>
                        <tr style="color: black">
                            <td>{{$transcript->student->lrn}}</td>
                            <td>{{$transcript->student->classes->strand->strand_name}}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

     </section>
    </div>
</div>

@endsection

@section('script')

<script src="{{asset('assets/layout/vendors/simple-datatables/simple-datatables.js')}}"></script>
<script src="{{asset('assets/layout/js/vendors.js')}}"></script>
    
@endsection