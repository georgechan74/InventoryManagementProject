<?php 
ob_start();
include 'header.php'; 
include 'db_connection.php';

//if not logged in go to login page
// if (!isset($_SESSION['username']))
// {
//     header("Location: login.php");
//     exit();
// } 

// if(!in_array("ADMIN", $_SESSION["userRoles"]))
// {
//     header("Location: home.php");
//     exit();
// }

// if(in_array("ADMIN", $_SESSION["userRoles"]))
// {
//     // echo"youre admin";
// } 

  // $table = "vehicle";
  // $order_by = "guid";
        
  $conn = OpenCon();
  $sql = "SELECT * FROM ROLES ORDER BY UID";

echo '<br><center><h1>Roles Directory</h1></center>';
echo '
<div class="col-md-12">
 <div id="alert" class="alert alert-info text-center" style="margin-top:20px; display:none;">
              <button class="close"><span aria-hidden="true">&times;</span></button>
                <span id="alert_message"></span>
        </div> 
  <div class="columns columns-right btn-group float-left">
    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      Actions
    </a>
  <div class="dropdown-menu" aria-labelledby="navbarDropdown">
    <a id="addnew" class="dropdown-item btn btn-success">Add Role</a>
    <a class="dropdown-item" href="#">Export</a>
    <a class="dropdown-item" href="#">Other</a>
  </div>
  </div>

      <table class="responstable" data-toggle="table" data-search="true" data-pagination="true" data-search-align="left" data-show-columns="true">
        <thead>
          <tr>
            <th><em class="fa fa-cog"></em></th>
            <th data-sortable="true">UID</th>
            <th data-sortable="true">ROLE</th>
          </tr>
        </thead>
      <tbody>';
          //  <tbody id="tbody">
        if ($result = $conn->query($sql))
        {
          // display records if there are records to display
          if ($result->rowCount() > 0)
        {
          
        while ($row = $result->fetch())
        {
          // set up a row for each record
         echo'<tr align="center">
            <td>
              <div class="btn-group" role="group">
                <a class="edit-btn">
                <button class="btn btn-primary btn-sm edit" data-id="'.$row["UID"].",".$row["ROLE"].'">
                  <em class="fas fa-pencil-alt"></em></button>
                </a>
                <a class="delete-btn">
                  <button class="btn btn-danger btn-sm delete" data-id="'.$row["UID"].",".$row["ROLE"].'">
                  <em class="fas fa-trash-alt""></em></button>
                </a>
              </div>
            </td>';
           
echo        "<td>" . $row['UID'] . "</td>";
echo        "<td>" . $row['ROLE'] . "</td>";      
echo      "</tr>";
        }
echo  '   </tr> ';
        '</tbody>
        </table>';
        }
        // if there are no records in the database, display an alert message
        else
        {
          echo " No results to display!";
        }

        } // show an error if there is an issue with the database query
        else
        {
          echo "Error: " . $conn->error;
        }

        echo '</div>';
        echo '</div>';
    CloseConn($conn);
?>
<body>

<script>
  $(document).ready(function(){

  //add
  $('#addnew').click(function(){
    $('#add').modal('show');
  });
  $('#addForm').submit(function(e){
    e.preventDefault();
    var addform = $(this).serialize();
    //console.log(addform);
    $.ajax({
      method: 'POST',
      url: 'addUser.php',//addUser
      data: addform,
      dataType: 'json',
      success: function(response){
        $('#add').modal('hide');
        if(response.error){
         // alert('error');
          $('#alert').show();
          $('#alert_message').html(response.message);
        }
        else{
          $('#alert').show();
          $('#alert_message').html(response.message);
           myFunction()

        }
     
      }
    });
   });

//edit
$(document).on('click', '.edit', function(){
    var id = $(this).data('id').split(",");
    getDetails(id[0]);
    $('#roleUID').val(id[0]);
    $('#roleROLE').val(id[1]);
    $('#edit').modal('show');
  });

  $('#editForm').submit(function(e){
    e.preventDefault();
    var editform = $(this).serialize();

    $.ajax({
      method: 'POST',
      url: 'editUser.php', //editUser
      data: editform,
      dataType: 'json',
      success: function(response){
        
        if(response.error){
          $('#alert').show();
          $('#alert_message').html(response.message);
        }
        else{
          $('#alert').show();
          $('#alert_message').html(response.message);
          myFunction();
        }

        $('#edit').modal('hide');
      }
    });
  });

///delete
$(document).on('click', '.delete', function(){
     var id = $(this).data('id').split(",");
     getDetails(id[0]);
     $('#roleUID_delete').val(id[0]);
     $('#roleROLE_delete').val(id[1]);
     $('#delete').modal('show');
   });

  $('#deleteForm').submit(function(e){
   e.preventDefault();
   var deleteform = $(this).serialize();
   $('#delete').modal('hide');
  window.location.reload();

      $.ajax({
        method: 'POST',
        url: 'deleteUser.php',
        data: deleteform,
        dataType: 'json',
        success: function(response){
          //$('#delete').modal('hide');
          if(response.error){
            $('#alert').show();
            $('#alert_message').html(response.message);
            window.location.reload();
          }
          else{
            //console.log('check123');
            $('#alert').show();
            $('#alert_message').html(response.message);
            window.location.reload();
            myFunction();
            $('#delete').modal('hide');
          }

          $('#delete').modal('hide');
        }
       })
      })

//hide message
  $(document).on('click', '.close', function(){
    $('#alert').hide();
  });
});

  function getDetails(id){
  $.ajax({
    method: 'POST',
    url: 'fetch_row_user.php', //fetch_row_user.php
    data: {id:id},
    dataType: 'json',
    success: function(response){
      if(response.error){
        $('#edit').modal('hide');
        $('#delete').modal('hide');
        $('#alert').show();
        $('#alert_message').html(response.message);

      }
      else{
        $('.id').val(response.data.UID);
        $('.role').val(response.data.ROLE);
        //$('#vehicle_uploaded_image').html(response.data.IMAGE);
       // alert('error');
      }
    }
  });
}

</script>
<script>
function myFunction() {
  location.reload();
}
</script>
</body>
</html>

<?php include("modalUser.html")?> 