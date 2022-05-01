<?php 
                    $mysqli = new mysqli("mysql.eecs.ku.edu","y283c244","kai9ju3p","y283c244");

                    if($mysqli->connect_errno){
                        echo "<p>Connection Failed</p>";
                        exit();
                    }
                    $query = "SELECT name, type, prep_time, total_price FROM Recipe ORDER BY RAND() LIMIT 1";

                if ($result = $mysqli->query($query)) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>Hello</td>";
                            echo "<td>World</td>";
                            echo "<td>It</td>";
                            echo "<td>I</td>";
                            echo "</tr>";
                        }
                    }
                    $result->free();
                
                ?>