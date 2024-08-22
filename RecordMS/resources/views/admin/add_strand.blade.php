@extends('admin.layout')

@section('content')

   
        <div class="col-md-6 col-12 mx-auto">
        <div class="card">
            <div class="card-header">
            <h4 class="card-title">Add Strand</h4>
            </div>
            <div class="card-content">
            <div class="card-body">

                <form method="POST" action="/create_strand" enctype="multipart/form-data"
                class="form form-vertical">
                @csrf
                <div class="form-body">
                    <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                        <label for="track">Track</label>
                        <input type="text" id="track" class="form-control" name="track"
                            placeholder="Track" value="{{old('track')}}">
                        </div>
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