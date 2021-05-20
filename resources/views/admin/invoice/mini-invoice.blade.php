<title>MMD | Invoice Print</title>
<style>
@font-face {
    font-family: 'Bank';
    src: url('f25_bank_printer_regular-webfont.woff2') format('woff2'),
         url('f25_bank_printer_regular-webfont.woff') format('woff');
    font-weight: normal;
    font-style: normal;

}

#invoice-POS {
  font-family: 'Bank' !important;
  box-shadow: 0 0 1in -0.25in rgba(0, 0, 0, 0.5);
  padding: 2mm;
  margin: 0 auto;
  width: 60mm;
  background: #FFF;
}
#invoice-POS ::selection {
  background: #f31544;
  color: #FFF;
}
#invoice-POS ::moz-selection {
  background: #f31544;
  color: #FFF;
}
#invoice-POS h1 {
  font-size: 1.5em;
  color: #222;
  color: black;
}
#invoice-POS h2 {
  font-size: 1.4em;
  color: black;
}
#invoice-POS h3 {
  font-size: 1.1em;
  font-weight: 300;
  line-height: 2em;
  color: black;
}
#invoice-POS p {
  font-size: .88em;
  color: #666;
  line-height: 1.2em;
  color: black;
}
/*#invoice-POS #top,*/ #invoice-POS #mid, #invoice-POS #bot {
  /* Targets all id with 'col-' */
  border-bottom: 1px solid #EEE;
}
#invoice-POS #top {
  min-height: 100px;
}
#invoice-POS #mid {
  min-height: 80px;
}
#invoice-POS #bot {
  min-height: 50px;
}
#invoice-POS #top .logo {
  height: 60px;
  width: 60px;
  /*background: url(http://michaeltruong.ca/images/logo1.png) no-repeat;*/
  background-size: 60px 60px;
}
#invoice-POS .clientlogo {
  float: left;
  height: 60px;
  width: 60px;
  background: url(http://michaeltruong.ca/images/client.jpg) no-repeat;
  background-size: 60px 60px;
  border-radius: 50px;
}
/* #invoice-POS .info {
  display: block;
  margin-left: 0;
}
#invoice-POS .title {
  float: right;
}
#invoice-POS .title p {
  text-align: right;
}
#invoice-POS table {
  width: 100%;
  border-collapse: collapse;
}
#invoice-POS .tabletitle {
  font-size: .7em;
  background: #f5f6e2;
  color: black;
}

#invoice-POS .tabletitle td{
  padding: 3px 0px 3px 0px; 
  text-align: center;
}

#invoice-POS .service {
  border-bottom: 1px solid #EEE;
}
#invoice-POS .item {
  width: 24mm;
}
#invoice-POS .itemtext {
  font-size: 11.5px;
  text-align: center;
  /*padding: 8px;*/
  color: black;
}
#invoice-POS #legalcopy {
  margin-top: 5mm;
}

.ref{
  padding-bottom: 5px;
  color: black;
  font-size: 11.5px;
}

.custom{
  font-size: 1.4em;
}

.invoice-pos-footer {
  box-shadow: 0 0 1in -0.25in rgba(0, 0, 0, 0.5);
  padding: 2mm;
  margin: 0 auto;
  width: 60mm;
 
}

.table-header{
  font-weight: bold;
  font-size: 11.5px;
}

.table-item{
  font-weight: bold;
  font-size: 10px;
}

.table-footer{
  font-size: 11.5px;
  color: black;
}

.service .tableitem {
  padding: 3px 0px 3px 0px; 
  text-align: center;
} */
</style>

<div id="printableArea">
		<div id="invoice-POS">
		    <div id="top" style="border-bottom: 1px solid #EEE; margin-bottom: 8px;">
			    <center>
			      <div class="info"> 
                    <img alt="image" class="" src="{{url('uploads/mainlogo.png')}}" height="105" />
			        <p> 
			            <b>Address: </b>
                  Near Marriage Home, Anchroo Kalan(Village)
                            Post Office Anchroo Kalan<br>
                            Khurja Shikarpur Road (Tehsil Shikarpur)<br>
                            Bulandshahr (U.P. – 202395) India
                        www.makemydeals.co.in
                        info@makemydeals.co.in
                        <br>
                          www.sun19Farms.co.in<br>
                          info@sun19Farms.co.in
                       
			        </p>
			      </div><!--End Info-->
			  
			    <div class="row ref">
			    	<div class="col-md-12">
			    		<b>Invoice No:</b>
                       {{ $bills->id }}
			    	</div>
			    	<div class="col-md-12">
			    		Date:
              {{  date("d-m-Y", strtotime($bills->created_at)) }}
			    	</div>
			    	<!-- <div class="col-md-12">
			    		Biller:
			    		Super User
			    	</div> -->
			    </div>
			</div>
			<!--End InvoiceTop-->
	    	<div id="bot">
				<div id="table">
					<table class="table table-bordered">
						<tbody>
                      
                        <tr class="tabletitle">
							<td colspan="2">
								<span class="table-header">Item</span>
							</td>
							<td colspan="2">
								<span class="table-header">Qty</span>
							</td>
							<td colspan="2">
								<span class="table-header">Price</span>
							</td>
							<td colspan="2">
								<span class="table-header">Sub Total</span>
							</td>
						</tr>
                        @php
$qty = 0
@endphp
<?php $mrptotal = 0;
      $mmdtotal = 0;
 ?> 

                        @foreach($bills->billproduct  as $product)
                        <?php  $mrptotal = $mrptotal + $product->mrp*$product->quantity ?>
                        <?php  $mmdtotal = $mmdtotal + $product->mmd_price*$product->quantity ?>
                       
								<tr class="service">
                                <td colspan="2"><div>
                                        {{$product->product_name}}
                                    </div>
                                            </td>
                                    <td colspan="2">
                                    {{$product->quantity}}
                                    @php
                            $qty = $qty+ $product->quantity
                            @endphp 
                            
                            @endisset</td>
                                <td colspan="2">  
                                ₹{{$product->mmd_price}}
                            </td>
                                <td colspan="2">
                                ₹{{$product->quantity*$product->mmd_price}}
                            
							</td>
						</tr>
                        @endforeach
						<tr class="tabletitle">
							<td colspan="2">
								<span class="table-footer">Coupon Code: &nbsp;&nbsp;</span>
							</td>
                            <td colspan="2">
								<span>
                    
								</span>
                            <td colspan="2">
								<span>
                     {{ $bills->coupon_code }}
								</span>
							</td>
						</tr>
						<tr class="tabletitle">
							<td colspan="2">
								<span class="table-footer">Total Quantity: &nbsp;&nbsp;</span>
							</td>
                            <td colspan="2">
								<span class="table-footer">
                            
								</span>
							</td>
						
							<td colspan="2">
								<span class="table-footer">
                                {{ $qty }}
								</span>
							</td>
						</tr>
						<tr class="tabletitle">
							<td colspan="2">
								<span class="table-footer">Total: &nbsp;&nbsp;</span>
							</td>
                            <td colspan="2">
								<span class="table-footer">
                           
								</span>
							</td>
						
							<td colspan="2">
								<span class="table-footer">
                                <!-- {{ $bills->total_amount }} -->

                                <?php echo  $total =   $mmdtotal ?>
								</span>          
							</td>
						</tr>
						<tr class="tabletitle">
							<td colspan="2">
								<span class="table-footer">Total Savings: &nbsp;&nbsp;</span>
							</td>
                            <td colspan="2">
								<span class="table-footer">
                           
								</span>
							</td>
						
							<td colspan="2">
								<span class="table-footer">
                {{ $mrptotal-$mmdtotal }}
								</span>          
							</td>
						</tr>

					</tbody></table>
				</div><!--End Table-->

				<div id="legalcopy" style="padding-bottom: 10px;">
					<span class="table-footer">
						<strong>Thank you for Shopping :)</strong>  
						<br>
						 
					</span>
				</div>

			</div><!--End InvoiceBot-->

			<div style="text-align: center;  font-size: 10px; color: black;">
				A Software By Bee Pixl.
				<br>
				02637-227900/9898630768, Make My Deals 
			</div>
	  	</div><!--End Invoice-->
  	</div>  </center>