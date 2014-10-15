<meta property="og:site_name" content="MiLEEM"/>
<meta property="og:title" content="<?php echo $publication['OperationType']['name'].' | '.$publication['PropertyType']['name'].' | '.$publication['Publication']['street'].' '.$publication['Publication']['st_number'].', '.$publication['Neighborhood']['name']; ?>" />
<meta property="og:url" content="<?php echo $this->html->url('/', true).'publications/public_view/'.$publication['Publication']['id']; ?>" />
<?php  $images = json_decode($publication['Publication']['images_url']);
				if(!empty($images)){
					foreach ($images as $image){
?>
<meta property="og:image" content="<?php echo $this->html->url('/', true).$image;?>" />
<?php						
					}
				}
?>
<meta property="og:description" content="<? echo $publication['Publication']['price'].' '.$publication['Publication']['currency'];?>" />

<meta name="twitter:card" content="summary_large_image" />
<meta name="twitter:site" content="#MiLEEM" />
<meta name="twitter:creator" content="#MiLEEM" />
<meta name="twitter:app:name:googleplay" content="MiLEEM App" />
<meta name="twitter:app:id:googleplay" content="ar.fi.uba.mileem" />
<meta name="twitter:app:url:googleplay" content="mileem://public_view/<?php echo $publication['Publication']['id']; ?>" />
<meta name="twitter:app:country" content="AR" />
