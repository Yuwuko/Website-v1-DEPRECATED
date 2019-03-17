<?php session_start();

if(isset($_SESSION['key']) && isset($_SESSION['permissions'])) {
    if(in_array($_POST['guildId'], $_SESSION['permissions'])) {
        
        include_once 'dbCredentials.php';
 
        $conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
        
        $stmt = $conn->prepare("UPDATE `GuildSettings` SET prefix = ?, deleteExecuted = ?, nowPlaying = ?, djMode = ?, starboard = ?, commandLog = ?, modLog = ?, newMember = ?, newMemberMessage = ? WHERE guildId = ?");
        $stmt -> bind_param("siiissssss", $prefix, $deleteExecuted, $nowPlaying, $djMode, $starboard, $commandLog, $modLog, $newMember, $newMemberMessage, $guildId);
        
        if(!isset($_POST['reset'])) {
            $prefix = $_POST['prefix'];
            $deleteExecuted = ($_POST['deleteExecuted'] == "true") ? 1 : 0;
            $nowPlaying = ($_POST['nowPlaying'] == "true") ? 1 : 0;
            $djMode = ($_POST['djMode'] == "true") ? 1 : 0;
            $starboard = $_POST['starboard'];
            $commandLog = $_POST['commandLog'];
            $modLog = $_POST['modLog'];
            $newMember = $_POST['newMember'];
            $newMemberMessage = $_POST['newMemberMessage'];
            $guildId = $_POST['guildId'];
        } else {
            $prefix = "-";
            $deleteExecuted = 0;
            $nowPlaying = 1;
            $djMode = 0;
            $starboard = null;
            $commandLog = null;
            $modLog = null;
            $newMember = null;
            $newMemberMessage = null;
            $guildId = $_POST['guildId'];
        }
        
        $stmt->execute();
        $stmt->close();
        $conn->close();
    }
}