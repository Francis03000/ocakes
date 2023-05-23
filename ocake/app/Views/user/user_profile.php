
<!-- Google Fonts -->
<!-- <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900&display=swap" rel="stylesheet"> -->
<!-- Bootstrap CSS -->
<!-- <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css'> -->
<!-- Font Awesome CSS -->
<!-- <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css'> -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
        integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel='stylesheet' href='tools/user/css/user_profile.css'>
<div class="breadcrumbs">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 col-md-6 col-12">
                <div class="breadcrumbs-content">
                    <h1 class="page-title">Your Profile</h1>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-12">
                <ul class="breadcrumb-nav">
                    <li><a href="<?=site_url('home')?>"><i class=" lni lni-home"></i> Home</a></li>
                    
                    <li>Profile</li>
                </ul>
            </div>
        </div>
    </div>
</div>
<div class="mt-5 mb-5"></div>
<div class="student-profile py-4">
  <div class="container">
    <div class="row">
        <div class="col-lg-1">
        </div>
        <?php foreach($userData as $data){?>
            <div class="col-lg-3">
                <div class="card shadow-sm">
                <div class="card-header bg-transparent text-center">
                    <!-- <img class="profile_img" src="https://source.unsplash.com/600x300/?student" alt="student dp"> -->
                    <img class="profile_img" style=" border:#00ED01 10px solid" src="http://localhost/ocake/tools/uploads/<?php echo $data->profile;?>" alt="student dp">
                    <h3><?php echo $data->firstname;?> <?php echo $data->lastname;?></h3><br>
                </div>
                <div class="card-body">
                    <div class="profile" style="background-color:#cda808; border-radius:5px;">
                        <a href="<?=site_url('profile')?>"style="color:#ffffff;background-color:transparent" class="btn pr-1" role="button"><i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>  Personal Information</a> 
                    </div>
                    <!-- <div class="profile" >
                        <a href="<?=site_url('')?>" class="btn pr-1" style="background-color:transparent" role="button"><i class="fas fa-list fa-sm fa-fw mr-2 text-black-400"></i>  Orders</a> 
                    </div>
                    <div class="profile">
                        <a href="<?=site_url('')?>" class="btn pr-1" style="background-color:transparent" role="button"><i class="fas fa-birthday-cake mr-2 text-black-400"></i>  Cake Design</a> 
                    </div> -->
                    <div class="profile">
                        <a href="#" class="btn pr-1" style="background-color:transparent" role="button"><i class="fas fa-cogs fa-sm fa-fw mr-2 text-black-400"></i></i>  Privacy</a> 
                    </div>
                </div>
                </div>
            </div>
        <?php }?>
        <div class="col-lg-7">
            <div class="card shadow-sm">
            <div class="card-header bg-transparent border-0">
                <h5 class="mb-0"><i class="far fa-clone pr-1"></i> Personal Information 
                    <button class="" type="button" style="justify-content:center; color:green; border:none; background:none; float:right"
                        data-toggle="modal" data-target="#profileModal<?php echo $data->id;?>">
                        <i class='far fa-edit'></i>
                    </button>
                </h5>
            </div>
            <div class="card-body pt-0">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="card-header bg-transparent text-center">
                            <!-- <img class="profile_img" src="https://source.unsplash.com/600x300/?student" alt="student dp"> -->
                            <img class="profile_img" src="http://localhost/ocake/tools/uploads/<?php echo $data->profile;?>" alt="student dp">
                        </div>
                        <div class="text-center">
                            <p></p>
                            <!-- <span style="height:25px; width:25px; background-color:#bbb; border-radius:50%; display:inline-block"></span> -->
                            <span>&#128994;</span>
                            <span> Active</span>
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <table class="table table-bordered">
                        <tr>
                            <th width="30%">First name</th>
                            <td width="2%">:</td>
                            <td><?php echo $data->firstname;?></td>
                        </tr>
                        <tr>
                            <th width="30%">Last name</th>
                            <td width="2%">:</td>
                            <td><?php echo $data->lastname;?></td>
                        </tr>
                        <!-- <tr>
                            <th width="30%">Age</th>
                            <td width="2%">:</td>
                            <td><?//php echo $data->age;?></td>
                        </tr> -->
                        <tr>
                            <th width="30%">Address</th>
                            <td width="2%">:</td>
                            <td><?php echo $data->brgy;?>, <?php echo $data->mcp;?></td>
                        </tr>
                        <tr>
                            <th width="30%">Gender</th>
                            <td width="2%">:</td>
                            <td><?php echo $data->gender;?></td>
                        </tr>
                        <tr>
                            <th width="30%">Phone Number</th>
                            <td width="2%">:</td>
                            <td><?php echo $data->mobile;?></td>
                        </tr>
                        <!-- <tr>
                            <th width="30%">Address</th>
                            <td width="2%">:</td>
                            <td></td>
                        </tr> -->
                        </table>
                    </div>
                </div>
            </div>
            </div>
            <!-- <div style="height: 26px"></div>
            <div class="card shadow-sm">
                <div class="card-header bg-transparent border-0">
                    <h3 class="mb-0"><i class="far fa-clone pr-1"></i> Other Information</h3>
                </div>
                <div class="card-body pt-0">
                    <p>

                    </p>
                </div>
            </div> -->
        </div>
        <div class="col-lg-1">
        </div>
    </div>
  </div>
                                                        <!-- Modal For Order Details-->
                                                        <div class="modal fade"  id="profileModal<?php echo $data->id;?>" role="dialog">
                                                            <div class="modal-dialog" >
                                                                <!-- Modal content-->
                                                                <div class="modal-content" style="width:600px">
                                                                    <div class="modal-header" style="background-color:#0d0e0f">
                                                                        <h4 class="modal-title font-weight-bold" style="color:#cda808">Your Profile</h4>
                                                                        <button type="button" class="close" style="border:none; background-color:#0d0e0f; color:#cda808; font-size:25px"
                                                                            data-dismiss="modal">&times;</button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <form class="mt-2"
                                                                            action="<?php echo site_url('user/update_profile/'.$data->id);?>"
                                                                            method="post" accept-charset="utf-8"
                                                                            enctype="multipart/form-data">
                                                                            <?php if(session('success')){ echo session('success');}else{ echo session('error');}?>
                                                                            
                                                                            <div class="mb-3">
                                                                                <div class="product-details-info">
                                                                                    <div class="row">
                                                                                        <div class="col-lg-6 col-12">
                                                                                                <div class=" text-center" style="justify-content:center">
                                                                                                    <div id="alertMessage"
                                                                                                        class="alert alert-warning mb-3"
                                                                                                        style="display: none">
                                                                                                        <span id="alertMsg"></span>
                                                                                                    </div>
                                                                                                    <div class="card-header bg-transparent text-center">
                                                                                                        <img class="mb-3" style="justify-content:center" id="ajaxImgUpload"
                                                                                                            alt="Preview Image"
                                                                                                            src="http://localhost/ocake/tools/uploads/<?php echo $data->profile;?>"
                                                                                                            height='72%' width='72%' />
                                                                                                    
                                                                                                        <input type="file" name="image"
                                                                                                            multiple="true" id="finput"
                                                                                                            onchange="onFileUpload(this);"
                                                                                                            class="form-control form-control-lg " accept="image/*">
                                                                                                    </div>
                                                                                                </div>
                                                                                        </div>
                                                                                        <div class="col-lg-6 col-12">
                                                                                            <div class="info-body custom-responsive-margin">
                                                                                                <span><b>First Name:</b> </span> <input type="text" class="form-control " id="firstname"
                                                                                                    name="firstname" value="<?php echo $data->firstname?>"><br>
                                                                                            </div>
                                                                                            <div class="info-body custom-responsive-margin">
                                                                                                <span><b>Last Name:</b> </span> <input type="text" class="form-control " id="lastname"
                                                                                                    name="lastname" value="<?php echo $data->lastname?>"><br>
                                                                                            </div>
                                                                                            <!-- <div class="info-body custom-responsive-margin">
                                                                                                <span><b>Age:</b> </span> <input type="text" class="form-control " id="age"
                                                                                                    name="age" value="<?//php echo $data->age?>"><br>
                                                                                            </div> -->
                                                                                            <div class="info-body custom-responsive-margin">
                                                                                                <span><b>Municipality:</b> </span> <input type="text" class="form-control " id="age"
                                                                                                    name="mcp" value="<?php echo $data->mcp?>"><br>
                                                                                            </div>
                                                                                            <div class="info-body custom-responsive-margin">
                                                                                                <select class="form-control" type="text" id="barangay" name="brgy">
                                                                                                    <option value="barangay"><?php echo $data->brgy;?></option>
                                                                                                    <?php foreach($address as $add){?>
                                                                                                    <option value="<?php echo $add->barangay;?>"><?php echo $add->barangay;?></option>
                                                                                                    <?php }?>
                                                                                                </select>
                                                                                            </div>
                                                                                            <div class="info-body custom-responsive-margin">
                                                                                                <span><b>Gender:</b> </span> <input type="text" class="form-control " id="gender"
                                                                                                    name="gender" value="<?php echo $data->gender?>"><br>
                                                                                            </div>
                                                                                            <div class="info-body custom-responsive-margin">
                                                                                                <span><b>Mobile:</b> </span> <input type="text" class="form-control " id="mobile"
                                                                                                    name="mobile" value="<?php echo $data->mobile?>"><br>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="modal-footer">
                                                                                <button type="button" class="btn btn-secondary btn-lg"
                                                                                    data-dismiss="modal">Cancel</button>
                                                                                    <input class="button btn btn-lg" style="float:right; color:#ffff; background-color:cda808; border-color:cda808"
                                                                                        type="submit" value="Update" name="submit">
                                                                            </div>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

</div>


                                              
            