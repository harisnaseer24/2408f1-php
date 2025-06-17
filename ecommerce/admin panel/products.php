<?php 
include_once "./components/header.php"
?>  <div class="container">
          <div class="page-inner">
           <h1>Our products</h1>
          
                         <div class="card-action">
                    <button class="btn btn-success" type="submit" name="addproduct">Add product</button>
                    <button class="btn btn-danger">Cancel</button>
                  </div>
          <div class="row">
              <div class="col-md-12">
                <div class="card">
                  <div class="card-header">
                    <h4 class="card-title">Basic</h4>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table
                        id="basic-datatables"
                        class="display table table-striped table-hover"
                      >
                        <thead>
                          <tr>
                            <th>Id</th>
                            <th>Title</th>
                            <th>Image</th>
                            <th>Description</th>
                            <th>Price</th>
                            <th>Stock</th>
                            <th>Category </th>
                            <th>Action </th>
                          </tr>
                        </thead>
                        <tfoot>
                          <tr>
                              <th>Id</th>
                            <th>Title</th>
                            <th>Image</th>
                            <th>Description</th>
                            <th>Price</th>
                            <th>Stock</th>
                            <th>Category </th>
                            <th>Action </th>
                          </tr>
                        </tfoot>
                        <tbody>

                        <?php
                        
                        $getProducts="SELECT * FROM `products` as p inner join categories as c on p.cat_id=c.cat_id";
                        $result=mysqli_query($conn,$getProducts);
                        if(mysqli_num_rows($result) > 0){
                            while($row= mysqli_fetch_assoc($result)){
                           
                              echo '
                                <tr>
                                <td>'.$row["product_id"].'</td>
                          <td>'.$row["title"].'</td>
                          <td>'.$row["image"].'</td>
                          <td>'.$row["description"].'</td>
                          <td>'.$row["price"].'</td>
                          <td>'.$row["stock"].'</td>
                          <td>'.$row["cat_name"].'</td>
                          <td> Edit | Delete</td>
                          
                        </tr>';
                            }
                        }else{
                          echo '<tr>No products found</tr>';
                        }
                      
                        ?>
                        
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>

              
            </div>

           
          </div>
        </div>
 <?php 
     include_once "./components/footer.php";
     
     ?>
     <script>
      $(document).ready(function () {
        $("#basic-datatables").DataTable({});

        $("#multi-filter-select").DataTable({
          pageLength: 5,
          initComplete: function () {
            this.api()
              .columns()
              .every(function () {
                var column = this;
                var select = $(
                  '<select class="form-select"><option value=""></option></select>'
                )
                  .appendTo($(column.footer()).empty())
                  .on("change", function () {
                    var val = $.fn.dataTable.util.escapeRegex($(this).val());

                    column
                      .search(val ? "^" + val + "$" : "", true, false)
                      .draw();
                  });

                column
                  .data()
                  .unique()
                  .sort()
                  .each(function (d, j) {
                    select.append(
                      '<option value="' + d + '">' + d + "</option>"
                    );
                  });
              });
          },
        });

        // Add Row
        $("#add-row").DataTable({
          pageLength: 5,
        });

        var action =
          '<td> <div class="form-button-action"> <button type="button" data-bs-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Edit Task"> <i class="fa fa-edit"></i> </button> <button type="button" data-bs-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Remove"> <i class="fa fa-times"></i> </button> </div> </td>';

        $("#addRowButton").click(function () {
          $("#add-row")
            .dataTable()
            .fnAddData([
              $("#addName").val(),
              $("#addPosition").val(),
              $("#addOffice").val(),
              action,
            ]);
          $("#addRowModal").modal("hide");
        });
      });
    </script>