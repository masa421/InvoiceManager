@extends('layouts.admin_master')

@section('content')

<main>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-7">
                <div class="card shadow-lg border-0 rounded-lg mt-5">
                    <div class="card-header"><h1 class="text-center font-weight-light my-4"><b>Edit Your Company</b></h1></div>
                    <div class="card-body">
                        <form method="POST" action="/company/{{ $company->id }}/edit" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                            <div class="form-row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="small mb-1" for="inputFirstName">Company Name</label>
                                        <input 
                                            class="form-control py-4" 
                                            name="name" 
                                            type="text" 
                                            placeholder="" 
                                            value="{{$company->name}}"  />
                                    </div>
                                    @error('name')
                                        <p class="text-red-500">{{$message}}</p>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="small mb-1" for="inputFirstName">Company Email</label>
                                        <input 
                                            class="form-control py-4" 
                                            name="email" 
                                            type="text" 
                                            placeholder="" 
                                            value="{{$company->email}}"/>
                                    </div>
                                    @error('email')
                                        <p class="text-red-500">{{$message}}</p>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="small mb-1" for="inputLastName">Company Phone</label>
                                        <input 
                                            class="form-control py-4" 
                                            name="phone" 
                                            type="text" 
                                            placeholder="" 
                                            value="{{$company->phone}}" />
                                    </div>
                                    @error('phone')
                                        <p class="text-red-500">{{$message}}</p>
                                    @enderror
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="small mb-1" for="inputLastName">Company fax</label>
                                        <input 
                                            class="form-control py-4" 
                                            name="fax" 
                                            type="text" 
                                            placeholder="" 
                                            value="{{$company->fax}}"/>
                                    </div>
                                    @error('fax')
                                        <p class="text-red-500">{{$message}}</p>
                                    @enderror
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="small mb-1" for="inputLastName">Address 1</label>
                                        <input 
                                            class="form-control py-4" 
                                            name="address1" 
                                            type="text" 
                                            placeholder="Street/ Unit" 
                                            value="{{$company->address1}}" />
                                    </div>
                                    @error('address1')
                                        <p class="text-red-500">{{$message}}</p>
                                    @enderror
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="small mb-1" for="inputLastName">Address 2</label>
                                        <input 
                                            class="form-control py-4" 
                                            name="address2" 
                                            type="text" 
                                            placeholder="Surburb" 
                                            value="{{$company->address2}}" />
                                    </div>
                                    @error('address2')
                                        <p class="text-red-500">{{$message}}</p>
                                    @enderror
                                </div>
                                
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <!--
                                        <label class="small mb-1" for="inputLastName">Phone</label>
                                        <input class="form-control py-4" name="phone" type="text" placeholder="" />
                                        -->
                                        <div class="custom-file">
                                            <input type="file" name="logo" class="custom-file-input" id="chooseFile">
                                            <label class="custom-file-label" for="chooseFile">Select file</label>
                                        </div>
                                        <div>
                                            <img 
                                            class="hidden w-48 mr-6 md:block"
                                            src="{{$company->logo_img_path ? asset('storage/'.$company->logo_img_path) : asset('images/no-image.png')}}" 
                                            alt=""/>
                                        </div>
                                        @error('logo')
                                            <p class="text-red-500">{{$message}}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="small mb-1" for="inputLastName">Memo</label>
                                        <input 
                                            class="form-control py-4" 
                                            name="profile" 
                                            type="text" 
                                            placeholder="Company Profile" 
                                            value="{{$company->profile}}" />
                                    </div>
                                    @error('profile')
                                        <p class="text-red-500">{{$message}}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group mt-4 mb-0"><button class="btn btn-primary btn-block">Submit</button></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection