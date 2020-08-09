<?php
function checkaccountbalance($con,$inputs){

    $checkdata =      mysqli_query($con, "Select User.id,             
                                                        User.account_balance,
                                                        User.is_active
                                                        FROM User
                                                        WHERE User.user_type = $inputs;");
                while ($row = mysqli_fetch_array($checkdata)) {
                    if ($row['account_balance'] <= 0) {
                        $user_id = $row['id'];
                        $upadtequery = mysqli_query($con, "UPDATE User 
                                                            SET is_active = 0
                                                            WHERE id = $user_id;");
                        echo $upadtequery;
                        echo " ";
                    }
                }
                while ($row = mysqli_fetch_array($checkdata)) {
                    if ($row['account_balance'] > 0) {
                        $user_id = $row['id'];
                        $upadtequery = mysqli_query($con, "UPDATE User 
                                                            SET is_active = 1
                                                            WHERE id = $user_id;");
                    }
                }
            }

?>