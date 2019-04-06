<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">  
<head>
    <?php include 'meta.ssi' ?>
    <title>Yuuko</title>
</head> 
<body>

    <?php include 'navigation.ssi' ?>
    
    <!------------------------------------------------------------------------------------->

    <div class="container" style="background-color: #ffffff">
        <?php include "commands.php" ?>
    </div>
    
    <div class="container">
        <div class="card-deck">
            <div class="card mb-2" style="width: 14rem;">
              <img class="card-img-top" src="./img/avatar.png" alt="Card image cap">
              <div class="card-body">
                <h6 class="card-title text-center">Support Server</h6>
                <p class="card-text">Official support server for Yuuko, can be used to get support, post feedback and suggestions.</p>
                <a href="https://discord.gg/VsM25fN" class="btn btn-primary btn-block">Join</a>
              </div>
            </div>
            <div class="card mb-2" style="width: 14rem;">
              <img class="card-img-top" src="./img/discordbotsorg.png" alt="Card image cap">
              <div class="card-body">
                <h6 class="card-title text-center">discordbots.org</h6>
                <p class="card-text">The first bot list that Yuuko was added to a month after creation in 2018, with a link to their website <a href="https://discordbots.org">here</a>.</p>
                <a href="https://discordbots.org/bot/420682957007880223/vote" class="btn btn-primary btn-block">Vote</a>
              </div>
            </div>
            <div class="card mb-2" style="width: 14rem;">
              <img class="card-img-top" src="./img/discordbotscom.png" alt="Card image cap">
              <div class="card-body">
                <h6 class="card-title text-center">discordbotlist.com</h6>
                <p class="card-text">The second bot list that Yuuko was added to some time in January 2019, with a link to their website <a href="https://discordbotlist.com">here</a>.</p>
                <a href="https://discordbotlist.com/bots/420682957007880223/upvote" class="btn btn-primary btn-block">Vote</a>
              </div>
            </div>
            <div class="card mb-2" style="width: 14rem;">
              <img class="card-img-top" src="./img/divinediscordbotscom.png" alt="Card image cap">
              <div class="card-body">
                <h6 class="card-title text-center">divinediscordbots.com</h6>
                <p class="card-text">The latest bot list that Yuuko has been added to in late January 2019, with a link to their website <a href="https://divinediscordbots.com">here</a>.</p>
                <a href="https://divinediscordbots.com/bots/420682957007880223/vote" class="btn btn-primary btn-block">Vote</a>
              </div>
            </div>
        </div>
    </div>
    
    <!------------------------------------------------------------------------------------->
    
</body>
</html>
