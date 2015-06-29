<?php
	/* --connect to MongoDB--
	 * --select database--
	 * --select collection--
	 * --iterate over all data--
	 */
	
	$theBrandID = isset($_GET['brand_id']) ? htmlspecialchars(trim($_GET['brand_id']), ENT_QUOTES, 'UTF-8') : '';
	
	try
	{
		//--connecting to MongoDB--
		$mongo = new MongoClient();
	
		if($mongo->connected)
		{
			try
			{
				$mongo_db = $mongo->selectDB("easywheels");
				
				try
				{
					$mongo_collection = $mongo_db->selectCollection("brands");
					$cursor = $mongo_collection->find(array('_id'=>new MongoId($theBrandID)));
					$icount = $cursor->count();
					
					if($icount > 0)
					{
						foreach($cursor as $object)
						{
							echo strtoupper($object['brand_name']);
							echo '<br/>';
							echo '<small>' . $object['brand_description'] . '</small>';
						}
					}
					else
					{
						echo $theBrandID . "    BLAH No Brands were found";
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