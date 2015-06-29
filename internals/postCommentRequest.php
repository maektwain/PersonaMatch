<?php
	/* --connect to MongoDB--
	 * --select database--
	 * --select collection--
	 * --iterate over all data--
	 */
	 
	$theCommentText = isset($_GET['comment']) ? htmlspecialchars(trim(urldecode($_GET['comment'])), ENT_QUOTES, 'UTF-8') : '';
	$theBikeID = isset($_GET['bike_id']) ? htmlspecialchars(trim(urldecode($_GET['bike_id'])), ENT_QUOTES, 'UTF-8') : '';
	
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
					$mongo_collection = $mongo_db->selectCollection("bike_comments");
					
					$bikeCommentPost = array(
											'comment_text'=>$theCommentText,
											'bike_id'=>$theBikeID,
											'comment_user'=>'Unknown',
											'comment_rating'=>'',
											'comment_useful'=>0,
											'comment_notuseful'=>0,
											'comment_sentiment'=>'',
											'comment_other'=>''
										);
										
					try
					{
						$mongo_collection->insert($bikeCommentPost);
						
						echo 'success';
					}
					catch(exception $e)
					{
						echo 'Could not insert data';
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