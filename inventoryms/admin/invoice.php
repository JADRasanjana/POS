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

function print1(strid)
{
if(confirm("Do you want to print?"))
{
var values = document.getElementById(strid);
var printing =
window.open('','','left=0,top=0,width=550,height=400,toolbar=0,scrollbars=0,sta­?tus=0');
printing.document.write(values.innerHTML);
printing.document.close();
printing.focus();
printing.print();

}
}
</script>

<style>
  
  h1 {
        font-size: 2.5em; /* Makes the header larger */
        color: #333; /* Dark grey color for the text */
        text-align: center; /* Centers the header */
        padding: 10px 0; /* Adds space above and below the text */
        margin-bottom: 20px; /* Adds space below the header */
        border-bottom: 2px solid #e0e0e0; /* Adds a light grey line under the text */
        background-color: #fff; /* White background for the header */
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); /* Subtle shadow to lift the header off the page */
        width: fit-content;
        margin-left: auto;
        margin-right: auto;
        border-radius: 8px; /* Rounded corners for the background */
    }


        address {
            margin-top: 20px;
            padding: 15px;
            background: #f5f5f5; /* Light grey background */
            border: 1px solid #ccc; /* Grey border */
            color: #333; /* Dark text color for readability */
            font-style: normal; /* Override default italics on address tag */
            line-height: 1.5; /* More space between lines */
            border-radius: 8px; /* Rounded corners for the address block */
            box-shadow: 0 2px 5px rgba(0,0,0,0.1); /* Subtle shadow for depth */
            font-size: 16px; /* Slightly larger text for easy reading */
        }
        address strong {
            font-size: 18px; /* Slightly larger font size for the company name */
            color: #000; /* Black color for emphasis */
            display: block; /* Display on a new line */
            margin-bottom: 8px; /* Space below the company name */
        }
        address br {
            margin-bottom: 5px; /* Adds visual separation between lines */
        }

        .customer-info-table {
        width: 100%;
        border-collapse: collapse; /* Ensures that borders between cells are merged */
        margin-bottom: 20px; /* Adds space below the table */
    }

    .customer-info-table th, .customer-info-table td {
        border: 1px solid #ccc; /* Adds a light gray border around table cells */
        padding: 8px; /* Adds space inside cells */
        text-align: left; /* Aligns text to the left */
        font-size: 16px; /* Sets a larger font size for better readability */
    }

    .customer-info-table th {
        background-color: #f2f2f2; /* A light grey background for header cells */
        color: #333; /* Dark grey text color for header cells */
    }

    .customer-info-table tr:nth-child(odd) td {
        background-color: #fafafa; /* A very light grey background for odd rows */
    }

    .customer-info-table td[colspan="3"] {
        text-align: center; /* Centers text in cells that span multiple columns */
    }


    .footer {
    width: 100%;
    margin-top: 30px;
    padding-top: 15px;
    border-top: 2px solid #444; /* adds a nice line above the footer */
    background-color: #f9f9f9; /* light background for the footer */
    color: #333; /* dark text color for readability */
}

.footer-table {
    width: 100%;
    border-collapse: collapse; /* ensures borders between cells are merged */
    font-size: 16px; /* larger font size for better readability */
}

.footer-table th {
    background-color: #4CAF50; /* green background for headers */
    color: white; /* white text color */
    font-weight: bold; /* makes text bold */
    padding: 10px 15px; /* adds padding inside the header cells */
    text-align: center; /* centers the text horizontally */
}

.footer-table td {
    text-align: center; /* align text in the center of the cell */
    padding: 8px 12px; /* vertical and horizontal padding inside cells */
    border-top: 1px solid #ddd; /* adds a subtle line on top of each cell */
}

/* Optional: Add CSS for the signatures to indicate the signature lines */
.footer-table td::after {
    content: "";
    display: block;
    width: 60%; /* adjust width as necessary */
    margin: 10px auto 0; /* centers the line horizontally, adds space on top */
    border-bottom: 1px dashed #666; /* dashed line for signatures */
}




.widget-box {
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        margin-bottom: 20px;
        background: #ffffff;
        border-radius: 5px;
    }

    .widget-title {
        background-color: #4CAF50;
        color: #fff;
        padding: 10px 15px;
        border-radius: 5px 5px 0 0;
        font-size: 16px;
        font-weight: bold;
    }

    .widget-content {
        padding: 20px;
        background: #fafafa;
    }

    .table {
        width: 100%;
        margin-bottom: 20px;
        border-collapse: collapse;
    }

    .table-bordered {
        border: 1px solid #ddd;
    }

    .table thead th {
        vertical-align: bottom;
        border-bottom: 2px solid #dee2e6;
        background-color: #f9f9f9;
        font-size: 14px;
        font-weight: bold;
        color: #333;
        padding: 8px;
        text-align: center;
    }

    .table td, .table th {
        padding: 8px;
        line-height: 1.5;
        vertical-align: top;
        border-top: 1px solid #dee2e6;
        text-align: center;
    }

    .table-striped > tbody > tr:nth-of-type(odd) {
        background-color: rgba(0,0,0,.05);
    }

    .table-hover tbody tr:hover {
        color: #212529;
        background-color: rgba(0,0,0,.075);
    }






    .table {
        width: 100%;
        margin-bottom: 20px;
        border-collapse: collapse;
    }
    .table th, .table td {
        border: 1px solid #ddd;
        padding: 8px;
        text-align: left;
        font-size: 16px; /* Adjust font size as needed */
    }
    .table th {
        background-color: #f2f2f2;
        color: #333;
        font-weight: bold;
    }
    .table tr:nth-child(even){background-color: #f9f9f9;}
    .table tr:hover {background-color: #ddd;}

    .table-responsive {
        overflow-x: auto;
        margin-top: 20px;
        box-shadow: 0 2px 5px rgba(0,0,0,0.15);
    }

    /* Additional styling */
    address {
        margin-bottom: 20px;
        font-style: normal;
        line-height: 1.5;
    }

    .table td[colspan="3"] {
        text-align: center; /* Center align the text if it spans more columns */
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