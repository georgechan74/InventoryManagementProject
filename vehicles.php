<!DOCTYPE html>
<html>
<head>
  <?php include('header.php'); ?>
  </head>

 <?php  
  include 'db_connection.php';
  $table = "vehicle";      
  $conn = OpenCon();
  $sql = "SELECT * FROM vehicle ORDER BY GUID";

echo '<br><center><h1>Vehicle Directory</h1></center>';
echo '
<div class="col-md-12">
  <div id="alert" class="alert alert-info text-center" style="margin-top:20px; display:none;">
    <button class="close"><span aria-hidden="true">&times;</span></button>
    <span id="alert_message"></span>
  </div> ';
  
  if((isset($_SESSION["username"])) && !(count($_SESSION['userRoles']) == 1 && in_array("MANAGER", $_SESSION["userRoles"]))) {
    echo '
      <div class="columns columns-right btn-group float-left">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Actions
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
        <a id="addnew" class="dropdown-item btn btn-success">Add Vehicle</a>
        <div id="toolbar"><a id="theButton" class="dropdown-item btn btn-success">Move Selected Items</a></div>
        <li class="nav-item dropdown">
                  <li class="dropdown-submenu"><a class="dropdown-item dropdown-toggle" href="#">Export</a>
                    <ul class="dropdown-menu">
                    <li><a href="#" class="dropdown-item btn btn-success" onclick="doExport()">Export to Excel</a></li>
                    <li><a href="#" class="dropdown-item btn btn-success" onclick="doExportCSV()">Export to CSV</a></li>
                    <li><a href="#" class="dropdown-item btn btn-success" onclick="doExportPDF()">Export to PDF</a></li>
                    </ul>
                  </li>
                </ul>
              </li>
      </div>
      </div>';
  }
echo '
  <table id="myVehiclesTable" class="responstable" data-toggle="table" data-search="true" data-advanced-search="true" data-id-table="advancedTable" data-pagination="true" data-search-align="left" data-show-columns="true" data-click-to-select="true">
  <thead>
    <tr>';
    
      echo '<th><em id="em" class="fa fa-cog"></em></th>';
    
      if((isset($_SESSION["username"])) && !(count($_SESSION['userRoles']) == 1 && in_array("MANAGER", $_SESSION["userRoles"]))) {
        echo '
        <th data-checkbox="true"></th>';
      }

      echo '
      <th>Vehicle Image</th>
      <th data-field="VNO" data-sortable="true"">VNO</th>
      <th data-field="ASSIGNEDTO" data-sortable="true">Assigned To</th>
      <th>Employee Image</th>
      <th class="d-none"  data-field="LICENSE" data-sortable="true">License</th>
      <th class="d-none"  data-field="MAKE" data-sortable="true">Make</th>
      <th class="d-none"  data-field="MODEL" data-sortable="true">Model</th>
      <th class="d-none"  data-field="YEAR" data-sortable="true">Year</th>
      <th data-field="HOUSED" data-sortable="true">Housed</th>
      <th>Housed Image</th>
      <th class="d-none"  data-field="VIN" data-sortable="true">VIN</th>
      <th data-field="UNIT" data-sortable="true">Unit</th>
      <th class="d-none" data-field="DESCRIPTION" data-sortable="true">Description</th>
      <th data-field="BUREAU" data-sortable="true">Bureau</th>
      <th data-field="FUNDINGORG" data-sortable="true">Funding Org</th>
    </tr>
  </thead>
<tbody>';

    if ($result = $conn->query($sql))
    {
      if ($result->rowCount() > 0)
      {    
        while ($row = $result->fetch())
        {
            echo'<tr align="center">
                  <td>
                    <div class="btn-group" role="group">';
            
            if((isset($_SESSION["username"])) && !(count($_SESSION['userRoles']) == 1 && in_array("MANAGER", $_SESSION["userRoles"]))) {
          
              echo '
                  <a class="edit-btn">
                    <button class="btn btn-primary btn-sm edit" data-id="'.$row["GUID"].'">
                    <em class="fas fa-pencil-alt"></em></button>
                  </a>

                  <a class="delete-btn">
                    <button class="btn btn-danger btn-sm delete" data-id="'.$row["GUID"].'">
                    <em class="fas fa-trash-alt""></em></button>
                  </a>';
            }

            echo '
                <a class="info-btn">
                  <button class="btn btn-success btn-sm info" data-id="'.$row["GUID"].'">
                  <i class="fas fa-info-circle"></i></button>
                </a>
              </div>
            </td>';
            
          if((isset($_SESSION["username"])) && !(count($_SESSION['userRoles']) == 1 && in_array("MANAGER", $_SESSION["userRoles"]))) {
            echo        "<td></td>";  
          }
          echo '<td><img src="'.$row['VEHICLE_IMAGE'].'" width="110" height="75"></td>';                        
          echo        "<td>" . $row['VNO'] . "</td>";
          echo        "<td>" . $row['ASSIGNEDTO'] . "</td>";
          echo '<td><img  src="'.$row['EMPLOYEE_IMAGE'].'" width="110" height="75"></td>';  
          echo        "<td>" . $row['LICENSE'] . "</td>";
          echo        "<td>" . $row['MAKE'] . "</td>";
          echo        "<td>" . $row['MODEL'] . "</td>";
          echo        "<td>" . $row['YEAR'] . "</td>";
          echo        "<td>" . $row['HOUSED'] . "</td>";
          echo '<td><img  src="'.$row['LOCATION_IMAGE'].'" width="110" height="75"></td>';  
          echo        "<td>" . $row['VIN'] . "</td>";
          echo        "<td>" . $row['UNIT'] . "</td>";
          echo        "<td>" . $row['DESCRIPTION'] . "</td>";
          echo        "<td>" . $row['BUREAU'] . "</td>";
          echo        "<td>" . $row['FUNDINGORG'] . "</td>";
          echo      "</tr>";
        }

        echo  '   </tr>'; 
        echo ' </tbody>

        </table>';
        }
        // if there are no records in the database, display an alert message
        else
        {
          echo " No results to display!";
        }
        
        }
        else
        {
          echo "Error: " . $conn->error;
        }
       
        echo '</div>';
        echo '</div>';

    CloseConn($conn);
?>

<body>

<!-- Add/Edit Vehicle  -->
<?php include("modalVehicle.php")?> 
<script src="appVehicle.js"></script>
<!-- Advanced Search + Move -->

<?php include("modalMove.php")?>
<script src="move.js"></script>


<!-- BootStrap Advance Search-->
<script type="text/javascript">
        $(document).ready(function () {

          $('#myVehiclesTable').bootstrapTable()
        });
</script>


<!-- Single-Line Advance Search-->
<!-- <script src="RESOURCES/myAdvanceSearch/js/jquery-3.3.1.min.js" type="text/javascript"></script>
<script src="RESOURCES/myAdvanceSearch/js/addons/datatables.min.js" type="text/javascript"></script>
<script type="text/javascript">
        $(document).ready(function () {
            $('#myVehiclesTable').DataTable();
        });
    </script> -->

<script type="text/javaScript">
function doExport() {
     
        $('#myVehiclesTable').tableExport({
            type:'excel',
            mso: {
              styles: ['background-color',
                       'color',
                       'font-family',
                       'font-size',
                       'font-weight',
                       'text-align']
            }
          }
        );
      }
function doExportCSV(){
        $('#myVehiclesTable').tableExport({type:'csv'});
      }
function doExportPDF(){
        $('#myVehiclesTable').tableExport({type:'pdf',
                           jspdf: {orientation: 'l',
                                   format: 'a3',
                                   margins: {left:10, right:10, top:20, bottom:20},
                                   autotable: {styles: {fillColor: 'inherit', 
                                                        textColor: 'inherit'},
                                               tableWidth: 'auto'}
                                  }
                          });
      }

  // drop down function for export 
  $('.dropdown-menu a.dropdown-toggle').on('click', function(e) {
  if (!$(this).next().hasClass('show')) {
    $(this).parents('.dropdown-menu').first().find('.show').removeClass("show");
  }
  var $subMenu = $(this).next(".dropdown-menu");
  $subMenu.toggleClass('show');

  $(this).parents('li.nav-item.dropdown.show').on('hidden.bs.dropdown', function(e) {
    $('.dropdown-submenu .show').removeClass("show");
  });


  return false;
});
    </script>

</body>
</html>



