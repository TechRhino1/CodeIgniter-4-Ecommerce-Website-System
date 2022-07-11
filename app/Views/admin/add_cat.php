<?= $this-> include('admin/head');?>

<div class="container mt-3">
    <!-- category insert form -->
    <form action="<?php echo base_url('/Admin/category_insert'); ?>" method="post">
        <label for="">Category Name</label>
        <input type="text" name="category_name" required>
        <input type="submit" value="Submit">
    </form>
</div>


<div class="container mt-3">
  <h2>Striped Rows</h2>
  <p>The .table-striped class adds zebra-stripes to a table:</p>            
  <table class="table table-striped">
    <thead>
      <tr>
        <th>Id</th>
        <th>Categories</th>
      </tr>
    </thead>
    <tbody>
    <?php 
        foreach($cat as $c){ ?>
            <tr>
                <td><?='#'.$c->cat_id;?></td>
                <td><?=$c->cat_name;?></td>
            </tr>
            <?php 
            }
        ?>
      
    </tbody>
  </table>
</div>

   
    </body>