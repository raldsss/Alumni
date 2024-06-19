@extends('template.mains')
@section('title', 'Edit alumni')


<style>
    .content{
        margin-left: -15rem;
    }
    h1{
        position: relative;
        left: -15rem;
    }
</style>


@section('content')

<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">@yield('title')</h1>
                </div>

            </div>
        </div>
    </div>


    <div class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="text-right">
                                <a href="/alumni" class="btn btn-warning btn-sm"><i class="fa-solid fa-arrow-rotate-left"></i>
                                    Back
                                </a>
                            </div>
                        </div>
                        <form class="needs-validation" novalidate action="/alumni/{{ $alumni->alumni_id }}" method="POST">
                            @csrf
                            @method('PUT')

<div class="card-body">
    <div class="row">
      <div class="col-lg-6">
        <div class="form-group">
            <label for="name">firstname</label>
            <input type="text" name="firstName" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Name Alumni" value="{{old('firstName', $alumni->firstName)}}" required>
            @error('name')
            <span class="invalid-feedback text-danger">{{ $message }}</span>
            @enderror
        </div>
      </div>
      <div class="col-lg-6">
        <div class="form-group">
            <label for="middleName">Middlename</label>
            <input type="text" name="middleName" class="form-control @error('middleName') is-invalid @enderror" id="middleName" placeholder="middleName" value="{{old('middleName', $alumni->middleName)}}" required>
            @error('middleName')
            <span class="invalid-feedback text-danger">{{ $message }}</span>
            @enderror
        </div>
      </div>
      <div class="col-lg-6">
        <div class="form-group">
            <label for="lastName">Lastname</label>
            <input type="text" name="lastName" class="form-control @error('lastName') is-invalid @enderror" id="lastName" placeholder="lastName" value="{{old('lastName', $alumni->lastName)}}" required>
            @error('lastName')
            <span class="invalid-feedback text-danger">{{ $message }}</span>
            @enderror
        </div>
      </div>
      <div class="col-lg-6">
        <div class="form-group">
            <label for="streetAddress">StreetAddress</label>
            <input type="text" min="1" name="streetAddress" class="form-control @error('streetAddress') is-invalid @enderror" id="streetAddress" placeholder="streetAddress" value="{{old('streetAddress', $alumni->streetAddress)}}" required>
            @error('streetAddress')
            <span class="invalid-feedback text-danger">{{ $message }}</span>
            @enderror
        </div>
      </div>
      <div class="col-lg-6">
        <div class="form-group">
            <label for="province">Barangay</label>
            <input type="text" name="barangay" class="form-control @error('barangay') is-invalid @enderror" id="barangay" placeholder="barangay" value="{{old('barangay', $alumni->barangay)}}" required>
            @error('barangay')
            <span class="invalid-feedback text-danger">{{ $message }}</span>
            @enderror
        </div>
      </div>
      <div class="col-lg-6">
        <div class="form-group">
            <label for="city">City/Municipality:</label>
            <input type="text" name="city" class="form-control @error('city') is-invalid @enderror" id="city" placeholder="city" value="{{old('city', $alumni->city)}}" required>
            @error('city')
            <span class="invalid-feedback text-danger">{{ $message }}</span>
            @enderror
        </div>
      </div>
      <div class="col-lg-6">
        <div class="form-group">
            <label for="district">District</label>
            <input type="text" name="district" class="form-control @error('district') is-invalid @enderror" id="district" placeholder="district" value="{{old('district', $alumni->district)}}" required>
            @error('district')
            <span class="invalid-feedback text-danger">{{ $message }}</span>
            @enderror

        </div>
      </div>
      <div class="col-lg-6">
        <div class="form-group">
            <label for="province">Province</label>
            <input type="text" name="province" class="form-control @error('province') is-invalid @enderror" id="province" placeholder="province" value="{{old('province', $alumni->province)}}" required>
            @error('province')
            <span class="invalid-feedback text-danger">{{ $message }}</span>
            @enderror
        </div>
      </div>
      <div class="col-lg-6">
        <div class="form-group">
            <label for="region">Region</label>
            <input type="text" name="region" class="form-control @error('region') is-invalid @enderror" id="region" placeholder="region" value="{{old('region', $alumni->region)}}" required>
            @error('region')
            <span class="invalid-feedback text-danger">{{ $message }}</span>
            @enderror
        </div>
      </div>
      <div class="col-lg-6">
        <div class="form-group">
            <label for="birthdate">Birthdate</label>
            <input type="date" name="birthdate" class="form-control @error('birthdate') is-invalid @enderror" id="birthdate" placeholder="birthdate" value="{{old('birthdate', $alumni->birthdate)}}" required>
            @error('birthdate')
            <span class="invalid-feedback text-danger">{{ $message }}</span>
            @enderror
        </div>
      </div>
      <div class="col-lg-6">
        <div class="form-group">
            <label for="age">Age</label>
            <input type="number" name="age" class="form-control @error('age') is-invalid @enderror" id="age" placeholder="age" value="{{old('age', $alumni->age)}}" required>
            @error('age')
            <span class="invalid-feedback text-danger">{{ $message }}</span>
            @enderror
        </div>
      </div>
      <div class="col-lg-6">
        <div class="form-group">
            <label for="sex">Sex</label>
            <input type="text" name="sex" class="form-control @error('sex') is-invalid @enderror" id="sex" placeholder="sex" value="{{old('sex', $alumni->sex)}}" required>
            @error('sex')
            <span class="invalid-feedback text-danger">{{ $message }}</span>
            @enderror
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-6">
        <div class="form-group">
            <label for="nationality">Nationality</label>
            <input type="text" name="nationality" class="form-control @error('nationality') is-invalid @enderror" id="nationality" placeholder="nationality" value="{{old('nationality', $alumni->nationality)}}" required>
            @error('nationality')
            <span class="invalid-feedback text-danger">{{ $message }}</span>
            @enderror
        </div>
      </div>
      <div class="col-lg-6">
        <div class="form-group">
            <label for="civil_status">Civil Status</label>
            <input type="text" name="civil_status" class="form-control @error('civil_status') is-invalid @enderror" id="civil_status" placeholder="civil_status" value="{{old('civil_status', $alumni->civil_status)}}" required>
            @error('civil_status')
            <span class="invalid-feedback text-danger">{{ $message }}</span>
            @enderror
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-6">
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="email" value="{{old('email', $alumni->email)}}" required>
            @error('email')
            <span class="invalid-feedback text-danger">{{ $message }}</span>
            @enderror
        </div>
      </div>
      <div class="col-lg-6">
        <div class="form-group">
            <label for="batchNumber">BatchNumber</label>
            <input type="number" name="batchNumber" class="form-control @error('batchNumber') is-invalid @enderror" id="batchNumber" placeholder="batchNumber" value="{{old('batchNumber', $alumni->batchNumber)}}" required>
            @error('batchNumber')
            <span class="invalid-feedback text-danger">{{ $message }}</span>
            @enderror
        </div>
      </div>
      <div class="col-lg-6">
        <div class="form-group">
            <label for="training_status">Training Status</label>
            <input type="text" name="training_status" class="form-control @error('training_status') is-invalid @enderror" id="training_status" placeholder="training_status" value="{{old('training_status', $alumni->training_status)}}" required>
            @error('training_status')
            <span class="invalid-feedback text-danger">{{ $message }}</span>
            @enderror
        </div>
      </div>
      <div class="col-lg-6">
        <div class="form-group">
            <label for="scholarship">Scholarship</label>
            <input type="text" name="scholarship" class="form-control @error('scholarship') is-invalid @enderror" id="scholarship" placeholder="scholarship" value="{{old('scholarship', $alumni->scholarship)}}" required>
            @error('scholarship')
            <span class="invalid-feedback text-danger">{{ $message }}</span>
            @enderror
        </div>
      </div>


    </div>
  </div>

                            <div class="card-footer text-right">
                                {{-- <button class="btn btn-dark mr-1" type="reset"><i class="fa-solid fa-arrows-rotate"></i>
                                    Reset</button> --}}
                                <button class="btn btn-success" type="submit"><i class="fa-solid fa-floppy-disk"></i>
                                    Save</button>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- /.content -->
            </div>
        </div>
    </div>
</div>

@endsection


