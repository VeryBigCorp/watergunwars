<html>
    <head>
        <title>Centennial Water Gun Wars</title>
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <link rel="stylesheet" href="css/main-min.css">
        <link rel="stylesheet" type="text/css" href="css/cssreset-min.css"/>
        <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/blitzer/jquery-ui.css" type="text/css" />
        <link rel="icon" type="image/png" href="favicon.png">
        <script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
        <script type='text/javascript' src='confirmdialog.js'></script>
        <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.4/jquery-ui.min.js"></script>
    </head>
    <body>
        <script type='text/javascript'>
            function get_carriers(){
                return eval($.ajax({
                    type: 'POST',
                    url: 'login.php',
                    data: 'a=getcarriers',
                    dataType: 'json',
                    cache: false,
                    async: false,
            
                }).responseText);
            }
        </script>
        <div id='main-container'>
            <input id='gui' style='background-color:white;font-size:12px;' class='button' type='button' onclick="doEasy(true, true)" value='Click for easy interface'/><input style="display:none;" onclick="logout()" id='logout' class='button' type='button' onclick="logout()" value='Log out'/>
            
            <font id='IE' color='red' style='font-size:30px; display:none;'>You're using internet explorer. Please refresh the page to see your target</font>
            <div id='out'></div>
            <input id='in' style='width:100%'/>
            <div id='interface' style='display:none;background-color:transparent;'>
                <h1 style='color:black; font-family:twenty;  font-size: 50px; padding-bottom:2px;' id='title'>Water gun wars</h1>
                <div id='formdiv'>
                    <h1 style='color:#858585; font-family:twenty; font-size:28px; padding-bottom:2px;'>Login</h1>
                    <font style='font-family:basiclig; font-size:24px; color:#CC3333;'><p id='err' style='display:none;'></p></font>
                    <form id='form' onsubmit="return login()">
                        <table width='100%'>
                            <tr>
                                <td style='width=100%; padding-bottom:1em;'>
                                    <input class='login' type='text' id='usr' style='width:100%' placeholder="Codename..."/>
                                </td>
                            </tr>
                            <tr>
                                <td style='width=100%; padding-bottom:1em;'>
                                    <input class='login' type='password' id='pass' style='width:100%' placeholder='Password...'/>
                                </td>
                            </tr>
                            <tr>
                                <td style='width:100%; font-family:Helvetica;'>
                                    <input class='button' id='login' type='submit' style='width:50%' value='Log in'/>
                                </td>
                            </tr>
                        </table>
                    </form>
                </div>
                
                <div id='loggedin'>
                    <p style='font-family: Helvetica; font-size:23px; color:black;' id='name'></p>
                    <p style='font-family: Helvetica; font-size:23px; color:black;' id='target'></p>
                    <br/>
                    <br/>
                    <table id='table' style='text-align:center;' width='100%'>
                        <tr>
                            <td width='50%'><input style='width:90%' class='button' type='button' id='conf' value='Confirm Kill'/></td>
                            <td><input style='width:90%' class='button' type='button' id='kia' value='KIA'/></td>
                        </tr>
                        <tr>
                            <td style='color:black;font-family:basiclig;'><p id='confirm'>Click to confirm a kill on your target</p></td>
                            <td style='color:black;font-family:basiclig;'>You've been killed in action.</td>
                        </tr>
                        <tr>
                            <td><input style='width:90%; color:red;display:none;' class='button' type='button' id='dispute' value='Dispute Kill'/></td>
                        </tr>
                    </table>
                    <div id='admin' style='display:none;'>
                        <h1 style='font-size:20px;color:black;' id='playerTitle'>Add Player</h1>
                        <form action="" id='insert' onsubmit="return addPlayer()">
                            <table width='100%'>
                                <tr>
                                    <td style='width:50%; padding-bottom:1em;'><input style='width:90%' type='text' class='login' id='add_codename' placeholder='Codename'/></td>
                                    <td style='width:50%; padding-bottom:1em;'></td>
                                </tr>
                                <tr>
                                    <td style='width:50%; padding-bottom:1em;'><input type='text' style='width:90%' class='login' id='add_first' placeholder='First Name'/></td>
                                    <td style='width:50%; padding-bottom:1em;'><input type='text' style='width:90%' class='login' id='add_last' placeholder='Last Name'/></td>
                                </tr>
                                <tr>
                                    <td style='width:50%; padding-bottom:1em;'><input type='text' style='width:90%' class='login' id='add_cell' placeholder='Cell Number'/></td>
                                    <td style='width:50%; padding-bottom:1em;'>
                                        <select style='font-family:Helvetica;' class='button' id='carriers'>
                                            
                                        </select>
                                        <script type='text/javascript'>
                                        function isIE() { return ((navigator.appName == 'Microsoft Internet Explorer') || ((navigator.appName == 'Netscape') && (new RegExp("Trident/.*rv:([0-9]{1,}[\.0-9]{0,})").exec(navigator.userAgent) != null))); }
                                                        if(isIE()){
                    $("#IE").css('display','inline');
                } else {
                    $("#IE").css('display','none');
                    
                }
                                        var c = get_carriers();
                                        for(var i = c.length -1; i >= 0; i--){
                                            $("#carriers").append("<option value='"+c[i]+"'>"+c[i]+"</option>");
                                        }
                                        $(window).resize();
                                        </script>
                                    </td>
                                </tr>
                                <tr>
                                    <td><input class='button' style='width:90%' type='submit' value='Add'/></td>
                                </tr>
                            </table>
                        </form>
                        <h1 id='masstitle' style='font-size:20px;color:black;'>Mass Text (click to show)</h1>
                        <div id='masstext'>
                            <textarea style='padding:6px;font-family:Helvetica; -webkit-box-sizing: border-box; -moz-box-sizing: border-box;box-sizing: border-box; -webkit-border-radius: 4px;-moz-border-radius: 4px;border-radius: 4px;' rows="4" cols="50" id='text' placeholder='Message text'></textarea><br/>
                            <input class='button' style='font-family:Helvetica;' type='button' id='send' value='Send mass text'/>
                        </div>
                        <script type='text/javascript'>
                            var showing = false;
                            $("#masstext").slideUp();
                            $("#masstitle").click(function(){
                                if(!showing)
                                    $("#masstext").slideDown('fast', function(){
                                        showing = true;
                                        $("#masstitle").html("Mass Text (click to hide)");
                                    });
                                else
                                    $("#masstext").slideUp('fast', function(){
                                        showing = false;
                                        $("#masstitle").html("Mass Text (click to show)");
                                    });
                            });
                        </script>
                    </div>
                    <font color='black' face='Helvetica' style='font-size:17px;'>
                    <h1 style='font-size:20px;'>Rules:</h1>
                    <ol style='list-style-type:upper-roman; list-style-position: inside;'>
                        <li>The first rule of Water Gun Wars is that you don't talk about Water Gun Wars. Mrs. Crumbley will definitely try to shut it down if she thinks it's getting out of hand. Be smart about what you do. She'll use any excuse to crack down on us. This is why the rules about times and such exist.</li>
                        <br/>
                        <li>The second rule of Water Gun Wars is you do NOT talk about Water Gun Wars. </li>
                        <br/>
                        <li>Each player has a target, and each player is someone else's target. Once you have killed your target, they are out of the game and you get their target. This continues until there is one man/woman standing. It's basically a giant circle. Aside from self-defense (see below), you may only eliminate your current target. You eliminate your target by wetting them. Clothes, backpacks, umbrellas count.
                        <br/><b style='font-size:16px;'>You have SEVEN DAYS to eliminate your target from the moment s/he is assigned. If you fail to eliminate your target within SEVEN DAYS, you are out.</b></li>
                        <br/>
                        <li>Before squirting your target, you must yell your codename.</li>
                        <br/>
                        <li>Don't grab people or hold them down. That doesn't count.</li>
                        <br/>
                        <li>You can kill your attacker in self-defense. Once your attacker has stated their codename, you may shoot them in response. If you do so, immediately contact Mark (404-455-4577) and tell your attacker to click "KIA" on the wesbite. Your kill is confirmed when your attacker marks themselves as K.I.A. on the website or Mark confirms it.</li>
                        <br/>
                        <li>Some places are off-limits in order to prevent people from getting in trouble.
                            <ol style='list-style-type:lower-alpha; list-style-position: inside; margin-left:5%;'>
                                <li>You cannot get people while they are working at their jobs.</li>
                                <li>You cannot get people on school grounds from  8:25 AM to 3:45 PM. Inside the building is fair game between during other hours.</li>
                                <li>You cannot kill people while they are engaged in a school sport or comparable after-school activity; however, to avoid disputes, you should always keep an eye out. </li>
                                <li>Car-to-car combat is forbidden, but "drive-bys" are fine.</li>
                            </ol>
                        </li>
                        <br/>
                        <li>If there are any disputes, contact Mark via facebook or text message (404-455-4577) or use the "Dispute Kill" button. Mark's decisions are final.</li>
                        <br/>
                        <li>You can only use a water <b>gun</b> to kill someone. <i>No</i> water balloons, hoses, etc. The waterguns must be filled with water, not any other fluid. A watergun can't be black. If I can look at it and say "Sweet watergun," then it's a watergun.</li>
                        <br/>
                        <li>Truces and pacts are allowed, but not enforced. If someone betrays you, it's your fault for trusting them.</li>
                        <br/>
                        <li>Be nice and have fun with it!</li>
                    </ol>
                    </font>
                    <p id='ye'></p>
                </div>
            </div>
        </div>
    </body>
    <script type="text/javascript" src='actions-min.js'></script>
</html>