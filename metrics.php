<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php include 'meta.ssi' ?>
    <title>Yuuko</title>
</head>
<body>

<?php include 'navigation.ssi' ?>

    <div class="container">
        <div class="row">
        <?php
            include_once 'dbCredentials.php';

            $mysqli = new mysqli($dbhost, $dbuser, $dbpass, $dbname);

            if($mysqli->connect_errno) {
                printf("Connection failed.");
                exit();
            }

            if($result = $mysqli->query("SELECT * FROM Shards")) {
                if(mysqli_num_rows($result) > 0) {
                    while($shards = $result->fetch_array(MYSQLI_ASSOC)) {
                        echo "<div class='shardContainer col shaded'>";
                            echo "<div class='shardId'><h4>Shard #".$shards["shardId"]."</h4></div>";
                            echo "<div class='col-md-6 col-sm-6 inline-block'><span class='bold'>Status</span><br>".$shards["status"]."</div>";
                            echo "<div class='col-md-6 col-sm-6 inline-block text-right'><span class='bold'>Ping</span><br>".number_format($shards["ping"])."</div>";
                            echo "<div class='col-md-6 col-sm-6 inline-block'><span class='bold'>Guilds</span><br>".number_format($shards["guilds"])."</div>";
                            echo "<div class='col-md-6 col-sm-6 inline-block text-right'><span class='bold'>Users</span><br>".number_format($shards["users"])."</div>";
                        echo "</div>";
                    }
                }
            }
        ?>
        </div>
    </div>

    <div class="container margined">
        <div class="row">
            <iframe class="col" src="https://metrics.yuuko.info:3000/d-solo/euzZCcUik/yuuko?refresh=1m&orgId=1&panelId=44&theme=light" height="200" frameborder="0"></iframe>
        </div>

        <div class="row">
            <iframe class="col" src="https://metrics.yuuko.info:3000/d-solo/euzZCcUik/yuuko?refresh=1m&orgId=1&panelId=36&theme=light" height="200" frameborder="0"></iframe>
        </div>

        <div class="row">
            <iframe class="col" src="https://metrics.yuuko.info:3000/d-solo/euzZCcUik/yuuko?refresh=1m&orgId=1&panelId=52&theme=light" height="200" frameborder="0"></iframe>
        </div>

        <div class="row">
            <iframe class="col" src="https://metrics.yuuko.info:3000/d-solo/euzZCcUik/yuuko?refresh=1m&orgId=1&panelId=46&theme=light" height="200" frameborder="0"></iframe>
            <iframe class="col" src="https://metrics.yuuko.info:3000/d-solo/euzZCcUik/yuuko?refresh=1m&orgId=1&panelId=48&theme=light" height="200" frameborder="0"></iframe>
        </div>

        <div class="row">
            <iframe class="col" src="https://metrics.yuuko.info:3000/d-solo/euzZCcUik/yuuko?refresh=1m&orgId=1&panelId=50&theme=light" height="200" frameborder="0"></iframe>
        </div>

        <div class="row">
            <iframe class="col" src="https://metrics.yuuko.info:3000/d-solo/euzZCcUik/yuuko?refresh=1m&orgId=1&panelId=38&theme=light" height="200" frameborder="0"></iframe>
        </div>

        <div class="row">
            <iframe class="col" src="https://metrics.yuuko.info:3000/d-solo/euzZCcUik/yuuko?refresh=1m&orgId=1&panelId=54&theme=light" height="200" frameborder="0"></iframe>
            <iframe class="col" src="https://metrics.yuuko.info:3000/d-solo/euzZCcUik/yuuko?refresh=1m&orgId=1&panelId=55&theme=light" height="200" frameborder="0"></iframe>
            <iframe class="col" src="https://metrics.yuuko.info:3000/d-solo/euzZCcUik/yuuko?refresh=1m&orgId=1&panelId=56&theme=light" height="200" frameborder="0"></iframe>
        </div>
    </div>

<br>&nbsp<br>

</body>
</html>

