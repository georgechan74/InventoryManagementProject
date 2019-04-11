$(document).ready(function()
{
  //add
  $('#addnew').click(function()
  {
    $('#add').modal('show');
  });

 $('#upload').click(function(){

                var fd = new FormData();
               
                var files = $('#file')[0].files[0];
                var files2 = $('#file2')[0].files[0];
                var files3 = $('#file3')[0].files[0];
                var location = $('#location').val();
                var assignee = $('#assignee').val();
                var description = $('#description').val();
                var make = $('#make').val();
                var model = $('#model').val();
                var serialNo = $('#serialNo').val();
                var countyNo = $('#countyNo').val();
                var cost = $('#cost').val();
                var comments = $('#comments').val();
                var status = $('#status').val();
                var category = $('#category').val();
                var binvent = $('#binvent').val();
                var sublocations = $('#sublocations').val();
                var bureau = $('#bureau').val();
           

                fd.append('file',files);
                fd.append('file2',files2);
                fd.append('file3',files3);
                fd.append('location', location);
                fd.append('assignee',assignee);
                fd.append('description', description);
                fd.append('make', make);
                fd.append('model', model);
                fd.append('serialNo', serialNo);
                fd.append('countyNo', countyNo);
                fd.append('cost', cost);
                fd.append('comments', comments);
                fd.append('status', status);
                fd.append('category', category);
                fd.append('binvent', binvent);
                fd.append('sublocations', sublocations);
                fd.append('bureau', bureau);
             

                fd.append('request',1);

                // AJAX request
                $.ajax({
                    url: 'addAsset.php',
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
  //   {
  //     method: 'POST',
  //     url: 'addAsset.php',
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
  // });


  //edit
  $(document).on('click', '.edit', function()
  {
    var id = $(this).data('id');
    getDetails(id);
    // alert("error")
    $('#edit').modal('show');
  });

    $('#editForm').submit(function(e){
    e.preventDefault();
    var editform = $(this).serialize();

    $.ajax({
      method: 'POST',
      url: 'editAsset.php',
      data:new FormData(this),
    contentType:false,
    processData:false,
      success:function(response){
          //alert("hi")
      if(response != 0){
                 // Show image preview
                 // $('#preview').append("<img src='"+response+"' width='100' height='100' style='display: inline-block;'>");
                 //alert("error")
                alert('file not uploaded');
               }else{
                
                     $('#edit').modal('hide');
                     
                  
                }
                 myFunction();
            
     }

   
    });
  });

  // $('#editForm').submit(function(e)
  // {
  //   e.preventDefault();
  //   var editform = $(this).serialize();

  //   $.ajax(
  //   {
  //     method: 'POST',
  //     url: 'editAsset.php',
  //     data: editform,
  //     dataType: 'json',
  //     success: function(response)
  //     {  
  //       if(response.error)
  //       {
  //         $('#alert').show();
  //         $('#alert_message').html(response.message);
  //       }
  //       else
  //       {
  //         $('#alert').show();
  //         $('#alert_message').html(response.message);
  //         myFunction();
  //       }

  //       $('#edit').modal('hide');
  //     }
  //   });
  // });

// Additional Asset Info
   $(document).on('click', '.info', function()
  {
    var id = $(this).data('id');
    getInfo(id);
    // alert("error")
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
      url: 'a_to_s.php',
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
    url: 'fetch_row_assets.php',
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
        $('.location').val(response.data.LOCATION);
        $('.assignee').val(response.data.ASSIGNEE);
        $('.description').val(response.data.DESCRIPTION);
        $('.make').val(response.data.MAKE);
        $('.model').val(response.data.MODEL);
        $('.serialNo').val(response.data.SERIALNO);
        $('.countyNo').val(response.data.COUNTYNO);
        $('.cost').val(response.data.COST);
        $('.comments').val(response.data.COMMENTS);
        $('.status').val(response.data.STATUS);
        $('.category').val(response.data.CATEGORY);
        $('.binvent').val(response.data.BINVENT);
        $('.sublocations').val(response.data.SUBLOCATION);
        $('.bureau').val(response.data.BUREAU);
        $('#asset_image').html(response.data.ASSET_IMAGE);
        $('#location_image').html(response.data.LOCATION_IMAGE);
        $('#assignee_image').html(response.data.ASSIGNEE_IMAGE);
      }
    }
  });
}

function getInfo(id){
  $.ajax({
    method: 'POST',
    url: 'fetch_row_assets.php',
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
        $('#descriptionInfo').html(response.data.DESCRIPTION);
        $('#makeInfo').html(response.data.MAKE);
        $('#modelInfo').html(response.data.MODEL);
        $('#serialInfo').html(response.data.SERIALNO);
        $('#countyInfo').html(response.data.COUNTYNO);
        $('#dateInfo').html(response.data.ACDATE);
        $('#commentsInfo').html(response.data.COMMENTS);
        $('#categoryInfo').html(response.data.CATEGORY);
      
      }
    }
  });
}

function myFunction() 
{
  location.reload();
}