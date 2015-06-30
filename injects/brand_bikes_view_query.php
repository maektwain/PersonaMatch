<?php
	/* --connect to MongoDB--
	 * --select database--
	 * --select collection--
	 * --iterate over all data--
	 */
	
	require_once 'database.php';	
	$theBrandID = isset($_GET['brand_id']) ? htmlspecialchars(trim($_GET['brand_id']), ENT_QUOTES, 'UTF-8') : '';
	
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
					$cursor = $mongo_collection->find(array("bike_brand_id"=>new MongoId($theBrandID)));
					$icount = $cursor->count();
					
					if($icount > 0)
					{
						foreach($cursor as $object)
						{
							echo '<div class="col-md-4 portfolio-item">';
							echo '<a href="#">';
							echo '<img class="img-responsive" src="' . $object['bike_image_source']. '" alt="Image not found">';
							echo '</a>';
							echo '<h3>';
							echo '<a href="item.php?item_id=' . $object['_id'] . '">' . strtoupper($object['bike_name']) . '</a>';
							echo '</h3>';
							echo '<p class="text-info"><mark>Rs. ' . $object['bike_ex_showroom'] . '</mark></p>';
							echo '</div>';
						}
					}
					else
					{
						echo "No Brands were found";
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