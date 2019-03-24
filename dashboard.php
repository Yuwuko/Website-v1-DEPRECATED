<?php session_start();

if(!isset($_SESSION['key']) && !isset($_GET['code'])) {
    header("Location: https://discordapp.com/api/oauth2/authorize?client_id=420682957007880223&redirect_uri=https%3A%2F%2Fwww.yuuko.info%2Fdashboard.php&response_type=code&scope=identify%20guilds");
}

if(!isset($_SESSION['key'])) {
    include_once 'postOpts.php';

    $ch = curl_init("https://discordapp.com/api/oauth2/token");
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($post_opts));
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-type: application/x-www-form-urlencoded'));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    $response = curl_exec($ch);    
    $obj = json_decode($response, true);
    
    $_SESSION['key'] = $obj['access_token']; 

    $header = 'Authorization: Bearer ' . $_SESSION['key'];  
    $ch2 = curl_init("https://discordapp.com/api/users/@me/guilds");
    curl_setopt($ch2, CURLOPT_POST, 0);
    curl_setopt($ch2, CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt($ch2, CURLOPT_HEADER, 0);
    curl_setopt($ch2, CURLOPT_HTTPHEADER, array($header));
    curl_setopt($ch2, CURLOPT_RETURNTRANSFER, 1);
    $guildData = curl_exec($ch2);    

    $_SESSION['jsonData'] = json_decode($guildData, true);
}

if(isset($_SESSION['jsonData'])) { ?>

<!DOCTYPE html>
<html lang="en">  
<head>
    <?php include 'meta.ssi' ?>
    <title>Yuuko > Dashboard</title>
</head> 
<body>
    
    <?php include 'navigation.ssi' ?>
    
    <!------------------------------------------------------------------------------------->
    
    <div class="container text-center">
        <?php 
            $permissions = array();
            $i = 0;
            foreach($_SESSION['jsonData'] as $guild) {
                if($guild['permissions'] == 2146958847) {
            ?>
            
        
            <div class="guildContainer pointer" <?php echo "data-guild='".$guild['id']."'"?> <?php echo "data-name='".$guild['name']."'"?> data-toggle="tooltip" data-placement="bottom" title="<?php echo $guild['name']?>" style="width: 4rem;">
              <img class="card-img-top" src="https://cdn.discordapp.com/icons/<?php echo $guild['id']."/".$guild['icon'].".png" ?>" alt="">
            </div>
  
            
            <?php 
                    array_push($permissions, $guild['id']);
                    $i++;
                }
            }
            $_SESSION['permissions'] = $permissions;

            if($i == 0) {
                echo "<span class='flex-fill text-center'>It appears that you haven't got the permissions to manage any guilds! :(<br>Click <a href=\"https://discordapp.com/api/oauth2/authorize?client_id=420682957007880223&permissions=8&scope=bot\" target=\"_blank\">here</a> to invite me to one you do!</span>";
            }
        ?>
    </div>
    
    <div id="guildDashboard" class="container"> 
    </div>
    
    <!------------------------------------------------------------------------------------->

    <script>
        $(document).ready(function () {
            function guild(id, name) {
                $("#guildDashboard").load("guildSettings.php?guild="+id+"&name="+name);
            }
        
            $('.guildContainer').click(function(){ 
                $(".guildContainer").removeClass("border-success text-success");
                $(this).addClass("border-success text-success");
                guild($(this).data("guild"), encodeURI($(this).data("name"))); return false; 
            });
        });
        
    </script>
    
    <script>
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip(); 
        });
    </script>
    
</body>
</html>



<?php } ?>