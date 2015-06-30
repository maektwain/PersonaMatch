<?php
	/* --connect to MongoDB--
	 * --select database--
	 * --select collection--
	 * --iterate over all data--
	 */

	require_once 'database.php';
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
					$mongo_collection = $mongo_db->selectCollection("brands");
					$cursor = $mongo_collection->find();
					$icount = $cursor->count();
					
					if($icount > 0)
					{
						foreach($cursor as $object)
						{
							echo '<div class="col-sm-4 col-lg-4 col-md-4">';
							echo '<div class="thumbnail">';
							echo '<img src="' . $object['brand_image_source'] . '" alt="Image not found" />';
							echo '<div class="caption">';
							echo '<h4>';
							echo '<a href="brand.php?brand_id=' . $object['_id'] . '">' . strtoupper($object['brand_name']) . '</a>';
							echo '<p>' . $object['brand_description'] . '</p>';
							echo '</h4>';
							echo '</div>';
							echo '</div>';
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