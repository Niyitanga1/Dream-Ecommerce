<?php
session_start();

if(!$_SESSION['user_email'])
{

    header("Location: ../index.php");
}

?>

<?php
 include("config.php");
 extract($_SESSION); 
		  $stmt_edit = $DB_con->prepare('SELECT * FROM users WHERE user_email =:user_email');
		$stmt_edit->execute(array(':user_email'=>$user_email));
		$edit_row = $stmt_edit->fetch(PDO::FETCH_ASSOC);
		extract($edit_row);
		
		?>
		<?php
 include("config.php");
		  $stmt_edit = $DB_con->prepare("select sum(order_total) as total from orderdetails where user_id=:user_id and order_status='Ordered'");
		$stmt_edit->execute(array(':user_id'=>$user_id));
		$edit_row = $stmt_edit->fetch(PDO::FETCH_ASSOC);
		extract($edit_row);
		
		?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Dream Automobiles Ltd</title>

    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="font-awesome/css/font-awesome.min.css" />
    <link rel="stylesheet" type="text/css" href="css/local.css" />

    <script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
    <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
	
	
	<script type="text/javascript" src="jquery.fancybox.js?v=2.1.5"></script>
	<link rel="stylesheet" type="text/css" href="jquery.fancybox.css?v=2.1.5" media="screen" />
	
	<link rel="stylesheet" type="text/css" href="jquery.fancybox-buttons.css?v=1.0.5" />
	<script type="text/javascript" src="jquery.fancybox-buttons.js?v=1.0.5"></script>


	<link rel="stylesheet" type="text/css" href="jquery.fancybox-thumbs.css?v=1.0.7" />
	<script type="text/javascript" src="jquery.fancybox-thumbs.js?v=1.0.7"></script>


	<script type="text/javascript" src="jquery.fancybox-media.js?v=1.0.6"></script>
	
	<script type="text/javascript">
		$(document).ready(function() {
			/*
			 *  Simple image gallery. Uses default settings
			 */

			$('.fancybox').fancybox();

			/*
			 *  Different effects
			 */

			// Change title type, overlay closing speed
			$(".fancybox-effects-a").fancybox({
				helpers: {
					title : {
						type : 'outside'
					},
					overlay : {
						speedOut : 0
					}
				}
			});

			// Disable opening and closing animations, change title type
			$(".fancybox-effects-b").fancybox({
				openEffect  : 'none',
				closeEffect	: 'none',

				helpers : {
					title : {
						type : 'over'
					}
				}
			});

			// Set custom style, close if clicked, change title type and overlay color
			$(".fancybox-effects-c").fancybox({
				wrapCSS    : 'fancybox-custom',
				closeClick : true,

				openEffect : 'none',

				helpers : {
					title : {
						type : 'inside'
					},
					overlay : {
						css : {
							'background' : 'rgba(238,238,238,0.85)'
						}
					}
				}
			});

			// Remove padding, set opening and closing animations, close if clicked and disable overlay
			$(".fancybox-effects-d").fancybox({
				padding: 0,

				openEffect : 'elastic',
				openSpeed  : 150,

				closeEffect : 'elastic',
				closeSpeed  : 150,

				closeClick : true,

				
			});

			/*
			 *  Button helper. Disable animations, hide close button, change title type and content
			 */

			$('.fancybox-buttons').fancybox({
				openEffect  : 'none',
				closeEffect : 'none',

				prevEffect : 'none',
				nextEffect : 'none',

				closeBtn  : false,

				helpers : {
					title : {
						type : 'inside'
					},
					buttons	: {}
				},

				afterLoad : function() {
					this.title = 'Image ' + (this.index + 1) + ' of ' + this.group.length + (this.title ? ' - ' + this.title : '');
				}
			});


			/*
			 *  Thumbnail helper. Disable animations, hide close button, arrows and slide to next gallery item if clicked
			 */

			$('.fancybox-thumbs').fancybox({
				prevEffect : 'none',
				nextEffect : 'none',

				closeBtn  : false,
				arrows    : false,
				nextClick : true,

				helpers : {
					thumbs : {
						width  : 50,
						height : 50
					}
				}
			});

			/*
			 *  Media helper. Group items, disable animations, hide arrows, enable media and button helpers.
			*/
			$('.fancybox-media')
				.attr('rel', 'media-gallery')
				.fancybox({
					openEffect : 'none',
					closeEffect : 'none',
					prevEffect : 'none',
					nextEffect : 'none',

					arrows : false,
					helpers : {
						media : {},
						buttons : {}
					}
				});

			/*
			 *  Open manually
			 */

			$("#fancybox-manual-a").click(function() {
				$.fancybox.open('1_b.jpg');
			});

			$("#fancybox-manual-b").click(function() {
				$.fancybox.open({
					href : 'iframe.html',
					type : 'iframe',
					padding : 5
				});
			});

			$("#fancybox-manual-c").click(function() {
				$.fancybox.open([
					{
						href : '1_b.jpg',
						title : 'My title'
					}, {
						href : '2_b.jpg',
						title : '2nd title'
					}, {
						href : '3_b.jpg'
					}
				], {
					helpers : {
						thumbs : {
							width: 75,
							height: 50
						}
					}
				});
			});


		});
	</script>
	

   
    
</head>
<body>
    <div id="wrapper">
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
				<a class="navbar-brand" href="index.php">Dream Automobiles Ltd- Client Portal</a>
            </div>
            <div class="collapse navbar-collapse navbar-ex1-collapse">
			<ul class="nav navbar-nav side-nav">
                    <li class="active"><a href="index.php"> &nbsp; <span class='glyphicon glyphicon-home'></span> Home</a></li>
					<li><a href="shop.php?id=1"> &nbsp; <span class='glyphicon glyphicon-shopping-cart'></span> Shop </a></li>
					<li><a href="cart_items.php"> &nbsp; <span class='fa fa-cart-plus'></span> View Cart</a></li>
					<li><a href="orders.php"> &nbsp; <span class='glyphicon glyphicon-list-alt'></span> My Orders</a></li>
					<li><a href="#"> &nbsp; <span class='glyphicon glyphicon-list-alt'></span> Payments</a></li>
					
					<li><a href="logout.php"> &nbsp; <span class='glyphicon glyphicon-off'></span> Logout</a></li>
					
                    
                </ul>
                <ul class="nav navbar-nav navbar-right navbar-user">
                    
					
					
                     <li class="dropdown user-dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?php echo $user_email; ?><b class="caret"></b></a>
                        <ul class="dropdown-menu">
                           
                            <li class="divider"></li>
                            <li><a href="logout.php"><i class="fa fa-power-off"></i> Log Out</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>

      
				<div id="page-wrapper">

			 
			<div class="alert alert-default" style="color:white;background-color:#008CBA">
         <center><h3> <span class="glyphicon glyphicon-shopping-cart"></span> Shop Now</h3></center>
        </div>
			
		
<div class="header">
  
  <div class="header-right">
    <a class="active" href="#">Cars</a>
    <a href="MotoCycles.php">Moto Cycles</a>
    <a href="SpareParts.php">Spare Parts</a>
  </div>
</div>
					<br />
					

<?php







$conn=mysqli_connect("localhost","root","");
mysqli_select_db($conn,"dream_data");

$start=0;
$limit=8;

if(isset($_GET['id']))
{
	$id=$_GET['id'];
	$start=($id-1)*$limit;
}

$query=mysqli_query($conn,"select * from items LIMIT $start, $limit");


while($query2=mysqli_fetch_array($query))
{
	
	echo "<div class='col-sm-3'><div class='panel panel-default' style='border-color:#008CBA;'>
            <div class='panel-heading' style='color:white;background-color : #033c73;'>
            <center> 
<textarea style='text-align:center;background-color: white;' class='form-control' rows='1' disabled>".$query2['item_name']."</textarea>
			</center>
            </div>
            <div class='panel-body'>
           <a class='fancybox-buttons' href='../Admin/item_images/".$query2['item_image']."' data-fancybox-group='button' title='Page ".$query2['id']."- ".$query2['item_name']."'>
					
					<img src='../Admin/item_images/".$query2['item_image']."' class='img img-thumbnail'  style='width:350px;height:150px;' />
					</a>
				
					
					<center><h4> Price: Rwf  ".$query2['item_price']." </h4></center>
		
					
										<a class='btn btn-block btn-danger' href='add_to_cart.php?cart=".$query2['item_id']."'><span class='glyphicon glyphicon-shopping-cart'></span> Add to cart</a>
            </div>
          </div>
        </div>";
			
	
}

echo "<div class='container'>";
echo "</div>";




$rows=mysqli_num_rows(mysqli_query($conn,"select * from items"));
$total=ceil($rows/$limit);
echo "<br /><ul class='pager'>";
if($id>1)
{
	echo "<li><a style='color:white;background-color : #033c73;' href='?id=".($id-1)."'>Previous Page</a><li>";
}
if($id!=$total)
{
	echo "<li><a style='color:white;background-color : #033c73;' href='?id=".($id+1)."' class='pager'>Next Page</a></li>";
}
echo "</ul>";


echo "<center><ul class='pagination pagination-lg'>";
		for($i=1;$i<=$total;$i++)
		{
			if($i==$id) { echo "<li class='pagination active'><a style='color:white;background-color : #033c73;'>".$i."</a></li>"; }
			
	
			
			else { echo "<li><a href='?id=".$i."'>".$i."</a></li>"; }
		}
echo "</ul></center>";
?>
					
					
					
					
					
					
					
					<br />
			
			<div class="alert alert-default" style="background-color:#033c73;">
                       <p style="color:white;text-align:center;">
					   2021 Dream Automobiles Ltd| All Rights Reserved |  Design by : Top Tech 250

						</p>
                        
                    </div>
            
                </div>
            </div>

           

           
        </div>
		
		
		
    </div>
    <!-- /#wrapper -->

	
	<!-- Mediul Modal -->
        <div class="modal fade" id="setAccount" tabindex="-1" role="dialog" aria-labelledby="myMediulModalLabel">
          <div class="modal-dialog modal-sm">
            <div style="color:white;background-color:#008CBA" class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                
              </div>
              <div class="modal-body">
         
				
			
				
				
              </div>
            </div>
          </div>
        </div>
	  	  <script>
   
    $(document).ready(function() {
        $('#priceinput').keypress(function (event) {
            return isNumber(event, this)
        });
    });
  
    function isNumber(evt, element) {

        var charCode = (evt.which) ? evt.which : event.keyCode

        if (
            (charCode != 45 || $(element).val().indexOf('-') != -1) &&      
            (charCode != 46 || $(element).val().indexOf('.') != -1) &&      
            (charCode < 48 || charCode > 57))
            return false;

        return true;
    }    
</script>
</body>
</html>