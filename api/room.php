<?php
require_once '../bookingroom/config.php';
require_once '../bookingroom/mysqli_connect.php';

$cmd = "SELECT *, meetingroom_croom.name as a, room_type.name as b
						FROM meetingroom_croom
						INNER JOIN room_type ON ( meetingroom_croom.parent = room_type.id )
						where meetingroom_croom.enable = '1' 
						ORDER BY meetingroom_croom.cr_id ASC";
						$result = mysqli_query($mysqli, $cmd);
						$total = mysqli_num_rows($result);

                        if($total > 0){

                            $resonse = array(
                                'status' => true
                            );
                            while($row=mysqli_fetch_assoc($result)){
                                $resonse['response'][] = array(
                                    'cr_id' => $row["cr_id"],
                                    'cr_number' => $row["cr_number"],
                                    'cr_name' => $row['a'],
                                    'cr_net' => $row['net'],
                                    'location' => $row['location']
                                );
                            }
                            http_response_code(200);
                            echo json_encode($resonse, JSON_UNESCAPED_UNICODE);

                        }else{

                            http_response_code(400);
                            echo json_encode(array(
                                'status' => false
                            ));

                        }
?>