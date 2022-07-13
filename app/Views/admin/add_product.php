<?= $this-> include('admin/head');?>

    
<div class="container mt-3">
    <!-- category insert form -->
   
    <form action="<?php echo base_url('/Admin/subt_insert'); ?>" method="post">
        <div class="mb-3 mt-3">
          <label for="email" class="form-label">Category type:</label>
          <select name="cat" id="cat" required class="form-control" onchange="sub();">
          <option value="">-SELECT-</option>
          <?php 
          foreach($cat as $c){ ?>
              <option value="<?=$c->cat_id;?>"><?=$c->cat_name;?></option>
              <?php 
              }
          ?>
          </select>
        </div>
        <div class="mb-3" id="change">
          <label for="pwd" class="form-label">Sub Category type:</label>
          <select name="subcat" id="subcat" required class="form-control" >
          <option value="">-SELECT-</option>
          </select>
        </div>
        <div class="mb-3">
          <label for="pwd" class="form-label">Product Name:</label>
          <input type="text" class="form-control" id="pname" placeholder="Enter Product Name" name="pname" required>
        </div>
        <div class="mb-3">
          <label for="pwd" class="form-label">Price:</label>
          <input type="text" class="form-control" id="price" placeholder="Enter Price" name="price" required>
        </div>
        <div class="mb-3">
          <label for="pwd" class="form-label">Discount:</label>
          <input type="text" class="form-control" id="dis" placeholder="Enter Discount" name="dis" required>
        </div>
        <div class="mb-3">
          <label for="pwd" class="form-label">Product Image:</label>
          <input type="file" class="form-control" id="img"  name="img" required>
        </div>
               
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

<div class="container mt-3">
  <h2>Striped Rows</h2>
  <p>The .table-striped class adds zebra-stripes to a table:</p>            
  <table class="table table-striped">
    <thead>
      <tr>
        <th>no</th>
        <th>Categories</th>
        <th>Subcategory</th>
        <th>Product</th>_id	p_subid	p_name	p_disc	p_image	p_price	p_off	

        <th>Price</th>
        <th>Discount</th>
        <th>P</th>
        <th>Image</th>
      </tr>
    </thead>
    <tbody>
    <?php $n=1;
        foreach($product as $c){ ?>
            <tr>
                <td><?=$n++;?></td>
                <td><?='#'.$c->cat_id;?></td>
                <td><?=$c->cat_name;?></td>
                <td><?='#'.$c->sub_id;?></td>
                <td><?=$c->sub_name	;?></td>
            </tr>
            <?php 
            }
        ?>
      
    </tbody>
  </table>
</div>

  
   
    </body>


    <script>
      //ajax call for category
      
        function sub(){
          var cat_id = document.getElementById('cat').value;
          $.ajax({
            url:"<?php echo base_url('/Admin/subt_ajax'); ?>",
            method:"POST",
            data:{cat_id:cat_id},
            success:function(data){
              $('#change').html(data);
              
            }
          });
        }  


    </script>