<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />

		<link href="{{asset('backend/css/bootstrap.min.css')}}" rel="stylesheet"/>

    <!--  Paper Dashboard core CSS    -->
    	<!-- <link href="{{asset('backend/css/paper-dashboard.css')}}" rel="stylesheet"/> -->

		<!-- <link href="{{asset('backend/css/style.css')}}" rel="stylesheet"/> -->

    <!--  Fonts and icons     -->
		<link href="{{asset('css/font-awesome.min.css')}}" rel="stylesheet">
		<link href="{{asset('backend/css/font-muli.css')}}" rel='stylesheet' type='text/css'>
		<link href="{{asset('backend/css/themify-icons.css')}}" rel="stylesheet">
		
      <style>
			.invoice-box {
				max-width: 800px;
				margin: auto;
				padding: 30px;
				border: 1px solid #eee;
				box-shadow: 0 0 10px rgba(0, 0, 0, 0.15);
				font-size: 14px;
				line-height: 24px;
				font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
				color: #555;
			}

            .table-box {
                max-width: 800px;
				margin: auto;
				padding: 30px;
				border: 1px solid #eee;
				box-shadow: 0 0 10px rgba(0, 0, 0, 0.15);
				font-size: 14px;
				line-height: 24px;
				font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
				color: #555; 
            }

			.invoice-box table {
				width: 100%;
				line-height: inherit;
				text-align: left;
			}

			.invoice-box table td {
				padding: 5px;
				vertical-align: top;
			}

			.invoice-box table tr td:nth-child(2) {
				text-align: right;
			}

			.invoice-box table tr.top table td {
				padding-bottom: 20px;
			}

			.invoice-box table tr.top table td.title {
				font-size: 45px;
				line-height: 45px;
				color: #333;
			}

			.invoice-box table tr.information table td {
				padding-bottom: 40px;
			}

			.invoice-box table tr.heading td {
				background: #eee;
				border-bottom: 1px solid #ddd;
				font-weight: bold;
			}

			.invoice-box table tr.details td {
				padding-bottom: 20px;
			}

			.invoice-box table tr.item td {
				border-bottom: 1px solid #eee;
			}

			.invoice-box table tr.item.last td {
				border-bottom: none;
			}

			.invoice-box table tr.total td:nth-child(2) {
				border-top: 2px solid #eee;
				font-weight: bold;
			}

			@media only screen and (max-width: 600px) {
				.invoice-box table tr.top table td {
					width: 100%;
					display: block;
					text-align: center;
				}

				.invoice-box table tr.information table td {
					width: 100%;
					display: block;
					text-align: center;
				}
			}

            .kiri{
                text-align: left;
            }
			/** RTL **/
			.rtl {
				direction: rtl;
				font-family: Tahoma, 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
			}

			.rtl table {
				text-align: right;
			}

			.rtl table tr td:nth-child(2) {
				text-align: left;
			}

			@media print {
				#printbtn {
					display :  none;
				}
			}
		</style>
	</head>

	<body>
		<div class="invoice-box">
		<a id ="printbtn" href="{{ url('dashboard/room/booking') }}" class="btn" style="background-color:#C5C20B;color:white">Back</a>
        <div style="text-align: center; font-size:40px; padding:0px 0px 20px 0px"><strong>INVOICE</strong></div>
			<table cellpadding="0" cellspacing="0">
				<tr class="top">
					<td colspan="2">
						<table>
							<tr>
                            <div class="row">
								<td class="title">
									<img src="{{'/front/images/logo/nuwono2.png'}}" style="width: 300px;"/>
								</td>

								
                                    <td style="text-indent:100px; color:white">.<td>
                                    <td style="font-size:12px; line-height: 15px; padding-top:20px" >
                                    <strong><br>
                                        No. Invoice  <br />
                                        
                                        Pembayaran Status<br />
                                       
                                    </td>

                                    <td style="font-size:12px; line-height: 15px; padding-top:20px">
                                    <strong><br>
                                        : {{$room_booking->id}}/{{$room_booking->room->room_type->description}}/2021 <br />
                                        
										@if ($room_booking->payment == '1')
										: Lunas<br>
										
										@else
										: Waiting<br>
										
                                        @endif
                                        
                                        </strong>
                                    </td>

                                
                            </div>
							</tr>
						</table>
					</td>
				</tr>

				<tr class="information">
					<td colspan="2">
						<table>
							<tr>
								<td style="font-size:10px;  line-height: 15px">
                                    To. : 
                                    <strong>{{$room_booking->user->name}}</strong>
									@if ($room_booking->user->alamat != null)
									<br>{{$room_booking->user->alamat}}
									@else
                                    <br>{{$room_booking->user->phone}}                                    
									@endif
                                </td>
                                

								<td style="font-size:11px;  line-height: 15px">
									<span style="color:blue">Nuwono Tasya Guesthouse</span><br />
									Jl. Perwira No.9, Rajabasa, Kec. Rajabasa, <br />
									Kota Bandar Lampung, Lampung 35122 <br>
                                    Telp. # nuwonotasya.com
								</td>
							</tr>
						</table>
					</td>
				</tr>
                    <table class="table table-bordered table-striped">
                        <thead>
                            <th>No.</th>
                            <th>Tipe Kamar</th>
							<th>Extra Bed</th>
                            <th>Check-in</th>
                            <th>Check-out</th>
                            
                        </thead>

                        <tbody>
                            <tr>
                                <td>1.</td>
                                <td>{{$room_booking->room->room_type->name}}</td>
								@if($room_booking->extra_bed == null)
								<td>-</td>
								@else
                                <td>{{$room_booking->extra_bed}}</td>
								@endif
                                <td>{{$room_booking->start_time}}</td>
                                <td>{{$room_booking->end_time}}</td>
                            </tr>
                            
                        </tbody>
                    </table>
                    <table class="table  table-striped">
                        

                        <tbody>
                            <tr>
                              
                                <td style="width:400px; border:1px solid white; background-color:white"></td>
                                <td style="text-align:center">Amount</td>
                                <td style="text-align:left">Rp. <?php echo number_format($room_booking->room->room_type->cost_per_day) ?></td>
                            </tr>
                          
                            <tr>
                                
                                <td style="width:400px; border:1px solid white; background-color:white"></td>
                                <td style="text-align:center">Grand total</td>
                                <td style="text-align:left">Rp. <?php echo number_format($room_booking->room_cost) ?></td>
                            </tr>
                            
                        </tbody>
                    </table>     

        
                <tr class="top" >
					<td colspan="2" style="padding-top:50px">
						<table>
							<tr>
								<td class="">
									
								</td>


								<td>
									<div style="padding-right:250px">
                                        Approved by<br />
                                        
                                    </div>
                                    <div style="padding-top:90px;padding-right:148px"><span style="padding-left:50px"><strong >Nuwono Tasya Guesthouse<strong></span></div> 
								</td>
							</tr>
						</table>
					</td>
				</tr>   
				<button id ="printbtn" onclick="window.print()" class="btn" style="background-color:#C5C20B;color:white">Print</button>
			</table>
		</div>
		
	</body>
</html>
