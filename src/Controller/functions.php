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

        $table = validate($tableName);
        $id = validate($id);

        $dataString = "";

        //" key=value,"
        foreach($data as $key => $data)
        {
            $dataString .= $key.'='."'$value',";
        }

        $dataString= substr(trim($dataString),0 -1);

        $query = "UPDATE $table SET $dataString WHERE id='$id'";

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

        $query='';
        if(isset($status))
        {
            $query = "SELECT * FROM $table WHERE status = '$status'";
        }
        else
        {
            $query = "SELECT * FROM $table";
        }

        $result =  mysqli_query($conn, $query);

        return $result;
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
    
?>