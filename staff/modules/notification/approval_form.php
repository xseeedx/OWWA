    <?php  

        $id = $_SESSION['USERID'];
    
        $user = New User ();
        $acc = $user->single_user($id);

    ?>
    <?php   

                                        $user = $_SESSION['USERID'];
                                    $mydb->setQuery("SELECT * 
                                                FROM  `scholar_info` where user_id = $user");
                                    $cur = $mydb->loadResultList();

                                    foreach ($cur as $result) {
                                
    ?>
            

        <form method="POST">
            <input type="hidden" name="scholar_id" value="<?php echo $user->user_id?>">
            <button type="submit" name="approve">Approve</button>
            <button type="submit" name="reject">Reject</button>
        </form>
    </body>
    </html>

    <?php }?>
