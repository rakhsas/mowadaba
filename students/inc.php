<?php
                                $count=0;
                                while($data = mysqli_fetch_assoc($run)){
                                        $count++;
                                        $image = $data['image'];
                                        $name = $data['name'];
                                        $rollno = $data['rollno'];
                                        $standerd = $data['standerd'];
                                        $gender = $data['gender'];
                                        $city  = $data['city'];
                                        $contact = $data['contact'];
                                        $datenaissance = $data['DateNaissance']
                                ?><tr>
                                <td> <?php echo $count; ?> </td>
                                <td> <img src="../img/<?php
                                if (isset($image) && !empty($image)){
                                 echo $image;
                                }
                                else
                                {
                                  echo 'user.png';
                                }
                                  ?>" class="responsive-img circle" style="width: 100px;"> </td>
                                    <td><?php echo $name; ?></td>
                                    <td><?php echo $rollno; ?></td>
                                    <td><?php echo $standerd; ?></td>
                                    <td><?php echo $gender; ?></td>
                                    <td><?php echo $contact; ?></td>
                                    <td><?php echo $city; ?></td>
                                    </tr>
                                <?php } ?>