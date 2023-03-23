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
   
  <div class="card card-bordered card-preview">
      <div class="card-inner">
              <table class="datatable-init nk-tb-list nk-tb-ulist" data-auto-responsive="false">
                                  <thead>
                                        <tr class="nk-tb-item nk-tb-head">
                                            <th class="nk-tb-col"><span class="sub-text">Staff#</span></th>
                                            <th class="nk-tb-col"><span class="sub-text">Firstname</span></th>
                                            <th class="nk-tb-col tb-col-mb"><span class="sub-text">Lastname</span></th>
                                            <th class="nk-tb-col tb-col-lg"><span class="sub-text">Date of Joining</span></th>
                                            <th class="nk-tb-col tb-col-lg"><span class="sub-text">View/Edit</span></th>
                                            <th class="nk-tb-col tb-col-md"><span class="sub-text">Delete</span></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                      @foreach($staffs as $staff)
                                        <tr class="nk-tb-item">
                                            <td class="nk-tb-col">
                                                <div class="user-card">
                                                    <div class="user-info">
                                                        <span class="tb-lead">{{$staff->staff_id}} <span class="dot dot-success d-md-none ml-1"></span></span>
                                                    </div>
                                                </div>
                                            </td>
                                                            
                                            <td class="nk-tb-col">
                                                <div class="user-card">
                                                    <div class="user-info">
                                                        <span class="tb-lead">{{$staff->Firstname}}<span class="dot dot-success d-md-none ml-1"></span></span>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="nk-tb-col">
                                                <div class="user-card">
                                                    <div class="user-info">
                                                        <span class="tb-lead">{{$staff->Lastname}} <span class="dot dot-success d-md-none ml-1"></span></span>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="nk-tb-col tb-col-mb">
                                                <span class="tb-amount">{{$staff->date_of_joining}}</span>
                                            </td>
                                            <td class="nk-tb-col tb-col-lg">
                                                <span ><a href="{{url('/staff-show/'.$staff->id )}}"><em class="icon ni ni-eye"></em> View</a></span>
                                            </td>
                                            <td class="nk-tb-col tb-col-md">
                                                <span ><a href="{{url('/staff-delete/'.$staff->id )}}"><em class="icon ni ni-na"></em> delete</a></span>
                                            </td>
                                            </tr><!-- .nk-tb-item  -->
                                            @endforeach
                                        </tbody>
                                </table>
                          </div>
                      </div><!-- .card-preview -->
                  </div> <!-- nk-block -->

                                
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
                    <input type="date" name="date_of_joining" class="form-control" aria-label="Role" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                         <span class="input-group-text" id="basic-addon2"><i class="fab fa-user mr-1"></i></span>
                    </div>
              </div>
              <label>Sex</label>
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