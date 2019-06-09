<?php 

include('HF/header.php');
include '../controller/database.php';

$conn = dbConnect();

$sql = "SELECT laptop.*, brands.brand FROM laptop JOIN brands ON laptop.idbrands = brands.id";

$statement = $conn->query($sql);

?>

          

<div class="text-center">
  <a href="addlaptop.php" class="btn btn-primary btn-rounded mb-4"  >Add New Laptop</a>
</div>

<div class="container">
    <input type="search" class="form-control float-left table-search"   id="search" style="margin-bottom: 30px;">
    
<table id="dtBasicExample" class="table table-striped table-bordered" cellspacing="0" width="100%">
  <thead>
      <tr style="text-align: center">
      <th class="th-sm">Image
      </th>
      <th class="th-sm">Name
      </th>
      <th class="th-sm">Brand
      </th>
      <th class="th-sm" size="40">Specification
      </th>
      <th class="th-sm">Salary
      </th>
      <th class="th-sm" colspan="2">Action</th>
      </th>
    </tr>
  </thead>
  <tbody style="text-align: center" id="dataTable">
    <?php 
        while($field = $statement->fetch_assoc()){
            $spec =  json_decode($field['specification'], true);
            $test =  json_decode($field['img'], true);
            
            
    ?>
      <tr>
        <td style="vertical-align: middle">
            <img src="<?php echo $test['0']?>" width="50px" height="50px" ></td>

        <td style="vertical-align: middle"><?=$field['name']?></td>
        <td style="vertical-align: middle"><?=$field['brand']?></td>
        <td style="vertical-align: middle"><?= $spec['Ram'] //$field['specification']?></td>
        <td style="vertical-align: middle"><?=$field['price']?></td>
        <td style="text-align: center; vertical-align: middle"><a href="editlaptop.php?id=<?=$field['id'];?>"><i class="fas fa-edit"></i></a></td>
        <td style="text-align: center; vertical-align: middle"><a onclick="return confirm('Are you sure to delete')" href="controller/deletelaptop_process.php?id=<?=$field['id'];?>"><i class="fas fa-trash-alt"></i></a></td>
    </tr>
    <?php 
    
        }
    ?>
    
    
  </tbody>
  <tfoot>
    <tr style="text-align: center">
      <th class="th-sm">Image
      </th>
      <th class="th-sm">Name
      </th>
      <th class="th-sm">Brand
      </th>
      <th class="th-sm" >Specification
      </th>
      <th class="th-sm">Price
      </th>
      <th class="th-sm" colspan="2">Action</th>
      </th>
    </tr>
  </tfoot>
</table>
</div>
<?php 

include('HF/footer.php');

?>
<script>
$(document).ready(function(){
  	$("#search").on("keyup", function() {
    	var value = $(this).val().toLowerCase();
    	$("#dataTable tr").filter(function() {
      		$(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    	});
  	});
});
</script>

