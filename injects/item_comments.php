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
					$mongo_collection = $mongo_db->selectCollection("bike_comments");
					$cursor = $mongo_collection->find(array('bike_id'=>$theBikeID));
					$icount = $cursor->count();
					
					if($icount > 0)
					{
						foreach($cursor as $object)
						{
?>
							<div class="form-group" style="padding:14px;">
								<fieldset class="bg-success" style="padding-left: 4px;">
									<p class="text-info"><?php echo $object['comment_text']; ?></p>
									<p class="blockquote-reverse text-muted"><mark><small><?php echo ' - ' . $object['comment_user']; ?></small></mark></p>
								</fieldset>
							</div>
<?php
						}
					}
					else
					{
						//--no commets were found--
?>
						<div class="form-group" style="padding:14px;">
							<fieldset id="no_comments_fieldset_id" class="bg-success">
								<center><p class="text-info"><kbd>No comments were found for this bike. Be the first to comment.</kbd></p></center>
							</fieldset>
						</div>
<?php
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