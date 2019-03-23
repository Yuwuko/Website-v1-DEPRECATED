<?php session_start();

if(isset($_SESSION['key'])) {
    
include_once 'dbCredentials.php';
 
$mysqli = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
    
if($mysqli->connect_errno) {
    printf("Connection failed.");
    exit();
}
    
if($result = $mysqli->query("SELECT * FROM GuildSettings WHERE guildId =".$_GET['guild'])) {
    if(mysqli_num_rows($result) > 0) {
        $guild = $result->fetch_array(MYSQLI_ASSOC);
        ?>
        <form id="settings">
            <input type="hidden" name="guildId" value="<?php echo $_GET['guild'] ?>">

            <div class="row shaded">
                <div class="container shaded mb-3 mt-1">
                    Settings for <b><?php echo $_GET['name'] ?></b>
                </div>

                <div class="container mb-1">
                    <input type="submit" class="btn btn-success" value="Update">
                    <input type="submit" class="btn btn-warning" name="reset" value="Reset">
                </div>
            </div>

            <br>

            <div class="row">
                <div class="col-sm-6">
                    <div class="card mb-2">
                        <div class="card-body">
                            <h5 class="card-title">Prefix</h5>
                            <p class="card-text">
                                The <b>Prefix</b> setting is used to set what the bot uses to understand commands.
                                Maximum prefix length is <b>5</b> characters and can contain most characters, including
                                spaces.
                            <p>Default value: <code>-</code>.</p>
                            <input id="prefix" name="prefix" type="text" class="form-control mt-2" maxlength="5"
                                   value="<?php echo $guild[prefix] ?>">
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="card mb-2">
                        <div class="card-body">
                            <h5 class="card-title">Delete Executed</h5>
                            <p class="card-text">
                                The <b>Delete Executed</b> setting is used to determine whether or not messages that are
                                executed as commands are to be deleted after the command has been successfully executed.
                            <p>Default value: <code>false</code>.</p>
                            <input id="deleteExecuted" name="deleteExecuted" type="text" maxlength="5"
                                   class="pointer <?php echo ($guild[deleteExecuted] == 1) ? "bg-success" : "bg-danger" ?> form-control mt-2"
                                   maxlength="1" value="<?php echo ($guild[deleteExecuted] == 1) ? "true" : "false" ?>">
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="card mb-2">
                        <div class="card-body">
                            <h5 class="card-title">Now Playing</h5>
                            <p class="card-text">
                                The <b>Now Playing</b> setting is used in the audio module to determine whether
                                information about the next track to be should be announced after the current track.
                            <p>Default value: <code>true</code>.</p>
                            <input id="nowPlaying" name="nowPlaying" type="text" maxlength="5"
                                   class="pointer <?php echo ($guild[nowPlaying] == 1) ? "bg-success" : "bg-danger" ?> form-control mt-2"
                                   maxlength="1" value="<?php echo ($guild[nowPlaying] == 1) ? "true" : "false" ?>">
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="card mb-2">
                        <div class="card-body">
                            <h5 class="card-title">DJ Mode</h5>
                            <p class="card-text">
                                The <b>DJ Mode</b> setting is used to lock all audio module commands, except
                                <code>queue</code>, <code>current</code>, and <code>last</code> to users who posess the
                                <code>DJ</code> role within the guild. This role does no have to have any special
                                permissions, just be named <code>DJ</code>.
                            <p>Default value: <code>false</code>.</p>
                            <input id="djMode" name="djMode" type="text" maxlength="5"
                                   class="pointer <?php echo ($guild[djMode] == 1) ? "bg-success" : "bg-danger" ?> form-control mt-2"
                                   maxlength="1" value="<?php echo ($guild[djMode] == 1) ? "true" : "false" ?>">
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="card mb-2">
                        <div class="card-body">
                            <h5 class="card-title">Starboard</h5>
                            <p class="card-text">
                                The <b>Starboard</b> setting is used to determine whether messages reacted to with ⭐ are
                                added to the starboard, and also which channel if any is set as the starboard.
                            <p>Default value: <code>null</code>.</p>
                            <input id="starboard" name="starboard" type="text" placeholder="Channel ID"
                                   class="form-control mt-2" maxlength="18" value="<?php echo $guild[starboard] ?>">
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="card mb-2">
                        <div class="card-body">
                            <h5 class="card-title">Command Log</h5>
                            <p class="card-text">
                                The <b>Command Log</b> setting is used to determine whether commands executed or not,
                                are logged, and also which channel if any, they are logged in.
                            <p>Default value: <code>null</code>.</p>
                            <input id="commandLog" name="commandLog" type="text" placeholder="Channel ID"
                                   class="form-control mt-2" maxlength="18" value="<?php echo $guild[commandLog] ?>">
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="card mb-2">
                        <div class="card-body">
                            <h5 class="card-title">Moderation Log</h5>
                            <p class="card-text">
                                The <b>Moderation Log</b> setting is used to determine commands in the moderation module
                                are logged or not, and also which channel if any, they are logged in.
                            <p>Default value: <code>null</code>.</p>
                            <input id="modLog" name="modLog" type="text" placeholder="Channel ID"
                                   class="form-control mt-2" maxlength="18" value="<?php echo $guild[modLog] ?>">
                            </p>
                        </div>
                    </div>
                </div>

            </div>

            <br>

            <div class="row shaded">

                <div class="col-sm-12">
                    <div class="card mb-2">
                        <div class="card-body">
                            <h5 class="card-title">New Member</h5>
                            <p class="card-text">
                                The <b>New Member</b> setting is used to determine whether new members will be welcomed
                                upon joining the guild, and also which channel to welcome them in if any. You can also
                                set a custom message if the default one doesn't suit your needs. There is also support
                                for tokens which allow the user to be tagged <code>@user</code> or the name of the guild
                                to be printed.
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="card mb-2">
                        <div class="card-body">
                            <h5 class="card-title">Channel</h5>
                            <p class="card-text">
                            <p>Default value: <code>null</code>.</p>
                            <input id="newMember" name="newMember" type="text" placeholder="Channel ID"
                                   class="form-control mt-2" maxlength="18" value="<?php echo $guild[newMember] ?>">
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="card mb-2">
                        <div class="card-body">
                            <h5 class="card-title">Message</h5>
                            <p class="card-text">
                            <p>Tokens: <code>%user%</code>, <code>%guild%</code>, Character limit: <code>255</code></p>
                            <textarea id="newMemberMessage" name="newMemberMessage" class="form-control mt-2"
                                      maxlength="255" rows="5"><?php echo $guild[newMemberMessage] ?></textarea>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </form>

        <script>
        var request;

        $("#settings").submit(function(event){
            event.preventDefault();

            if(request) {
                request.abort();
            }

            var $form = $(this);
            var $inputs = $form.find("input, select, button, textarea");
            var serializedData = $form.serialize();
            
            $inputs.prop("disabled", true);

            request = $.ajax({
                url: "updateSettings.php",
                type: "post",
                data: serializedData
            });

            request.done(function (response, textStatus, jqXHR){
                alert("Success!")
            });

            request.fail(function (jqXHR, textStatus, errorThrown){
                alert("Unsuccessful.")
            });

            request.always(function () {
                $inputs.prop("disabled", false);
            });

        });

        </script>

        <br>

        <?php
    } else {
        ?>
        <div class="container shaded text-center">Sorry, I am not currently in this guild...<br>Click <a href="https://discordapp.com/api/oauth2/authorize?client_id=420682957007880223&permissions=8&scope=bot" target="_blank">here</a> to invite me! </div>
<?php
    }

    $result->close();
} else {
    printf("Query failed.");
}

} ?>