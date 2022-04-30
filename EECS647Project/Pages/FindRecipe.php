<?php 
                    $mysqli = new mysqli("mysql.eecs.ku.edu","y283c244","kai9ju3p","y283c244");

                    if($mysqli->connect_errno){
                        echo "<p>Connection Failed</p>";
                        exit();
                    }
                    
                    $query = "SELECT name, type, prep_time, total_price FROM Recipe ORDER BY RAND() LIMIT 1";

                    if ($result = $mysqli->query($query)) {
                        /* fetch associative array */
                            while ($row = $result->fetch_assoc()) {?>
                               <tr>
                                    <td><?php echo $row['name'];?></td>
                                    <td><?php echo $row['type'];?></td>
                                    <td><?php echo $row['prep_time'];?></td>
                                    <td><?php echo $row['total_price'];?></td>
                                    <td>
                                        <button >Make It!</button>
                                    </td>
                               </tr>

                            <?php }
                    }
                        /* free result set */
                        $result->free();
                
                ?>