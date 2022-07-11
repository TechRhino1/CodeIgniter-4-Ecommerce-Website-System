<?= $this-> include('admin/head');?>

    
<div class="container mt-3">
    <!-- category insert form -->
    <form action="<?php echo base_url('/Admin/subcat_insert'); ?>" method="post">
        <label for="">Category type</label>
        <select name="cat" id="cat" required>
            <option value="">-SELECT-</option>
        <?php 
        foreach($cat as $c){ ?>
            <option value="<?=$c->cat_id;?>"><?=$c->cat_name;?></option>
            <?php 
            }
        ?>
        </select>
        <label for="">SubCategory Name</label>
        <input type="text" name="subcat" required>
        <input type="submit" value="Submit">
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