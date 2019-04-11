<!DOCTYPE html>
<html>
<head>
    <?php include('header.php'); ?>
</head>

<?php  
  include 'db_connection.php';

  $table = "asset";
  $conn = OpenCon();
  $sql = "SELECT * FROM asset ORDER BY GUID";

echo '<br><center><h1>Fixed/Portable Directory</h1></center>';
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
            <a id="addnew" class="dropdown-item btn btn-success">Add Asset</a>
              <div id="toolbar"><a id="theButtonAsset" class="dropdown-item btn btn-success">Move Selected Items</a></div>
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
    <table id="myAssetTable" class="responstable" data-toggle="table" data-search="true" data-advanced-search="true" data-id-table="advancedTable" data-pagination="true" data-search-align="left" data-show-columns="true" data-click-to-select="true">
        <thead>
          <tr>';

          echo '<th><em class="fas fa-cog "></em></th>';

          if((isset($_SESSION["username"])) && !(count($_SESSION['userRoles']) == 1 && in_array("MANAGER", $_SESSION["userRoles"]))) {
            echo '            
            <th data-checkbox="true"></th>';
          }

          echo '
          <th class="d-none" data-field="GUID">GUID</th>
          <th>Asset Image</th>
          <th data-field="LOCATION" data-sortable="true">Location</th>
          <th>Location Image</th>
          <th data-field="ASSIGNEE" data-sortable="true">Assignee</th>
          <th>Assignee Image</th>
          <th class="d-none" data-field="DESCRIPTION" data-sortable="true">Description</th>
          <th class="d-none" data-field="MAKE" data-sortable="true">Make</th>
          <th class="d-none" data-field="MODEL" data-sortable="true">Model</th>
          <th class="d-none" data-field="SERIALNO" data-sortable="true">SerialNo</th>
          <th class="d-none" data-field="COUNTYNO" data-sortable="true">CountyNo</th>
          <th class="d-none" data-field="ACQDATE" data-sortable="true">Acqdate</th>
          <th data-field="COST" data-sortable="true">Cost</th>
          <th class="d-none" data-field="COMMENTS" data-sortable="true">Comments</th>
          <th data-field="STATUS" data-sortable="true">Status</th>
          <th class="d-none" data-field="CATEGORY" data-sortable="true">Category</th>
          <th data-field="BINVENTUNITCODE" data-sortable="true">BIUCode</th>
          <th data-field="SUBLOCATION" data-sortable="true">Sublocation</th>
          <th>Bureau</th>
        </tr>
        </thead>
    <tbody>';

    if ($result = $conn->query($sql))
    {
      if ($result->rowCount() > 0)
      {
        while ($row = $result->fetch())
        {
          echo '<tr align="center">
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
              echo  "<td></td>";
            }
            echo  "<td>" . $row['GUID'] . "</td>";
            echo '<td><img  src="'.$row['ASSET_IMAGE'].'" width="100" height="75"></td>';
            echo  "<td>" . $row['LOCATION'] . "</td>";
            echo '<td><img  src="'.$row['LOCATION_IMAGE'].'" width="100" height="75"></td>';
            echo  "<td>" . $row['ASSIGNEE'] . "</td>";
            echo '<td><img  src="'.$row['ASSIGNEE_IMAGE'].'" width="100" height="75"></td>';
            echo  "<td>" . $row['DESCRIPTION'] . "</td>";
            echo  "<td>" . $row['MAKE'] . "</td>";
            echo  "<td>" . $row['MODEL'] . "</td>";
            echo  "<td>" . $row['SERIALNO'] . "</td>";
            echo  "<td>" . $row['COUNTYNO'] . "</td>";
            echo  "<td>" . $row['ACDATE'] . "</td>";
            echo  "<td>" . $row['COST'] . "</td>";
            echo  "<td>" . $row['COMMENTS'] . "</td>";
            echo  "<td>" . $row['STATUS'] . "</td>";
            echo  "<td>" . $row['CATEGORY'] . "</td>";
            echo  "<td>" . $row['BINVENT'] . "</td>";
            echo  "<td>" . $row['SUBLOCATION'] . "</td>";
            echo  "<td>" . $row['BUREAU'] . "</td>";
            echo "</tr>";
        }
        echo '</tr>';
      echo '</tbody>

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
    

    <!-- Add New Asset-->
<?php include("modalAsset.php")?>
<script src="appAsset.js"></script>

<!-- Advanced Search + Move -->

<?php include("modalMove.php") ?>
<script src="move.js"></script>


<!-- BootStrap Advance Search-->
<script type="text/javascript">
        $(document).ready(function () {
          $('#myAssetTable').bootstrapTable()
        });
</script>


<!-- Single-Line Advance Search-->
<!-- <script src="RESOURCES/myAdvanceSearch/js/jquery-3.3.1.min.js" type="text/javascript"></script>
<script src="RESOURCES/myAdvanceSearch/js/addons/datatables.min.js" type="text/javascript"></script>
<script type="text/javascript">
        $(document).ready(function () {
            $('#myAssetTable').DataTable();
        });
    </script> -->

  <script type="text/javaScript">
      function doExport() {
        $('#myAssetTable').tableExport({
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
        $('#myAssetTable').tableExport({type:'csv'});
      }
      function doExportPDF(){
        $('#myAssetTable').tableExport({type:'pdf',
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

