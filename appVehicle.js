$(document).ready(function()
  {
  //add
  $('#addnew').click(function()
  {
    $('#add').modal('show');
  });

$('#upload').click(function(){

                var fd = new FormData();
               
                var files2 = $('#file2')[0].files[0];
                var files = $('#file')[0].files[0];
                var files3 = $('#file3')[0].files[0];
                var vno = $('#vno').val();
                var assigned = $('#assigned').val();
                var license = $('#license').val();
                var make = $('#make').val();
                var model = $('#model').val();
                var year = $('#year').val();
                var housed = $('#housed').val();
                var vin = $('#vin').val();
                var unit = $('#unit').val();
                var description = $('#description').val();
                var bureau = $('#bureau').val();
                var funding = $('#funding').val();
           
                fd.append('file2',files2);
                fd.append('file',files);
                fd.append('file3',files3);
                fd.append('vno', vno);
                fd.append('assigned',assigned);
                fd.append('license', license);
                fd.append('make', make);
                fd.append('model', model);
                fd.append('year', year);
                fd.append('housed', housed);
                fd.append('vin', vin);
                fd.append('unit', unit);
                fd.append('description', description);
                fd.append('bureau', bureau);
                fd.append('funding', funding);
             

                fd.append('request',1);

                // AJAX request
                $.ajax({
                    url: 'addVehicle.php',
                    type: 'post',
                    data: fd,
                    contentType: false,
                    processData: false,
                    success: function(response){

                        if(response != 0){
                            // Show image preview
                            $('#preview').append("<img src='"+response+"' width='100' height='100' style='display: inline-block;'>");
                              
                        }else{
                            alert('file not uploaded');
                        }
                        myFunction()
                    }
                });
            });
//

  // $('#addForm').submit(function(e)
  // {
  //   e.preventDefault();
  //   var addform = $(this).serialize();
  //   //console.log(addform);
  //   $.ajax(
  //     {
  //     method: 'POST',
  //     url: 'addVehicle.php',
  //     data: addform,
  //     dataType: 'json',
  //     success: function(response)
  //     {
  //       $('#add').modal('hide');
  //       if(response.error)
  //       {
  //         alert('error');
  //         $('#alert').show();
  //         $('#alert_message').html(response.message);
  //       }
  //       else
  //       {
  //         $('#alert').show();
  //         $('#alert_message').html(response.message);
  //          myFunction();

  //       }
  //     }
  //   });
  //  });


//edit
  $(document).on('click', '.edit', function(){
    var id = $(this).data('id');
    getDetails(id);

   // alert("error")
    $('#edit').modal('show');
  });

    $('#editForm').submit(function(e){
    e.preventDefault();
    //var editform = $(this).serialize();
   

    $.ajax({
      method: 'POST',
      url: 'editVehicle.php',
      data:new FormData(this),
    contentType:false,
    processData:false,
      success:function(response){
          //alert("hi")
      if(response != 0){
              
                 alert("error")
               }else{
                
                     $('#edit').modal('hide');
                myFunction();
                  
                }
            
     }
  });
  });


// //edit
//   $(document).on('click', '.edit', function()
//   {
//     var id = $(this).data('id');
//     getDetails(id);
//    // alert("error")
//     $('#edit').modal('show');
//   });

//   $('#editForm').submit(function(e)
//   {
//     e.preventDefault();
//     var editform = $(this).serialize();

//     $.ajax(
//       {
//       method: 'POST',
//       url: 'editVehicle.php',
//       data: editform,
//       dataType: 'json',
//       success: function(response)
//       {
//         if(response.error)
//         {
//           $('#alert').show();
//           $('#alert_message').html(response.message);
//         }
//         else
//         {
//           $('#alert').show();
//           $('#alert_message').html(response.message);
//           myFunction();
//         }

//         $('#edit').modal('hide');
//       }
//     });
//   });


//info
 $(document).on('click', '.info', function(){
    var id = $(this).data('id');
    getInfo(id);
    $('#info').modal('show');
  });

  //hide-delete message (will move to salvage_asset table)
  $(document).on('click', '.delete', function()
  {
    var id = $(this).data('id');
    getDetails(id);
    //alert(id);
    $('#delete').modal('show');
  });

  $('#salvageForm').submit(function(e)
  {
    e.preventDefault();
    var salvageform = $(this).serialize();

    $.ajax(
    {
      method: 'POST',
      url: 'v_to_s.php',
      data: salvageform,
      dataType: 'json',
      success: function(response)
      {
        $('#delete').modal('hide');
        if(response.error)
        {
          $('#alert').show();
          $('#alert_message').html(response.message);
        }
        else
        {
          $('#alert').show();
		      $('#alert_message').html(response.message);
		      myFunction();
        }
      }
    });

  });

}); // end function

  function getDetails(id){
  $.ajax({
    method: 'POST',
    url: 'fetch_row_vehicle.php',
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
        $('.id').val(response.data.GUID);
        $('.vno').val(response.data.VNO);
        $('.assigned').val(response.data.ASSIGNEDTO);
        $('.license').val(response.data.LICENSE);
        $('.make').val(response.data.MAKE);
        $('.model').val(response.data.MODEL);
        $('.year').val(response.data.YEAR);
        $('.housed').val(response.data.HOUSED);
        $('.vin').val(response.data.VIN);
        $('.unit').val(response.data.UNIT);
        $('.description').val(response.data.DESCRIPTION);
        $('.bureau').val(response.data.BUREAU);
        $('.funding').val(response.data.FUNDINGORG);
        $('#vehicle_uploaded_image').html(response.data.VEHICLE_IMAGE);
        $('#employee_uploaded_image').html(response.data.EMPLOYEE_IMAGE);
        $('#location_uploaded_image').html(response.data.LOCATION_IMAGE);
       
      }
    }
  });
}


  function getInfo(id){
  $.ajax({
    method: 'POST',
    url: 'fetch_row_vehicle.php',
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
        $('.id').val(response.data.GUID);
        $('#licenseInfo').html(response.data.LICENSE);
        $('#makeInfo').html(response.data.MAKE);
        $('#modelInfo').html(response.data.MODEL);
        $('#yearInfo').html(response.data.YEAR);
        $('#vinInfo').html(response.data.VIN);
        $('#descriptionInfo').html(response.data.DESCRIPTION);
      }
    }
  });
}

function myFunction()
{
  location.reload();
}