<?php
session_start();
include_once 'Database.php';
// $id = $_GET['pass'];
// $result = mysqli_query($conn, "SELECT * FROM movie WHERE movie_id = '" . $id . "'");
// $row = mysqli_fetch_array($result);
?>


<table class="table table-hover table-bordered text-center">
							<?php
              $query = "SELECT * FROM show_details WHERE show_id = " . $_POST['show_id'];
              $record = mysqli_query($conn, $query) or die("Query Error!".mysqli_error($conn));
              $broadcastInfo = mysqli_fetch_array($record);
              mysqli_free_result($record);

								// $s=mysqli_query($con,"select * from tbl_shows where s_id='".$_SESSION['show']."'");
								// $shw=mysqli_fetch_array($s);
								
								// 	$t=mysqli_query($con,"select * from tbl_theatre where id='".$shw['theatre_id']."'");
								// 	$theatre=mysqli_fetch_array($t);
									?>
									<tr>
										<!-- <td class="col-md-6">
											Theatre
										</td>
										<td>
											<?php echo $theatre['name'].", ".$theatre['place'];?>
										</td> -->
										</tr>
										<tr>
											<td>
												Screen
											</td>
										<td>
											<?php 
												// $ttm=mysqli_query($con,"select  * from show_time where st_id='".$shw['st_id']."'");
												
												// $ttme=mysqli_fetch_array($ttm);
												
												// $sn=mysqli_query($con,"select  * from tbl_screens where screen_id='".$ttme['screen_id']."'");
												
												// $screen=mysqli_fetch_array($sn);
                        $query = "SELECT * FROM movie WHERE movie_id = " . $broadcastInfo['movie_id'];
                        $record = mysqli_query($conn, $query) or die("Query Error!".mysqli_error($conn));
                        $filmInfo = mysqli_fetch_array($record);
                        mysqli_free_result($record);
												echo $filmInfo['moviename'];
												?>
										</td>
									</tr>
									<tr>
										<td>
											Date
										</td>
										<td>
											<?php 
											if(isset($_GET['date']))
							{
								$date=$_GET['date'];
							}
							else
							{
								if($shw['start_date']>date('Y-m-d'))
								{
									$date=date('Y-m-d',strtotime($shw['start_date'] . "-1 days"));
								}
								else
								{
									$date=date('Y-m-d');
								}
								$_SESSION['dd']=$date;
							}
							?>
							<div class="col-md-12 text-center" style="padding-bottom:20px">
								<?php if($date>$_SESSION['dd']){?><a href="booking.php?date=<?php echo date('Y-m-d',strtotime($date . "-1 days"));?>"><button class="btn btn-default"><i class="glyphicon glyphicon-chevron-left"></i></button></a> <?php } ?><span style="cursor:default" class="btn btn-default"><?php echo date('d-M-Y',strtotime($date));?></span>
								<?php if($date!=date('Y-m-d',strtotime($_SESSION['dd'] . "+4 days"))){?>
								<a href="booking.php?date=<?php echo date('Y-m-d',strtotime($date . "+1 days"));?>"><button class="btn btn-default"><i class="glyphicon glyphicon-chevron-right"></i></button></a>
								<?php }
								$av=mysqli_query($con,"select sum(no_seats) from tbl_bookings where show_id='".$_SESSION['show']."' and ticket_date='$date'");
								$avl=mysqli_fetch_array($av);
								?>
							</div>
										</td>
									</tr>
									<tr>
										<td>
											Show Time
										</td>
										<td>
											<?php echo date('h:i A',strtotime($ttme['start_time']))." ".$ttme['name'];?> Show
										</td>
									</tr>
									<tr>
										<td>
											Number of Seats
										</td>
										<td>
											<form  action="process_booking.php" method="post">
												<input type="hidden" name="screen" value="<?php echo $screen['screen_id'];?>"/>
											<input type="number" required tile="Number of Seats" max="<?php echo $screen['seats']-$avl[0];?>" min="0" name="seats" class="form-control" value="1" style="text-align:center" id="seats"/>
											<input type="hidden" name="amount" id="hm" value="<?php echo $screen['charge'];?>"/>
											<input type="hidden" name="date" value="<?php echo $date;?>"/>
										</td>
									</tr>
									<tr>
										<td>
											Amount
										</td>
										<td id="amount" style="font-weight:bold;font-size:18px">
											Rs <?php echo $screen['charge'];?>
										</td>
									</tr>
									<tr>
										<td colspan="2"><?php if($avl[0]==$screen['seats']){?><button type="button" class="btn btn-danger" style="width:100%">House Full</button><?php } else { ?>
										<button class="btn btn-info" style="width:100%">Book Now</button>
										<?php } ?>
										</form></td>
									</tr>
						<table>
							<tr>
								<td></td>
							</tr>
						</table>
					</div>

