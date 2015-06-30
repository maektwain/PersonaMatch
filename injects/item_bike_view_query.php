<?php
	/* --connect to MongoDB--
	 * --select database--
	 * --select collection--
	 * --iterate over all data--
	 */
	
	require_once 'database.php';	 
	$theBikeID = isset($_GET['item_id']) ? htmlspecialchars(trim($_GET['item_id']), ENT_QUOTES, 'UTF-8') : '';
	
	try
	{
		//--connecting to MongoDB--
		$MongoDB = new DBManager();
		$conn = $MongoDB->getConnection();
	
		if($conn->connected)
		{
			try
			{
				$mongo_db = $conn->selectDB("IbmCloud_5081d1dj_8br44ob3");
				
				try
				{
					$mongo_collection = $mongo_db->selectCollection("bikes");
					$cursor = $mongo_collection->find(array('_id'=>new MongoId($theBikeID)));
					$icount = $cursor->count();
					
					if($icount > 0)
					{
						foreach($cursor as $object)
						{
?>
							<div class="row">
								<ol class="breadcrumb">
									<li><a href="#">Home</a></li>
									<li><a href="#"><?php echo strtoupper($object['bike_brand']); ?></a></li>
									<li class="active"><?php echo strtoupper($object['bike_name']); ?></li>
								</ol>
							</div>
<?php
							echo '<div class="container">';
							echo '<div class="col-md-6">';
							echo '<div class="thumbnail">';
							echo '<img src="' . $object['bike_image_source'] . '" alt="Image not found" />';
							echo "</div>";
							echo "</div>";
							echo '<div class="col-md-6">';
							echo '<h1 class="text-primary">' . strtoupper($object['bike_name']) . '</h1>';
							echo '<fieldset class="bg-primary">';
							echo '<fieldset style="padding-left: 4px; padding-top: 4px; padding-bottom: 4px;">';
							echo '<div>';
							echo '<kbd>mileage</kbd> : ' . $object['bike_mileage'] . '<br/>';
							echo '<kbd>engine</kbd> : ' . $object['bike_engine'] . '<br/>';
							echo '<kbd>power</kbd> : ' . $object['bike_power'] . '<br/>';
							echo '<kbd>displacement</kbd> : ' . $object['bike_displacement'] . '<br/>';
							echo '<kbd>wheelbase</kbd> : ' . $object['bike_wheelbase'] . '<br/>';
							echo '<kbd>stroke</kbd>  : ' . $object['bike_stroke'] . '<br/>';
							echo '</div>';
							echo '</fieldset>';
							echo '</fieldset>';
							echo '<h2 class="text-info"><mark>Rs. ' . $object['bike_ex_showroom'] . '</mark></h2>';
							echo  '<br/><h4 class="text-warning">BRAND : ' . strtoupper($object['bike_brand']) . '</h4>';
							echo '<input id="input_bike_id" type="hidden" value="' . $object['_id'] . '" />';
							echo '<button class="btn btn-primary" type="button">Rating <span class="badge">' . $object['bike_rating'] . '</span></button>';
							echo '</div>';
							echo '</div>';
							echo '</div>';
						}
					}
					else
					{
						echo "No Bikes were found";
					}
				}
				catch(Exception $e)
				{
					echo "Could not select collection";
				}
			}
			catch(Exception $e)
			{
				echo "Could not select database";
			}
		}
		else
		{
			echo "could not connect to MongoDB server";
		}
	}
	catch(MongoConnectionException $e)
	{
		echo "Start MongoServer" . " " . $e;
	}
?>