<?php
	/* --connect to MongoDB--
	 * --select database--
	 * --select collection--
	 * --iterate over all data--
	 * --parse the JSON file--
	 * --check if the bike information exists in database or not--
	 * --if not, insert the data
	 */
	 
	require_once '../database.php';
	 
	if(true)
	{
		$str = file_get_contents('jsonFile.json');
		$json = json_decode($str, true);

		try
		{
			//--connecting to MongoDB--
			//$mongo = new MongoClient();
			$MongoDB = new DBManager();
			$conn = $MongoDB->getConnection();
		
			if($conn->connected)
			{
				try
				{
					$mongo_db = $conn->selectDB("IbmCloud_5081d1dj_8br44ob3");
					
					try
					{
						$mongo_collection_brands = $mongo_db->selectCollection("brands");
						
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
											$cursor = $mongo_collection_brands->find(array('brand_name'=>strtolower($brandName[0])));
											$icount = $cursor->count();
											
											if($icount == 0)
											{
												//--insert brand name--
												$theBrandArray = array(
																	'brand_name'=>strtolower($brandName[0]),
																	'brand_description'=>'',
																	'brand_image_source'=>''
																);
												
												try
												{
													$mongo_collection_brands->insert($theBrandArray);
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

						$mongo_collection_bikes = $mongo_db->selectCollection("bikes");
						
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
											$bikeNameArray = explode(" ", $value2);
											$bikeBrand = $bikeNameArray[0];
											$arrayCount = count($bikeNameArray);
											$bikeNameCheck = '';
									
											for($i = 1; $i < $arrayCount; $i++)
											{
												$bikeNameCheck = $bikeNameCheck . ' ' . $bikeNameArray[$i];
											}
											
											$cursor = $mongo_collection_bikes->find(array('bike_name'=>strtolower($bikeNameCheck)));
											$icount = $cursor->count();
											
											if($icount == 0)
											{
												$bikeName = '';
												$bikeMileage = '';
												$bikeEngine = '';
												$bikeDisplacement = '';
												$bikeRating = '';
												$bikePower = '';
												$bikeExShowroom = '';
												$bikeWheelBase = '';
												$bikeImageUrl = '';
												$bikeStroke = '';
												$bikeBrandId = '';
												
												foreach($json as $innerKey => $innerValue)
												{
													if($innerKey == $key)
													{
														foreach($innerValue as $innerKey1 => $innerValue1)
														{
															if($innerKey1 != 'url' && $innerKey1 != '_type' && $innerKey1 != '_template')
															{
																if($innerKey1 == 'bike_name')
																{
																	$bikeName = $bikeNameCheck;
																}
																else if($innerKey1 == 'bike_economy')
																{
																	foreach($innerValue1 as $innerKey2 => $innerValue2)
																	{
																		if($innerKey2 == 0)
																		{
																			$bikeMileage = $innerValue2;
																		}
																	}
																}
																else if($innerKey1 == 'bike_enginetype')
																{
																	foreach($innerValue1 as $innerKey2 => $innerValue2)
																	{
																		if($innerKey2 == 0)
																		{
																			$bikeEngine = $innerValue2;
																		}
																	}
																}
																else if($innerKey1 == 'bike_displacement')
																{
																	foreach($innerValue1 as $innerKey2 => $innerValue2)
																	{
																		if($innerKey2 == 0)
																		{
																			$bikeDisplacement = $innerValue2;
																		}
																	}
																}
																else if($innerKey1 == 'bike_rating')
																{
																	foreach($innerValue1 as $innerKey2 => $innerValue2)
																	{
																		if($innerKey2 == 0)
																		{
																			$bikeRating = $innerValue2;
																		}
																	}
																}
																else if($innerKey1 == 'bike_power')
																{
																	foreach($innerValue1 as $innerKey2 => $innerValue2)
																	{
																		if($innerKey2 == 0)
																		{
																			$bikePower = $innerValue2;
																		}
																	}
																}
																else if($innerKey1 == 'bike_exshowroom')
																{
																	foreach($innerValue1 as $innerKey2 => $innerValue2)
																	{
																		if($innerKey2 == 0)
																		{
																			$bikeExShowroom = $innerValue2;
																		}
																	}
																}
																else if($innerKey1 == 'bike_wheelbase')
																{
																	foreach($innerValue1 as $innerKey2 => $innerValue2)
																	{
																		if($innerKey2 == 0)
																		{
																			$bikeWheelBase = $innerValue2;
																		}
																	}
																}
																else if($innerKey1 == 'bike_image')
																{
																	foreach($innerValue1 as $innerKey2 => $innerValue2)
																	{
																		if($innerKey2 == 0)
																		{
																			$bikeImageUrl = $innerValue2;
																		}
																	}
																}
																else if($innerKey1 == 'bike_stroke')
																{
																	foreach($innerValue1 as $innerKey2 => $innerValue2)
																	{
																		if($innerKey2 == 0)
																		{
																			$bikeStroke = $innerValue2;
																		}
																	}
																}
															}
														}
													}
												}

												//--find the brand id--
												$cursor2 = $mongo_collection_brands->find(array('brand_name'=>strtolower($bikeBrand)));
												$jcount = $cursor2->count();
												
												if($jcount > 0)
												{
													foreach($cursor2 as $object)
													{
														$bikeBrandId = $object['_id'];
														
														//--insert bike to database--
														$theBikeArray = array(
																			'bike_brand_id'=>$bikeBrandId,
																			'bike_brand'=>strtolower($bikeBrand),
																			'bike_name'=>strtolower($bikeName),
																			'bike_mileage'=>$bikeMileage,
																			'bike_engine'=>$bikeEngine,
																			'bike_displacement'=>$bikeDisplacement,
																			'bike_rating'=>$bikeRating,
																			'bike_power'=>$bikePower,
																			'bike_ex_showroom'=>$bikeExShowroom,
																			'bike_wheelbase'=>$bikeWheelBase,
																			'bike_image_source'=>$bikeImageUrl,
																			'bike_stroke'=>$bikeStroke,
																			'bike_easywheels_rating'=>'',
																			'bike_easywheels_trend'=>'',
																			'bike_other'=>'',
																			'bike_facebook_page'=>'',
																			'bike_twitter_page'=>'',
																			'bike_other_social_source'=>''
																		);
																		
														try
														{
															$mongo_collection_bikes->insert($theBikeArray);
															echo 'successfully inserted into database bikename : ' . $bikeName . '<br/>';
														}
														catch(exception $e)
														{
															echo 'Could not insert data';
														}
													}
												}
												else
												{
													//-database tampered with--
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