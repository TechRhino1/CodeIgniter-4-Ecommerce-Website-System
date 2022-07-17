<?= $this->include('admin/head'); ?>


<div class="container mt-3">
  <!-- category insert form -->

  <form action="<?php echo base_url('/Admin/pro_insert'); ?>" method="post" enctype="multipart/form-data" role="form">
    <div class="mb-3 mt-3">
      <label for="email" class="form-label">Category type:</label>
      <select name="cat" id="cat" required class="form-control" onchange="sub();">
        <option value="">-SELECT-</option>
        <?php
        foreach ($cat as $c) { ?>
          <option value="<?= $c->cat_id; ?>"><?= $c->cat_name; ?></option>
        <?php
        }
        ?>
      </select>
    </div>
    <div class="mb-3" id="change">
      <label for="pwd" class="form-label">Sub Category type:</label>
      <select name="subcat" id="subcat" required class="form-control">
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
      <input type="file" class="form-control" id="img" name="img" required>
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
  </form>

</div>

<div class="container mt-3" id="content">
  <h2>Products</h2>
  <table class="table table-striped">
    <thead>
      <tr>
        <th>no</th>
        <th>Categories</th>
        <th>Subcategory</th>
        <th>Product</th>
        <th>Price</th>
        <th>Discount</th>
        <th>Image</th>
      </tr>
    </thead>
    <tbody>
      <?php $n = 1;
      foreach ($product as $c) { ?>
        <tr>
          <td><?= $n++; ?></td>
          <td><?= $c->cat_name; ?></td>
          <td><?= $c->sub_name; ?></td>
          <td><?= $c->p_name; ?></td>
          <td><?= $c->p_price; ?></td>
          <td><?= $c->p_disc; ?></td>
          <td>
          <img src="<?= '../'.$c->p_image; ?>" alt="<?= $c->p_image; ?>" width="50" height="50">
        
        </td>

        </tr>
      <?php
      }
      ?>


    </tbody>
  </table>
</div>
<!-- //print button -->
<button onclick="invoice();" class="btn btn-primary">Print</button>
</body>
<!-- <script type="text/javascript " src="/app/Views/admin/jspdf.js"></script> -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript" src="https://raw.githack.com/eKoopmans/html2pdf/master/dist/html2pdf.bundle.js"></script>
<script type="text/javascript" src="../js/jspdf.js"></script>
<script>
  function invoice() {

    var doc = new jsPDF();
    doc.fromHTML(document.getElementById("content"), // page element which you want to print as PDF
      15,
      15, {
        'width': 'auto',
        'orientation': 'landscape',
      },
      function(a) {
        doc.save("HTML2PDF.pdf");
      });



  }
  /*
          function invoice() {
          var printContents = document.getElementById('content').innerHTML;
          var originalContents = document.body.innerHTML;  // save original content

          document.body.innerHTML = printContents; //print the page

          window.print();    // Print the page

          document.body.innerHTML = originalContents;  // restore the original HTML
      }**/
</script>

<script>
  //ajax call for category

  function sub() {
    var cat_id = document.getElementById('cat').value;
    $.ajax({
      url: "<?php echo base_url('/Admin/subt_ajax'); ?>",
      method: "POST",
      data: {
        cat_id: cat_id
      },
      success: function(data) {
        $('#change').html(data);

      }
    });
  }
</script>