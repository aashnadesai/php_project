<?php
/**
 * PraviinM
 */


//Retrieve information for all users
/**
 * @return array
 */

function pre($arr)
{
    echo '<pre>';
    print_r($arr);
    echo '</pre>';
}

function fetchThisUser($email, $password)
{
    // echo 'Email: ' . $email;

    global $mysqli, $db_table_prefix;

    if ($mysqli->connect_error) {
        die("Connection failed: " . $mysqli->connect_error);
    }

    $ss = $mysqli->query('SELECT * FROM user_master WHERE `user_email` = "'.$email.'" AND `user_password` = "'.$password.'"');

    // while($row = $ss->fetch_assoc()) 
    // {
    //     pre($row);
    // }

    
    // pre($ss);

    // $stmt = $mysqli->prepare(
    //     "SELECT
    //         user_id
    //         user_username,
    //         user_phone,
    //         user_email,
    //         user_password,
    //         user_status,
    //         user_date

    //     FROM user_master WHERE user_email = ?" 
    // );

    // $stmt->bind_param("s", $email);
    // $stmt->execute();
    // $stmt->bind_result(
    //     $user_id,
    //     $user_username,
    //     $user_phone,
    //     $user_email,
    //     $user_password,
    //     $user_status,
    //     $user_date
    // );
    
    // pre($stmt);

    while ($result = $ss->fetch_assoc()) {
        $row[] = array(
            'user_id' => $result['user_id'],
            'user_username' => $result['user_username'],
            'user_phone' => $result['user_phone'],
            'user_email' => $result['user_email'],
            'user_password' => $result['user_password'],
            'user_status' => $result['user_status'],
            'user_date' => $result['user_date']
        );
    }
    // $stmt->close();
    return ($row);
}

function product_info($id)
{
    global $mysqli, $db_table_prefix;
    $stmt = $mysqli->prepare(
        "SELECT
            product_id,
            product_title,
            product_selling_price,
            product_mrp,
            product_description,
            product_image_link

        FROM " . $db_table_prefix . "products WHERE product_id = ?" 
    );
    $stmt->bind_param("s", $id);
    $stmt->execute();
    $stmt->bind_result(
        $product_id,
        $product_title,
        $product_selling_price,
        $product_mrp,
        $product_description,
        $product_image_link
    );

    while ($stmt->fetch()) {
        $row[] = array(
            'product_id' => $product_id,
            'product_title' => $product_title,
            'product_selling_price' => $product_selling_price,
            'product_mrp' => $product_mrp,
            'product_description' => $product_description,
            'product_image_link' => $product_image_link
        );
    }
    $stmt->close();
    return ($row);
}

function get_latest_products()
{
    global $mysqli, $db_table_prefix;
    $stmt = $mysqli->prepare(
        "SELECT
            product_id,
            product_title,
            product_selling_price,
            product_mrp,
            product_description,
            product_image_link

        FROM " . $db_table_prefix . "products ORDER BY product_id DESC LIMIT 0,4" 
    );
    $stmt->execute();
    $stmt->bind_result(
        $product_id,
        $product_title,
        $product_selling_price,
        $product_mrp,
        $product_description,
        $product_image_link
    );
    while ($stmt->fetch()) {
        $row[] = array(
            'product_id' => $product_id,
            'product_title' => $product_title,
            'product_selling_price' => $product_selling_price,
            'product_mrp' => $product_mrp,
            'product_description' => $product_description,
            'product_image_link' => $product_image_link
        );
    }
    $stmt->close();
    return ($row);
}

function get_brands()
{
    global $mysqli, $db_table_prefix;
    $stmt = $mysqli->prepare(
        "SELECT
            brand_id,
            brand_name

        FROM " . $db_table_prefix . "brand_master" 
    );
    $stmt->execute();
    $stmt->bind_result(
        $brand_id,
        $brand_name
    );

    while ($stmt->fetch()) {
        $row[] = array(
            'brand_id' => $brand_id,
            'brand_name' => $brand_name
        );
    }
    $stmt->close();
    return ($row);
}

function products($id)
{
    global $mysqli, $db_table_prefix;
    $stmt = $mysqli->prepare(
        "SELECT
            product_id,
            product_title,
            product_selling_price,
            product_mrp,
            product_description,
            product_image_link

        FROM " . $db_table_prefix . "products WHERE brand_id = ?" 
    );
    $stmt->bind_param("s", $id);
    $stmt->execute();
    $stmt->bind_result(
        $product_id,
        $product_title,
        $product_selling_price,
        $product_mrp,
        $product_description,
        $product_image_link
    );

    while ($stmt->fetch()) {
        $row[] = array(
            'product_id' => $product_id,
            'product_title' => $product_title,
            'product_selling_price' => $product_selling_price,
            'product_mrp' => $product_mrp,
            'product_description' => $product_description,
            'product_image_link' => $product_image_link
        );
    }
    $stmt->close();
    return ($row);
}

function fetchAllUsers()
{
    global $mysqli, $db_table_prefix;
    $stmt = $mysqli->prepare(
        "SELECT
		id,
		userid,
		FirstName,
		LastName,
		City,
		Zip,
		DateOfBirth,
		EmailAddress,
		MemberSince,
		active

		FROM " . $db_table_prefix . "user"
    );
    $stmt->execute();
    $stmt->bind_result(
        $id,
        $userid,
        $FirstName,
        $LastName,
        $City,
        $Zip,
        $DateOfBirth,
        $EmailAddress,
        $MemberSince,
        $active
    );

    while ($stmt->fetch()) {
        $row[] = array(
            'id' => $id,
            'userid' => $userid,
            'firstname' => $FirstName,
            'lastname' => $LastName,
            'city' => $City,
            'zip' => $Zip,
            'dateofbirth' => $DateOfBirth,
            'email' => $EmailAddress,
            'membersince' => $MemberSince,
            'active' => $active
        );
    }
    $stmt->close();
    return ($row);
}


//Create a new user

/**
 * @param $fname
 * @param $lname
 * @param $dob
 * @param $email
 * @param $city
 * @param $zip
 *
 * @return bool
 */
function createNewUser($arr)
{
    global $mysqli, $db_table_prefix;

    $stmt = $mysqli->prepare(
        "INSERT INTO `user_master`
        (`user_username`, `user_phone`, `user_email`, `user_password`, `user_status`) 
        VALUES
        (
		?,
		?,
		?,
		?,
		1
		)"
    );
    $stmt->bind_param("ssss", $arr['name'], $arr['phone'], $arr['email'], $arr['password']);
    $result = $stmt->execute();
    $stmt->close();
    return $result;

}


//fetch particular users record

/**
 * @param $userid
 *
 * @return array
 */



//Update selected users record.
/**
 * @param $fname
 * @param $lname
 * @param $city
 * @param $zip
 * @param $dob
 * @param $email
 * @param $userid
 *
 * @return bool
 */
function updateThisRecord($fname, $lname, $city, $zip, $dob, $email, $userid)
{
    global $mysqli, $db_table_prefix;
    $stmt = $mysqli->prepare(
        "UPDATE " . $db_table_prefix . "user
		SET
		FirstName = ?,
		LastName = ?,
		City = ?,
		Zip = ?,
		DateOfBirth = ?,
		EmailAddress = ?
		WHERE
		userid = ?
		LIMIT 1"
    );
    $stmt->bind_param("sssssss", $fname, $lname, $city, $zip, $dob, $email, $userid);
    $result = $stmt->execute();
    $stmt->close();

    return $result;
}
