<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['imsaid']==0)) {
  header('location:logout.php');
  } else{

  ?>

<!DOCTYPE html>
<html lang="en">
<head>
<title>Inventory Management System|| Invoice</title>
<?php include_once('includes/cs.php');?>


<script type="text/javascript">
function print1(strid) {
    if (confirm("Do you want to print?")) {
        var values = document.getElementById(strid).innerHTML;
        var currentDate = new Date(); // Create a new date object to get the current date and time
        var formattedDate = currentDate.toLocaleDateString('en-US', { // Format the date
            year: 'numeric', 
            month: 'long', 
            day: 'numeric', 
            hour: '2-digit', 
            minute: '2-digit'
        });

        var printWindow = window.open('left=0,top=0,width=800,height=900,toolbar=0,scrollbars=0,status=0');

        printWindow.document.write('<html>');
        printWindow.document.write('<style>');
        // Embedding all your CSS styles directly here
        printWindow.document.write(`
           body { font-family: Arial, sans-serif; }
          h1 { font-size: 2.5em; color: #333; text-align: center; padding: 10px 0; margin-bottom: 20px; border-bottom: 2px solid #e0e0e0; background-color: #fff; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); width: fit-content; margin-left: auto; margin-right: auto; border-radius: 8px; }
          address { margin-top: 20px; padding: 15px; background: #f5f5f5; border: 1px solid #ccc; color: #333; font-style: normal; line-height: 1.5; border-radius: 8px; box-shadow: 0 2px 5px rgba(0,0,0,0.1); font-size: 16px; }
          address strong { font-size: 18px; color: #000; display: block; margin-bottom: 8px; }
          address br { margin-bottom: 5px; }
          .customer-info-table, .footer-table, .table { width: 100%; border-collapse: collapse; }
          .customer-info-table th, .customer-info-table td, .footer-table th, .footer-table td, .table th, .table td { padding: 8px; border: 1px solid #ccc; font-size: 16px; }
          .customer-info-table th, .table th { background-color: #f2f2f2; color: #333; font-weight: bold; }
          .customer-info-table tr:nth-child(odd) td, .table tr:nth-child(even) { background-color: #f9f9f9; }
          .customer-info-table td[colspan="3"], .table td[colspan="3"] { text-align: center; }
          .footer { margin-top: 30px; padding-top: 15px; border-top: 2px solid #444; background-color: #f9f9f9; color: #333; position: relative; }
          .footer-table th { background-color: #4CAF50; color: white; font-weight: bold; padding: 10px 15px; text-align: center; }
          .footer-table td { text-align: center; padding: 8px 12px; border-top: 1px solid #ddd; }
          .footer-table td::after { content: ""; display: block; width: 60%; margin: 10px auto 0; border-bottom: 1px dashed #666; }
          .widget-box { box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); margin-bottom: 20px; background: #ffffff; border-radius: 5px; }
          .widget-title { background-color: #4CAF50; color: #fff; padding: 10px 15px; border-radius: 5px 5px 0 0; font-size: 16px; font-weight: bold; }
          .widget-content { padding: 20px; background: #fafafa; }
          .table-responsive { overflow-x: auto; margin-top: 20px; box-shadow: 0 2px 5px rgba(0,0,0,0.15); }
          .table-hover tbody tr:hover { color: #212529; background-color: rgba(0,0,0,.075); }
          .date-time { position: absolute; bottom: 10px; right: 10px; font-size: 12px; } /* Style for date and time */
        `); 
        printWindow.document.write('</style>');
        printWindow.document.write('</head><body>');
        printWindow.document.write(values);
        printWindow.document.write('<div class="date-time">' + formattedDate + '</div>'); // Adding the date and time to the bottom right corner
        printWindow.document.write('</body></html>');

        printWindow.document.close();
        //printWindow.focus();
        setTimeout(function() { printWindow.print(); printWindow.close(); }, 1000);
    }
}
</script>




<style>

    /* Header styles with advanced gradient and subtle animation */
    h1 {
        font-size: 2.5em;
        color: #333;
        text-align: center;
        padding: 20px;
        margin: 30px auto;
        background: linear-gradient(135deg, #ffffff 30%, #f1f1f1 100%);
        border-bottom: 4px solid #e0e0e0;
        box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
        width: 60%;
        border-radius: 10px;
        transition: all 0.5s cubic-bezier(0.68, -0.55, 0.265, 1.55);
    }

    h1:hover {
        transform: scale(1.05);
        background: linear-gradient(135deg, #ffffff 0%, #e0e0e0 100%);
    }

    /* Enhanced address block with transitions for hover */
    address {
        margin: 20px auto;
        padding: 20px;
        background: #f5f5f5;
        border: 1px solid #ccc;
        color: #333;
        font-style: normal;
        line-height: 1.5;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0,0,0,0.2);
        font-size: 16px;
        width: 70%;
        transition: all 0.4s ease-in-out;
    }

    address:hover {
        border-color: #bdc3c7;
        background: #e7e7e7;
        box-shadow: 0 6px 15px rgba(0,0,0,0.3);
    }

    address strong {
        font-size: 20px;
        color: #2C3E50;
        margin-bottom: 12px;
    }

    /* Table styles with hover effects */
    .customer-info-table, .footer-table, .table {
        width: 85%;
        margin: 20px auto;
        border-collapse: collapse;
        background-color: #ffffff;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    }

    .customer-info-table th, .customer-info-table td,
    .footer-table th, .footer-table td,
    .table th, .table td {
        padding: 12px;
        border: 1px solid #ccc;
        font-size: 16px;
        text-align: left;
        transition: background-color 0.3s ease-out, color 0.3s ease-out;
    }

    .customer-info-table th:hover, .table th:hover {
        background-color: #e0e0e0;
        color: #555;
    }

    /* Footer enhancements with animated gradient */
    .footer {
        width: 100%;
        margin-top: 30px;
        padding: 20px 0;
        border-top: 4px solid #444;
        background: linear-gradient(to right, #f9f9f9, #ececec);
        color: #333;
        text-align: center;
        transition: background-color 0.5s ease;
    }

    .footer-table th {
        background-color: #4CAF50;
        color: white;
        padding: 15px;
        transition: background-color 0.3s ease;
    }

    .footer-table th:hover {
        background-color: #369639;
    }

    .footer-table td {
        text-align: center;
        padding: 15px;
        border-top: 1px solid #ddd;
    }

    /* Responsive tables */
    .table-responsive {
        overflow-x: auto;
        margin-top: 30px;
        box-shadow: 0 2px 10px rgba(0,0,0,0.2);
    }

    /* Widget enhancements */
    .widget-box {
        margin-bottom: 30px;
        background: #ffffff;
        border-radius: 8px;
        box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
    }

    .widget-title {
        background-color: #4CAF50;
        color: #fff;
        padding: 15px;
        border-radius: 8px 8px 0 0;
        font-size: 18px;
        font-weight: bold;
    }

    .widget-content {
        padding: 20px;
        background: #fafafa;
        transition: background-color 0.3s ease;
    }

    .widget-content:hover {
        background-color: #f0f0f0;
    }
</style>




</head>
<body>

<?php include_once('includes/header.php');?>
<?php include_once('includes/sidebar.php');?>


<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="dashboard.php" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="manage-category.php" class="current">Invoice</a> </div>
    <h1>Invoice</h1>
  </div>
  <div class="container-fluid">
    <hr>
    <div class="row-fluid">
      <div class="span12" id="print2">

      <address>
            <strong>Flexus Pharma (Pvt) Ltd</strong><br>
            531, Ihalabiyanwila, Siyambalape, Sri Lanka<br>
            Email: contact@flexuspharma.com<br>
            Phone: 0112977719
        </address>
        
        <h3 class="mb-4">Invoice #<?php echo $_SESSION['invoiceid']?></h3>
<?php     

$billingid=$_SESSION['invoiceid'];
$ret=mysqli_query($con,"select distinct tblcustomer.CustomerName,tblcustomer.MobileNumber,tblcustomer.ModeofPayment,tblcustomer.BillingDate from tblcart join tblcustomer on tblcustomer.BillingNumber=tblcart.BillingId where tblcustomer.BillingNumber='$billingid'");

while ($row=mysqli_fetch_array($ret)) {
?>

  <div class="table-responsive">
    <table class="table align-items-center" width="100%" border="1">
            <tr>
<th>Customer Name:</th>
<td> <?php  echo $row['CustomerName'];?>  </td>
<th>Customer Number:</th>
<td> <?php  echo $row['MobileNumber'];?>  </td>
</tr>

<tr>
<th>Mode of Payment:</th>
<td colspan="3"> <?php  echo $row['ModeofPayment'];?>  </td>

</tr>
</table>

</div>
<?php } ?>
     
        
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            <h5>Products Inventory</h5>
          </div>
          <div class="widget-content nopadding" width="100%" border="1">
            <table class="table table-bordered data-table" style="font-size: 15px">
              <thead>
                <tr>
                  <th style="font-size: 12px">S.NO</th>
                  <th style="font-size: 12px">Product Name</th>
                  <th style="font-size: 12px">Model Number</th>
                  <th style="font-size: 12px">Quantity</th>
                  <th style="font-size: 12px">Price(per unit)</th>
                  <th style="font-size: 12px">Total</th>
                 
                </tr>
              </thead>
              <tbody>
              
                <?php
$ret=mysqli_query($con,"select tblcategory.CategoryName,tblsubcategory.SubCategoryname as subcat,tblproducts.ProductName,tblproducts.BrandName,tblproducts.ID as pid,tblproducts.Status,tblproducts.CreationDate,tblproducts.ModelNumber,tblproducts.Stock,tblproducts.Price,tblcart.ProductQty from tblproducts join tblcategory on tblcategory.ID=tblproducts.CatID join tblsubcategory on tblsubcategory.ID=tblproducts.SubcatID left join tblcart  on tblproducts.ID=tblcart.ProductId where tblcart.BillingId='$billingid'");
$cnt=1;

while ($row=mysqli_fetch_array($ret)) {

?>

                <tr>
                    
                  <td><?php echo $cnt;?></td>
                  <td><?php  echo $row['ProductName'];?></td>
                  <td><?php  echo $row['ModelNumber'];?></td>
                  <td><?php  echo($pq= $row['ProductQty']);?></td>
                  <td><?php  echo ($ppu=$row['Price']);?></td>
                   <td><?php  echo($total=$pq*$ppu);?></td>
                </tr>
                <?php 
$cnt=$cnt+1;
$gtotal+=$total;
}?>
 <tr>
                  <th colspan="5" style="text-align: center;color: red;font-weight: bold;font-size: 15px">  Grand Total</th>
                  <th colspan="4" style="text-align: center;color: red;font-weight: bold;font-size: 15px"><?php  echo $gtotal;?></th>
                </tr>
              </tbody>
            </table>

            <div class="footer">
    <table class="footer-table">
        <tr>
            <th>Prepared by:</th>
            <th>Authorized by:</th>
            <th>Good Receive Acknowledgement:</th>
        </tr>
        <tr>
            <td>(Name & Signature)</td>
            <td>(Name & Signature)</td>
            <td>(Name & Signature)</td>
        </tr>

    </table>
</div>

             <p style="text-align: center; padding-top: 30px"><input type="button"  name="printbutton" value="Print" onclick="return print1('print2')"/></p>

          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!--Footer-part-->
<?php include_once('includes/footer.php');?>
<!--end-Footer-part-->
<script src="js/jquery.min.js"></script> 
<script src="js/jquery.ui.custom.js"></script> 
<script src="js/bootstrap.min.js"></script> 
<script src="js/jquery.uniform.js"></script> 
<script src="js/select2.min.js"></script> 
<script src="js/jquery.dataTables.min.js"></script> 
<script src="js/matrix.js"></script> 
<script src="js/matrix.tables.js"></script>
</body>
</html>
<?php } ?>