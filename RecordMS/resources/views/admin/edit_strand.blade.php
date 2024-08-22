@extends('admin.layout')

@section('content')

    <div class="row match-height">
        <div class="col-md-8 col-12 mx-auto">
            <x-flash-message/>
        <div class="card">
            <div style="background-color: #9bc6fd;" class="card-header">
           
                <h4 style="font-size: 22px; color:black;" class="card-title"><a href="/admin/all_strand" style="height: 40px;
                 font-size: 16px;color:black; " class="btn icon icon-left btn-success"><i data-feather="arrow-left"></i>
                     Back</a>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;Edit Strand</h4>
            </div>
            <div class="card-content">
            <div class="card-body">

                <form method="POST" action="/admin/{{$strand->id}}">
                    @csrf
                    @method('PUT')
                
                <div class="form-body">
                    <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <label for="track">Track</label>
                            <fieldset class="form-group">
                                <select class="form-select"  id="track" name="track" >
                                    <option selected disabled>{{$strand->track}}</option>
                                    <option value="Academic Track">Academic Track</option>
                                   <option value="Technological Vocational Livelihood(TVL)">Technological Vocational Livelihood(TVL)</option>
                                </select>
                            </fieldset>
                        </div>
                    @error('track')
                        <p class="invalid-credential text-red-500 text-xs mt-1">{{$message}}</p>
                        @enderror
                </div>

                    <div class="col-12">
                        <div class="form-group">
                        <label for="strand_name">Strand</label>
                        <input type="text" id="" class="form-control" name="strand_name"
                        placeholder="Strand" value="{{$strand->strand_name}}">
                        </div>
                    @error('strand_name')
                        <p class="invalid-credential text-red-500 text-xs mt-1">{{$message}}</p>
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