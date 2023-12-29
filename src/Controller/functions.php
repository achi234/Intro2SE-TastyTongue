<?php
    //session_start();

    function validate($data)
    {
        global $conn;
        $validateData = mysqli_real_escape_string($conn, $data);

        return trim($validateData);
    }

    function redirect($path, $status, $noti)
    {
        $_SESSION['status'] = $status;
        $_SESSION['noti'] = $noti;
        header('location: ' .$path);
        exit(0);
    }

    function insert($tableName, $data)
    {
        global $conn;

        $table = validate($tableName);

        $keys = array_keys($data);
        $values = array_values($data);
       
        $keys = implode(',' , $keys);
        $values = "'".implode("','" , $values)."'";

        $query = "INSERT INTO $table ($keys) VALUES ($values)";
        
        //echo $query;
        $result = mysqli_query($conn, $query);
        return $result;
    }

    function updatebyId($tableName, $id, $data)
    {
        global $conn;
        //print_r($data);
        $table = validate($tableName);
        $id = validate($id);

        $dataString = "";

        //" key=value,"
        foreach($data as $key => $value)
        {
            $dataString .= "$key = '$value', ";
        }

        $setClause = rtrim($dataString, ', ');

        $query = "UPDATE $table SET $setClause WHERE id='$id'";

        //echo $query;
        $result =  mysqli_query($conn, $query);

        return $result;
    }
    function updatebyEmail($tableName, $email, $data)
    {
        global $conn;
        //print_r($data);
        $table = validate($tableName);
        $email = validate($email);

        $dataString = "";

        //" key=value,"
        foreach($data as $key => $value)
        {
            $dataString .= "$key = '$value', ";
        }

        $setClause = rtrim($dataString, ', ');

        $query = "UPDATE $table SET $setClause WHERE email='$email'";

        //echo $query;
        $result =  mysqli_query($conn, $query);

        return $result;
    }
    function getAll($tableName, $status=NULL)
    {
        global $conn;

        $table = validate($tableName);
        $status = validate($status);

        $query = "SELECT * FROM $tableName";

        if ($status !== NULL) {
            $query .= " WHERE status = '$status'";
        }

        $result = mysqli_query($conn, $query);
        
        if ($result) {
            $data = [];

            while ($row = mysqli_fetch_assoc($result)) {
                $data[] = $row;
            }

            if (!empty($data)) {
                $response = [
                    'status' => 'Data Found',
                    'data' => $data,
                ];
            } else {
                $response = [
                    'status' => 'No Data Found',
                ];
            }

            return $response;
        } 
        else {
            $response = [
                'status' => 'Something went wrong! Please try again.',
            ];
            return $response;
        }

    }

    function getbyId($tableName, $id)
    {
        global $conn;

        $table = validate($tableName);
        $id = validate($id);

        $query = "SELECT * FROM $table WHERE id = '$id' LIMIT 1";
        $result =  mysqli_query($conn, $query);

        if($result)
        {
            if(mysqli_num_rows($result) == 1)
            {
                $row = mysqli_fetch_array($result);

                $response = [
                    'status' => 'Data Found',
                    'data' => $row,
                ];
                return $response;
            }
            else
            {
                $response = [
                    'status' => 'No Data Found',
                ];
                return $response;
            }
        }
        else
        {
            $response = [
                'status' => 'Somethig went wrong! Please try again.',
            ];
            return $response;
        }
    }

    function getbyEmail($tableName, $email)
    {
        global $conn;

        $table = validate($tableName);
        $email = validate($email);

        $query = "SELECT * FROM $table WHERE email = '$email' LIMIT 1";
        $result =  mysqli_query($conn, $query);

        if($result)
        {
            if(mysqli_num_rows($result) == 1)
            {
                $row = mysqli_fetch_array($result);

                $response = [
                    'status' => 'Data Found',
                    'data' => $row,
                ];
                return $response;
            }
            else
            {
                $response = [
                    'status' => 'No Data Found',
                ];
                return $response;
            }
        }
        else
        {
            $response = [
                'status' => 'Somethig went wrong! Please try again.',
            ];
            return $response;
        }
    }
    function delete($tableName, $id)
    {
        global $conn;

        $table = validate($tableName);
        $id = validate($id);

        $query = "DELETE FROM $table WHERE id = '$id' LIMIT 1";
        
        $result =  mysqli_query($conn, $query);

        return $result;
    }

    function getByRole($tableName, $role)
    {
        global $conn;

        $table = validate($tableName);
        $role = validate($role);
    
        $query = "SELECT * FROM $table WHERE role = '$role'";
        $result = mysqli_query($conn, $query);
    
        if ($result) {
            $data = [];
    
            while ($row = mysqli_fetch_assoc($result)) {
                $data[] = $row;
            }
    
            if (!empty($data)) {
                $response = [
                    'status' => 'Data Found',
                    'data' => $data,
                ];
            } else {
                $response = [
                    'status' => 'No Data Found',
                ];
            }
    
            return $response;
        } else {
            $response = [
                'status' => 'Something went wrong! Please try again.',
            ];
            return $response;
        }
    }
    // SEARCH //
        function getTableColumns($tableName)
    {
        global $conn;
        $tableName = validate($tableName);

        // Truy vấn để lấy tên các cột
        $query = "SHOW COLUMNS FROM $tableName";

        // Thực thi truy vấn
        $result = mysqli_query($conn, $query);

        $columns = array();

        while ($row = mysqli_fetch_assoc($result)) {
            $columns[] = $row['Field'];
        }

        return $columns;
    }

    // Hàm tìm kiếm người dùng theo từ khóa
    function searchUserByKeyword($tableName, $value, $userType)
    {
        global $conn;

        $table = validate($tableName);
        $userType = validate($userType);
        $value = validate($value);

        // Lấy danh sách các cột trong bảng
        $columns = getTableColumns($tableName, $conn);

        // Xây dựng điều kiện tìm kiếm
        $conditions = [];
        foreach ($columns as $column) {
            $conditions[] = "$column LIKE '%$value%'";
        }

        $query = "SELECT * FROM $tableName WHERE role = '$userType' AND (";
        $query .= implode(" OR ", $conditions);
        $query .= ")";

        // Thực hiện truy vấn chính
        $result = mysqli_query($conn, $query);

        if ($result) {
            $data = array();

            while ($row = mysqli_fetch_assoc($result)) {
                $data[] = $row;
            }

            if (!empty($data)) {
                $response = [
                    'status' => 'Data Found',
                    'data' => $data,
                ];
            } else {
                $response = [
                    'status' => 'No Data Found',
                ];
            }

            return $response;
        } else {
            $response = [
                'status' => 'Something went wrong! Please try again.',
            ];
            return $response;
        }
    }
    function checkParam($type)
    {
        if(!empty($_GET[$type]))
        {
            return $_GET[$type];
        }
        else
        {
            return false;
        }
    }
?>