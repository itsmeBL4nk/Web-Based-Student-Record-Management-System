@extends('admin.layout')

@section('styles')

<link rel="stylesheet" href="{{asset('assets/layout/vendors/simple-datatables/style.css')}}">

@endsection

@section('content')

{{-- <div class="main-content container-fluid" style="margin-top: 0%">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6">
                <h5>All Student</h5>
            </div>
            <div class="col-12 col-md-6">
                <nav aria-label="breadcrumb" class='breadcrumb-header text-right'>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">All Student Table</li>
                    </ol>
                </nav>
            </div>
        </div>

    </div>
</div> --}}
<div class="main-content container-fluid">

    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6">
                <x-flash-message/>
                <a href="#AddStrandModal" class="btn btn-outline-primary" data-bs-toggle="modal">
                    <i data-feather="plus-square"></i>Add Strand</a>
            </div>
            <div class="col-12 col-md-6">
                <nav aria-label="breadcrumb" class='breadcrumb-header text-right'>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/admin/dashboard">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">View All Strand</li>
                    </ol>
                </nav>
            </div>
        </div>

    </div>

    <section class="section">
        <div class="card">
            <div style="background-color: #9bc6fd;font-size: 16px; color:black" class="card-header">
              <b> Strand</b>  
            </div>
            <div class="card-body">
                <table class='table table-striped' id="table1">
                    <thead>
                        <tr style="color: blue">
                            <th>Track</th>
                            <th>Strand</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $strand)
                                    
                                <tr>
                                    <td>{{$strand->track}}</td>
                                    <td>{{$strand->strand_name}}</td>
                                    {{-- <td>{{$strand->minor_sub}}</td> --}}
                                   <td> <a href="/admin/{{$strand->id}}/edit_strand"
                                     class="btn icon btn-primary"><i data-feather="edit"></i></a>

                                     <a href="/delete_strand/{{$strand->id}}" 
                                        class="btn icon btn-danger" onclick="return confirm('Are you sure to the strand?')">
                                        <i data-feather="trash-2"></i></a>
                                    </td>

                                
                                </tr>
                                 @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </section>
</div>
{{--==================================================ADD STRAND=================================================== --}}

<div class="me-1 mb-1 d-inline-block">
    
    <div class="modal fade text-left" id="AddStrandModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel17"
        aria-hidden="true">
        <form method="POST" action="/create_strand" enctype="multipart/form-data"
                class="form form-vertical">
    
                @csrf
        
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable " role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
            <h4 class="modal-title white" id="myModalLabel17">Add Strand</h4>
            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                <i data-feather="x"></i>
            </button>
            </div>

            <form method="POST" action="/create_gradeLevel" enctype="multipart/form-data"
                class="form form-vertical">
    
                @csrf
                
                <div style="padding-top: 15px;" class="form-body">
                    <div class="row">

                    <div class="col-12">
                        <div class="form-group">
                            <label for="track">Track</label>
                            <fieldset class="form-group">
                                <select class="form-select"  id="track" name="track" >
                                    <option selected disabled>Track</option>
                                    <option value="Academic Track">Academic Track</option>
                                   <option value="Technological Vocational Livelihood(TVL)">Technological Vocational Livelihood(TVL)</option>
                                </select>
                            </fieldset>
                            @error('track')
                            <p class=" invalid-credential text-red-500 text-xs mt-1">{{$message}}</p>
                            @enderror
                    </div>

                    <div class="col-12">
                        <div class="form-group">
                            <label for="strand_name">Strand</label>
                            <input type="text" id="" class="form-control" name="strand_name"
                                placeholder="Strand" value="{{old('strand_name')}}">
                            </div>
                            @error('strand_name')
                            <p class=" invalid-credential text-red-500 text-xs mt-1">{{$message}}</p>
                            @enderror
                    </div>
                    
                    <div class="col-12 d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
                        <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button>
                    </div>
                    </div>
                </div>
            </form>
        </div>
        </div>
    </div>
</div>

@endsection

@section('script')

<script src="{{asset('assets/layout/vendors/simple-datatables/simple-datatables.js')}}"></script>
<script src="{{asset('assets/layout/js/vendors.js')}}"></script>
    
@endsection