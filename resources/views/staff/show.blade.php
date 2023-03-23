@extends('layouts.app')

@section('content')

<!-- content @s -->
<div class="nk-content ">
  <div class="container-fluid">
      <div class="nk-content-inner">
          <div class="nk-content-body">
              <div class="nk-block-head nk-block-head-sm">
                  <div class="nk-block-between">
                  <div class="nk-block-head-content">
                  </div><!-- .nk-block-head-content -->
                  <div class="nk-block-head-content">
                      <div class="toggle-wrap nk-block-tools-toggle">
                          <a href="#" class="btn btn-icon btn-trigger toggle-expand mr-n1" data-target="pageMenu"><em class="icon ni ni-more-v"></em></a>
                          <div class="toggle-expand-content" data-content="pageMenu">
                              <ul class="nk-block-tools g-3">
                                                        
                        <li class="nk-block-tools-opt"><a href="#" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter"><em class="icon ni ni-plus"></em><span>Add New</span></a></li>
                    </ul>
                </div>
            </div>
        </div><!-- .nk-block-head-content -->
    </div><!-- .nk-block-between -->
</div><!-- .nk-block-head -->


<div class="nk-block nk-block-lg">
                                       
    <div class="card card-bordered">
        <div class="card-inner">
            <div class="card-head">
                <h5 class="card-title">Staff Details</h5>
            </div>
            <form action="{{url('/staff-update/'.$staff->id)}}" class="gy-3" method="POST" enctype="multipart/form-data">
              @csrf 
                <div class="row g-3 align-center">
                    <div class="col-lg-5">
                        <div class="form-group">
                            <label class="form-label" for="site-name">First Name</label>
                            <input type="text"  class="form-control" name="Firstname" value="{{$staff->Firstname}}">
                        </div>
                        </div>
                        <div class="col-lg-5">
                            <div class="form-group">
                                <label class="form-label" for="site-name">Last Name</label>
                                <input type="text"  class="form-control" name="Lastname" value="{{$staff->Lastname}}">
                            </div>
                        </div>
                        </div>
                        <div class="row g-3 align-center">
                            <div class="col-lg-5">
                                <div class="form-group">
                                    <label class="form-label" for="site-name">Date Of Joining</label>
                                    <input type="date"  class="form-control" name="date_of_joining" value="{{$staff->date_of_joining}}">
                                </div>
                            </div>
                            <div class="col-lg-7">
                                <div class="form-group">
                                    <label class="form-label" for="site-name">sex</label>
                                                                
                                <ul class="custom-control-group g-3 align-center flex-wrap">
                                    <li>
                                        <div class="custom-control custom-radio">
                                            <input type="radio" class="custom-control-input" checked name="sex" id="reg-enable" value="Male">
                                            <label class="custom-control-label" for="reg-enable">Male</label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="custom-control custom-radio">
                                            <input type="radio" class="custom-control-input" name="sex" id="reg-disable" value="Female">
                                            <label class="custom-control-label" for="reg-disable">Female</label>
                                        </div>
                                    </li>
                                </ul>
                          </div>
                      </div>
                  </div>
                  <div class="row g-3 align-center">
                      <div class="col-lg-5">
                          <div class="form-group">
                              <label class="form-label" for="site-name">Educational Qualification</label>

                                <select name="education" class="form-control">
                                  <option value="HND">HND</option>
                                  <option value="Degree $ PHD only">Degree $ PHD only</option>
                    
                                </select>
                                                                
                          </div>
                      </div>
                        <div class="col-lg-7">
                            <div class="form-group">
                            <div class="form-control-wrap">
                            <input type="file"  name="image" >

                          <img class="profile-picture avatar-lg mb-2" src="{{asset('assets/images/'.$staff->staff_image)}}" alt="" height="50" width="50">
                          </div>
                        </div>
                        </div>
                   </div>
                          <div class="row g-3">
                              <div class="col-lg-7 offset-lg-5">
                                  <div class="form-group mt-2">
                                      <button type="submit" class="btn btn-lg btn-primary">Update</button>
                                  </div>
                              </div>
                          </div>
                      </form>
                  </div>
              </div><!-- card -->
          </div><!-- .nk-block -->



                                
            </div>
        </div>
    </div>
</div>




<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Add Staff</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
          <form action="{{ route('staff.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
       
      <div class="modal-body">
     
            <div class="form-group mb-4" style="max-width: 500px; margin: 0 auto;">

              <label>First Name</label>
              <div class="input-group mb-3">
                    <input type="text" name="Firstname" class="form-control" placeholder="First Name" aria-label="Recipient's username" aria-describedby="basic-addon2">
                    <div class="input-group-append ">
                         <span class="input-group-text" id="basic-addon2"><i class="fab fa-user mr-1"></i></span>
                    </div>
              </div>
              <label>Last Name</label>
              <div class="input-group mb-3">
                    <input type="text" name="Lastname" class="form-control" placeholder="Last Name" aria-label="Recipient's username" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                         <span class="input-group-text" id="basic-addon2"><i class="fab fa-inbox mr-1"></i></span>
                    </div>
              </div>
              <label>Date of Joining</label>
              <div class="input-group mb-3">
                    <input type="date" name="date_of_joining" class="form-control" aria-label="Role" aria-describedby="basic-addon2" value="{{$staff->date_of_joining}}">
                    <div class="input-group-append">
                         <span class="input-group-text" id="basic-addon2"><i class="fab fa-user mr-1"></i></span>
                    </div>
              </div>
              <label>Sex: {{$staff->sex}}</label>
              <div class="input-group mb-3">
              <ul class="custom-control-group g-3 align-center flex-wrap">
                  <li>
                      <div class="custom-control custom-radio">
                          <input type="radio" class="custom-control-input" checked name="sex" id="reg-enable" value="Male">
                          <label class="custom-control-label" for="reg-enable">Male</label>
                      </div>
                  </li>
                  <li>
                      <div class="custom-control custom-radio">
                          <input type="radio" class="custom-control-input" name="sex" id="reg-disable" value="Female">
                          <label class="custom-control-label" for="reg-disable">Female</label>
                      </div>
                  </li>
              </ul>
              </div>
              <label>Education Qualification</label>
              <div class="input-group mb-3">
                    <select name="education" class="form-control">
                      <option>Select Education Qualification</option>
                      <option value="HND">HND</option>
                      <option value="Degree $ PHD only">Degree $ PHD only</option>
                    
                    </select>
              </div>
              <label>User Image</label>
              <div class="input-group mb-3">
                <input type="file" class="form-control" aria-label="comment" name="image" >
                    <div class="input-group-append">
                         <span class="input-group-text" id="basic-addon2"><i class="fab fa-user mr-1"></i></span>
                    </div>
              </div>
            </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
       </form>
    </div>
  </div>
</div>
                <!-- content @e -->



@endsection