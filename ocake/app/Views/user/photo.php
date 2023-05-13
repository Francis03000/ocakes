<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Ocake - Product</title>
    <!-- Custom fonts for this template-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" /><link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="http://localhost/ocake/tools/admin/css/sb-admin-2.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
      .container { max-width: 750px }
    </style>
</head>


                        <div class="card-body">
                           
                                <!-- DATA INSERT HERE -->
                            <form class="container mt-2" action="addphoto" method="post" accept-charset="utf-8" enctype="multipart/form-data">
                               
                                <label for="occasion">Category:</label>
                                <select name="occasion" class="form-control form-control-lg" id="occasion">
                                    <option value="Birthday">Birthday</option>
                                    <option value="Christening">Christening</option>
                                    <option value="Wedding">Wedding</option>
                                    <option value="Graduation">Graduation</option>
                                    <option value="Valentine">Valentine</option>
                                    <option value="Halloween">Halloween</option>
                                    <option value="Christmas">Christmas</option>
                                    <option value="New Year">New Year</option>
                                </select>
                              

                                <label for="status">Status:</label>
                                <select name="status" class="form-control form-control-lg" id="status">
                                    <option value="Available">Available</option>
                                    <option value="Unavailable">Unavailable</option>
                                </select>
                              

                                <label for="Flavor">Flavor:</label>
                                <input type="text" class="form-control form-control-lg" id="flavor" name="flavor">
                                

                                <label for="Price">Price:</label>
                                <input type="text" class="form-control form-control-lg" id="price" name="price"><br>
                                

                                <div class="mt-3">
                                    <div id="alertMessage" class="alert alert-warning mb-3" style="display: none">
                                        <span id="alertMsg"></span>
                                    </div>
                                    <div class="d-grid text-center">
                                        <img class="mb-3" id="ajaxImgUpload" alt="Preview Image" src="https://via.placeholder.com/300" />
                                    </div>
                                    <div class="mb-3">
                                        <input type="file" name="image" multiple="true" id="finput" onchange="onFileUpload(this);"
                                            class="form-control form-control-lg"  accept="image/*">
                                    </div>
                                   
                                </div>

                                <input class="btn btn-success btn-lg" type="submit" value="Add" name="submit" style="width:150px">
                            </form>
                        </div>
                    </div>


    <?//php echo view('admin/include/logout-modal'); ?>
    <?//php echo view('admin/include/photo-script'); ?>
    <?//php echo view('admin/include/script'); ?>

</body>

</html>