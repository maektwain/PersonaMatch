<?php
	/* --connect to MongoDB--
	 * --select database--
	 * --select collection--
	 * --iterate over all data--
	 * --parse the JSON file--
	 * --check if the bike information exists in database or not--
	 * --if not, insert the data
	 */
	 
	if(true)
	{
		$str = file_get_contents('jsonFile.json');
		$json = json_decode($str, true);

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
						
						foreach ($json as $key => $value)
						{
							if($key > 0)
							{
								foreach($value as $key1 => $value1)
								{
									if($key1 == 'bike_name')
									{
										foreach($value1 as $key2 => $value2)
										{
											$brandName = explode(" ", $value2);
											$cursor = $mongo_collection->find(array('brand_name'=>strtolower($brandName[0])));
											$icount = $cursor->count();
											
											if($icount == 0)
											{
												//--insert brand name--
												$theBrandArray = array(
																	'brand_name'=>strtolower($brandName[0]),
																	'brand_description'=>'',
																	'brand_image_description'=>''
																);
												
												try
												{
													$mongo_collection->insert($theBrandArray);
													echo 'successfully inserted into database brandname : ' . $brandName[0] . '<br/>';
												}
												catch(exception $e)
												{
													echo 'Could not insert data';
												}
											}
											
											
										}
									}
								}
							}
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
	}
	else
	{
		
	}
?>