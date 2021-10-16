<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style2.css">
    <link rel="icon" href="LogoMakerCa-1629816030209.PNG">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <!-- FONTAWESOME : https://kit.fontawesome.com/a23e6feb03.js -->
    <link rel="stylesheet"   href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.  5/jquery.mCustomScrollbar.min.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    <?php include("template/template1.php");
    include("config.php");
    ?>
    <?php
    if(isset($_POST['insert'])){
        $fname=$_POST['fname'];
        $category=$_POST['category'];
        $filenameabc = $_FILES["uploadfile"]["name"]; 
        $tempname = $_FILES["uploadfile"]["tmp_name"]; 
        $folder = "image/".$filenameabc;
        if (move_uploaded_file($tempname, $folder))  { 

            $msg = "Image uploaded successfully"; 
    
        }
    else{ 
    
            $msg = "Failed to upload image"; 
      } 
    
        $chefid=$_SESSION['u_id'];
        $query="SELECT * FROM food WHERE Chef_id=$chefid AND Food_Name='$fname'";
        $exe=mysqli_query($con,$query);
        $count=mysqli_num_rows($exe);
        if($count>0){
?>
<!-- <div class="container"> -->
<!-- <div class="alert alert-warning alert-dismissible fade show" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
  <strong> Already avalible Record!</strong> 
</div>
</div> -->

<script>
//   $(".alert").alert(close);
alert("already avalible");
</script>
<?php
        }
        else{
            $insert="INSERT INTO food(Chef_id,Cat_id,Food_Name,Food_Image)VALUES($chefid,'$category','$fname','$folder')";
            $execute=mysqli_query($con,$insert);
            if($execute){
                $show="SELECT * FROM food WHERE Food_Name='$fname'";
                $exes=mysqli_query($con,$show);
                $res=mysqli_fetch_array($exes);
                $fid=$res["Food_id"];
                for($i=0;$i<count($_POST['ingredant']);$i++){
                    $insert1="INSERT INTO ingremant(Food_id,type_id,ing_name,qty)VALUES($fid,'".$_POST['check'][$i]."','".$_POST['ingredant'][$i]."','".$_POST['qty'][$i]."')";
                    $resp=mysqli_query($con,$insert1);}
                
                    if($resp){
                        $process=$_POST['process'];
                        $total=$_POST['total'];
                        $link=$_POST['link'];
                        $insert2="INSERT INTO process(Food_id,Process,Total_Time,Link)VALUES($fid,'$process','$total','$link')";
                        $exesm=mysqli_query($con,$insert2);
                        if(!$exesm){
                            echo '<script>alert("Insert Failed");</script>';
                        }
                        else{
                            echo '<script>alert("Insert Sucessfully");</script>';
                        }
                  
                }
                
            }
            else{
             
                ?>
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                  <strong>Insert Failed!</strong> 
                </div>
                
                <script>
                  $(".alert").alert();
                </script>
                <?php
            }
        }
    }
    ?>
    <div id="content">
        <div class="container">
        <!-- <div class="bg-success text-white text-center w-25"style="border-radius:10px;">33%</div> -->
            <div class="card mt-2">
                <div class="card-header bg-primary">
                    <p class="h5 text-white text-center">Add Food</p>
                </div>
                <div class="card-body">
                    <form action="#" method="POST" enctype="multipart/form-data" id="insert_form">
                    <div id="form1">
                    <div class="progress mb-2" style="height:30px;">
                    <div class="progress-bar progress-bar-striped progress-bar-animated bg-success" role="progressbar"
                        style="width: 33%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">33%</div>
                </div>
                    <div class="form-group">
                        <label for="">Food-Name</label>
                        <input id="fname"  class="form-control" type="text" name="fname" autocomplete="off">
                        <span id="ferror"></span>
                    </div>
                    <div class="form-group">
                        <label for="">Category</label><br>
                        <select class="option" name="category">
                        <option selected="true" disabled="disabled" value="1">Select Category</option>    
                            <?php
                             $que3="SELECT * FROM category";
                             $exes=mysqli_query($con,$que3);
                             while($output=mysqli_fetch_array($exes)){
                            ?>
                            <option  value="<?php echo $output["cat_id"];?>"><?php echo $output["category_name"];?></option>
                            <?php
                             }
                            ?>
                        </select>
                        <span id="cerror"></span>
                    </div>
                    <div class="form-group">
                        <label for="">Food-Image</label>
                        <input id="fileName" class="form-control" type="file" name="uploadfile"  accept="image/x-png,image/gif,image/jpeg">
                    <span id="ierror"></span>
                    </div>
                    <div class="form-group text-right">
                       <button type="button" class="btn btn-primary next">Next</button>
                    </div>
                            </div>
                            <div id="form2" class="table-responsive" style="display: none;">
                            <div class="progress mb-2" style="height:30px;">
                    <div class="progress-bar progress-bar-striped progress-bar-animated bg-success" role="progressbar"
                        style="width: 66%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">66%</div>
                </div>
                            <table class="table table-border">
                                <tr>
                                    <thead>
                                        <th>Ingredant_name</th>
                                        <th>Ingredant_qty</th>
                                        <th>ingredant_type</th>
                                        <th>Remove</th>
                                        </tr>
                                    </thead>
                                    <?php
    function fill_unit_select_box($con){
      $id=$_SESSION['u_id'];
     $output='';
      $showdata="SELECT type_id,type_name FROM ingredant_type WHERE id=$id";
    $exesmpa=mysqli_query($con,$showdata);
    while ($result1=mysqli_fetch_array($exesmpa)){
        $output .= '<option value="'.$result1["type_id"].'">'.$result1["type_name"].'</option>';
    }
    return $output;
    }
    ?>
                                   <tbody id="tbody">
                                    <!-- <tr>
                                        <td><input type="text" class="form-control" id="iname" name="ingredant[]" placeholder="Enter Ingredantname"/>
                                    <span id="err"></span>
                                    </td>
                                        <td><input type="text" name="qty[]" class="form-control" id="qtys" placeholder="Enter Ingredant qty"/>
                                    <span id="qerr"></span>
                                    </td>
                                        <td><select class="option check" name="check[]"><option selected="true" disabled="disabled" value="1">Select Ingredant Type</option> <option value="<?php echo $result1["type_id"];?>" > <?php echo $result1["type_name"];?></option></select>
                                    <br><span id="serr"></span>
                                    </td>
                                    </tr> -->
                                   </tbody>
                                    <tfoot>
                                    <tr>
                                       <td colspan="2"><button class="btn btn-primary text-right btn-sm" type="button" id="adddata">Add row</button></td> 
                                       <td class="text-center"><button type="button" class="btn btn-primary btn-sm" id="prev">Previous</button></td>
                                       <td class="text-right"><button type="button" class="btn btn-primary btn-sm" id="nexf">Next</button></td>
                                    </tr>
                                    </tfoot>
                            </table>
                            <span id="error"></span>
                              </div>
                            
                            <div id="form3" style="display:none;">
                            <div class="progress mb-2" style="height:30px;">
                    <div class="progress-bar progress-bar-striped progress-bar-animated bg-success" role="progressbar"
                        style="width: 100%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">100%</div>
                </div>
                                <div class="form-group">
                                  <label for="">Proces</label>
                                  <textarea class="form-control" name="process" id="autoresizing" placeholder="Enter Food Recipes"></textarea>
                                <span id="rerror"></span>
                                </div>
                                <div class="form-group">
                                  <label for="">Total Time</label>
                                  <input type="text" name="total"  class="form-control" placeholder="Total Time" aria-describedby="helpId" autocomplete="off" id="totaltime">
                                  <span id="terror"></span>
                                  <!-- <small id="helpId" class="text-muted">Help text</small> -->
                                </div>
                                <div class="form-group">
                                  <label for="">Link</label>
                                  <input type="text" name="link"  class="form-control" placeholder="Enter Video Link" aria-describedby="helpId" autocomplete="off" id="video">
                                <span id="link"></span>
                                </div>
                            <div class="btn-grop text-right">
                                <button type="button" class="btn btn-primary" id="pre">Previous</button>
                                <button type="submit" class="btn btn-primary" name="insert" id="submit">Submit</button>
                            </div>
                            </div>
                    </form>
                </div>
            </div>
        </div>
          </div> 
   </div>
  
    </div> 
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
        <script>
         $(document).ready(function() {
    $('#sidebarCollapse').on('click', function() {
        $('#sidebar, #content').toggleClass('active');
        $('.collapse.in').toggleClass('in');
        $('a[aria-expanded=true]').attr('aria-expanded', 'false');
        document.getElementById("bodyContent").style.width = "100%";
    });
    $('#adddata').click(function() {

        var addcontrol = ' ';
        addcontrol += '<tr>';
        addcontrol += '<td><input type="text" id="iname" class="form-control required" name="ingredant[]" placeholder="Enter Ingredantname"></td>';
        addcontrol += '<td><input type="text" name="qty[]" id="qtys" class="form-control required"placeholder="Enter Ingredant qty"></td>';
        addcontrol += '<td><select class="optioncheck required" name="check[]"><option selected="true" disabled="disabled" value="1">Select Ingredant Type</option><?php echo fill_unit_select_box($con);?></select></td>';
        addcontrol += '<td class="text-right"><button class="btn btn-primary btn-sm remove" type="button" id="remove">Remove</button></td><</tr>'
            // addcontrol+='<td><button type="button" name="remove" id="remove" class="btn btn-danger btn-sm remove"><span class="glyphicon glyphicon-minus"></span></button></td></tr>';
        $("#tbody").append(addcontrol);
    });
    $(document).on('click', '.remove', function() {
        $(this).closest('tr').remove();
    });

    $('.next').click(function() {
        // alert();
        var x = document.getElementById("fname").value;
        var y = document.getElementsByName("category")[0].value;
        var fileName = document.getElementById("fileName").value;
        // console.write();
        if (!(x.trim())) {
            document.getElementById("ferror").innerHTML = "Please Enter Food Name";
            document.getElementById("ferror").style.color = "red";
            return false;
        } else if (y == 1) {
            document.getElementById("cerror").innerHTML = "Please Select Category";
            document.getElementById("cerror").style.color = "red";
            return false;
        } else if (!(fileName.trim())) {
            document.getElementById("ierror").innerHTML = "Please Select Food image";
            document.getElementById("ierror").style.color = "red";
            return false;
        } else {
            $('#form1').hide();
            $('#form2').show();
            return true;
        }
    });

    $('#prev').click(function() {
        $('#form2').hide();
        $('#form1').show();
    });
    $('#nexf').click(function() {
        // console.log();
        // alert();
        $('#form3').show();
        $('#form2').hide();
        // alert();
        return true;
    });
    $('#pre').click(function() {
        $('#form3').hide();
        $('#form1').hide();
        $('#form2').show();

    });
    $('#submit').click(function() {
        var x = document.getElementById("autoresizing").value;
        var y = document.getElementById("totaltime").value;
        var z = document.getElementById("link").value;
        if (!(x.trim())) {
            document.getElementById("rerror").innerHTML = "Please Enter Food Recipes";
            document.getElementById("rerror").style.color = "red";
            return false;
        } else if (!(y.trim())) {
            document.getElementById("terror").innerHTML = "Please Enter Food Making Total time";
            document.getElementById("terror").style.color = "red";
            return false;
        }
        // else if(!(z.trim())){
        //     document.getElementById("link").innerHTML="Please Enter Food Making Total time";
        //     document.getElementById("link").style.color="red";
        //     return false;
        // }
        else {
            return true;
        }
    });
});
textarea = document.querySelector("#autoresizing");
textarea.addEventListener('input', autoResize, false);

function autoResize() {
    this.style.height = 'auto';
    this.style.height = this.scrollHeight + 'px';
}
if (window.history.replaceState) {
    window.history.replaceState(null, null, window.location.href);
}
            </script>
            
</body>
</html>