
<div class="topbar">
    <a class="app-name" href="index.php">Tchat</a>
    <span class="menu">
        <?php
            if(isLogged() == 1){
                ?>
                <?php
                    $email = $_SESSION['tchat'];
                 if ($_SESSION['tchat']==$email){ ?>
                                <?php 
                                function get_id(){
                                      $my_email=$_SESSION['tchat'];
                                      global $db;
                                      $req =$db->query("SELECT * FROM users WHERE email ='$my_email'");
                                     while($rows = $req->fetchObject()){
                                     $results[] = $rows;
                                        }
                                  return $results;
                            }?> <?php if(isset($_GET['page'])){
                                get_id();
                                 }?><?php
                        foreach (get_id() as $id) {?>
                        
                        
                        <a id="user_name" href="index.php?page=user_home" class="<?php echo ($page =='signin') ? 'active' : '' ?>"><?php echo $id->name;?></a>
                        <?php
                         }
                        ?>
                    <?php    
                    }
                    ?>
                    <a href="index.php?page=channel" class="<?php echo ($page=='channel') ? 'active' : '' ?>">Channels & Groups</a>
                    <a href="index.php?page=membres" class="<?php echo ($page=='membres') ? 'active' : '' ?>">Membres</a>
                    <a href="index.php?page=logout">Déconnexion</a>
                <?php
            }else{
                ?>
                    
                    <a href="index.php?page=register" class="<?php echo ($page=='register') ? 'active' : '' ?>">S'inscrire</a>
                    <a href="index.php?page=signin" class="<?php echo ($page=='signin') ? 'active' : '' ?>">Se connecter</a>
                <?php
            }
        ?>
    </span>
</div>

    