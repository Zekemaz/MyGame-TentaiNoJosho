<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Tentai No Jōshō</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <link rel="stylesheet" type="text/css" media="screen" href="../styles/style.css">
    <link rel="stylesheet" type="text/css" media="screen" href="../styles/contentstyle.css">

</head>
<body>
<section id="global"> <!-- global section -->

    <?php include("header3.php") ?>
    <section id="content_section"> <!-- content section -->
        <div id="chatTitle">
            <h1>Chat</h1>
        </div>

        <div id="chatDiv">
            <div id="leftDiv">
                <div>
                    <button>Moderator</button>
                    <button>General Chat</button>
                </div>

            </div>
            <div id="rightDiv">
                <div id="messageArea">
                </div>
                <div id="btnTxtArea">
                    <button id="sendBtn">Send</button>
                    <textarea name="textBox" id="textArea" cols="1" rows="5"></textarea>
                </div>
            </div>
        </div>
    </section> <!-- end content section -->
    <?php include("footer.php") ?>
</section> <!-- end global section -->



</body>
</html>

