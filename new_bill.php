<?php 
include 'header.php';

date_default_timezone_set('Asia/Calcutta'); 
$bill_time =  date("M jS, Y [h:i a]");

//assign new bill number..
$query = mysql_query("SELECT id FROM bill order by id DESC LIMIT 1 ");
$row = mysql_fetch_array($query);
//execute if there is any bill in bill table.
if(mysql_num_rows($query) > 0)
{
	$new_bill_number = $row['id'] + 1;
	$bill_number = "AWC_".$new_bill_number;
}
//if there is no row in bill table.
else{
	$bill_number = "AWC_1";
}

?>

<!-- end Main Head -->

<div class="dashboard">
	<div class="row">
	<div id="hidden-text" class="hide" ></div>
	<div class="hidden_div_serial_no hide">1</div>
	<div class="item_flag hide">false</div>

		<!-- View Stock Wrap -->
		<div class="large-12 columns viewstock">

		<!-- Search Heading -->
			<div class="row">
				<div class="large-4 large-centered columns" id="viewstock-heading">
					New Bill
				</div>
			</div>
		<!-- end Search Heading -->
	

		<!-- Customer Section -->
		<div class="row">
			<div class="large-12 columns">
				

				<!-- Customer name -->
				<div class="large-3 columns">
					<input type="text"  list="name_datalist"  autocomplete="off" id="customer_name"  value="" placeholder="Enter Customer Name">
					<datalist id="name_datalist">
						<?php
						$query_name = mysql_query("SELECT DISTINCT name FROM customer WHERE name != '' AND id != 1 AND status = 1");
						if(mysql_num_rows($query_name) > 0)
						{
							while($row_name = mysql_fetch_assoc($query_name))
							{
								echo '<option value="'.$row_name['name'].'">';
							}
						}
						?>
					</datalist>
				</div>
				<!--End Customer name -->

				<!-- Customer Mobile -->
				<div class="large-3 columns">
					<input type="text" list="mobile_datalist"  autocomplete="off" autofocus pattern="[0-9]{10}" maxlength="10" id="customer_mobile" value="" placeholder="Enter Customer Mobile">
					<datalist id="mobile_datalist">
						<?php
						$query_phone = mysql_query("SELECT phone_no FROM customer WHERE phone_no != '' AND id != 1 AND status = 1");
						if(mysql_num_rows($query_phone) > 0)
						{
							while($row_phone = mysql_fetch_assoc($query_phone))
							{
								echo '<option value="'.$row_phone['phone_no'].'">';
							}
						}
						?>
					</datalist>
				</div>

				<!--End Customer Mobile -->

				<!-- Customer Email -->
				<div class="large-3 columns">
					<input type="email" list="email_datalist"  autocomplete="off" id="customer_email" value="" placeholder="Enter Customer Email">
					<datalist id="email_datalist">
						<?php
						$query_email = mysql_query("SELECT DISTINCT email FROM customer WHERE email != '' AND id != 1 AND status = 1");
						if(mysql_num_rows($query_email) > 0)
						{
							while($row_email = mysql_fetch_assoc($query_email))
							{
								echo '<option value="'.$row_email['email'].'">';
							}
						}
						?>
					</datalist>
				</div>
				<!--End Customer Email -->

				<!-- Customer Address -->
				<div class="large-3 columns">
					<input type="text" id="customer_address" value="" placeholder="Enter Customer Address">
				</div>
				<!--End Customer Address -->

			</div>
		</div>
		<!--End Customer Section -->

		<!-- Start Billing Section -->
		<div class="row">
			<div class="large-12 columns">
				
				<center>
					<table class="billing_table">
						<thead>
							<tr>
								<th><center> S.No. </center></th>
								<th><center> Product Name </center></th>
								<th><center> Brand </center></th>
								<th><center> Size </center></th>
								<th><center> Type </center></th>
								<th><center> Price </center></th>
								<th><center> Quantity </center></th>
								<th><center> Discount (%) </center></th>
								<th><center> Disc Amt. </center></th>
								<th><center> Amount </center></th>
								<th class="close_th"></th>
							</tr>
						</thead>
						<tbody class="billing_tbody">
							<tr>
								<td class="serial_no"></td>
								<td><input type="text" class="product_name"></td>
								<td><input type="text" class="brand"></td>
								<td><input type="number" class="size" min="1"></td>
								<td><input type="text" class="type" placeholder="M/F"></td>
								<td><input type="text" class="price" readonly></td>
								<td><input type="number" class="quantity" readonly min="1" value="1"></td>
								<td><input type="text" class="item_discount" value="0"></td>
								<td><span class="WebRupee">Rs. </span><span class="disc_amt"></span></td>
								<td><span class="WebRupee">Rs. </span><span class="amount"></span></td>
								<td class="close"></td>
								<td class="product_id hide"></td>
							</tr>
							 

						</tbody>
							
					</table>

				</center>

				<div class="row">
					<div class="large-12 columns">
						<div>
							<fieldset id="billing_payment_details">
							  	<legend>Payment Details</legend>
							  	<div class="row">
							  		<div class="large-2 large-offset-5 columns total_qty">
							  			<span class="text_field">Total Qty : </span><span class="value_field" id="total_quantity"></span>
							  		</div>
							  		<div class="large-2 large-offset-1 columns end sub_total">
							  			<span class="text_field">Sub Total : </span>
							  		</div>
							  		<div class="large-2 columns sub_total">
							  		<span class="WebRupee">Rs. </span><span class="value_field" id="sub_total"></span>
							  		</div>
							  	</div>
							  	<div class="row discount">
							  		<div class="large-2 columns large-offset-8 text-field">
							  			Discount ( % )
							  		</div>
							  		<div class="large-2 columns end input_field">
							  			<input type="text" value="0" id="main_discount">
							  		</div>
							  	</div>

							  	<div class="row grand_total">
							  		<div class="large-2 columns text-field">
							  			Total Payable : 
							  		</div>
							  		<div class="large-6 columns" id="amount_in_words">
							  			
							  		</div>
							  		<div class="large-2 columns  text-field">
							  			Grand Total
							  		</div>
							  		<div class="large-2 columns end input_field " >
							  			<span class="WebRupee">Rs. </span><span id="grand_total"></span>
							  		</div>
							  	</div>
							  	<div class="row pay">
							  		<div class="large-2 columns large-offset-8 text-field">
							  			Pay : 
							  		</div>
							  		<div class="large-2 columns end input_field">
							  			<input type="text" id="pay" value="0">
							  		</div>
							  	</div>
								
								<div class="row pay" id="return_row" style="display:none">
							  		<div class="large-2 columns large-offset-8 text-field">
							  			Return : 
							  		</div>
							  		<div class="large-2 columns end input_field">
							  			<span class="WebRupee">Rs. </span><span id="return_amount"></span>
							  		</div>
							  	</div>

							  	<div class="row pay" id="due_row" style="display:none">
							  		<div class="large-2 columns large-offset-8 text-field">
							  			Due :  
							  		</div>
							  		<div class="large-2 columns end input_field">
							  			<span class="WebRupee">Rs. </span><span id="due_amount"></span>
							  		</div>
							  	</div>
							  	<div class="row">
							  		<div class="large-2 columns large-centered">
							  			<button id="submit_btn">Submit</button>
							  		</div>
							  	</div>

							</fieldset>
						</div>	
					</div>
				</div>

			</div>	
		</div>
		<!-- End Billing Section -->


	</div> <!-- end row -->
</div> <!-- end dashboard -->


<!-- start bill modal -->
<div id="bill_display" class="reveal-modal" style="margin-top:-85px;">
	<div class="row bill_modal">
		<div class="large-12 columns heading">
			<div class="header">
				<center class="cash_invoice">Cash Invoice</center>
				<!-- main heading -->
				<div class="row heading_row">
					<div class="large-3 columns tin_no">
						
						TIN No :- <span>08010979311c</span>
						
					</div>
					<div class="large-6 columns ">
						<div class="row">
							<div class="large-12 columns main_heading">
								Sampoorn
							</div>
						</div>
						<div class="row">
							<div class="large-12 columns address">
								A-249 Lajpat Nagar, Sahibabad, Ghaziabad (U.P.)
							</div>
						</div>

					</div>
					<div class="large-3 columns end phone_no">
						Mobile No :- <span>+91-9871198786</span>
					</div>
				</div>
				<!-- main heading -->
				</div>
			<div class="bill_detail">
				<!-- customer detail -->
				<div class="row customer_detail">
					<div class="large-2 columns customer_name_heading">
						Customer Name : 
					</div>
					<div class="large-2 columns customer_name" style="border:1px solid #fff">
						
					</div>
					<div class="large-2 columns customer_mobile_heading">
						Customer Mobile :
					</div>
					<div class="large-2 columns customer_mobile" style="border:1px solid #fff">
						
					</div>
					
					<div class="large-4 columns end ">
						<div class="row">
							<div class="large-4 columns bill_date_heading">
								Bill Date :
							</div>
							<div class="large-8 columns end bill_date" >
								<?php echo $bill_time; ?>
							</div>
						</div>
					</div>
				</div>

				<!--end customer detail -->
				<!-- customer detail -->
				<div class="row customer_detail second_detail_row">
					<div class="large-2 columns end customer_name_heading">
						Customer Email : 
					</div>
					<div class="large-2 columns end customer_email " style="border:1px solid #fff">
					
					</div>
					<div class="large-2 columns end customer_mobile_heading">
						Customer Address :
					</div>
					<div class="large-2 columns end customer_address" style="border:1px solid #fff">

					</div>
					
					<div class="large-4 columns">
						<div class="row">
							<div class="large-4 columns bill_date_heading">
								Bill No :
							</div>
							<div class="large-8 columns end" >
								<?php echo $bill_number; ?>
							</div>
						</div>
					</div>
				</div>

				<!--end customer detail -->
			</div>

			<center>
					<table>
						<thead>
							<tr>
								<th><center> S.No. </center></th>
								<th><center> Product Name </center></th>
								<th><center> Brand </center></th>
								<th><center> Size </center></th>
								<th><center> type </center></th>
								<th><center> Price </center></th>
								<th><center> Quantity </center></th>
								<th><center> Discount (%) </center></th>
								<th><center> Disc Amt. </center></th>
								<th><center> Amount </center></th>
							</tr>
						</thead>
						<tbody class="table_body_modal">
							
						</tbody>
					</table>
				</center>


			<div class="row payment_detail_modal">
					<div class="large-12 columns">
						<fieldset>
						  	<legend>Payment Details</legend>
						  	<div class="row">
						  		<div class="large-2 columns">
						  			<span class="total_qty">Total Qty : </span><span class="total_item_modal"></span>
						  		</div>
						  		<div class="large-2 large-offset-6 columns sub_total">
						  			<span>Sub Total : </span>
						  		</div>
						  		<div class="large-2 columns end sub_total">
						  		<span class="WebRupee">Rs. </span><span class="sub_total_modal"></span>
						  		</div>
						  	</div>
						  	<div class="row discount">
						  		<div class="large-2 columns large-offset-8">
						  			Main Discount :
						  		</div>
						  		<div class="large-2 columns end" >
						  			<span class="main_discount_modal"></span><span> %</span>
						  		</div>
						  	</div>

						  	<div class="row grand_total">
						  		<div class="large-2 columns total_payable">
						  			Total Payable : 
						  		</div>
						  		<div class="large-6 columns amount_in_words_modal" >
						  			
						  		</div>
						  		<div class="large-2 columns grand_total_text">
						  			Grand Total :
						  		</div>
						  		<div class="large-2 columns end grand_total_text " >
						  			<span class="WebRupee">Rs. </span><span class="grand_total_amount"></span>
						  		</div>
						  	</div>	

						  	<div class="row grand_total">
						  		
						  		<div class="large-2 columns large-offset-8 grand_total_text">
						  			Pay :
						  		</div>
						  		<div class="large-2 columns end grand_total_text " >
						  			<span class="WebRupee">Rs. </span><span class="total_pay_amount"></span>
						  		</div>
						  	</div>

						  	<div class="row grand_total hide bill_due_amount">
						  		
						  		<div class="large-2 columns large-offset-8 grand_total_text">
						  			Due :
						  		</div>
						  		<div class="large-2 columns end grand_total_text " >
						  			<span class="WebRupee">Rs. </span><span class="total_due_amount"></span>
						  		</div>
						  	</div>
											
							
						</fieldset>
					</div>
				</div>
				
				<div class="row">
					<div class="large-2 columns large-centered">
						<button id="print_btn">Print</button>
					</div>
				</div>
		

		</div> <!--end large-12 columns-->
	</div><!-- end row -->
<a class="close-reveal-modal">&#215;</a>

</div>
<!-- end bill modal -->


<!-- Include Common Footer -->
<?php include 'footer.php' ?>
<!-- end Include Common Footer -->


<script type="text/javascript">


//function for convert number to word format..
function numtoword()
{
	var number= $("#grand_total").text();
	var grand_total = number.split(".");
	var numbr = parseInt(grand_total['0']);
	var str=new String(numbr)   
	var splt=str.split("");
	var rev=splt.reverse();
	var once=['Zero', ' One', ' Two', ' Three', ' Four',  ' Five', ' Six', ' Seven', ' Eight', ' Nine'];
	var twos=[' Ten', ' Eleven', ' Twelve', ' Thirteen', ' Fourteen', ' Fifteen', ' Sixteen', ' Seventeen', ' Eighteen', ' Nineteen'];
	var tens=[ '', ' Ten', ' Twenty', ' Thirty', ' Forty', ' Fifty', ' Sixty', ' Seventy', ' Eighty', ' Ninety' ];
	numlen=rev.length;
	var word=new Array();

	var j=0;   
	for(i=0;i<numlen;i++)
	{
		switch(i)
		{
			case 0:
				if((rev[i]==0) || (rev[i+1]==1))
				{
					word[j]='';                    
				}
				else
				{
				word[j]=" "+once[rev[i]]+" ";
				}
				word[j]=word[j] ;

				break;
        	
        	case 1:
            	abovetens();  
                break;
            
            case 2:
                if(rev[i]==0)
                {
            	    word[j]='';
                } 
               	else if((rev[i-1]==0) || (rev[i-2]==0) )
                {
                	word[j]=once[rev[i]]+" Hundred ";                
                }
                else 
                {
                    word[j]=once[rev[i]]+" Hundred and ";
                } 
               	break;
            
            case 3:
				if(rev[i]==0 || rev[i+1]==1)
				{
					word[j]='';                    
				} 
				else
				{
					word[j]=once[rev[i]];
				}
				if((rev[i+1]!=0) || (rev[i] > 0))
				{
					word[j]= word[j]+" Thousand ";
				}
				break;  

            	case 4:
                	abovetens(); 
                    break;  
           
              	case 5:
					if((rev[i]==0) || (rev[i+1]==1))
					{
						word[j]='';                    
					} 
					else
					{
						word[j]=once[rev[i]];
					}
					word[j]=word[j]+" Lakhs ";
					break;  
          
        		case 6:
                	abovetens(); 
                    break;
         
          		case 7:
					if((rev[i]==0) || (rev[i+1]==1))
					{
						word[j]='';                    
					} 
					else
					{
						word[j]=once[rev[i]];
					}
					word[j]= word[j]+"Crore";
				    break;  
          
				case 8:
					abovetens(); 
					break;    
				default:
					break;
        }//end switch
       
        j++;  
       
    }//end for loop
  
	function abovetens()
	{
	    if(rev[i]==0)
	    {
	    	word[j]='';
	    }
		else if(rev[i]==1)
	    {
	    	word[j]=twos[rev[i-1]];
	    }
		else
		{
			word[j]=tens[rev[i]];
		}
	}//close function

	word.reverse();
	var finalw='';
	for(i=0;i<numlen;i++)
	{

	  finalw= finalw+word[i];

	}
	if(finalw != ""){
	finalw = finalw+" Only"
	}

	$("#billing_payment_details #amount_in_words").text(finalw);
	
}//close main function numtoword




//script for autofill customer details when mobile number is entered...
$("#customer_mobile").focusout(function() {
	var customer_mobile = $("#customer_mobile").val();
	//execute if customer mobile is not empty..
	if(customer_mobile != "")
	{
		$.ajax({
				type : "POST",
				url : "newbill_ajax.php",
				data : {customermobile : customer_mobile},
				success : function(result){
					if(result != "fail"){
						var result_row = eval(result);
						$("#customer_name").val(result_row[0]);
						$("#customer_email").val(result_row[1]);
						$("#customer_address").val(result_row[2]);
					}//end if condition
				}//end success
			})//end ajax

	}//end if condition
});//end focusout event


//check if press enter key in customer name textbox then
// customer mobile number textbox is focused..!
$("#customer_name").keyup(function(event) {
	if(event.which == 13)
	$("#customer_mobile").focus().select();
});

//check if press enter key in customer mobile number textbox then
// customer email address textbox is focused..!
$("#customer_mobile").keyup(function(event) {
	if(event.which == 13)
	$("#customer_email").focus().select();
});

//check if press enter key in customer email address textbox then
// customer address textbox is focused..!
$("#customer_email").keyup(function(event) {
	if(event.which == 13)
	$("#customer_address").focus().select();
});

//check if press enter key in customer address textbox then 
//focus first columns of first row in billing table means first product barcode
$("#customer_address").keyup(function(event) {
	if(event.which == 13)
	//focus first column of first row in billing table
	$(".billing_tbody").children().children().children('.product_name').focus();
});

$("#customer_mobile").keypress(function(e){
	//if the letter is not digit then display error and don't type anything
	if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
		return false;
	}
});//end keypress of customer_mobile

//script for serial number auto increment in billing form
$(".billing_table tbody tr").each(function(id){
	$(this).children('.serial_no').html(id+1);	
});

//when click on X button into modal then close modal
$('.close-reveal-modal').click(function(){
	$(this).foundation('reveal', 'close');
});

//check if press key in product name textbox then
//focus brand name textbox
$(".billing_tbody").on("keyup",".product_name",function(event){
	//check event for enter key
	if(event.which == 13)
	{
		//focus brand name textbox.
		$(this).parent().next().children('.brand').focus();
	}
	var product_name = $(this).val();
	if(product_name != "")
	{
		//remove readonly form price textbox
		$(this).parent().next().next().next().next().children('.price').removeAttr('readonly', true);
		//remove readonly form quantity textbox
		$(this).parent().next().next().next().next().next().children('.quantity').removeAttr('readonly', true);
	}
	//if delete product name.. that means product name is empty..
	else
	{
		$(this).parent().next().children('.brand').val("");
		$(this).parent().next().next().children('.size').val("");
		$(this).parent().next().next().next().children('.type').val("");

		//assign readonly form price textbox
		$(this).parent().next().next().next().next().children('.price').val("");
		$(this).parent().next().next().next().next().children('.price').attr('readonly', true);
		//assign readonly in quantity textbox
		$(this).parent().next().next().next().next().next().children('.quantity').val("1");
		$(this).parent().next().next().next().next().next().children('.quantity').attr('readonly', true);

		$(this).parent().next().next().next().next().next().next().children('.item_discount').val("0");
		$(this).parent().next().next().next().next().next().next().next().children('.disc_amt').text("");
		$(this).parent().next().next().next().next().next().next().next().next().children('.amount').text("");

		//insert close button and remove_item class
		$(this).parent().next().next().next().next().next().next().next().next().next('.close').html("").removeClass('remove_item');

		//update total quantity..
		var total_quantity = 0;
		$(".billing_table .billing_tbody .product_name").each(function(){
			var product_name = $(this).val();
			if(product_name != "")
			{
				var quantity = $(this).parent().next().next().next().next().next().children('.quantity').val();
				quantity = parseInt(quantity);
				total_quantity = total_quantity + quantity;
			}
		});
		$("#billing_payment_details #total_quantity").text(total_quantity);
		//End update total quantity..


		//update subtotal amout..
		var sub_total = 0;
		$(".billing_table .billing_tbody .product_name").each(function(){
			var product_name = $(this).val();
			if(product_name != "")
			{
				var price = $(this).parent().next().next().next().next().children('.price').val();
				if(price != "")
				{
					var item_amount = $(this).parent().next().next().next().next().next().next().next().next().children('.amount').text();
					item_amount = parseFloat(item_amount);
					sub_total = parseFloat(sub_total) + item_amount;
				}

			}
		})
		sub_total = sub_total.toFixed(2);
		$("#billing_payment_details #sub_total").text(sub_total);
		//end update subtotal amount..

		//update grand_total amount
		var sub_total = $("#billing_payment_details #sub_total").text();
		if(sub_total != "")
		{
			sub_total = parseFloat(sub_total);
			var main_discount = $("#billing_payment_details #main_discount").val();
			if(main_discount == "")
			main_discount = 0;
			else
			main_discount = parseFloat(main_discount);
			var discount_amount = (sub_total * main_discount) / 100;
			var grand_total = sub_total - discount_amount;
			grand_total = Math.round(grand_total).toFixed(2);
			$("#billing_payment_details #grand_total").text(grand_total);
		}
		numtoword();
		//end update grand_total amount


		//update return_amount and due amount
		var grand_total = $("#billing_payment_details #grand_total").text();
		var pay = $("#billing_payment_details #pay").val();
		//check if pay amount and grand total amount is not empty
		if(pay != "" && grand_total != ""){
			var grand_total = parseFloat(grand_total);
			var pay = parseInt(pay);
			if(pay >= grand_total)
			{
				var return_amount = pay - grand_total;
				$("#billing_payment_details #return_row").show()
				$("#billing_payment_details #due_row").hide();
				$("#billing_payment_details #return_amount").text(return_amount.toFixed(2));
				$("#billing_payment_details #due_amount").text("0.00");
			}
			else if(pay < grand_total)
			{
				var due_amount = grand_total - pay;
				$("#billing_payment_details #due_row").show();
				$("#billing_payment_details #return_row").hide();
				$("#billing_payment_details #due_amount").text(due_amount.toFixed(2));
				$("#billing_payment_details #return_amount").text("0.00");
			}
		}//close if condition for check pay and grand total is not empty
		//end update return_amount and due amount
	}
});

// when focusout from product_name textbox
$(".billing_tbody").on("focusout",".product_name",function(event){

	//if this product name is empty..
	var last_serial_no = $(".billing_tbody tr").last().children('.serial_no').text();
	var this_serial_no = $(this).parent().prev('.serial_no').text();
	
	//if last row serial no and this row serial no is not same..
	// that means it is not applicable at last row
	if(last_serial_no != this_serial_no)
	{
		//if product name is empty..
		if($(this).val() == "")
		{
			//fetch last row product name..
			var lastrow_product_name = $(".billing_tbody tr").last().children().children('.product_name').val();
			//if last row product name is empty
			if(lastrow_product_name == "")
			{
				//remove that row..
				$(this).parent().parent().remove();

				//script for serial number auto increment in billing form
				$(".billing_table tbody tr").each(function(id){
					$(this).children('.serial_no').html(id+1);	
				});
			}
		}
	}
	

});
//End when focusout from product_name textbox



//check if press key in brand of product textbox then
//focus size textbox
$(".billing_tbody").on("keyup",".brand",function(event){
	//check event for enter key
	if(event.which == 13)
	{
		//focus size textbox.
		$(this).parent().next().children('.size').focus();
	}
});

//check if press key in size of product textbox then
//focus type textbox
$(".billing_tbody").on("keyup",".size",function(event){
	//check event for enter key
	if(event.which == 13)
	{
		//focus type textbox.
		$(this).parent().next().children('.type').focus();
	}
});

$(".billing_tbody").on("keypress",".size",function(event){
	//if the letter is not digit then display error and don't type anything
	if (event.which != 8  && (event.which < 48 || event.which > 57)) {
		return false;
	}
});

$(".billing_tbody").on("focusout",".size",function(event){
	if(parseFloat($(this).val()) == "0")
	$(this).val("0");
});

//check if press key in type textbox then
//focus price textbox
$(".billing_tbody").on("keyup",".type",function(event){
	//check event for enter key
	if(event.which == 13)
	{
		//focus price textbox.
		$(this).parent().next().children('.price').focus();
	}
	var type = $(this).val();
	type = type.charAt(0).toUpperCase() + type.slice(1);
	$(this).val(type);
});

//check if press key in price textbox 
$(".billing_tbody").on("keypress",".price",function(event){
	//if entered key is not digit then display error and don't type anything
	if (event.which != 8 && event.which != 0 && event.which != 46 && (event.which < 48 || event.which > 57)) {
		return false;
	}
	//when press dot 
	if(event.which == 46)
	{
		//check if one dot is exist in string then return false
		if($(this).val().indexOf('.') !== -1)
		{
			return false
		}
	}
	//if only one digit is enter in price textbox
	if( $(this).val().length == 1 )
	{
		//if there is only one dot and it is starting digit then return 0.
		if($(this).val().indexOf('.') !== -1)
		{
			$(this).val("0.");
		}
	}
});

$(".billing_tbody").on("focusout",".price",function(event){
	var product_name = $(this).parent().prev().prev().prev().prev().children('.product_name').val();
	if(product_name == "")
	{
		$(this).val("");
	}
});

//check if press key in price textbox 
$(".billing_tbody").on("keyup",".price",function(event){
	//check event for enter key
	if(event.which == 13)
	{
		var product_name = $(this).parent().prev().prev().prev().prev().children('.product_name').val();
		//if product name is empty
		if(product_name == "")
		{
			$(this).parent().next().children('.quantity').focus();
		}
		//if product name is filled
		else
		{
			//if price value is empty
			if($(this).val() == "")
			{
				return false;
			}
			//if price value is not empty then focus on quantity..
			else
			{
				$(this).parent().next().children('.quantity').focus();
			}
		}
	}

	//when there is 2 value and first value is 0 then remove 0 and assign second value..
	if($(this).val().length == 2)
	{
		if($(this).val() != "0.")
		{
			if($(this).val()[0] == '0')
			{
				$(this).val($(this).val()[1])
			}
		}
	}


	// update item_discount_amount and item_amount
	var price = $(this).val();
	if(price == "")
	var price = 0;
	else
	var price = parseFloat(price);
	var quantity = parseFloat($(this).parent().next().children('.quantity').val());
	var discount_item = parseFloat($(this).parent().next().next().children('.item_discount').val());

	var item_total_amount = price * quantity;
	var item_discount_amount = (item_total_amount * discount_item) / 100;
	var item_amount = item_total_amount - item_discount_amount;

	var item_discount_amount = item_discount_amount.toFixed(2);
	var item_amount = item_amount.toFixed(2);

	$(this).parent().next().next().next().children('.disc_amt').text(item_discount_amount);
	$(this).parent().next().next().next().next().children('.amount').text(item_amount);
	//End update item_discount_amount and item_amount


	//update total quantity..
	var total_quantity = 0;
	$(".billing_table .billing_tbody .product_name").each(function(){
		var product_name = $(this).val();
		if(product_name != "")
		{
			var quantity = $(this).parent().next().next().next().next().next().children('.quantity').val();
			quantity = parseInt(quantity);
			total_quantity = total_quantity + quantity;
		}
	});
	$("#billing_payment_details #total_quantity").text(total_quantity);
	//End update total quantity..


	//update subtotal amout..
	var sub_total = 0;
	$(".billing_table .billing_tbody .product_name").each(function(){
		var product_name = $(this).val();
		if(product_name != "")
		{
			var price = $(this).parent().next().next().next().next().children('.price').val();
			if(price != "")
			{
				var item_amount = $(this).parent().next().next().next().next().next().next().next().next().children('.amount').text();
				item_amount = parseFloat(item_amount);
				sub_total = parseFloat(sub_total) + item_amount;
			}

		}
	})
	sub_total = sub_total.toFixed(2);
	$("#billing_payment_details #sub_total").text(sub_total);
	//end update subtotal amount..


	//update grand_total amount
	var sub_total = $("#billing_payment_details #sub_total").text();
	if(sub_total != "")
	{
		sub_total = parseFloat(sub_total);
		var main_discount = $("#billing_payment_details #main_discount").val();
		if(main_discount == "")
		main_discount = 0;
		else
		main_discount = parseFloat(main_discount);
		var discount_amount = (sub_total * main_discount) / 100;
		var grand_total = sub_total - discount_amount;
		grand_total = Math.round(grand_total).toFixed(2);
		$("#billing_payment_details #grand_total").text(grand_total);
	}
	numtoword();
	//end update grand_total amount


	//update return_amount and due amount
	var grand_total = $("#billing_payment_details #grand_total").text();
	var pay = $("#billing_payment_details #pay").val();
	//check if pay amount and grand total amount is not empty
	if(pay != "" && grand_total != ""){
		var grand_total = parseFloat(grand_total);
		var pay = parseInt(pay);
		if(pay >= grand_total)
		{
			var return_amount = pay - grand_total;
			$("#billing_payment_details #return_row").show()
			$("#billing_payment_details #due_row").hide();
			$("#billing_payment_details #return_amount").text(return_amount.toFixed(2));
			$("#billing_payment_details #due_amount").text("0.00");
		}
		else if(pay < grand_total)
		{
			var due_amount = grand_total - pay;
			$("#billing_payment_details #due_row").show();
			$("#billing_payment_details #return_row").hide();
			$("#billing_payment_details #due_amount").text(due_amount.toFixed(2));
			$("#billing_payment_details #return_amount").text("0.00");
		}
	}//close if condition for check pay and grand total is not empty
	//end update return_amount and due amount

});


$(".billing_tbody").on("keypress",".quantity",function(event){
	//if the letter is not digit then display error and don't type anything
	if (event.which != 8  && (event.which < 48 || event.which > 57)) {
		return false;
	}
});

//check if press key in quantity textbox 
$(".billing_tbody").on("keyup",".quantity",function(event){
	//check event for enter key
	if(event.which == 13)
	{
		$(this).parent().next().children('.item_discount').focus();
	}

	//if there is 0 quantity assigned then show alert..
	if($(this).val().length == 1)
	{
		if($(this).val() == '0')
		{
			$(this).val("1");
			alert("You Can't Assign '0' Quantity..!");
		}
	}
	//if there is blank in quantity field..
	if($(this).val() == '')
	{
		$(this).val("1");
		alert("You Can't Assign Blank Quantity..!");
	}

	//when there is 2 value and first value is 0 then remove 0 and assign second value..
	if($(this).val().length == 2)
	{
		if($(this).val() != "0.")
		{
			if($(this).val()[0] == '0')
			{
				$(this).val($(this).val()[1])
			}
		}
	}

	//update total quantity..
	var total_quantity = 0;
	$(".billing_table .billing_tbody .product_name").each(function(){
		var product_name = $(this).val();
		if(product_name != "")
		{
			var quantity = $(this).parent().next().next().next().next().next().children('.quantity').val();
			quantity = parseInt(quantity);
			total_quantity = total_quantity + quantity;
		}
	});
	$("#billing_payment_details #total_quantity").text(total_quantity);
	//End update total quantity..
});

//check if quantity changed of any item 
$(".billing_tbody").on("change",".quantity",function(event){
	
	// update item_discount_amount and item_amount
	var price = $(this).parent().prev().children('.price').val();
	if(price == "")
	var price = 0;
	else
	var price = parseFloat(price);
	var quantity = parseFloat($(this).val());
	var discount_item = parseFloat($(this).parent().next().children('.item_discount').val());

	var item_total_amount = price * quantity;
	var item_discount_amount = (item_total_amount * discount_item) / 100;
	var item_amount = item_total_amount - item_discount_amount;
	var item_discount_amount = item_discount_amount.toFixed(2);
	var item_amount = item_amount.toFixed(2);

	$(this).parent().next().next().children('.disc_amt').text(item_discount_amount);
	$(this).parent().next().next().next().children('.amount').text(item_amount);
	//End update item_discount_amount and item_amount


	//update total quantity..
	var total_quantity = 0;
	$(".billing_table .billing_tbody .product_name").each(function(){
		var product_name = $(this).val();
		if(product_name != "")
		{
			var quantity = $(this).parent().next().next().next().next().next().children('.quantity').val();
			quantity = parseInt(quantity);
			total_quantity = total_quantity + quantity;
		}
	});
	$("#billing_payment_details #total_quantity").text(total_quantity);
	//End update total quantity..


	//update subtotal amout..
	var sub_total = 0;
	$(".billing_table .billing_tbody .product_name").each(function(){
		var product_name = $(this).val();
		if(product_name != "")
		{
			var price = $(this).parent().next().next().next().next().children('.price').val();
			if(price != "")
			{
				var item_amount = $(this).parent().next().next().next().next().next().next().next().next().children('.amount').text();
				item_amount = parseFloat(item_amount);
				sub_total = parseFloat(sub_total) + item_amount;
			}

		}
	})
	sub_total = sub_total.toFixed(2);
	$("#billing_payment_details #sub_total").text(sub_total);
	//end update subtotal amount..

	//update grand_total amount
	var sub_total = $("#billing_payment_details #sub_total").text();
	if(sub_total != "")
	{
		sub_total = parseFloat(sub_total);
		var main_discount = $("#billing_payment_details #main_discount").val();
		if(main_discount == "")
		main_discount = 0;
		else
		main_discount = parseFloat(main_discount);
		var discount_amount = (sub_total * main_discount) / 100;
		var grand_total = sub_total - discount_amount;
		grand_total = Math.round(grand_total).toFixed(2);
		$("#billing_payment_details #grand_total").text(grand_total);
	}
	numtoword();
	//end update grand_total amount


	//update return_amount and due amount
	var grand_total = $("#billing_payment_details #grand_total").text();
	var pay = $("#billing_payment_details #pay").val();
	//check if pay amount and grand total amount is not empty
	if(pay != "" && grand_total != ""){
		var grand_total = parseFloat(grand_total);
		var pay = parseInt(pay);
		if(pay >= grand_total)
		{
			var return_amount = pay - grand_total;
			$("#billing_payment_details #return_row").show()
			$("#billing_payment_details #due_row").hide();
			$("#billing_payment_details #return_amount").text(return_amount.toFixed(2));
			$("#billing_payment_details #due_amount").text("0.00");
		}
		else if(pay < grand_total)
		{
			var due_amount = grand_total - pay;
			$("#billing_payment_details #due_row").show();
			$("#billing_payment_details #return_row").hide();
			$("#billing_payment_details #due_amount").text(due_amount.toFixed(2));
			$("#billing_payment_details #return_amount").text("0.00");
		}
	}//close if condition for check pay and grand total is not empty
	//end update return_amount and due amount
});



$(".billing_tbody").on("keypress",".item_discount",function(event){
	
	//if the letter is not digit then display error and don't type anything
	if (event.which != 8  && event.which != 46 && (event.which < 48 || event.which > 57)) {
		return false;
	}

	//when press dot key
	if(event.which == 46)
	{
		//check if one dot is exist in string then return false
		if($(this).val().indexOf('.') !== -1)
			return false;
	}

	//if only one digit is enter in price textbox
	if( $(this).val().length == 1 )
	{
		//if there is only one dot and it is starting digit then return 0.
		if($(this).val().indexOf('.') !== -1)
		{
			$(this).val("0.");
		}
	}


})

//check if press key in item_discount textbox 
$(".billing_tbody").on("keyup",".item_discount",function(event){
	//check event for enter key
	if(event.which == 13)
	{
		//get product_name and price
		var product_name = $(this).parent().prev().prev().prev().prev().prev().prev().children('.product_name').val();
		var price = $(this).parent().prev().prev().children('.price').val();

		// check if product_name is not empty
		if(product_name != "")
		{
			// check if price is not empty
			if(price != "")
			{
				//get last row product_name
				var lastrow_product_name = $(".billing_tbody tr").last().children().children('.product_name').val();
				//if last row product name is not empty then append new row and add close button.
				if(lastrow_product_name != "")
				{
					//new row append into billing_tbody
					var new_row = '<tr> <td class="serial_no"></td> <td><input type="text" class="product_name"></td> <td><input type="text" class="brand"></td> <td><input type="number" class="size" min="1"></td> <td><input type="text" class="type" placeholder="M/F"></td> <td><input type="text" class="price" readonly></td> <td><input type="number" class="quantity" readonly min="1" value="1"></td> <td><input type="text" class="item_discount" value="0"></td> <td><span class="WebRupee">Rs. </span><span class="disc_amt"></span></td> <td><span class="WebRupee">Rs. </span><span class="amount"></span></td> <td class="close"></td> <td class="product_id hide"></td> </tr>';
					$(".billing_table .billing_tbody").append(new_row);

					//insert close button and remove_item class
					$(this).parent().next().next().next('.close').html("<center><span>x</span></center>").addClass('remove_item');

					//script for serial number auto increment in billing form
					$(".billing_table tbody tr").each(function(id){
						$(this).children('.serial_no').html(id+1);	
					});
				}

			}
			
		}
		
		var product_name = $(this).parent().prev().prev().prev().prev().prev().prev().children('.product_name').val();
		var price = $(this).parent().prev().prev().children('.price').val();
		//if this product name is empty then focus on main discount
		if(product_name == "")
		{
			//if price is empty then focus on main discount textbox..
			if(price =="")
			{
				$("#billing_payment_details #main_discount").focus();
			}
			//if price is not empty then focus on new row product name textbox.
			else
			{
				$(this).parent().parent().next().children().children('.product_name').focus();
			}
		}
		//if product name is not empty..
		else
		{
			//if price is empty then focus on price
			if(price =="")
			{
				$(this).parent().prev().prev().children('.price').focus();
			}
			//if price is not empty then focus on new row product name text box..
			else
			{
				$(this).parent().parent().next().children().children('.product_name').focus();
			}
		}

	}//end if condition for check if enter key is pressed..


	//when this value is greater than 100 then return 0
	if(parseInt($(this).val()) > 100)
	{
		$(this).val("0");
	}
	//when there is 2 value and first value is 0 then remove 0 and assign second value..
	if($(this).val().length == 2)
	{
		if($(this).val() != "0.")
		{
			if($(this).val()[0] == '0')
			{
				$(this).val($(this).val()[1])
			}
		}
	}

	// update item_discount_amount and item_amount
	var price = $(this).parent().prev().prev().children('.price').val();
	if(price == "")
	var price = 0;
	else
	var price = parseFloat(price);
	var quantity = parseFloat($(this).parent().prev().children('.quantity').val());
	var discount_item = $(this).val();
	if(discount_item == "")
	discount_item = 0;
	else
	discount_item = parseFloat(discount_item);

	var item_total_amount = price * quantity;
	var item_discount_amount = (item_total_amount * discount_item) / 100;
	var item_amount = item_total_amount - item_discount_amount;
	var item_discount_amount = item_discount_amount.toFixed(2);
	var item_amount = item_amount.toFixed(2);

	$(this).parent().next().children('.disc_amt').text(item_discount_amount);
	$(this).parent().next().next().children('.amount').text(item_amount);
	//End update item_discount_amount and item_amount

	//update total quantity..
	var total_quantity = 0;
	$(".billing_table .billing_tbody .product_name").each(function(){
		var product_name = $(this).val();
		if(product_name != "")
		{
			var quantity = $(this).parent().next().next().next().next().next().children('.quantity').val();
			quantity = parseInt(quantity);
			total_quantity = total_quantity + quantity;
		}
	});
	$("#billing_payment_details #total_quantity").text(total_quantity);
	//End update total quantity..


	//update subtotal amout..
	var sub_total = 0;
	$(".billing_table .billing_tbody .product_name").each(function(){
		var product_name = $(this).val();
		if(product_name != "")
		{
			var price = $(this).parent().next().next().next().next().children('.price').val();
			if(price != "")
			{
				var item_amount = $(this).parent().next().next().next().next().next().next().next().next().children('.amount').text();
				item_amount = parseFloat(item_amount);
				sub_total = parseFloat(sub_total) + item_amount;
			}

		}
	})
	sub_total = sub_total.toFixed(2);
	$("#billing_payment_details #sub_total").text(sub_total);
	//end update subtotal amount..

	//update grand_total amount
	var sub_total = $("#billing_payment_details #sub_total").text();
	if(sub_total != "")
	{
		sub_total = parseFloat(sub_total);
		var main_discount = $("#billing_payment_details #main_discount").val();
		if(main_discount == "")
		main_discount = 0;
		else
		main_discount = parseFloat(main_discount);
		var discount_amount = (sub_total * main_discount) / 100;
		var grand_total = sub_total - discount_amount;
		grand_total = Math.round(grand_total).toFixed(2);
		$("#billing_payment_details #grand_total").text(grand_total);
	}
	numtoword();
	//end update grand_total amount


	//update return_amount and due amount
	var grand_total = $("#billing_payment_details #grand_total").text();
	var pay = $("#billing_payment_details #pay").val();
	//check if pay amount and grand total amount is not empty
	if(pay != "" && grand_total != ""){
		var grand_total = parseFloat(grand_total);
		var pay = parseInt(pay);
		if(pay >= grand_total)
		{
			var return_amount = pay - grand_total;
			$("#billing_payment_details #return_row").show()
			$("#billing_payment_details #due_row").hide();
			$("#billing_payment_details #return_amount").text(return_amount.toFixed(2));
			$("#billing_payment_details #due_amount").text("0.00");
		}
		else if(pay < grand_total)
		{
			var due_amount = grand_total - pay;
			$("#billing_payment_details #due_row").show();
			$("#billing_payment_details #return_row").hide();
			$("#billing_payment_details #due_amount").text(due_amount.toFixed(2));
			$("#billing_payment_details #return_amount").text("0.00");
		}
	}//close if condition for check pay and grand total is not empty
	//end update return_amount and due amount

});

//execute when focusout from item_discount textbox..
$(".billing_tbody").on("focusout",".item_discount",function(event){
	var item_discount = $(this).val();
	if(item_discount == "")
	{
		$(this).val("0");
	}
	if(item_discount == ".")
	{
		alert("Please Fill a Valid Value..!");
		$(this).focus();
	}
	//if there is more than 1 characters 
	if(item_discount.length > 1)
	{
		//first character is dot
		if(item_discount[0] == ".")
		{
			$(this).val("0"+item_discount);
		}
	}

});


//execute when focusin from item_discount textbox..
$(".billing_tbody").on("focusin",".item_discount",function(event){
	var item_discount = $(this).val();
	if(parseInt(item_discount) == 0)
	{
		$(this).val("");
	}
});

//accept only integer for discount
$("#billing_payment_details #main_discount").keypress(function(event) {

	//if the letter is not digit then display error and don't type anything
	if (event.which != 8  && event.which != 46 && (event.which < 48 || event.which > 57)) {
		return false;
	}

	//when press dot key
	if(event.which == 46)
	{
		//check if one dot is exist in string then return false
		if($(this).val().indexOf('.') !== -1)
			return false;
	}

	if( $(this).val().length == 1 )
	{
		if($(this).val().indexOf('.') !== -1)
			$(this).val("0.");
	}
});//end main_discount keypress..


$("#billing_payment_details #main_discount").keyup(function(event) {
	//when this value is greater than 100 then return 0
	if(parseInt($(this).val()) > 100)
	{
		$(this).val("0");
	}
	//when there is 2 value and first value is 0 then remove 0 and assign second value..
	if($(this).val().length == 2)
	{
		if($(this).val() != "0.")
		{
			if($(this).val()[0] == '0')
			{
				$(this).val($(this).val()[1])
			}
		}
	}

	if(event.which == 13)
	{
		$("#billing_payment_details #pay").focus();
	}


	//update grand_total amount
	var sub_total = $("#billing_payment_details #sub_total").text();
	if(sub_total != "")
	{
		sub_total = parseFloat(sub_total);
		var main_discount = $("#billing_payment_details #main_discount").val();
		if(main_discount == "")
		main_discount = 0;
		else
		main_discount = parseFloat(main_discount);
		var discount_amount = (sub_total * main_discount) / 100;
		var grand_total = sub_total - discount_amount;
		grand_total = Math.round(grand_total).toFixed(2);
		$("#billing_payment_details #grand_total").text(grand_total);
		numtoword();
	}
	//end update grand_total amount


	//update return_amount and due amount
	var grand_total = $("#billing_payment_details #grand_total").text();
	var pay = $("#billing_payment_details #pay").val();
	//check if pay amount and grand total amount is not empty
	if(pay != "" && grand_total != ""){
		var grand_total = parseFloat(grand_total);
		var pay = parseInt(pay);
		if(pay >= grand_total)
		{
			var return_amount = pay - grand_total;
			$("#billing_payment_details #return_row").show()
			$("#billing_payment_details #due_row").hide();
			$("#billing_payment_details #return_amount").text(return_amount.toFixed(2));
			$("#billing_payment_details #due_amount").text("0.00");
		}
		else if(pay < grand_total)
		{
			var due_amount = grand_total - pay;
			$("#billing_payment_details #due_row").show();
			$("#billing_payment_details #return_row").hide();
			$("#billing_payment_details #due_amount").text(due_amount.toFixed(2));
			$("#billing_payment_details #return_amount").text("0.00");
		}
	}//close if condition for check pay and grand total is not empty
	//end update return_amount and due amount

});

//execute when focusin into main_discount textbox..
$("#billing_payment_details #main_discount").focusin(function(event) {
	if(parseInt($(this).val()) == "0")
	{
		$(this).val("");
	}
});

$("#billing_payment_details #main_discount").focusout(function(event) {
	var main_discount = $(this).val();
	if(main_discount == "")
	{
		$(this).val("0");
	}
	if(parseFloat($(this).val()) == "0")
	$(this).val("0");

	//if there is more than 1 characters 
	if(main_discount.length > 1)
	{
		//first character is dot
		if(main_discount[0] == ".")
		{
			$(this).val("0"+main_discount);
		}
	}
});

$("#billing_payment_details #pay").keypress(function(event) {
	//if entered key is not digit then display error and don't type anything
	if (event.which != 8 && event.which != 13 &&  event.which != 0 && event.which != 46 && (event.which < 48 || event.which > 57)) {
		return false;
	}
	//when press dot 
	if(event.which == 46)
	{
		//check if one dot is exist in string then return false
		if($(this).val().indexOf('.') !== -1)
		{
			return false
		}
	}
	//if only one digit is enter in price textbox
	if( $(this).val().length == 1 )
	{
		//if there is only one dot and it is starting digit then return 0.
		if($(this).val().indexOf('.') !== -1)
		{
			$(this).val("0.");
		}
	}
	//when press enter key..
	if(event.which == 13)
	{
		$("#submit_btn").click();
	}
});

$("#billing_payment_details #pay").keyup(function(event) {
	//when there is 2 value and first value is 0 then remove 0 and assign second value..
	if($(this).val().length == 2)
	{
		if($(this).val() != "0.")
		{
			if($(this).val()[0] == '0')
			{
				$(this).val($(this).val()[1])
			}
		}
	}

	//update return_amount and due amount
	var grand_total = $("#billing_payment_details #grand_total").text();
	var pay = $("#billing_payment_details #pay").val();
	//check if pay amount and grand total amount is not empty
	if(pay != "" && grand_total != ""){
		var grand_total = parseFloat(grand_total);
		var pay = parseInt(pay);
		if(pay >= grand_total)
		{
			var return_amount = pay - grand_total;
			$("#billing_payment_details #return_row").show()
			$("#billing_payment_details #due_row").hide();
			$("#billing_payment_details #return_amount").text(return_amount.toFixed(2));
			$("#billing_payment_details #due_amount").text("0.00");
		}
		else if(pay < grand_total)
		{
			var due_amount = grand_total - pay;
			$("#billing_payment_details #due_row").show();
			$("#billing_payment_details #return_row").hide();
			$("#billing_payment_details #due_amount").text(due_amount.toFixed(2));
			$("#billing_payment_details #return_amount").text("0.00");
		}
	}//close if condition for check pay and grand total is not empty
	//end update return_amount and due amount
});

//execute when focusin into pay textbox..
$("#billing_payment_details #pay").focusin(function(event) {
	if(parseInt($(this).val()) == "0")
	{
		$(this).val("");
	}
});

$("#billing_payment_details #pay").focusout(function(event) {
	var pay = $(this).val();
	if(pay == "")
	{
		$(this).val("0");
	}
	if(parseFloat($(this).val()) == "0")
	$(this).val("0");

	//if there is more than 1 characters 
	if(pay.length > 1)
	{
		//first character is dot
		if(pay[0] == ".")
		{
			$(this).val("0"+pay);
		}
	}
});

//click on remove button
$(".billing_tbody").on('click','.remove_item', function(){
	//alert confirm box..
	var confirm_msg = confirm("Do you want to delete this item ?");
	//if click yes button in confirm box..
	if(confirm_msg == true)
	{
		//remove this row..
		$(this).parent().remove();

		//script for serial number auto increment in billing form
		$(".billing_table tbody tr").each(function(id){
			$(this).children('.serial_no').html(id+1);	
		});

			//update total quantity..
		var total_quantity = 0;
		$(".billing_table .billing_tbody .product_name").each(function(){
			var product_name = $(this).val();
			if(product_name != "")
			{
				var quantity = $(this).parent().next().next().next().next().next().children('.quantity').val();
				quantity = parseInt(quantity);
				total_quantity = total_quantity + quantity;
			}
		});
		$("#billing_payment_details #total_quantity").text(total_quantity);
		//End update total quantity..

		//update subtotal amout..
		var sub_total = 0;
		$(".billing_table .billing_tbody .product_name").each(function(){
			var product_name = $(this).val();
			if(product_name != "")
			{
				var price = $(this).parent().next().next().next().next().children('.price').val();
				if(price != "")
				{
					var item_amount = $(this).parent().next().next().next().next().next().next().next().next().children('.amount').text();
					item_amount = parseFloat(item_amount);
					sub_total = parseFloat(sub_total) + item_amount;
				}

			}
		})
		sub_total = sub_total.toFixed(2);
		$("#billing_payment_details #sub_total").text(sub_total);
		//end update subtotal amount..

		//update grand_total amount
		var sub_total = $("#billing_payment_details #sub_total").text();
		if(sub_total != "")
		{
			sub_total = parseFloat(sub_total);
			var main_discount = $("#billing_payment_details #main_discount").val();
			if(main_discount == "")
			main_discount = 0;
			else
			main_discount = parseFloat(main_discount);
			var discount_amount = (sub_total * main_discount) / 100;
			var grand_total = sub_total - discount_amount;
			grand_total = Math.round(grand_total).toFixed(2);
			$("#billing_payment_details #grand_total").text(grand_total);
		}
		numtoword();
		//end update grand_total amount

		//update return_amount and due amount
		var grand_total = $("#billing_payment_details #grand_total").text();
		var pay = $("#billing_payment_details #pay").val();
		//check if pay amount and grand total amount is not empty
		if(pay != "" && grand_total != ""){
			var grand_total = parseFloat(grand_total);
			var pay = parseInt(pay);
			if(pay >= grand_total)
			{
				var return_amount = pay - grand_total;
				$("#billing_payment_details #return_row").show()
				$("#billing_payment_details #due_row").hide();
				$("#billing_payment_details #return_amount").text(return_amount.toFixed(2));
				$("#billing_payment_details #due_amount").text("0.00");
			}
			else if(pay < grand_total)
			{
				var due_amount = grand_total - pay;
				$("#billing_payment_details #due_row").show();
				$("#billing_payment_details #return_row").hide();
				$("#billing_payment_details #due_amount").text(due_amount.toFixed(2));
				$("#billing_payment_details #return_amount").text("0.00");
			}
		}//close if condition for check pay and grand total is not empty
		//end update return_amount and due amount
	}//end if condition for confirmation
});


//click on submit button for display bill in modal
$("#submit_btn").click(function() {

	// by default do empty table body modal
	$(".table_body_modal").html("");

	//fill customer information into modal..
	$(".bill_detail .customer_name").text($("#customer_name").val());
	$(".bill_detail .customer_mobile").text($("#customer_mobile").val());
	$(".bill_detail .customer_email").text($("#customer_email").val());
	$(".bill_detail .customer_address").text($("#customer_address").val());
	//assign black products array for check if there is any product is in array than modal display..
	var products = [];

	$(".billing_table .billing_tbody .product_name").each(function(){
			var product_name = $(this).val();
			if(product_name != "")
			{
				var price = $(this).parent().next().next().next().next().children('.price').val();
				if(price != "")
				{
					var product_name = $(this).val();
					products.push(product_name);

					var brand = $(this).parent().next().children('.brand').val(); 				
					var size = $(this).parent().next().next().children('.size').val();
					var type = $(this).parent().next().next().next().children('.type').val();
					var price = $(this).parent().next().next().next().next().children('.price').val();
					var quantity = $(this).parent().next().next().next().next().next().children('.quantity').val();
					var discount_item = $(this).parent().next().next().next().next().next().next().children('.item_discount').val();
					var discount_amount = $(this).parent().next().next().next().next().next().next().next().children('.disc_amt').text();
					var amount = $(this).parent().next().next().next().next().next().next().next().next().children('.amount').text();
					var new_row = '<tr><td class="view_bill_serial_no"></td><td>'+product_name+'</td><td>'+brand+'</td><td>'+size+'</td><td>'+type+'</td><td><span class="WebRupee">Rs. </span>'+price+'</td><td>'+quantity+'</td><td>'+discount_item+'%</td><td><span class="WebRupee">Rs. </span>'+discount_amount+'</td><td><span class="WebRupee">Rs. </span>'+amount+'</td>';	
					$(".table_body_modal").append(new_row);			
				}

			}
	});

	//script for serial number auto increment in billing modal
	$(".table_body_modal tr").each(function(id){
		$(this).children('.view_bill_serial_no').html(id+1);	
	});

	$(".payment_detail_modal .total_item_modal").text( $("#billing_payment_details #total_quantity").text() );
	$(".payment_detail_modal .sub_total_modal").text( $("#billing_payment_details #sub_total").text() );
	$(".payment_detail_modal .main_discount_modal").text( $("#billing_payment_details #main_discount").val() );
	$(".payment_detail_modal .amount_in_words_modal").text( $("#billing_payment_details #amount_in_words").text() );
	$(".payment_detail_modal .grand_total_amount").text( $("#billing_payment_details #grand_total").text() );

	if($("#billing_payment_details #pay").val() == "")
	$(".payment_detail_modal .total_pay_amount").text("0.00");
	else
	$(".payment_detail_modal .total_pay_amount").text( $("#pay").val() );

	if($("#billing_payment_details #due_amount").text() != "0.00")
	{
		$(".payment_detail_modal .bill_due_amount").show();
		$(".payment_detail_modal .total_due_amount").text( $("#due_amount").text() );
	}
	else
	{
		$(".payment_detail_modal .bill_due_amount").hide();
	}

	if(products.length)
	{
		$("#bill_display").foundation('reveal', 'open');
	}

	$("#print_btn").focus();

});

// execute when click on print button..
$("#print_btn").click(function(){
	$(this).prop("disabled",true);
	var customer_name = $("#customer_name").val();
	var customer_mobile = $("#customer_mobile").val();
	var customer_email = $("#customer_email").val();
	var customer_address = $("#customer_address").val();
	var customer_data = [customer_name,customer_mobile,customer_email,customer_address];

	var product_name_array = [];
	var brand_array = [];
	var size_array = [];
	var type_array = [];
	var price_array = [];
	var quantity_array = [];
	var discount_item_array = [];
	var discount_amount_array = [];
	var amount_array = [];

	//execute for each product name..
	$(".billing_table .billing_tbody .product_name").each(function(){
		//fetch product name..
		var product_name = $(this).val();
		// execute if product name is not empty
		if(product_name != "")
		{
			var price = $(this).parent().next().next().next().next().children('.price').val();
			//execute if price of that product is not empty..
			if(price != "")
			{
				var product_name = $(this).val();
				var brand = $(this).parent().next().children('.brand').val(); 				
				var size = $(this).parent().next().next().children('.size').val();
				var type = $(this).parent().next().next().next().children('.type').val();
				var price = $(this).parent().next().next().next().next().children('.price').val();
				var quantity = $(this).parent().next().next().next().next().next().children('.quantity').val();
				var discount_item = $(this).parent().next().next().next().next().next().next().children('.item_discount').val();
				var discount_amount = $(this).parent().next().next().next().next().next().next().next().children('.disc_amt').text();
				var amount = $(this).parent().next().next().next().next().next().next().next().next().children('.amount').text();
				
				product_name_array.push(product_name);
				brand_array.push(brand);
				size_array.push(size);
				type_array.push(type);
				price_array.push(price);
				quantity_array.push(quantity);
				discount_item_array.push(discount_item);
				discount_amount_array.push(discount_amount);
				amount_array.push(amount);
			
			}//execute if price of that product is not empty..
		}//end execute if product name is not empty
	});
	//end execute for each product name..

	var number_of_item = $(".total_qty #total_quantity").text();
	var sub_total = $("#billing_payment_details #sub_total").text();
	var main_discount = $("#billing_payment_details #main_discount").val();
	var grand_total = $("#billing_payment_details #grand_total").text();
	var pay = $("#billing_payment_details #pay").val();
	var due = $("#billing_payment_details #due_amount").text();

	var payment_detail = [number_of_item,sub_total,main_discount,grand_total,pay,due];

	//execute if there is any product selected..
	if(product_name_array.length)
	{
		$(".la-anim-10").addClass('la-animate');
		$.ajax({
			type : "POST",
			url : "newbill_ajax.php",
			data : {customer_details : customer_data,
				bill_product_name : product_name_array,
				bill_brand : brand_array,
				bill_size : size_array,
				bill_type : type_array,
				bill_price : price_array,
				bill_quantity : quantity_array,
				bill_discount_item :  discount_item_array,
				bill_discount_amount : discount_amount_array,
				bill_amount : amount_array,
				payment_detail : payment_detail},
				success : function(result){
				$(".la-anim-10").removeClass('la-animate');
				alert(result);
				window.location = "new_bill.php";
			}
		});//end ajax
	}
	//end (if condition) execute if there is any product selected..
 


});
//End execute when click on print button..

</script>