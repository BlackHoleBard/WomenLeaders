<?php
ob_start();
session_start();
include_once("../inc-global.php");

if(!$_SESSION['username'])

{

	header("Location:index.php");

}

include '../include/db.php';

    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';

    $charactersLength = strlen($characters);

    $randomString = '';

    for ($i = 0; $i <10; $i++) {

        $randomString .= $characters[rand(0, $charactersLength - 1)];

    }

	$date = date('d-m-Y');

	//header to give the order to the browser

	header('Content-Type: text/csv');

	header('Content-Disposition: attachment;filename=national-students-union-of-india-'.$randomString.'-'.$date.'.csv');

	//select table to export the data

	$select_table=mysqli_query($connection,'select * from apply');

	$rows = mysqli_fetch_assoc($select_table);

	if ($rows)

	{

		getcsv(array_keys($rows));

	}

	while($rows)

	{

		getcsv($rows);

		$rows = mysqli_fetch_assoc($select_table);

	}

	// get total number of fields present in the database

	function getcsv($no_of_field_names)

	{

		$separate = '';

		// do the action for all field names as field name

		foreach ($no_of_field_names as $field_name)

		{
			
			$field_name = '"' . $field_name . '"';

			/*if (preg_match('/\\r|\\n|,|"/', $field_name))

			{

				// $field_name = '' . str_replace('', $field_name) . '';

			}*/

			echo $separate . $field_name;

			//sepearte with the comma

			$separate = ',';

		}

		//make new row and line

		echo "\r\n";

	}

?>